<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Candidate;

class DashboardController extends Controller
{
    public function index(){
        $candidate = Candidate::all();

        return view('dashboard', compact('candidate'));
    }
}
