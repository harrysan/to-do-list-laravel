@extends('layout')

@section('content')
  <a href="{{ route('tt.create') }}"><button type="submit" class="btn btn-primary mt-1">Add New</button></a>        
  
  <div class="mt-3">
    <div class="row d-flex justify-content-center align-items-center">
      <div class="col">
        <div class="card rounded-3">
          <div class="card-body">

            <table class="table mb-4">
              <thead>
                <tr>
                  <th scope="col">No.</th>
                  <th scope="col">Tier</th>
                  <th scope="col">Description</th>
                </tr>
              </thead>
              <tbody>
                @php
                    $i = 1
                @endphp
                @foreach ($setting as $setting)
                    <tr>
                    <th scope="row">{{ $i++ }}</th>
                    <td>{{ $setting->tier }}</td>
                    <td>{{ $setting->desc }}</td>
                    </tr>
                @endforeach
              </tbody>
            </table>

          </div>
        </div>
      </div>
    </div>
  </div>
@endsection