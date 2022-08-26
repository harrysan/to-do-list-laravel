@extends('layout')

@section('content')

    <div class="container">
        <div class="row mt-5">
            <div class="col">
                {{-- @include('task.status.ongoing') --}}

                <div class="container">
                    <div class="row d-flex justify-content-center align-items-center">
                      <div class="col">
                              @if (session('status'))
                                <h3>
                                  <div class="badge badge-success">
                                    {{ session('status') }}
                                  </div>
                                </h3>
                              @endif
              
                        <div class="card rounded-3">
                          <div class="card-body">
                
                            <h4 class="text-center my-3 pb-3">Ongoing</h4>
                
                            <table class="table mb-4">
                              <thead>
                                <tr>
                                  <th scope="col">No.</th>
                                  <th scope="col">Todo item</th>
                                  <th scope="col">Priority</th>
                                  <th scope="col">Actions</th>
                                </tr>
                              </thead>
                              <tbody>
                                @if (count($task) > 0)
                                    @php
                                    $i = 1
                                    @endphp

                                    @foreach ($task as $task)
                                        <tr>
                                        <th scope="row">{{ $i++ }}</th>
                                        <td>{{ $task->task }}</td>
                                        <td>{{ $task->tiertasks->desc }}</td>
                                        <td>
                                              <div class="row" aria-label="Basic example">
                                                <a href="{{ route('task.edit', ['task' => $task->id]) }}">
                                                  <button class="btn btn-success btn-sm mr-2">Update</button>
                                                </a>

                                              <form action="{{ route('task.destroy', ['task' => $task->id]) }}" method="POST" class="mr-2">
                                                @csrf
                                                @method('DELETE')
                                                <input type="submit" value="Delete" class="btn btn-danger btn-sm">
                                              </form>

                                              <a href="{{ route('updatestatus', ['id' => $task->id]) }}">
                                                <button class="btn btn-warning btn-sm mr-2">Finish</button>
                                              </a>
                                              
                                            </div>
                                        </td>
                                        </tr>
                                    @endforeach
                                @endif
                              </tbody>
                            </table>
                
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

            </div>
            <div class="col">
                @include('task._activity')
            </div>
        </div>
    </div>

@endsection