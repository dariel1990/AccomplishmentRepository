<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Category;
use App\Models\CrudEvents;
use Illuminate\Http\Request;
use App\Models\Accomplishments;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $userID = Auth::user()->id;
        $username = Auth::user()->lastname;
        $data = Accomplishments::where('user_id', $userID)->get();
        $categories = Category::get();
        $summary = DB::table('accomplishments')
                    ->selectRaw("categories.description, COUNT('accomplishments.*') as services")
                    ->where('accomplishments.user_id', $userID)
                    ->join('categories', 'categories.id', '=', 'accomplishments.category')
                    ->groupBy('categories.description')
                    ->get();
        $countAccomplishment = Accomplishments::where('user_id', $userID)->count();
        return view('user.dashboard', [ 
            'data' => $data,
            'username' => $username,
            'userID' => $userID,
            'categories' => $categories,
            'summary' => $summary,
            'countAccomplishment' => $countAccomplishment,
        ]);   
    }

    public function edit($id)
    {
        return Accomplishments::with('cat')->findOrFail($id);
    }

    public function delete(Request $request, $id)
    {
        $accom = Accomplishments::find($id);
        $accom->delete();
    }

    public function print($id, $sign)
    {
        $accoms = Accomplishments::find($id);
        $middlename = Auth::user()->middlename;
        $fullname = Auth::user()->firstname . ' ' . $middlename[0] . '. ' . Auth::user()->lastname;
        $pdf = App::make('snappy.pdf.wrapper');
        $blank = $sign;

        $pdf->loadView('reports.accomplishmentReport', compact('accoms', 'fullname', 'blank'))
            ->setPaper('legal')
            ->setOrientation('portrait');

        return $pdf->inline();
    }

    public function printSummary($user, $from, $to)
    {

        $printFrom = Carbon::parse($from)->firstofMonth()->format('Y-m-d');
        $printTo = Carbon::parse($to)->lastofMonth()->format('Y-m-d');
        
        $summary = Accomplishments::select(DB::raw('DISTINCT(solution)'),'category')
                    ->where('user_id', $user)
                    ->whereBetween('date_acted', [$printFrom, $printTo])
                    ->with(['cat', 'user'])
                    ->get()
                    ->groupBy('cat.description');
                    
        $pdf = App::make('snappy.pdf.wrapper');

        $pdf->loadView('reports.accomplishmentSummary', compact('summary', 'printFrom', 'printTo'))
            ->setPaper('legal')
            ->setOrientation('portrait');

        return $pdf->inline();
    }
}
