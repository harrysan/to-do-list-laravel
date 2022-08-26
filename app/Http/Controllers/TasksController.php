<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use App\Models\TierTask;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class TasksController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        //return view('task.index');
        //return view('task.index', ['task' => Task::all()]);

        //$tasks = Task::with('tiertasks:desc')->where('status', 'N')->get();

        // $tasks = DB::table('tasks')
        //     ->join('tier_tasks', 'tasks.tier_task_id', '=', 'tier_tasks.id')
        //     ->join('users', 'tasks.user_id', '=', 'users.id')
        //     ->select('tasks.*', 'tier_tasks.desc')
        //     ->where('status', 'N')
        //     ->where('users.id', Auth::user()->id)
        //     ->get();
        $userid = Auth::user()->id;

        $tasks = Task::with('tiertasks', 'user')
                ->where([
                    'status' => 'N',
                    'user_id' => $userid
                    ])
                ->get();

        //dd($tasks);
        //die;

        // $tasks = Task::with([
        //     'tiertasks' => function($query) {
        //         return $query->select(['desc']);
        //     }
        // ])->where('status', 'N')->get();

        return view('task.index', [
            'task' => $tasks
        ]);
    }

    public function create()
    {
        //$this->authorize('posts.create');


        return view('task.create', [
            'tt' => TierTask::all()]);
    }

    public function store(TaskRequest $request)
    {
        // dd($request);
        // die;

        $validatedData = $request->validated();

        $task = new Task();
        // $task = Task::create($validatedData);
        $task = Task::create([
            'task' => $validatedData['task'],
            'tier_task_id' => $validatedData['tier_task_id'],
            'user_id' => Auth::user()->id
        ]);

        $request->session()->flash('status', 'Task Was Created!');
        return redirect()->route('task.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TierTask  $tierTask
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        dd('show');
        die;
    }

    // public function setting() {
    //     return view('setting.setting', ['setting' => TierTask::all()]);
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TierTask  $tierTask
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        // $task = DB::table('tasks')
        // ->join('tier_tasks', 'tasks.tier_task_id', '=', 'tier_tasks.id')
        // ->join('users', 'tasks.user_id', '=', 'users.id')
        // ->select('tasks.id', 'tier_tasks.desc', 'tasks.tier_task_id', 'tasks.task')
        // ->where('status', 'N')
        // ->where('tasks.id', $id)
        // ->where('users.id', Auth::user()->id)
        // ->first();
        // dd($task);
        // die;

        // $task = DB::table('tasks')
        //             ->join('tier_tasks', 'tasks.tier_task_id', '=', 'tier_tasks.id')
        //             ->join('users', 'tasks.user_id', '=', 'users.id')
        //             ->select('tasks.id', 'tier_tasks.desc', 'tasks.tier_task_id', 'tasks.task')
        //             ->where('status', 'N')
        //             ->where('tasks.id', $id)
        //             ->where('users.id', Auth::user()->id)
        //             ->first();

        $userid = Auth::user()->id;

        $task = Task::with('tiertasks', 'user')
                        ->where([
                            'status' => 'N',
                            'user_id' => $userid,
                            'id' => $id
                        ])
                        ->first();
        $tt = TierTask::all();

        return view('task.edit')->with('task', $task)->with('tt', $tt);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TierTask  $tierTask
     * @return \Illuminate\Http\Response
     */
    public function updatestatus($id)
    {
        //
        // dd($id);
        // die;

        $userid = Auth::user()->id;

        $task = Task::findOrFail($id);
        $task['status'] = 'C';
        $task->save();

        Cache::forget("taskcomplete-{$userid}");

        session()->flash('status', 'Task was finished!');

        return redirect()->route('task.index');
    }

    public function update($id, TaskRequest $request)
    {
        //
        // dd('Update');
        // die;

            # code...
            $userid = Auth::user()->id;

            $task = Task::findOrFail($id);
            $validatedData = $request->validated();
            $task->task = $validatedData['task'];
            $task->tier_task_id = $validatedData['tier_task_id'];

            $task->save();

            session()->flash('status', 'Task was updated!');


            // # code...
            // $task = Task::findOrFail($id);
            // $task['status'] = 'C';
            // $task->save();

            // session()->flash('status', 'Task was finished!');

            return redirect()->route('task.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TierTask  $tierTask
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        // dd('delete');
        // die;

        $task = Task::findOrFail($id);
        $task->delete();

        session()->flash('status', 'Task was deleted!');

        return redirect()->route('task.index');
    }
}
