<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;

    protected $model = [
        'name'
    ];

    public function project()
    {
        return $this->hasMany(Project::class);
    }

}
