<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RaawaLogModel extends Model
{
    use HasFactory;
    protected $table = 'raawa_log';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'expired',
        'rawwa_user_id',
    ];
}
