<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function client()
    {
        return $this->hasMany(Client::class);
    }
    
    public function developer()
    {
        return $this->hasMany(Developer::class);
    }

}
