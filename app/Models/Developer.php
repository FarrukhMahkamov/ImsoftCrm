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

    public function project()
    {
        return $this->hasMany(Project::class);
    }

    public function client()
    {
        return $this->hasMany(Client::class);
    }

}
