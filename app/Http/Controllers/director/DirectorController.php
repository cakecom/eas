<?php

namespace App\Http\Controllers\director;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DirectorController extends Controller
{
    public function index()
    {
        return view('director/dashboard');
    }
}
