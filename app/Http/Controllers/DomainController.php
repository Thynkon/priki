<?php

namespace App\Http\Controllers;

use App\Models\Domain;
use App\Models\Practice;
use Illuminate\Http\Request;

class DomainController extends Controller
{
    public function index()
    {
        $practices = Practice::published()->get();
        return view('domain.show')->with('practices', $practices);
    }
    public function byDomain($domain)
    {
        $practices = Practice::published()->ofDomain($domain)->get();
        return view('domain.show')->with(['practices' => $practices]);
    }
}