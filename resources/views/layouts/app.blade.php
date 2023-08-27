<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>URL Shorten App</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">


    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                URL Shorten App
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAJQAAACUCAMAAABC4vDmAAAAY1BMVEX///8AAAAcHBz8/Pz4+Pjz8/MwMDDU1NTJycnp6emysrK7u7uZmZnR0dGhoaHGxsZnZ2cYGBhGRkZPT0+BgYFXV1d2dnasrKxubm4SEhI2Njbf39+Ojo5fX18kJCSHh4c/Pz8IjE3EAAAEp0lEQVR4nO1b2YKqMAxVCiiLgCAyoIz+/1de5zomKai0tMF56Hm1DWmaPXW1cnBwcHBwcHBwcHBwcPg7CDbb7FCVYVhWhyzfBJ/mZ7USybFeS6iOsf9Jjvz8a/0URf4xvvL6OUs/qJOPsLS7vmbpB+F2cZbEoX3P0w3Hhe9w+z3J0g1eviRPzbSY7miW4+miyNINh4VYEiOe9mF/yeI4OxfhfsSVWISpo/zV70Mc4Y9Rchmo29cSPGXSJ7ssGi6Imk5akvLzlNDvtdlTq/dlQ4i5eYro14qRlGBZQde9XGYHfk++dX63MiULa14vShVq4lYScoUZJ0+BjqZQ7eO8QOKhFHx1jKsZfWiErvGosv6AXJ3YmEJBVUpJb1Dzi0qg6iqG/x2Kiit1Rx1RDh0YkpjyBYFf2Kju2eA5eAIzqrmSlt+Bus6j6qggGkUBOiueLPQM9HV2Mdtf+SBf6+yCyFyyMAXJm1YqAvfncWh6BF5qp7MNNLHliH9A3dOyoxMImKM4zR/EO60jR1BIcxTyoBylFlMY/1iZqrXCGOaqrExVf0hSoFNXPZ0qOZn6k9aHfkqLOuQJLUdEFt6DvFZqBKq4Z6mzwOEUOrsgCes4eCIZus4uuHSNJEwDYH46qdEWNvF0ZqM5h8YUmifzFNA0b5Vz9BNYR8HUT2jW2qJCPeRqJwRY9ymmVFjMsNV9Kxx6qDV3BDaOtNyIFk54cKUyAEsN9UpRH2Q+pGDh6ENYu7G0uTjJFeGJt8FIm4YTcXlLOnlvG5HG8Ok07a2VN2ShWuNoPoiuvxtT+Qe6jlHL74jp19bN8z76YBE3T1LP8Ib6SbmcyBPTRWZG/VrGZUtnM9vzYOym1XmYDb8YcLXu+mMa53mcHvvRDJcrEI/wYsb+DHzhZQiRTnNzx3mZad8deTfN0O1aF34HkE2ztF6nS8rJTybeJDwQxku9fBFbpbv7ZStfRFqnoZ+aQM0eZG6GN5qnT6HlNsHXYmrD8OULiopvhnVDPhaTd+3TJAp+ESVZUXqjRS2jbxj7zKLZjcKI2DVjl8+V5onD4ENV+tLgg6waLD6yOAd/cPwqeau/YpDAsETmQM4NSoXO2U6WVm9dVkKWU6b0Ab+RNhW2XYP06ub1y40hIukslgeRkt1dNLRDnOlOqzYoFQKaXd4d9akWa4iIuEN9P5jT3dZKZVEi1e8ZVIMQ93e2HANJ6LxZHfoNeXxm6YkXLYpnpiGn1pjEAMRrztZTYim9Db9A6BlYdGrhZAiB6XhpoKQCQ05nLiqMFHrTqyFwmmXeKPbxhIbuGG24NI3M+CwkNJU66oFpHoo5ufFrTTxfZUYIO69XY/Ukum5WSJztCYqK6mJCJoCoZ6xRK+pdjFQd0w4rIQsN0GTIDVT2Wo9uXgEDs4mrAtuz9PgJVN3E/mw5zgfw/ubTwKTFUuckskAQEoTWUskWzHvbIAHqKlu1ET4VnT9rg/TO2t8UIK3q51LAV0bWKiNIhGYPthheGc18Q0cAvq614jr/k3xoujfX/MwpjHAyPic84/q21rOMoC6dzZR3xz60VmwH3f6XpjWNcHBwcHBwcHBwcHBwcHiHf8wiLegUReF7AAAAAElFTkSuQmCC" alt="{{ Auth::user()->name }}" class="rounded-circle me-2" style="width: 30px; height: 30px;">
                                {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
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
