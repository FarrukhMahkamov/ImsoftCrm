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
        return ProjectResource::collection(Project::with('client', 'developer')->latest()->paginate(10));
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
        if (!$project) {
            return response()->json([
                'message' => 'Project not found',
            ], 404);
        } else {
            return new ProjectResource($project);
        }
    }
    
    /**
    * Update the specified resource in storage.
    *
    *This method is used to update an existing project.
    * @param  \App\Http\Requests\UpdateProjectRequest  $request
    * @param  \App\Models\Project  $project
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, $id)
    {
        $project = Project::findOrFail($id);
        $project->update($request->only([
            'project_name' => $request->project_name,
            'general_info' => $request->general_info,
            'tech_doc' => $request->tech_doc,
            'dev_doc' => $request->dev_doc,
            'file_doc' => $request->file_doc,
            'status_id' => $request->status_id,
            'developer_id' => $request->developer_id,
            'client_id' => $request->client_id,
            'start_date' => $request->start_date,
            'deadline_date' => $request->deadline_date,
            'finish_date' => $request->finish_date,
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
    public function destroy(Request $request)
    {
        $ids = $request->getContent();

        foreach(json_decode($ids) as $id) {
            $address = Project::findOrFail($id);
            $address->delete();
        }
    }

    public function storeImage(Request $request)
    {
        if ($request->file('file')) {
            $file = $request->file('file')->move('images/project/', time().'.'.$request
            ->file('file')
            ->getClientOriginalName());
            
            return $file;
        }

        if ($request->file('file1')) {
            $file1 = $request->file('file1')->move('images/project/', time().'.'.$request
            ->file('file1')
            ->getClientOriginalName());
            
            return $file1;
        }
    }

    public function getImage(Request $request)
    {
        $file = $request->file;

        return response()->download($file);
    }
}
