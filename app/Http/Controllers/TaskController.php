<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = DB::table('task')
        ->leftJoin('users', 'task.user_id', '=', 'users.id')
        ->join('department', 'task.department_id', '=', 'department.id')
        ->select('task.*', 'department.name as department', 'users.email as email')
        ->get();
        
        return view('tasks.index', ['tasks' => $tasks]);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task = DB::table('task')
        ->leftJoin('users', 'task.user_id', '=', 'users.id')
        ->join('department', 'task.department_id', '=', 'department.id')
        ->select('task.*', 'department.name as department', 'users.email as email')
        ->where('task.id', $id)
        ->first();

        $departments = DB::table('department')->get();
        $users = DB::table('users')->get();

        return view('tasks.edit', [
            'task' => $task,
            'departments' => $departments,
            'users' => $users
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        dd($request->request->all(), $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
