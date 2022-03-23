<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use App\Models\RaawaUserModel;
use App\Models\AreaModel;
use Illuminate\Support\Facades\Auth;
use App\Models\SecLogModel;
use App\Models\RaawaLogModel;
use DB;

class RaawaUserController extends Controller
{
    public function raawa_user(Request $request){
        if ($request->ajax()) {
            $data = RaawaUserModel::get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<button type="button" class="btn btn-secondary btn-sm" onclick="update('.$row->id.', '."'".$row->name."'".', '."'".$row->secID."'".','.$row->area_id.')">Edit</button>';
                    $actionBtn = $actionBtn.'&nbsp;<button type="button" class="btn btn-primary btn-sm" onclick="raawa('.$row->id.')">Raawa</button>';
                    $actionBtn = $actionBtn.'&nbsp; <button type="button" class="btn btn-primary btn-sm" onclick="sec('.$row->id.')">Sec</button>';
                    return $actionBtn;
                })
                ->addColumn('area', function($row){
                    $area = AreaModel::where('id', $row->area_id)->first();
                    return $area->name;
                })
                ->addColumn('sec', function($row){
                    $secExpired = "No Data";
                    $sec = SecLogModel::where('rawwa_user_id', $row->id)->orderby('expired', 'desc')->first();
                    if($sec !== null){
                        $date=date_create($sec->expired);
                        $secExpired = date_format($date,"M d Y");
                    }
                    return $secExpired;
                })
                ->addColumn('raawa', function($row){
                    $rawExpired = "No Data";
                    $raw = RaawaLogModel::where('rawwa_user_id', $row->id)->orderby('expired', 'desc')->first();
                    if($raw !== null){
                        $date=date_create($raw->expired);
                        $rawExpired = date_format($date,"M d Y");
                    }
                    return $rawExpired;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        $areas = AreaModel::get();
        return view("raawa.user",compact('areas'));
    }
    public function create_user(Request $request){
        RaawaUserModel::create([
            'name' => $request->name,
            'secID' => $request->secID,
            'user_id' => Auth::user()->id,
            'area_id' => $request->area,
        ]);
        return redirect('raawa_user')->with('status', 'Created!');
    }
    public function update_user(Request $request){
        $formdata = ([
            'name'         => $request->name,
            'secID'      => $request->secID,
            'user_id'     => Auth::user()->id,
            'area_id'   => $request->area,
        ]);
        RaawaUserModel::where('id', $request->id)
                        ->update($formdata);
        return redirect('raawa_user')->with('status', 'Updated!');
    }
    public function update_raawa(Request $request){
        RaawaLogModel::create([
            'rawwa_user_id' => $request->id,
            'expired' => $request->date,
        ]);
        return back()->with('status', 'Updated!');
    }
    public function update_sec(Request $request){
        SecLogModel::create([
            'rawwa_user_id' => $request->id,
            'expired' => $request->date,
        ]);
        return back()->with('status', 'Updated!');
    }
    public function expired(Request $request){
        // $test = DB::table('raawa_log')->join('raawa_user','raawa_user.id','=','raawa_log.rawwa_user_id')->whereRaw('raawa_log.id In (SELECT MAX(id) FROM raawa_log GROUP BY rawwa_user_id)')->get();
        // dd(date("Y-m-d"));
        if ($request->ajax()) {
            $data = DB::table('raawa_log')->join('raawa_user','raawa_user.id','=','raawa_log.rawwa_user_id')->whereRaw('raawa_log.id In (SELECT MAX(id) FROM raawa_log GROUP BY rawwa_user_id)')->where('raawa_log.expired','<',date("Y-m-d"))->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '&nbsp;<button type="button" class="btn btn-primary btn-sm" onclick="raawa('.$row->id.')">Update</button>';
                    return $actionBtn;
                })
                ->addColumn('area', function($row){
                    $area = AreaModel::where('id', $row->area_id)->first();
                    return $area->name;
                })
                ->addColumn('sec', function($row){
                    $secExpired = "No Data";
                    $sec = SecLogModel::where('rawwa_user_id', $row->id)->orderby('expired', 'desc')->first();
                    if($sec !== null){
                        $date=date_create($sec->expired);
                        $secExpired = date_format($date,"M d Y");
                    }
                    return $secExpired;
                })
                ->addColumn('raawa', function($row){
                    $rawExpired = "No Data";
                    $raw = RaawaLogModel::where('rawwa_user_id', $row->id)->orderby('expired', 'desc')->first();
                    if($raw !== null){
                        $date=date_create($raw->expired);
                        $rawExpired = date_format($date,"M d Y");
                    }
                    return $rawExpired;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        $areas = AreaModel::get();
        return view("raawa.expired",compact('areas'));
    }
    public function expired_sec(Request $request){
        // $test = DB::table('raawa_log')->join('raawa_user','raawa_user.id','=','raawa_log.rawwa_user_id')->whereRaw('raawa_log.id In (SELECT MAX(id) FROM raawa_log GROUP BY rawwa_user_id)')->get();
        // dd(date("Y-m-d"));
        if ($request->ajax()) {
            $data = DB::table('sec_log')->join('raawa_user','raawa_user.id','=','sec_log.rawwa_user_id')->whereRaw('sec_log.id In (SELECT MAX(id) FROM sec_log GROUP BY rawwa_user_id)')->where('sec_log.expired','<',date("Y-m-d"))->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '&nbsp; <button type="button" class="btn btn-primary btn-sm" onclick="sec('.$row->id.')">Update</button>';
                    return $actionBtn;
                })
                ->addColumn('area', function($row){
                    $area = AreaModel::where('id', $row->area_id)->first();
                    return $area->name;
                })
                ->addColumn('sec', function($row){
                    $secExpired = "No Data";
                    $sec = SecLogModel::where('rawwa_user_id', $row->id)->orderby('expired', 'desc')->first();
                    if($sec !== null){
                        $date=date_create($sec->expired);
                        $secExpired = date_format($date,"M d Y");
                    }
                    return $secExpired;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        $areas = AreaModel::get();
        return view("raawa.expired_user",compact('areas'));
    }
}
