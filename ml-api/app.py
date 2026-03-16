from flask import Flask, request, jsonify
import torch
import torch.nn as nn
from torchvision import models, transforms
from PIL import Image

app = Flask(__name__)

MODEL_PATH = "best.pt"

device = "cuda" if torch.cuda.is_available() else "cpu"


def build_model(num_classes):
    m = models.mobilenet_v3_large(weights=None)
    in_features = m.classifier[3].in_features
    m.classifier[3] = nn.Linear(in_features, num_classes)
    return m


# Load checkpoint
ckpt = torch.load(MODEL_PATH, map_location=device)

class_names = ckpt["class_names"]
img_size = ckpt.get("img_size", 256)
use_imagenet_norm = ckpt.get("use_imagenet_norm", False)

model = build_model(len(class_names)).to(device)
model.load_state_dict(ckpt["model_state"])
model.eval()

tfms = [transforms.Resize((img_size, img_size)), transforms.ToTensor()]

if use_imagenet_norm:
    tfms.append(
        transforms.Normalize((0.485, 0.456, 0.406), (0.229, 0.224, 0.225)))

transform = transforms.Compose(tfms)


@app.route("/predict", methods=["POST"])
def predict():

    if "image" not in request.files:
        return jsonify({"error": "no image"}), 400

    file = request.files["image"]

    img = Image.open(file.stream).convert("RGB")
    x = transform(img).unsqueeze(0).to(device)

    with torch.no_grad():
        logits = model(x)
        prob = torch.softmax(logits, dim=1)[0].cpu().numpy()

    idx = int(prob.argmax())

    result = {
        "prediction": class_names[idx],
        "probabilities": {
            class_names[i]: float(prob[i])
            for i in range(len(class_names))
        }
    }

    return jsonify(result)


if __name__ == "__main__":
    app.run(host="0.0.0.0", port=5000)
