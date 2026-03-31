<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prediction extends Model
{
    protected $fillable = [
        'image',
        'prediction',
        'probabilities'
    ];

    protected $casts = [
        'probabilities' => 'array'
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
