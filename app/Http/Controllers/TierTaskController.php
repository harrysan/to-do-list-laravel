<?php

namespace App\Http\Controllers;

use App\Http\Requests\TierTaskRequest;
use App\Models\TierTask;
use Illuminate\Http\Request;

class TierTaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
            //->only(['create','store']);  //name route
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('setting.setting', ['setting' => TierTask::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('setting.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TierTaskRequest $request)
    {
        //
        // dd($request);
        // die;

        $validatedData = $request->validated();
        
        $tierTask = new TierTask();
        $tierTask = TierTask::create($validatedData);

        $request->session()->flash('status', 'Tier Task has been Added!');

        return redirect()->route('setting');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TierTask  $tierTask
     * @return \Illuminate\Http\Response
     */
    public function show(TierTask $tierTask)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TierTask  $tierTask
     * @return \Illuminate\Http\Response
     */
    public function edit(TierTask $tierTask)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TierTask  $tierTask
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TierTask $tierTask)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TierTask  $tierTask
     * @return \Illuminate\Http\Response
     */
    public function destroy(TierTask $tierTask)
    {
        //
    }
}
