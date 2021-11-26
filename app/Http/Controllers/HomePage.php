<?php

namespace App\Http\Controllers;

use App\Models\Practice;
use App\Models\PublicationState;
use Carbon\Carbon;

class HomePage extends Controller
{
    public function index()
    {
        return view('homepage');
    }
}
