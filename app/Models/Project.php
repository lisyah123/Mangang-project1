<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_name',
        'client',
        'project_leader_name',    // Diubah
        'project_leader_email',   // Diubah
        'project_leader_avatar',  // Diubah
        'start_date',
        'end_date',
        'progress',
    ];

    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
    ];
}