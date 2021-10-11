<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RaawaModel extends Model
{
    use HasFactory;

    protected $table = 'rawwa';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'area',
        'name',
        'secID',
        'expired',
        'online_raawa',
        'online_raawa_expired',
        'team',
        'token',
    ];
}
