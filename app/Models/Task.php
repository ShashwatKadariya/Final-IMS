<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'assign_to', 'todo', 'deadline', 'project_id', 'user_id'
    ];




    // relationship with project
    public function projects()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
