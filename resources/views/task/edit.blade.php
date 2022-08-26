@extends('layout')

@section('content')

<div class="container">
    <div class="row d-flex justify-content-center align-items-center">
      <div class="col">
        <div class="card rounded-3">
          <div class="card-body">

            <h4 class="text-center my-3 pb-3">Edit Task</h4>

            <form method="POST" action="{{ route('task.update', ['task' => $task->id]) }}"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                @include('task._form')
                <div style="text-align: center;">
                    <button type="submit" class="btn btn-primary mt-3">Update!</button>
                </div>
                
            </form>

          </div>
        </div>
      </div>
    </div>
  </div>

    

@endsection