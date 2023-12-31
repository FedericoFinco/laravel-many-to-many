<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Http\Requests\ProjectRequest;
use App\Models\Technology;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();
        return view ('admin.project.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProjectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectRequest $request)
    {
        $data = $request -> validated();

        $newProject= new Project();
        $newProject -> fill($data);
        $newProject -> save();

        $img_path = Storage::put("uploads", $data['img']);
        $data['img'] = $img_path;

        return to_route("admin.projects.show");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $technologies = Technology::all();
        return view ('admin.project.edit', compact('project', 'technologies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProjectRequest  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(ProjectRequest $request, Project $project)
    {
        

        $data = $request -> validated();
        
        // $img_path = $data["image"]->store("uploads");
        if (isset($data['img'])) {
            $img_path = Storage::put("uploads", $data['img']);
            $data['img'] = $img_path;
        }



        $project -> fill($data);

        if (!isset($data["technologies"])) {
            $data["technologies"] = [];
        }

        $project->technologies()->sync( $data["technologies"] );

        $project -> update();

        
        
        return to_route("admin.projects.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        //
    }
}
