<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class botuserModel extends Model
{
    use HasFactory;
    protected $table = 'botuser';

    protected $primaryKey = 'id';

    protected $fillable = [
        'sender_id',
        'vibername',
        'status',
    ];
}
