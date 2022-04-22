<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class RaawaApiController extends Controller
{
    public function expiredRaawaAPI(){
        $data = DB::table('raawa_log')
                ->selectRaw('raawa_user.id as id,raawa_user.name as name, expired, area.name as area_name, secID')
                ->join('raawa_user','raawa_user.id','=','raawa_log.rawwa_user_id')
                ->join('area','area.id','raawa_user.area_id')
                ->whereRaw('raawa_log.id In (SELECT MAX(id) FROM raawa_log GROUP BY rawwa_user_id)')
                ->where('raawa_log.expired','<',date('Y-m-d', strtotime('14 days')))
                ->orderBy('raawa_log.expired','desc')
                ->get();

        return response()->json($data, 200);
    }
    public function expiredRaawa7daysAPI(){
        $data = DB::table('raawa_log')
                ->selectRaw('raawa_user.id as id,raawa_user.name as name, expired, area.name as area_name, secID')
                ->join('raawa_user','raawa_user.id','=','raawa_log.rawwa_user_id')
                ->join('area','area.id','raawa_user.area_id')
                ->whereRaw('raawa_log.id In (SELECT MAX(id) FROM raawa_log GROUP BY rawwa_user_id)')
                ->where('raawa_log.expired','<',date('Y-m-d', strtotime('14 days')))
                ->where('raawa_log.expired','>',date('Y-m-d'))
                ->orderBy('raawa_log.expired','desc')
                ->get();

        return response()->json($data, 200);
    }
    public function expiredSecAPI(){
        $data = DB::table('sec_log')
                ->selectRaw('raawa_user.id as id,raawa_user.name as name, expired, area.name as area_name, secID')
                ->join('raawa_user','raawa_user.id','=','sec_log.rawwa_user_id')
                ->join('area','area.id','raawa_user.area_id')
                ->whereRaw('sec_log.id In (SELECT MAX(id) FROM sec_log GROUP BY rawwa_user_id)')
                ->where('sec_log.expired','<',date('Y-m-d', strtotime('30 days')))
                ->orderBy('sec_log.expired','desc')
                ->get();

        return response()->json($data, 200);
    }
    public function expiredSec30daysAPI(){
        $data = DB::table('sec_log')
                ->selectRaw('raawa_user.id as id,raawa_user.name as name, expired, area.name as area_name, secID')
                ->join('raawa_user','raawa_user.id','=','sec_log.rawwa_user_id')
                ->join('area','area.id','raawa_user.area_id')
                ->whereRaw('sec_log.id In (SELECT MAX(id) FROM sec_log GROUP BY rawwa_user_id)')
                ->where('sec_log.expired','<',date('Y-m-d', strtotime('30 days')))
                ->where('sec_log.expired','>',date('Y-m-d'))
                ->orderBy('sec_log.expired','desc')
                ->get();

        return response()->json($data, 200);
    }
    public function secActive(){
        $data = DB::table('sec_log')
                ->selectRaw('raawa_user.id as id,raawa_user.name as name, expired, area.name as area_name, secID')
                ->join('raawa_user','raawa_user.id','=','sec_log.rawwa_user_id')
                ->join('area','area.id','raawa_user.area_id')
                ->whereRaw('sec_log.id In (SELECT MAX(id) FROM sec_log GROUP BY rawwa_user_id)')
                ->where('sec_log.expired','<',date('Y-m-d'))
                ->orderBy('sec_log.expired','desc')
                ->get();

        return response()->json($data, 200);
    }
    public function raawaActive(){
        $data = DB::table('raawa_log')
                ->selectRaw('raawa_user.id as id,raawa_user.name as name, expired, area.name as area_name, secID')
                ->join('raawa_user','raawa_user.id','=','raawa_log.rawwa_user_id')
                ->join('area','area.id','raawa_user.area_id')
                ->whereRaw('raawa_log.id In (SELECT MAX(id) FROM raawa_log GROUP BY rawwa_user_id)')
                ->where('raawa_log.expired','<',date('Y-m-d'))
                ->orderBy('raawa_log.expired','desc')
                ->get();

        return response()->json($data, 200);
    }
}
