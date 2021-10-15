<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\Auth;
use DB;

class DataExportRaawaUser implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return RaawaModel::select(DB::raw("*"))
        ->where('online_raawa_expired','>',date('Y-m-d'))
        ->where('online_raawa_expired','<',date('Y-m-d', strtotime('14 days')))
        ->where('user_id', Auth::user()->id)
        ->orderBy('online_raawa_expired','asc')
        ->get();
    }
}
