<?php

namespace App\Http\Controllers;

use App\Models\Domain;
use App\Models\Practice;
use Illuminate\Http\Request;

class DomainController extends Controller
{
    public function index()
    {
        $practices = Practice::published();
        return view('domain.show')->with('practices', $practices);
    }
    public function byDomain($domain)
    {
        $practices = Practice::ofDomain($domain)->get();
        return view('domain.show')->with(['practices' => $practices]);
    }
}