<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndividualTargetController extends Controller
{
    public function show()
    {
        return view('individual.index');
    }
}
