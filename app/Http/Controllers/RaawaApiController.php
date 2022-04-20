<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class RaawaApiController extends Controller
{
    public function expiredRaawaAPI(){
        $data = DB::table('raawa_log')->join('raawa_user','raawa_user.id','=','raawa_log.rawwa_user_id')->whereRaw('raawa_log.id In (SELECT MAX(id) FROM raawa_log GROUP BY rawwa_user_id)')->where('raawa_log.expired','<',date('Y-m-d', strtotime('14 days')))->orderBy('raawa_log.expired','desc')->get();

        return response()->json($data, 200);
    }
}
