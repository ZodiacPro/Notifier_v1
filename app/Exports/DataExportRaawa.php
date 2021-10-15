<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\RaawaModel;
use DB;

class DataExportRaawa implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return RaawaModel::select(DB::raw("*"))
                        ->where('online_raawa_expired','>',date('Y-m-d'))
                        ->where('online_raawa_expired','<',date('Y-m-d', strtotime('14 days')))
                        ->orderBy('online_raawa_expired','asc')
                        ->get();
    }
}
