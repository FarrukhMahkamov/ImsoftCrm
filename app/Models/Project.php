<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_name',
        'general_info',
        'general_file',
        'status_id',
        'developer_id',
        'developer_info',
        'start_date',
        'deadline_date',
        'finish_date',
        'about_file',
        'project_file',
        'client_id',
    ];

    public function status()
    {
        return $this->belongsTo(Status::class);    
    }

    public function developer()
    {
        return $this->belongsTo(Developer::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

}
