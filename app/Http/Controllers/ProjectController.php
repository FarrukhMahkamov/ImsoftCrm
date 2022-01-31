<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Http\Resources\ProjectResource;
use Illuminate\Support\Facades\Cache;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return ProjectResource::collection(Cache::remember('projects', 60*60*24, function(){
            return  Project::with('status', 'developer')->get();
        }));
           
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProjectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectRequest $request, Project $project)
    {
        Project::create($request->only([
            'project_name',
            'general_info',
            'general_file',
            'status_id',
            'developer_id',
            'developer_info',
            'start_date',
            'dedline_date',
            'finish_date',
            'about_file',
            'project_file',
        ]));

        return new ProjectResource($project);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {

        return new ProjectResource($project);
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProjectRequest  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {

        $project->update($request->only([
            'project_name',
            'general_info',
            'general_file',
            'status_id',
            'developer_id',
            'developer_info',
            'start_date',
            'dedline_date',
            'finish_date',
            'about_file',
            'project_file',
        ]));

        return new ProjectResource($project);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {

        $project->delete();

        return response(null, 204);
   
    }
}
