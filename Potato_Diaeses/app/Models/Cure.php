<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cure extends Model
{
    protected $fillable = [
        'type',
        'description',
        'percentage'
    ];
}
