<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Accomplishments;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin',['only' => 'index','edit']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Accomplishments::get();
        $categories = Category::get();
        $summary = DB::table('accomplishments')
                    ->whereYear('date_acted', Carbon::now()->format("Y"))
                    ->selectRaw("categories.description, COUNT('accomplishments.*') as services")
                    ->join('categories', 'categories.id', '=', 'accomplishments.category')
                    ->groupBy('categories.description')
                    ->get();
        $countAccomplishment = $summary->sum('services');
        $employees = User::orderBy('lastname', 'ASC')->get();

        return view('admin.dashboard', [ 
            'data' => $data,
            'categories' => $categories,
            'summary' => $summary,
            'countAccomplishment' => $countAccomplishment,
            'employees' => $employees,
        ]);
    }

    public function printSummary($from, $to)
    {

        $printFrom = Carbon::parse($from)->firstofMonth()->format('Y-m-d');
        $printTo = Carbon::parse($to)->lastofMonth()->format('Y-m-d');
        
        $summary = Accomplishments::whereBetween('date_acted', [$printFrom, $printTo])
                    ->with(['cat', 'user'])
                    ->orderBy('date_acted', 'ASC')
                    ->get();
                    
        $pdf = App::make('snappy.pdf.wrapper');

        $pdf->loadView('reports.accomplishmentSummaryAll', compact('summary', 'printFrom', 'printTo'))
            ->setPaper('legal')
            ->setOrientation('portrait');

        return $pdf->inline();
    }

    public function printByCat($from, $to)
    {

        $printFrom = Carbon::parse($from)->firstofMonth()->format('Y-m-d');
        $printTo = Carbon::parse($to)->lastofMonth()->format('Y-m-d');
        
        $summary = Accomplishments::whereBetween('date_acted', [$printFrom, $printTo])
                    ->whereNotIn('user_id', [7,9,11,12])
                    ->with(['cat', 'user'])
                    ->orderBy('date_acted', 'ASC')
                    ->get();
        
        $countAllBetween = Accomplishments::whereBetween('date_acted', [$printFrom, $printTo])
                    ->whereNotIn('user_id', [7,9,11,12])
                    ->count();

        $pdf = App::make('snappy.pdf.wrapper');

        $employees = User::whereNotIn('id', [11,12])->orderBy('lastname', 'ASC')->get();

        $pdf->loadView('reports.accomplishmentbyCat', compact('summary', 'printFrom', 'printTo', 'employees', 'countAllBetween'))
            ->setPaper('legal')
            ->setOrientation('portrait')
            ->setOption('margin-bottom',40);

        return $pdf->inline();
    }
}
