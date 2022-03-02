<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityType extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category_id',
    ];
    
    public function client()
    {
        return $this->hasMany(Client::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
