<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\RaawaModel;
use DB;

class DataExportSec implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return RaawaModel::select(DB::raw("*"))
        ->where('expired','>',date('Y-m-d'))
        ->where('expired','<',date('Y-m-d', strtotime('14 days')))
        ->orderBy('expired','asc')
        ->get();
    }
}
