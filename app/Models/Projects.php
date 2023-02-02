<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    use HasFactory;
    protected $table="projects";

    public function createProject(array $attributes){
        $project = new self();
        $project->name = $attributes['name'];
        $project->save();
        return $project;
    }

    public function listProjects(){
        return $this::all();
    }
}
