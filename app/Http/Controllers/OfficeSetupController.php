<?php

namespace App\Http\Controllers;

use App\Models\Office;
use Illuminate\Http\Request;
use App\Models\MajorFinalOutput;
use App\Models\OfficeSuccessIndicator;
use Illuminate\Support\Facades\DB;

class OfficeSetupController extends Controller
{

    public function show()
    {

        return view('setup.show');
    }


    public function list()
    {
        $mfo = Office::has('majorFinal')->with('majorFinal')->get();
        
        $data = DB::table('major_final_outputs')
            ->select('category', 'mfo_desc', 'seq_no')
            ->get();


        $subtask = MajorFinalOutput::has('officeSuccessIndicator')->with('officeSuccessIndicator')->get('mfo_id');


        return view('setup.show', compact('data', 'subtask'));
    }


    public function store(Request $request)
    {

        DB::table('major_final_outputs')->insert([
            'office_code'   => $request->office_code,
            'category'      => $request->category,
            'mfo_desc'      => $request->mfo_desc,
            'seq_no'        => $request->seq_no
        ]); 


        return response()->json('success', true);
    }

    
}
