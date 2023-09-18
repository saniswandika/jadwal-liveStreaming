<?php

namespace App\Http\Controllers;

use App\Models\jadwal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Event;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    private $checkRoles;
    public function __construct()
    {
        $this->middleware('auth');
        $this->checkRoles = new RoleController;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   

        $checkRoles = $this->checkRoles->getRoles();
        $jadwals = Event::all();
        Carbon::setLocale('id');
        $formattedDate = Carbon::now()->formatLocalized('%Y-%m-%d');
        // $now = Carbon::now()->format('Y-m-d');
        // dd($now);
        // $formattedDate = $now->translatedFormat('d F Y');
        $jadwalRecord = Event::where('start_date', $formattedDate)->get();
        // dd($jadwalRecord);
        $users = Event::select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(start_date) as month_name"))
        ->whereYear('created_at', date('Y'))
        ->groupBy(DB::raw("month_name"))
        ->orderBy('id','ASC')
        ->pluck('count', 'month_name');

        $labels = $users->keys();
        $data = $users->values();
        
        return view('home', compact('labels', 'data','formattedDate','jadwalRecord','jadwals','checkRoles'));
    }
}
