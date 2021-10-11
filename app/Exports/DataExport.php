<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\RaawaModel;
use DB;

class DataExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return RaawaModel::select(DB::raw("*"))
                        ->where('expired','>',date('Y-m-d'))
                        ->where('expired','<',date('Y-m-d', strtotime('14 days')))
                        ->orderBy('expired','desc')
                        ->get();
    }
}
