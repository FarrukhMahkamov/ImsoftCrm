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
    *This method is used to display all projects.
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        
        return ProjectResource::collection(Cache::remember('projects', 60*60*24, function(){
            return  Project::with('client', 'developer')->get();
        }));
        
    }
    
    public function searchByStatus($id)
    {
        return ProjectResource::collection(Project::with('developer', 'client')->where('status_id', $id)->get());
    }
    
    /**
    * Store a newly created resource in storage.
    *
    *This method is used to create a new project.
    * @param  \App\Http\Requests\StoreProjectRequest  $request
    * @return \Illuminate\Http\Response
    */
    public function store(StoreProjectRequest $request, Project $project)
    {
        $project = new Project();
        $project->fill($request->only([
            'project_name',
            'general_info',
            'tech_doc',
            'dev_doc',
            'file_doc',
            'status_id',
            'developer_id',
            'client_id',
            'start_date',
            'deadline_date',
            'finish_date',
        ]));
        
        
        $project->pasport = $request
        ->file('pasport')
        ->move('images/pasport', time().'.'.$request
        ->file('pasport')
        ->getClientOriginalName());
        
        $project->save();
        
        return new ProjectResource($project);
        
    }
    
    /**
    * Display the specified resource.
    *
    *This method is used to display a single project.
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
    *This method is used to update an existing project.
    * @param  \App\Http\Requests\UpdateProjectRequest  $request
    * @param  \App\Models\Project  $project
    * @return \Illuminate\Http\Response
    */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        
        $project->update($request->only([
            'project_name',
            'general_info',
            'tech_doc',
            'dev_doc',
            'file_doc',
            'status_id',
            'developer_id',
            'client_id',
            'start_date',
            'deadline_date',
            'finish_date',
        ]));
        
        $project->pasport = $request
        ->file('pasport')
        ->move('images/pasport', time().'.'.$request
        ->file('pasport')
        ->getClientOriginalName());
        
        return new ProjectResource($project);
        
    }
    
    /**
    * Remove the specified resource from storage.
    * 
    *This method is used to delete an existing project.
    * @param  \App\Models\Project  $project
    * @return \Illuminate\Http\Response
    */
    public function destroy(Project $project)
    {
        $project->delete();
        
        return response(null, 204);
    }
}
