<?php

namespace App\Http\ViewComposers;

use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class ActivityComposer
{
    public function compose(View $view) {

        //$taskcomplete = DB::table('tasks')->where('status','C')->get();

        // $taskcomplete = DB::table('tasks')
        //     ->join('tier_tasks', 'tasks.tier_task_id', '=', 'tier_tasks.id')
        //     ->join('users', 'tasks.user_id', '=', 'users.id')
        //     ->select('tasks.*', 'tier_tasks.desc')
        //     ->where('status', 'C')
        //     ->where('users.id', Auth::user()->id)
        //     ->get();

        $userid = Auth::user()->id;

        $taskcomplete = Cache::remember("taskcomplete-{$userid}", 10, function () use($userid) {
            return Task::with('tiertasks', 'user')
                        ->where([
                            'status' => 'C',
                            'user_id' => $userid
                            ])
                        ->get();
        });

        // $taskcomplete = Task::with('tiertasks', 'user')
        //             ->where([
        //                 'status' => 'C',
        //                 'user_id' => $userid
        //                 ])
        //             ->get();

        $view->with('taskcomplete', $taskcomplete);
    }

}