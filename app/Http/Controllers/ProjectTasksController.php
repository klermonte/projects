<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Task;
use App\Http\Requests;
use App\Http\Requests\TaskRequest;
use Dingo\Api\Routing\Helpers;

class ProjectTasksController extends Controller
{
    use Helpers;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Project $project)
    {
        return $project->tasks()->with(['author', 'assignment'])->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TaskRequest $request, Project $project)
    {
        $task = new Task($request->all());
        $task->author()->associate($this->auth->user());
        $task->project()->associate($project);
        $task->save();

        return $task->fresh(['author', 'assignment']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project, $id)
    {
        return $project->tasks()->with(['author', 'assignment'])->findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project, $id)
    {
        $task = $project->tasks()->findOrFail($id);
        $task->update($request->all());

        return $task->fresh(['author', 'assignment']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project, $id)
    {
        $task = $project->tasks()->findOrFail($id);
        $task->delete();
    }
}
