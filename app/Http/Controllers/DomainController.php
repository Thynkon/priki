<?php

namespace App\Http\Controllers;

use App\Models\Domain;
use Illuminate\Http\Request;

class DomainController extends Controller
{
    public function index()
    {
        $domains = Domain::orderBy('name')->get();
        return view('domain.show')->with(['domains' => $domains]);
    }
}
