<header>
    <nav class="navbar navbar-expand headerNav">
        <div class="container">
           
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav me-auto">
                    @auth
                        <li class="nav-item">
                            <a class="nav-link {{ Route::current()->getName() == 'admin.home' ? 'active' : '' }}" aria-current="page" href="{{ route('admin.home') }}">
                                Home
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{Route::current()->getName() == 'admin.statistics.index' ? 'active' : ''}}" aria-current="page" href="{{route('admin.statistics.index')}}">
                                Statistiche
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{Route::current()->getName() == 'admin.messages.index' ? 'active' : ''}}" aria-current="page" href="{{route('admin.messages.index')}}">
                                Messaggi
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{Route::current()->getName() == 'admin.reviews.index' ? 'active' : ''}}" aria-current="page" href="{{route('admin.reviews.index')}}">

                                Reviews
                            </a>
                        </li>
                    @endauth
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto">

                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <button class="logInBtn btn btn-sm d-md-inline">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </button>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <button class="signInBtn btn btn-sm">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </button>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
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
</header>