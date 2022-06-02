<?php

namespace App\Imports;

use App\Models\RaawaLogModel;
use App\Models\RaawaUserModel;
use Maatwebsite\Excel\Concerns\ToModel;

class raawaImport implements ToModel
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
        if($data == NULL){
            return;
        }
        else{
            $date = ($row[1] - 25569) * 86400;
            $date = gmdate("Y-m-d", $date);
            return new RaawaLogModel([
                'expired'                  => $date,
                'rawwa_user_id'            => $data->id,
            ]);
        }
        
    }
}
