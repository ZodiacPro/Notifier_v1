<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RaawaUserModel extends Model
{
    use HasFactory;
    protected $table = 'raawa_user';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'name',
        'secID',
        'user_id',
        'area_id',
    ];
}
