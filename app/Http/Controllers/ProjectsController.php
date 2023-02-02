<?php

namespace App\Http\Controllers;

use App\Models\Projects;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    protected $project;

    public function __construct(Projects $project){
        $this->project = $project;
    }
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse

     */
    public function store(Request $request){
        $project = $this->project->createProject($request->all());
        return response()->json($project);
    }

    public function getList(){
        $projects = $this->project->listProjects();
        return response()->json($projects);
    }
}
