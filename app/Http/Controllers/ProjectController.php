<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Http\Resources\ProjectResource;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;

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
        
        // return ProjectResource::collection(Cache::remember('projects', 60*60*24, function(){
        //     return  Project::with('client', 'developer')->get();
        // }));
        return ProjectResource::collection(Project::with('client', 'developer')->get());
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
    public function store(Request $request, Project $project)
    {
        // $file_doc = json_decode(json_encode($request->file_doc));
        // $file_obj = [];
        // foreach ($file_doc as $file_val) {
        //     if ($file_val->has('tech_file')) {
        //         $tec_file = $request->file('tech_file')->move('images/tech_file', time().'.'.$request
        //             ->file('tech_file')
        //             ->getClientOriginalName());
        //         array_push($file_obj, [
        //             'id' => $file_val->id,
        //             'description' => $file_val->description,
        //             'tech_file' => $tec_file,
        //         ]);
        //     }
        // }

        // $tech_doc = json_decode(json_encode($request->tech_doc));
        // $tech_obj = [];
        // foreach ($tech_doc as $tech_val) {
        //     if ($file_val->has('tech_file')) {
        //         $tec_file = $request->file('tech_file')->move('images/tech_file', time().'.'.$request
        //             ->file('tech_file')
        //             ->getClientOriginalName());
        //         array_push($tech_obj, [
        //                 'id' => $file_val->id,
        //                 'name' => $file_val->name,
        //                 'description' => $file_val->description,
        //                 'tech_file' => $tec_file
        //         ]);
        //     }
        // }     
                
        $project = Project::create([
            'general_info' => $request->general_info,
            'tech_doc' => json_encode($request->tech_doc),
            'dev_doc' => json_encode($request->dev_doc),
            'file_doc' => json_encode($request->file_doc),
            'status_id' => $request->status_id,
            'developer_id' => $request->developer_id,
            'client_id' => $request->client_id,
            'start_date' => $request->start_date,
            // 'deadline_date' => $request->deadline_date,
            'finish_date' => $request->finish_date,
        ]);
        
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

    public function storeImage(Request $request)
    {
        if ($request->file('file')) {
            $file = $request->file('file')->move('images/project/', time().'.'.$request
            ->file('file')
            ->getClientOriginalName());
            
            return $file;
        }
    }
}
