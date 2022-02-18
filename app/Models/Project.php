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
        'tech_doc',
        'dev_doc',
        'file_doc',
        'status_id',
        'developer_id',
        'client_id',
        'start_date',
        // 'deadline_date',
        'finish_date',
    ];


    public function developer()
    {
        return $this->belongsTo(Developer::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

}
