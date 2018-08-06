<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ url('/login') }}">Login</a></li>
                            <li><a href="{{ url('/register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>




<div class="container">
        @if(Session::has('success'))

        <div class="alert alert-success mt-3 text-center">{{ Session::get('success')  }}</div>
    
    @endif
    @if(Session::has('info'))

    <div class="alert alert-warning mt-3 text-center">{{ Session::get('info')  }}</div>

@endif
@if(Session::has('fail'))

<div class="alert alert-danger">{{ Session::get('fail') }}</div>
@endif
    
    <div class="row">
            @if(Auth::check() && Auth::user()->admin)
        <div class="col-lg-4">

<ul class="list-group">
    <li class="list-group-item">
        <a href="{{ route('home') }}">Home</a>
    </li>
   
    <li class="list-group-item">
            <a href="{{ route('create.category') }}">Create Category</a>
        </li>
    <li class="list-group-item">
        <a href="{{ route('create.post') }}">Create post</a>
    </li>
    <li class="list-group-item">
            <a href="{{ route('allc') }}">View Categories</a>
        </li>
        <li class="list-group-item">
                <a href="{{ route('tags') }}">Tags</a>
            </li>
        <li class="list-group-item">
                <a href="{{ route('allp') }}">View posts</a>
            </li>
            <li class="list-group-item">
                    <a href="{{ route('trashed') }}">Trashed posts</a>
                </li>
                
                    @if(Auth::user()->admin)
                    <li class="list-group-item">
                            <a href="{{ route('user.create') }}">Create Admin</a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{ route('setting') }}">See Settings</a>
                        </li>
                        @endif
</ul>

        </div>
        @endif
    <div class="col-lg-8">
        @yield('content')
    </div>
    </div>
</div>
    </div>

    <!-- Scripts -->
  

    <script src="/js/app.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>

    <script>
        $(document).ready(function() {
            $('#summernote').summernote();
          });
    </script>
</body>
</html>
