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

class DataImport implements ToModel, WithValidation, SkipsOnFailure
{
    use Importable, SkipsFailures;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new RaawaModel([
            'area'                  => strtoupper($row[0]),
            'name'                  => $row[1],
            'secID'                 => $row[2],
            'expired'               => $row[3],
            'online_raawa'          => $row[4],
            'online_raawa_expired'  => $row[5],
            'team'                  => $row[6],
            'user_id'               => Auth::user()->id,
        ]);
    }
    public function rules(): array
    {
        
        return [
             '1' => function($attribute, $value, $onFailure) {
                $list = RaawaModel::get();
                 foreach($list as $listItem){
                    if (strtoupper($value) === strtoupper($listItem->name)) {
                        $onFailure('clone');
                   }
                 }
              },
              '3' => 'date',
              '4' => 'date',
              '5' => 'date',
        ];
    }
    
    
}
