<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Developer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'start_work',
        'surname',
        'phone_number',
        'work_type',
        'about',
        'file',
        'workstatus_id',
    ];
}
