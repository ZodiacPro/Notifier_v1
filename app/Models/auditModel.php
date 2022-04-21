<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class auditModel extends Model
{
    use HasFactory;

    protected $table = 'audit';

    protected $primaryKey = 'id';

    protected $fillable = [
        'details',
        'user_id',
    ];
}
