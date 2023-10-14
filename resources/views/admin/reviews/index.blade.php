
@extends('layouts.app')

@section('content')

<nav class="navbar bg-body-tertiary fixed-top d-md-none">
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

<div class="container-fluid ">
    <div class="row mt-5">
        <!-- Barra laterale -->
        <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block d-none d-md-block ">
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

            <div class="col-md-8 col-lg-9 justify-content-center main">
                    <div class="card-body">
                        <div class="row mt-5">
                            <div class="col-md-9">
                                <div class="review-section">
                                    @foreach ($musicianReview as $review)
                                    <div class="card mb-3">
                                        <div class="card-body">
                                            @if ($review->vote != 0)
                                            <p class="my_content">Contenuto:
                                                {{$review->content}}
                                            </p>
                                            <p class="{{getColorForClass($review->vote)}}">Voto:
                                                {{$review->vote}}
                                            </p>
                                            @endif
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

@endsection

@php
    function getColorForClass($vote){
        if($vote <= 2){
            return 'vote-red';
        }elseif($vote >= 3){
            return 'vote-green';
        }
    }
@endphp



<style lang="scss" scoped>
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

        /* h3{
                font-size: 1rem;
            } */
    }

    .screen-height{
        max-height: 78vh;
        overflow: auto;
    }

    .sponsor-height{
        max-height:200px;
        overflow: auto;
    }


    .sidebar {
        width: 200px;
        position: sticky;
        top: 0;
        height: 100vh; /* Imposta l'altezza della sidebar per occupare l'intera altezza del viewport */
        overflow-y: auto; /* Aggiunge una scrollbar se il contenuto della sidebar supera l'altezza del viewport */
    }

    .col-md-8.col-lg-9.justify-content-center {
        max-height: 100vh; /* Imposta un'altezza massima per il contenuto delle recensioni */
        overflow-y: auto; /* Abilita la scrollbar per il contenuto delle recensioni quando supera l'altezza massima */
    }


    p.my_content{
        font-size: 1.3rem;
    }

    .vote-red{
        color: red;
    }

    .vote-green{
        color: green;
    }



    @media (max-width: 768px) {
        .logo img {
            width: 1.5rem;
            height: 1.5rem;
        }

        .logo h2 {
            font-size: 1.5rem;
        }
    }





    @media (max-width: 768px) {
        .top {
            margin-top: 0.8rem;
        }
    }


    @media (max-width: 768px) {
        .col-4.preview p {
            font-size: 0.8rem;
        }

        .col-4 .row a {
            font-size: 0.9rem;
        }
    }


    @media (max-width: 768px) {

        .col-10.preview p {
            font-size: 0.8rem;
        }
    }


</style>