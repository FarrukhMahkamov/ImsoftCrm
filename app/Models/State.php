<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function region()
    {
        return $this->hasMany(Region::class);
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
