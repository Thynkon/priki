<?php

namespace App\Http\Controllers;

use App\Models\Domain;
use App\Models\Practice;
use Illuminate\Http\Request;

class DomainController extends Controller
{
    public function index()
    {
        $domains = Domain::orderBy('name')->get();
        $numberOfPractices = Practice::count();
        return view('domain.show')->with(['domains' => $domains, 'numberOfPractices' => $numberOfPractices]);
    }
}
