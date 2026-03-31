<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prediction;
use App\Models\Cure;
use App\Services\PythonInferenceService;

class PredictionController extends Controller
{

    public function index()
    {
        return view('upload');
    }

    public function predict(Request $request, PythonInferenceService $ai)
    {

        $request->validate([
            'image' => 'required|image'
        ]);

        $path = $request->file('image')->store('uploads', 'public');

        $fullPath = storage_path('app/public/' . $path);

        $result = $ai->predict($fullPath);

        $prediction = Prediction::create([
            'image' => $path,
            'prediction' => $result['prediction'],
            'probabilities' => $result['probabilities']
        ]);

        $cure = null;
        $predictedClass = $result['prediction'];
        $probability = $result['probabilities'][$predictedClass] * 100;
        $cures = Cure::where('type', $predictedClass)
            ->where('percentage', '<=', $probability)
            ->get();
        // dd($predictedClass);
        return view('result', compact('prediction', 'cures'));
    }

    public function history()
    {
        $predictions = Prediction::latest()->paginate(10);
        return view('history', compact('predictions'));
    }
}
