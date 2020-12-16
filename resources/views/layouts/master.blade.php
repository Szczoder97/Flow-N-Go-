<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Modify the background color */

        /* czcionka do ustawienia */

        .navbar-custom {
            width: 100%;
            background-color: #F3F9FD;
        }

        .navbar-custom .navbar-brand,
        .navbar-custom .navbar-text {
            color: #051923;
        }

        a {
            color: #051923;
        }

        body {
            color: #051923;
        }


        .navbar-toggle {
            /* (80px - button height 34px) / 2 = 23px */
            margin-top: 23px;
            padding: 9px 10px !important;
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>@yield('title')</title>
</head>

<body>
    <ul class="navbar-nav mr-auto">

        <nav class="navbar navbar-expand-lg navbar-light navbar-custom">
            {{-- !!!!!!! zmiana kolorków !!!!!!!!!!!!!!!! --}}

            <a class="navbar-brand" href="/"><img src="https://scontent.fpoz4-1.fna.fbcdn.net/v/t1.15752-9/131442571_449269133136908_1565580654704638868_n.png?_nc_cat=100&ccb=2&_nc_sid=ae9488&_nc_ohc=rcZEMhKE6gcAX_aRWF5&_nc_ht=scontent.fpoz4-1.fna&oh=9d0846da7b96f0502509deb4fca0a452&oe=5FFD943B" alt="Logo" width="150" heigh="150"></a>
            {{-- !!!!!!! złe podłączenie obrazka !!!!!!!!!!!!!!!! --}}

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <div class="dropdown">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                        {{ Auth::user()->name }}
                            {{-- menu będzie się nazywało tak jak użytkownik --}}
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href=/home>Your account</a>
                            <a class="dropdown-item" href=/home>Your account</a> 
                            {{-- podstawić logowanie i rejestracje --}}
                        </div>       
                    </li>
                    
                </div>
            </ul>
            <!-- Authentication Links -->
            @guest
            @if (Route::has('login'))
            <li class="nav-item px-3">
                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
            @endif

            @if (Route::has('register'))
            <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
            </li>
            @endif
            @else
            <li class="nav-item px-3">
                <a class="nav-link" href="/offer/create">Create offer</a>
            </li>
            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>

</html>