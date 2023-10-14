@extends('layouts.app')

@section('content')

<nav class="navbar bg-body-tertiary fixed-top d-md-none mb-5">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Boosician</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="offcanvasNavbarLabel"></h5>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
          <ul class="nav flex-column">
              <li class="nav-item">
                  <h1 class="h2">Boosician</h1>
  
                  <a class="nav-link {{ Route::current()->getName() == 'admin.home' ? 'active' : '' }}" href="{{ route('admin.home') }}">
                      Dashboard
                  </a>
              </li>
              <li class="nav-item">
                  <a class="nav-link {{ Route::current()->getName() == 'admin.statistics.index' ? 'active' : '' }}" href="{{ route('admin.statistics.index') }}">
                      Statistiche
                  </a>
              </li>
              <li class="nav-item">
                  <a class="nav-link {{ Route::current()->getName() == 'admin.messages.index' ? 'active' : '' }}" href="{{ route('admin.messages.index') }}">
                      Messages
                  </a>
              </li>
              <li class="nav-item">
                  <a class="nav-link {{ Route::current()->getName() == 'admin.reviews.index' ? 'active' : '' }}" href="{{ route('admin.reviews.index') }}">
                      Reviews
                  </a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="{{ route('admin.createSponsor', $user->musician) }}">
                      Sponsor
                  </a>
              </li>
              @guest
              @else
              <li class="nav-item dropdown">
                  <a class="dropdown-item nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                      {{ __('Logout') }}
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                      @csrf
                  </form>
              </li>
              @endguest
          </ul>
        </div>
      </div>
    </div>
  </nav>

<div class="container-fluid">
    <div class="row mt-5">
        <!-- Barra laterale -->
        <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block d-none d-md-block">

            <div class="position-sticky">
                <div class="p-4 fs-5">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <h1 class="h2">Boosician</h1>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Route::current()->getName() == 'admin.home' ? 'active' : '' }}" href="{{ route('admin.home') }}">
                                Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Route::current()->getName() == 'admin.statistics.index' ? 'active' : '' }}" href="{{ route('admin.statistics.index') }}">
                                Statistiche
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Route::current()->getName() == 'admin.messages.index' ? 'active' : '' }}" href="{{ route('admin.messages.index') }}">
                                Messages
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Route::current()->getName() == 'admin.reviews.index' ? 'active' : '' }}" href="{{ route('admin.reviews.index') }}">
                                Reviews
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.createSponsor', $user->musician) }}">
                                Sponsor
                            </a>
                        </li>
                        @guest
                        @else
                        <li class="nav-item dropdown">
                            <a class="dropdown-item nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <div class="w-75 mx-auto container main">
            <h3>Tipologie di sponsor</h3>
            <p>Sponsorizzati per avere più visibilità e alzare il numero dei tuoi clienti.</p>
            <div class="d-flex justify-content-around row">
                @foreach($sponsors as $sponsor)
                    <div class="card text-center shadow-lg col-12 col-md-3 px-0 my-3">
                        <div class="card-header bg-primary">
                            <h4 class="text-white fw-bold">{{ ucfirst($sponsor->sponsor_type)}}</h4>
                        </div>
                        <div class="card-body">
                            <h5> @php echo substr( $sponsor->duration, 0, 2) @endphp ore</h5>
                            <h5>{{ $sponsor->price}} &euro;</h5>
                        </div>
                    </div>
                @endforeach
            </div>
            <form action="{{route('admin.storeSponsor', $musician)}}" method="POST" enctype="multipart/form-data" class="row">
                @csrf
                @method ('POST')
                <div class="col-12">
                    <h3>
                        Informazioni
                    </h3>
                    <ul>
                        <li>
                            Nome: {{ucfirst($user->name)}}
                        </li>
                        <li>
                            Cognome: {{$user->musician->surname}}
                        </li>
                    </ul>
                    <label for="sponsors" class="d-block">
                        <h3>Seleziona il tuo sponsor</h3>
                    </label>
                    <select class='form-select w-50' name="sponsors" id="sponsors">
                        <option value="">No sponsor</option>
                        @foreach ($sponsors as $sponsor)
                        <option value="{{ $sponsor->id }}">
                            {{ ucfirst($sponsor->sponsor_type)}}
                        </option>
                        @endforeach
                    </select>
                    <button type="submit" class="btn btn-primary mt-2">Procedi al pagamento</button>
                </div>
            </form>
        </div>
    </div>
</div>


    <style>
        h3{
            color:  #f88936;
        }

        aside {
        display: flex;
        flex-direction: column;
        align-items: center;
        position: sticky;
        top: 0;
    }

    .top {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-top: 1.4rem;
    }

    .logo img {
        width: 2rem;
        height: 2rem;
    }

    .logo {
        display: flex;
        gap: 2rem;
    }

    .close {
        display: none;
    }

    .sidebar {
        width: 200px;
        display: flex;
        flex-direction: column;
        position: relative;
        top: 3rem;
    }

    a {
        display: flex;
        margin-left: 2rem;
        padding: 0 20px 0 0;
        gap: 1rem;
        align-items: center;
        position: relative;
        height: 3.7rem;
        transition: all 300ms ease;

    }




    @media (max-width: 768px) {

        .main{
            margin-top: 3rem
        }
    }





    </style>

@endsection