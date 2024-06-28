<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;



    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    /**
     * Get the user that owns the task.
     */
    public function user()
    {
        return $this->belongsToMany(User::class , 'user_task');
    }

    /**
     * Get the team that owns the task.
     */
    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}
