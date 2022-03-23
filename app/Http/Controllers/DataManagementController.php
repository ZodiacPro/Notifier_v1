<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\DataImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\RaawaModel;
use DataTables;
use DB;
use App\Exports\DataExportSec;
use App\Exports\DataExportRaawa;
use Illuminate\Support\Facades\Auth;
use App\Models\AreaModel;


class DataManagementController extends Controller
{
   /**
     * 
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
    public function index(Request $request)
    {
        return view('raawa.list');
    }
    //ajax for index
    public function data_list(Request $request)
    {
        if ($request->ajax()) {
            $data = RaawaModel::orderBy('team', 'asc')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }
    public function upload_index()
    {
       return view('raawa.upload');
    }
    //file upload
    public function upload_file(Request $request)
    {
        $import = new DataImport();
        $import->import(request()->file('fileinput'));
        $fail = $import->failures();
        foreach ($fail as $failure) {
            if($failure->errors()[0] == 'clone'){
                //array of data
                $formData = [
                    'area'                  => $failure->values()[0],
                    'secID'                 => $failure->values()[2],
                    'expired'               => $failure->values()[3],
                    'online_raawa'          => $failure->values()[4],
                    'online_raawa_expired'  => $failure->values()[5],
                    'team'                  => $failure->values()[6],
                    'user_id'                 => Auth::user()->id,
                ];
                //update query
                RaawaModel::where('name', $failure->values()[1])
                            ->update($formData);
            }
        }
        return redirect('upload')->with('status', 'Uploaded Successfully')
                                 ->with('fail', $fail);
    }

    public function expired_index(Request $request)
    {
        return view('raawa.expired');
    }
    public function expired_raawa(Request $request)
    {
        if ($request->ajax()) {
            $data = RaawaModel::select(DB::raw("*, datediff(now(),`online_raawa_expired`) as days_left, 'Raawa' as type"))
                            ->where('online_raawa_expired','>',date('Y-m-d'))
                            ->where('online_raawa_expired','<',date('Y-m-d', strtotime('14 days')))
                            ->orderBy('days_left','desc')
                            ->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }
        public function expired_sec(Request $request)
        {
            if ($request->ajax()) {
                $data = RaawaModel::select(DB::raw("*, datediff(now(),`expired`) as days_left, 'Raawa' as type"))
                                ->where('expired','>',date('Y-m-d'))
                                ->where('expired','<',date('Y-m-d', strtotime('14 days')))
                                ->orderBy('days_left','desc')
                                ->get();
                return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                        return $actionBtn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
            }
    }
    public function export($id){
        if($id == "expiredRaawa"){
            return Excel::download(new DataExportRaawa, 'expiredRaawa.xlsx');
        }
        elseif($id == "expiredSec"){
            return Excel::download(new DataExportSec, 'expiredSec.xlsx');
        }
        
    }
    public function expired_index_user(Request $request)
    {
        return view('raawa.expired_user');
    }
    public function expired_raawa_user(Request $request)
    {
        if ($request->ajax()) {
            $data = RaawaModel::select(DB::raw("*, datediff(now(),`online_raawa_expired`) as days_left, 'Raawa' as type"))
                            ->where('online_raawa_expired','>',date('Y-m-d'))
                            ->where('online_raawa_expired','<',date('Y-m-d', strtotime('14 days')))
                            ->where('user_id', Auth::user()->id)
                            ->orderBy('days_left','desc')
                            ->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }
        public function expired_sec_user(Request $request)
        {
            if ($request->ajax()) {
                $data = RaawaModel::select(DB::raw("*, datediff(now(),`expired`) as days_left, 'Raawa' as type"))
                                ->where('expired','>',date('Y-m-d'))
                                ->where('expired','<',date('Y-m-d', strtotime('14 days')))
                                ->where('user_id', Auth::user()->id)
                                ->orderBy('days_left','desc')
                                ->get();
                return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                        return $actionBtn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
            }
    }
    public function export_user($id){
        if($id == "expiredRaawa"){
            return Excel::download(new DataExportRaawa, 'expiredRaawa.xlsx');
        }
        elseif($id == "expiredSec"){
            return Excel::download(new DataExportSec, 'expiredSec.xlsx');
        }
        
    }
    // Area
    public function area(Request $request){
        if ($request->ajax()) {
            $data = AreaModel::get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('raawa.area');
    }
    public function create_area(Request $request){
        AreaModel::create([
            'name' => $request->name,
        ]);
        return redirect('area')->with('status', 'Created!');
    }
}
