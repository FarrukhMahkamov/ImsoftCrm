<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Developer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'born_date',
        'phone_number',
        'work_type_id',
        'about',
        'passport',
        'family',
        'developer_photo',
    ];

    public function project()
    {
        return $this->hasMany(Project::class);
    }

    public function worktype()
    {
        return $this->belongsTo(WorkType::class);
    }

}
