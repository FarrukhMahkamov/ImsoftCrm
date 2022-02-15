<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'state_id',
    ];

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function address()
    {
        return $this->hasMany(Address::class);
    }

    public function client()
    {
        return $this->hasMany(Client::class);
    }

    public function developer()
    {
        return $this->hasMany(Developer::class);
    }

}
