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
        'type_id',
        'about',
        'passport',
        'family',
        'developer_photo',
        'state_id',
        'region_id',
        'address',
        'longitude',
        'latitude',
    ];

    public function project()
    {
        return $this->hasMany(Project::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function region()
    {
        return $this->belongsTo(Region::class);
    }
}
