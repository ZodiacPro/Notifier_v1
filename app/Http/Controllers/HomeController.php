<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
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
    public function user_dashboard()
    {
        // Dashboard Filtered by User
        // Raawa part
        $raawa1D = RaawaModel::where('online_raawa_expired',date('Y-m-d'))
                                ->where('user_id',Auth::user()->id)
                                ->count();
        $raawa2D = RaawaModel::where('online_raawa_expired','>',date('Y-m-d', strtotime('1 days')))
                                ->where('online_raawa_expired','<',date('Y-m-d', strtotime('3 days')))
                                ->where('user_id',Auth::user()->id)
                                ->count();
        $raawa3D = RaawaModel::where('online_raawa_expired','>',date('Y-m-d', strtotime('2 days')))
                                ->where('online_raawa_expired','<',date('Y-m-d', strtotime('4 days')))
                                ->where('user_id',Auth::user()->id)
                                ->count();
        $raawa4D = RaawaModel::where('online_raawa_expired','>',date('Y-m-d', strtotime('5 days')))
                                ->where('online_raawa_expired','<',date('Y-m-d', strtotime('7 days')))
                                ->where('user_id',Auth::user()->id)
                                ->count();
        $raawa5D = RaawaModel::where('online_raawa_expired','>',date('Y-m-d', strtotime('6 days')))
                                ->where('online_raawa_expired','<',date('Y-m-d', strtotime('8 days')))
                                ->where('user_id',Auth::user()->id)
                                ->count();
        $raawa6D = RaawaModel::where('online_raawa_expired','>',date('Y-m-d', strtotime('7 days')))
                                ->where('online_raawa_expired','<',date('Y-m-d', strtotime('9 days')))
                                ->where('user_id',Auth::user()->id)
                                ->count();
        $raawa7D = RaawaModel::where('online_raawa_expired','>',date('Y-m-d', strtotime('10 days')))
                                ->where('online_raawa_expired','<',date('Y-m-d', strtotime('12 days')))
                                ->where('user_id',Auth::user()->id)
                                ->count();
        $raawaArray = [$raawa7D, $raawa6D, $raawa5D, $raawa4D, $raawa3D, $raawa2D, $raawa1D];
        $days7count = array_sum($raawaArray);


        // SEC part
        $sec7D = RaawaModel::where('expired','<',date('Y-m-d', strtotime('7 days')))
                                ->where('expired','>',date('Y-m-d'))
                                ->where('user_id',Auth::user()->id)
                                ->count();
        $sec14D = RaawaModel::where('expired','>',date('Y-m-d', strtotime('7 days')))
                                ->where('expired','<',date('Y-m-d', strtotime('14 days')))
                                ->where('user_id',Auth::user()->id)
                                ->count();
        $sec21D = RaawaModel::where('expired','>',date('Y-m-d', strtotime('14 days')))
                                ->where('expired','<',date('Y-m-d', strtotime('21 days')))
                                ->where('user_id',Auth::user()->id)
                                ->count();
        $sec28D = RaawaModel::where('expired','>',date('Y-m-d', strtotime('21 days')))
                                ->where('expired','<',date('Y-m-d', strtotime('28 days')))
                                ->where('user_id',Auth::user()->id)
                                ->count();
        $sec35D = RaawaModel::where('expired','>',date('Y-m-d', strtotime('28 days')))
                                ->where('expired','<',date('Y-m-d', strtotime('35 days')))
                                ->where('user_id',Auth::user()->id)
                                ->count();
        $sec42D = RaawaModel::where('expired','>',date('Y-m-d', strtotime('35 days')))
                                ->where('expired','<',date('Y-m-d', strtotime('42 days')))
                                ->where('user_id',Auth::user()->id)
                                ->count();
        $secArray = [$sec42D, $sec35D, $sec28D, $sec21D, $sec14D, $sec7D];
        $secSum = array_sum($secArray);
        

        //Active count
        $secActive = RaawaModel::where('expired', '>', date('Y-m-d'))
                                ->where('user_id',Auth::user()->id)
                                ->count();
        $raawaActive = RaawaModel::where('online_raawa_expired', '>', date('Y-m-d'))
                                ->where('user_id',Auth::user()->id)     
                                ->count();
        $activeArray = [$secActive,$raawaActive];
        
        //expired sec part
        $year = date('Y');
        $userID = Auth::user()->id;
        $sec1 = DB::select( DB::raw("SELECT * FROM `rawwa` WHERE substring(`expired`,1,7) = '$year-01' and `user_id` = $userID") );
        $sec2 = DB::select( DB::raw("SELECT * FROM `rawwa` WHERE substring(`expired`,1,7) = '$year-02' and `user_id` = $userID") );
        $sec3 = DB::select( DB::raw("SELECT * FROM `rawwa` WHERE substring(`expired`,1,7) = '$year-03' and `user_id` = $userID") );
        $sec4 = DB::select( DB::raw("SELECT * FROM `rawwa` WHERE substring(`expired`,1,7) = '$year-04' and `user_id` = $userID") );
        $sec5 = DB::select( DB::raw("SELECT * FROM `rawwa` WHERE substring(`expired`,1,7) = '$year-05' and `user_id` = $userID") );
        $sec6 = DB::select( DB::raw("SELECT * FROM `rawwa` WHERE substring(`expired`,1,7) = '$year-06' and `user_id` = $userID") );
        $sec7 = DB::select( DB::raw("SELECT * FROM `rawwa` WHERE substring(`expired`,1,7) = '$year-07' and `user_id` = $userID") );
        $sec8 = DB::select( DB::raw("SELECT * FROM `rawwa` WHERE substring(`expired`,1,7) = '$year-08' and `user_id` = $userID") );
        $sec9 = DB::select( DB::raw("SELECT * FROM `rawwa` WHERE substring(`expired`,1,7) = '$year-09' and `user_id` = $userID") );
        $sec10 = DB::select( DB::raw("SELECT * FROM `rawwa` WHERE substring(`expired`,1,7) = '$year-10' and `user_id` = $userID") );
        $sec11 = DB::select( DB::raw("SELECT * FROM `rawwa` WHERE substring(`expired`,1,7) = '$year-11' and `user_id` = $userID") );
        $sec12 = DB::select( DB::raw("SELECT * FROM `rawwa` WHERE substring(`expired`,1,7) = '$year-12' and `user_id` = $userID") );
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
        $raawa1 = DB::select( DB::raw("SELECT * FROM `rawwa` WHERE substring(`online_raawa_expired`,1,7) = '$year-01' and `user_id` = $userID") );
        $raawa2 = DB::select( DB::raw("SELECT * FROM `rawwa` WHERE substring(`online_raawa_expired`,1,7) = '$year-02' and `user_id` = $userID") );
        $raawa3 = DB::select( DB::raw("SELECT * FROM `rawwa` WHERE substring(`online_raawa_expired`,1,7) = '$year-03' and `user_id` = $userID") );
        $raawa4 = DB::select( DB::raw("SELECT * FROM `rawwa` WHERE substring(`online_raawa_expired`,1,7) = '$year-04' and `user_id` = $userID") );
        $raawa5 = DB::select( DB::raw("SELECT * FROM `rawwa` WHERE substring(`online_raawa_expired`,1,7) = '$year-05' and `user_id` = $userID") );
        $raawa6 = DB::select( DB::raw("SELECT * FROM `rawwa` WHERE substring(`online_raawa_expired`,1,7) = '$year-06' and `user_id` = $userID") );
        $raawa7 = DB::select( DB::raw("SELECT * FROM `rawwa` WHERE substring(`online_raawa_expired`,1,7) = '$year-07' and `user_id` = $userID") );
        $raawa8 = DB::select( DB::raw("SELECT * FROM `rawwa` WHERE substring(`online_raawa_expired`,1,7) = '$year-08' and `user_id` = $userID") );
        $raawa9 = DB::select( DB::raw("SELECT * FROM `rawwa` WHERE substring(`online_raawa_expired`,1,7) = '$year-09' and `user_id` = $userID") );
        $raawa10 = DB::select( DB::raw("SELECT * FROM `rawwa` WHERE substring(`online_raawa_expired`,1,7) = '$year-10' and `user_id` = $userID") );
        $raawa11 = DB::select( DB::raw("SELECT * FROM `rawwa` WHERE substring(`online_raawa_expired`,1,7) = '$year-11' and `user_id` = $userID") );
        $raawa12 = DB::select( DB::raw("SELECT * FROM `rawwa` WHERE substring(`online_raawa_expired`,1,7) = '$year-12' and `user_id` = $userID") );
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
                                ->where('user_id',Auth::user()->id)
                                ->orderBy('days_left','asc')
                                ->get();

        //Sec ID
        $notifsec = RaawaModel::select(DB::raw("`area`,`name`, `expired`, datediff(`expired`,now()) as days_left, 'Sec ID' as type"))
                                ->where('expired','>',date('Y-m-d'))
                                ->where('expired','<',date('Y-m-d', strtotime('30 days')))
                                ->where('user_id',Auth::user()->id)
                                ->orderBy('days_left','asc')
                                ->get();




        return view('dashboard.user', compact('chart','days7count','secSum','notifraawa','notifsec'));
    }
    public function area_dashboard_index()
    {
        // page to choose area
        $days7count = null;
        $secSum = null;
        $notifraawa = null;
        $notifsec = null;
        $chart =[
            'days7' => null,
            'sec7D' => null,
            'active' => null,
            'itemRaawa' => null,
            'itemSec'  => null,
        ];
        return view('dashboard.area', compact('chart','days7count','secSum','notifraawa','notifsec'));
    }
    public function area_dashboard($id)
    {
        // Dashboard Filtered by Area
        // Raawa part
        $raawa1D = RaawaModel::where('online_raawa_expired',date('Y-m-d'))
                                ->where('area', $id)
                                ->count();
        $raawa2D = RaawaModel::where('online_raawa_expired','>',date('Y-m-d', strtotime('1 days')))
                                ->where('online_raawa_expired','<',date('Y-m-d', strtotime('3 days')))
                                ->where('area', $id)
                                ->count();
        $raawa3D = RaawaModel::where('online_raawa_expired','>',date('Y-m-d', strtotime('2 days')))
                                ->where('online_raawa_expired','<',date('Y-m-d', strtotime('4 days')))
                                ->where('area', $id)
                                ->count();
        $raawa4D = RaawaModel::where('online_raawa_expired','>',date('Y-m-d', strtotime('5 days')))
                                ->where('online_raawa_expired','<',date('Y-m-d', strtotime('7 days')))
                                ->where('area', $id)
                                ->count();
        $raawa5D = RaawaModel::where('online_raawa_expired','>',date('Y-m-d', strtotime('6 days')))
                                ->where('online_raawa_expired','<',date('Y-m-d', strtotime('8 days')))
                                ->where('area', $id)
                                ->count();
        $raawa6D = RaawaModel::where('online_raawa_expired','>',date('Y-m-d', strtotime('7 days')))
                                ->where('online_raawa_expired','<',date('Y-m-d', strtotime('9 days')))
                                ->where('area', $id)
                                ->count();
        $raawa7D = RaawaModel::where('online_raawa_expired','>',date('Y-m-d', strtotime('10 days')))
                                ->where('online_raawa_expired','<',date('Y-m-d', strtotime('12 days')))
                                ->where('area', $id)
                                ->count();
        $raawaArray = [$raawa7D, $raawa6D, $raawa5D, $raawa4D, $raawa3D, $raawa2D, $raawa1D];
        $days7count = array_sum($raawaArray);


        // SEC part
        $sec7D = RaawaModel::where('expired','<',date('Y-m-d', strtotime('7 days')))
                                ->where('expired','>',date('Y-m-d'))
                                ->where('area', $id)
                                ->count();
        $sec14D = RaawaModel::where('expired','>',date('Y-m-d', strtotime('7 days')))
                                ->where('expired','<',date('Y-m-d', strtotime('14 days')))
                                ->where('area', $id)
                                ->count();
        $sec21D = RaawaModel::where('expired','>',date('Y-m-d', strtotime('14 days')))
                                ->where('expired','<',date('Y-m-d', strtotime('21 days')))
                                ->where('area', $id)
                                ->count();
        $sec28D = RaawaModel::where('expired','>',date('Y-m-d', strtotime('21 days')))
                                ->where('expired','<',date('Y-m-d', strtotime('28 days')))
                                ->where('area', $id)
                                ->count();
        $sec35D = RaawaModel::where('expired','>',date('Y-m-d', strtotime('28 days')))
                                ->where('expired','<',date('Y-m-d', strtotime('35 days')))
                                ->where('area', $id)
                                ->count();
        $sec42D = RaawaModel::where('expired','>',date('Y-m-d', strtotime('35 days')))
                                ->where('expired','<',date('Y-m-d', strtotime('42 days')))
                                ->where('area', $id)
                                ->count();
        $secArray = [$sec42D, $sec35D, $sec28D, $sec21D, $sec14D, $sec7D];
        $secSum = array_sum($secArray);
        

        //Active count
        $secActive = RaawaModel::where('expired', '>', date('Y-m-d'))
                                ->where('area', $id)
                                ->count();
        $raawaActive = RaawaModel::where('online_raawa_expired', '>', date('Y-m-d'))
                                ->where('area', $id)   
                                ->count();
        $activeArray = [$secActive,$raawaActive];
        
        //expired sec part
        $year = date('Y');
        $userID = Auth::user()->id;
        $sec1 = DB::select( DB::raw("SELECT * FROM `rawwa` WHERE substring(`expired`,1,7) = '$year-01' and `area` = '$id'") );
        $sec2 = DB::select( DB::raw("SELECT * FROM `rawwa` WHERE substring(`expired`,1,7) = '$year-02' and `area` = '$id'") );
        $sec3 = DB::select( DB::raw("SELECT * FROM `rawwa` WHERE substring(`expired`,1,7) = '$year-03' and `area` = '$id'") );
        $sec4 = DB::select( DB::raw("SELECT * FROM `rawwa` WHERE substring(`expired`,1,7) = '$year-04' and `area` = '$id'") );
        $sec5 = DB::select( DB::raw("SELECT * FROM `rawwa` WHERE substring(`expired`,1,7) = '$year-05' and `area` = '$id'") );
        $sec6 = DB::select( DB::raw("SELECT * FROM `rawwa` WHERE substring(`expired`,1,7) = '$year-06' and `area` = '$id'") );
        $sec7 = DB::select( DB::raw("SELECT * FROM `rawwa` WHERE substring(`expired`,1,7) = '$year-07' and `area` = '$id'") );
        $sec8 = DB::select( DB::raw("SELECT * FROM `rawwa` WHERE substring(`expired`,1,7) = '$year-08' and `area` = '$id'") );
        $sec9 = DB::select( DB::raw("SELECT * FROM `rawwa` WHERE substring(`expired`,1,7) = '$year-09' and `area` = '$id'") );
        $sec10 = DB::select( DB::raw("SELECT * FROM `rawwa` WHERE substring(`expired`,1,7) = '$year-10' and `area` = '$id'") );
        $sec11 = DB::select( DB::raw("SELECT * FROM `rawwa` WHERE substring(`expired`,1,7) = '$year-11' and `area` = '$id'") );
        $sec12 = DB::select( DB::raw("SELECT * FROM `rawwa` WHERE substring(`expired`,1,7) = '$year-12' and `area` = '$id'") );
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
        $raawa1 = DB::select( DB::raw("SELECT * FROM `rawwa` WHERE substring(`online_raawa_expired`,1,7) = '$year-01' and `area` = '$id'") );
        $raawa2 = DB::select( DB::raw("SELECT * FROM `rawwa` WHERE substring(`online_raawa_expired`,1,7) = '$year-02' and `area` = '$id'") );
        $raawa3 = DB::select( DB::raw("SELECT * FROM `rawwa` WHERE substring(`online_raawa_expired`,1,7) = '$year-03' and `area` = '$id'") );
        $raawa4 = DB::select( DB::raw("SELECT * FROM `rawwa` WHERE substring(`online_raawa_expired`,1,7) = '$year-04' and `area` = '$id'") );
        $raawa5 = DB::select( DB::raw("SELECT * FROM `rawwa` WHERE substring(`online_raawa_expired`,1,7) = '$year-05' and `area` = '$id'") );
        $raawa6 = DB::select( DB::raw("SELECT * FROM `rawwa` WHERE substring(`online_raawa_expired`,1,7) = '$year-06' and `area` = '$id'") );
        $raawa7 = DB::select( DB::raw("SELECT * FROM `rawwa` WHERE substring(`online_raawa_expired`,1,7) = '$year-07' and `area` = '$id'") );
        $raawa8 = DB::select( DB::raw("SELECT * FROM `rawwa` WHERE substring(`online_raawa_expired`,1,7) = '$year-08' and `area` = '$id'") );
        $raawa9 = DB::select( DB::raw("SELECT * FROM `rawwa` WHERE substring(`online_raawa_expired`,1,7) = '$year-09' and `area` = '$id'") );
        $raawa10 = DB::select( DB::raw("SELECT * FROM `rawwa` WHERE substring(`online_raawa_expired`,1,7) = '$year-10' and `area` = '$id'") );
        $raawa11 = DB::select( DB::raw("SELECT * FROM `rawwa` WHERE substring(`online_raawa_expired`,1,7) = '$year-11' and `area` = '$id'") );
        $raawa12 = DB::select( DB::raw("SELECT * FROM `rawwa` WHERE substring(`online_raawa_expired`,1,7) = '$year-12' and `area` = '$id'") );
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
                                ->where('area', $id)   
                                ->orderBy('days_left','asc')
                                ->get();

        //Sec ID
        $notifsec = RaawaModel::select(DB::raw("`area`,`name`, `expired`, datediff(`expired`,now()) as days_left, 'Sec ID' as type"))
                                ->where('expired','>',date('Y-m-d'))
                                ->where('expired','<',date('Y-m-d', strtotime('30 days')))
                                ->where('area', $id)   
                                ->orderBy('days_left','asc')
                                ->get();




        return view('dashboard.mainarea', compact('chart','days7count','secSum','notifraawa','notifsec'));
    }
}
