<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\Auth;
use DB;

class DataExportSecUser implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return RaawaModel::select(DB::raw("*"))
        ->where('expired','>',date('Y-m-d'))
        ->where('expired','<',date('Y-m-d', strtotime('14 days')))
        ->where('user_id', Auth::user()->id)
        ->orderBy('expired','asc')
        ->get();
    }
}
