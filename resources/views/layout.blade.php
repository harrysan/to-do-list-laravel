<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <title>To Do List</title>
</head>
<body>
    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
        <h5 class="my-0 mr-md-auto font-weight-normal">ToDo List</h5>
        <nav class="my-2 my-md-0 mr-md-3">

          <a class="p-2 text-dark" href="{{ route('index') }}">Home</a>
          <a class="p-2 text-dark" href="{{ route('task.create') }}">Create Task</a>
          <a class="p-2 text-dark" href="{{ route('setting') }}">Setting</a>
        
        @guest
          @if (Route::has('register'))
          <a class="p-2 text-dark" href="{{ route('register') }}">Register</a>  
          @endif
          
          <a class="p-2 text-dark" href="{{ route('login') }}">Login</a>
        @else
        <a class="p-2 text-dark" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
            {{ __('Logout') }} ({{ Auth::user()->name }})
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
        @endguest
        </nav>
    </div>

      <div class="container">
        {{-- @if (session()->has('status'))
          <p style="color:green">
            {{ session()->get('status') }}
          </p>
        @endif --}}

        @yield('content')
      </div>

    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>