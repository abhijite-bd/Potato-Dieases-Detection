<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Prediction;
use App\Models\Cure;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'users' => User::count(),
            'predictions' => Prediction::count(),
            'cures' => Cure::count()
        ]);
    }
}
