@extends('layout')

@section('content')

<form method="POST" action="{{ route('tt.store') }}"
        enctype="multipart/form-data">
        @csrf

        @include('setting._form_tier')
        <button type="submit" class="btn btn-primary mt-1">Submit</button>                
    </form>

@endsection