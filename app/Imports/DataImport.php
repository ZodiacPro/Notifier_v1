<?php

namespace App\Imports;

use App\Models\RaawaModel;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Validators\Failure;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\WithValidation;
use Illuminate\Support\Facades\Auth;
use App\Models\RaawaUserModel;

class DataImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        if($row[0] == 'Name' || $row[0] == 'NAME' || $row[0] == 'name'){
            return;
        }
        $data = RaawaUserModel::where('name', $row[0])->first();
        if($data !== NULL){
            return;
        }
        return new RaawaUserModel([
            'name'                  => $row[0],
            'secID'                 => $row[1],
            'area_id'               => $row[2],
            'user_id'               => Auth::user()->id,
        ]);
        
    }
}
