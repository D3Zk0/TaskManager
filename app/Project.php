<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public function users(){
        return $this->belongsToMany('App\User', 'user_project', 'project_id', 'user_id');
    }
    public function tasks(){
        return $this->hasMany("App\Task", "project_id", "id");
    }

    public function tasksOverExpiry(){
        return $this->tasks()->where("expiry");
    }
}
