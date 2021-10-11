<?php

namespace App\Http\Controllers;
use App\Models\RaawaModel;
use DB;

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
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Raawa part
        $raawa1D = RaawaModel::where('online_raawa_expired',date('Y-m-d'))
                                ->count();
        $raawa2D = RaawaModel::where('online_raawa_expired','>',date('Y-m-d', strtotime('1 days')))
                                ->where('online_raawa_expired','<',date('Y-m-d', strtotime('3 days')))
                                ->count();
        $raawa3D = RaawaModel::where('online_raawa_expired','>',date('Y-m-d', strtotime('2 days')))
                                ->where('online_raawa_expired','<',date('Y-m-d', strtotime('4 days')))
                                ->count();
        $raawa4D = RaawaModel::where('online_raawa_expired','>',date('Y-m-d', strtotime('5 days')))
                                ->where('online_raawa_expired','<',date('Y-m-d', strtotime('7 days')))
                                ->count();
        $raawa5D = RaawaModel::where('online_raawa_expired','>',date('Y-m-d', strtotime('6 days')))
                                ->where('online_raawa_expired','<',date('Y-m-d', strtotime('8 days')))
                                ->count();
        $raawa6D = RaawaModel::where('online_raawa_expired','>',date('Y-m-d', strtotime('7 days')))
                                ->where('online_raawa_expired','<',date('Y-m-d', strtotime('9 days')))
                                ->count();
        $raawa7D = RaawaModel::where('online_raawa_expired','>',date('Y-m-d', strtotime('10 days')))
                                ->where('online_raawa_expired','<',date('Y-m-d', strtotime('12 days')))
                                ->count();
        $raawaArray = [$raawa7D, $raawa6D, $raawa5D, $raawa4D, $raawa3D, $raawa2D, $raawa1D];
        $days7count = array_sum($raawaArray);


        // SEC part
        $sec7D = RaawaModel::where('expired','<',date('Y-m-d', strtotime('7 days')))
                                ->where('expired','>',date('Y-m-d'))
                                ->count();
        $sec14D = RaawaModel::where('expired','>',date('Y-m-d', strtotime('7 days')))
                                ->where('expired','<',date('Y-m-d', strtotime('14 days')))
                                ->count();
        $sec21D = RaawaModel::where('expired','>',date('Y-m-d', strtotime('14 days')))
                                ->where('expired','<',date('Y-m-d', strtotime('21 days')))
                                ->count();
        $sec28D = RaawaModel::where('expired','>',date('Y-m-d', strtotime('21 days')))
                                ->where('expired','<',date('Y-m-d', strtotime('28 days')))
                                ->count();
        $sec35D = RaawaModel::where('expired','>',date('Y-m-d', strtotime('28 days')))
                                ->where('expired','<',date('Y-m-d', strtotime('35 days')))
                                ->count();
        $sec42D = RaawaModel::where('expired','>',date('Y-m-d', strtotime('35 days')))
                                ->where('expired','<',date('Y-m-d', strtotime('42 days')))
                                ->count();
        $secArray = [$sec42D, $sec35D, $sec28D, $sec21D, $sec14D, $sec7D];
        $secSum = array_sum($secArray);
        

        //Active count
        $secActive = RaawaModel::where('expired', '>', date('Y-m-d'))
                                ->count();
        $raawaActive = RaawaModel::where('online_raawa_expired', '>', date('Y-m-d'))
                                ->count();
        $activeArray = [$secActive,$raawaActive];
        
        //expired sec part
        $year = date('Y');
        $sec1 = DB::select( DB::raw("SELECT * FROM `rawwa` WHERE substring(`expired`,1,7) = '$year-01'") );
        $sec2 = DB::select( DB::raw("SELECT * FROM `rawwa` WHERE substring(`expired`,1,7) = '$year-02'") );
        $sec3 = DB::select( DB::raw("SELECT * FROM `rawwa` WHERE substring(`expired`,1,7) = '$year-03'") );
        $sec4 = DB::select( DB::raw("SELECT * FROM `rawwa` WHERE substring(`expired`,1,7) = '$year-04'") );
        $sec5 = DB::select( DB::raw("SELECT * FROM `rawwa` WHERE substring(`expired`,1,7) = '$year-05'") );
        $sec6 = DB::select( DB::raw("SELECT * FROM `rawwa` WHERE substring(`expired`,1,7) = '$year-06'") );
        $sec7 = DB::select( DB::raw("SELECT * FROM `rawwa` WHERE substring(`expired`,1,7) = '$year-07'") );
        $sec8 = DB::select( DB::raw("SELECT * FROM `rawwa` WHERE substring(`expired`,1,7) = '$year-08'") );
        $sec9 = DB::select( DB::raw("SELECT * FROM `rawwa` WHERE substring(`expired`,1,7) = '$year-09'") );
        $sec10 = DB::select( DB::raw("SELECT * FROM `rawwa` WHERE substring(`expired`,1,7) = '$year-10'") );
        $sec11 = DB::select( DB::raw("SELECT * FROM `rawwa` WHERE substring(`expired`,1,7) = '$year-11'") );
        $sec12 = DB::select( DB::raw("SELECT * FROM `rawwa` WHERE substring(`expired`,1,7) = '$year-12'") );
        $secArrayexpired = [
                 count($sec1),
                 count($sec2),
                 count($sec3),
                 count($sec4),
                 count($sec5),
                 count($sec6),
                 count($sec7),
                 count($sec9),
                 count($sec9),
                 count($sec10),
                 count($sec11),
                 count($sec12),
                ];
        //expired part rawa
        $raawa1 = DB::select( DB::raw("SELECT * FROM `rawwa` WHERE substring(`online_raawa_expired`,1,7) = '$year-01'") );
        $raawa2 = DB::select( DB::raw("SELECT * FROM `rawwa` WHERE substring(`online_raawa_expired`,1,7) = '$year-02'") );
        $raawa3 = DB::select( DB::raw("SELECT * FROM `rawwa` WHERE substring(`online_raawa_expired`,1,7) = '$year-03'") );
        $raawa4 = DB::select( DB::raw("SELECT * FROM `rawwa` WHERE substring(`online_raawa_expired`,1,7) = '$year-04'") );
        $raawa5 = DB::select( DB::raw("SELECT * FROM `rawwa` WHERE substring(`online_raawa_expired`,1,7) = '$year-05'") );
        $raawa6 = DB::select( DB::raw("SELECT * FROM `rawwa` WHERE substring(`online_raawa_expired`,1,7) = '$year-06'") );
        $raawa7 = DB::select( DB::raw("SELECT * FROM `rawwa` WHERE substring(`online_raawa_expired`,1,7) = '$year-07'") );
        $raawa8 = DB::select( DB::raw("SELECT * FROM `rawwa` WHERE substring(`online_raawa_expired`,1,7) = '$year-08'") );
        $raawa9 = DB::select( DB::raw("SELECT * FROM `rawwa` WHERE substring(`online_raawa_expired`,1,7) = '$year-09'") );
        $raawa10 = DB::select( DB::raw("SELECT * FROM `rawwa` WHERE substring(`online_raawa_expired`,1,7) = '$year-10'") );
        $raawa11 = DB::select( DB::raw("SELECT * FROM `rawwa` WHERE substring(`online_raawa_expired`,1,7) = '$year-11'") );
        $raawa12 = DB::select( DB::raw("SELECT * FROM `rawwa` WHERE substring(`online_raawa_expired`,1,7) = '$year-12'") );
        $raawaArrayexpired = [count($raawa1),
                 count($raawa2),
                 count($raawa3),
                 count($raawa4),
                 count($raawa5),
                 count($raawa6),
                 count($raawa7),
                 count($raawa8),
                 count($raawa9),
                 count($raawa10),
                 count($raawa11),
                 count($raawa12),
                ];

        $chart =[
            'days7' => $raawaArray,
            'sec7D' =>$secArray,
            'active' =>$activeArray,
            'itemRaawa' =>$raawaArrayexpired,
            'itemSec'  =>$secArrayexpired,
        ];

        //notification part
        //RAAWA
        $notifraawa = RaawaModel::select(DB::raw("`area`,`name`, `online_raawa_expired`, datediff(`online_raawa_expired`,now()) as days_left, 'Raawa' as type"))
                                ->where('online_raawa_expired','>',date('Y-m-d'))
                                ->where('online_raawa_expired','<',date('Y-m-d', strtotime('14 days')))
                                ->orderBy('days_left','asc')
                                ->get();

        //Sec ID
        $notifsec = RaawaModel::select(DB::raw("`area`,`name`, `expired`, datediff(`expired`,now()) as days_left, 'Sec ID' as type"))
                                ->where('expired','>',date('Y-m-d'))
                                ->where('expired','<',date('Y-m-d', strtotime('30 days')))
                                ->orderBy('days_left','asc')
                                ->get();




        return view('dashboard', compact('chart','days7count','secSum','notifraawa','notifsec'));
    }
}
