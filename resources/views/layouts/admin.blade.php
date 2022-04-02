<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Admin | {{ config('app.name', 'Laravel') }}</title>

    
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">
    
    <!-- Styles -->

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    {{-- <script src="{{ asset('js/editor.js') }}" defer></script> --}}
    {{-- <script src="{{ asset('trumbowyg/dist/trumbowyg.min.js') }}"></script> --}}

    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/others.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dtb.css') }}" rel="stylesheet">

    <script src="https://kit.fontawesome.com/0069a1cc90.js"></script>
    
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font@5.x/css/materialdesignicons.min.css" rel="stylesheet">
   <script type="text/javascript" async
    src="https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.5/latest.js?config=TeX-MML-AM_CHTML"></script>
  <script type="text/x-mathjax-config">
    MathJax.Hub.Config({
      tex2jax: {inlineMath: [['$','$'], ['\\(','\\)']]}
    });
  </script>


    {{-- <link rel="stylesheet" href="{{ asset('trumbowyg/dist/ui/trumbowyg.min.css') }}"> --}}

    {{-- <link href="{{ asset('css/editor.css') }}" rel="stylesheet"> --}}

    

</head>
<style>
    *{
        /* font-family: sans-serif; */
        font-family: 'Inter', sans-serif;
    }
    .ql-toolbar{
        background-color: #e6e6e6;
    }
    .ql-editor img{
        max-height:  150px !important;
    }
</style>
<body>
    <div id="app">
        <nav class="navbar py-0 navbar-expand-md navbar-dark bg-dark shadow-sm">
            <div class="container">
                <a class="navbar-brand fong-bold" href="{{ route('admin') }}">
                    <span class="font-bold text-white">
                        Admin | {{ config('app.name', 'Laravel') }}
                    </span>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        
                        <li class="nav-item">
                            <a href="{{ route('admin.model.tests') }}"  class="nav-link text-gray-300">
                                <span class="">
                                    Model Tests
                                </span>
                            </a>
                        </li>
                        
                        <li class="nav-item">
                            <a href="{{ route('admin.question.banks') }}"  class="nav-link text-gray-300">
                                Question Banks
                            </a>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    @if (is_admin())
                                        <a class="dropdown-item" href="#">
                                            Admin
                                        </a>
                                    @endif
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                    </ul>
                </div>
            </div>
        </nav>

        <main class=" bg-white">
            @yield('content')
        </main>
    </div>
    
    @yield('js')
    
</body>
</html>
