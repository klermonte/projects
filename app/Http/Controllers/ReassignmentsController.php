<?php

namespace App\Http\Controllers;

use App\Reassignment;
use App\Project;
use App\Task;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\ReassignmentRequest;

class ReassignmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Project $project, Task $task)
    {
        return $task->reassignments()->latest()->with(['toUser', 'fromUser'])->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReassignmentRequest $request, Project $project, Task $task)
    {
        $reassignment = new Reassignment($request->all());
        $reassignment->fromUser()->associate($task->assigned_to);
        $reassignment->task()->associate($task);
        $reassignment->save();

        $task->assignment()->associate($reassignment->to);
        $task->save();

        return $reassignment->fresh(['fromUser', 'toUser']);
    }
}
