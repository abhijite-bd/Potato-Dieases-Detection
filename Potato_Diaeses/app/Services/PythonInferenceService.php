<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class PythonInferenceService
{
    public function predict($imagePath)
    {
        $response = Http::attach(
            'image',
            file_get_contents($imagePath),
            'image.jpg'
        )->post('http://127.0.0.1:5000/predict');

        return $response->json();
    }
}
