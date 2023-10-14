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

<div class="container-fluid mt-5">
    <div class="row">
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

        <!-- Contenuto principale -->
        <div class="col-md-8 col-lg-9 justify-content-center  mt-5">
            <div class="card">
                <div class="card-header">
                    <h3 class="mb-0">Statistics</h3>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h5 class="mt-5">Messages</h5>
                            <canvas class="mb-4" id="messageChart"></canvas>
                        </div>
                        <div class="col-md-6">
                            <h5 class="mt-5">Reviews</h5>
                            <canvas class="mb-4" id="reviewChart"></canvas>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <h5 class="mt-5">Votes</h5>
                            <canvas class="mb-4" id="voteChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')
<!-- <script type="module" src="dimensions.js"></script> -->
<script src="{{ mix('/js/mychart.js') }}"></script>
<script>

//grafico messaggi
    var messageCtx = document.getElementById('messageChart').getContext('2d');
        var messageCounts = @json($messageCounts);
        const messageData = {
            labels: @json($messageCounts->keys()),
            datasets: [{
                label: 'Numero di messaggi Ricevuti',
                backgroundColor: getRandomColor(), 
                borderColor: 'rgb(255, 99, 132)',
                data: @json($messageCounts->values()), 
            }]
        };


    
    
    
    //grafico recensioni
    var reviewCtx = document.getElementById('reviewChart').getContext('2d');
        var reviewCounts = @json($reviewCounts);
        const reviewData = {
            labels: @json($reviewCounts->keys()),
            datasets: [{
                label: 'Numero di recensioni Ricevute',
                backgroundColor: getRandomColor(), 
                borderColor: 'rgb(75, 192, 192)',
                data: @json($reviewCounts->values()), 
            }]
        };



    //grafico voti
    var voteCtx = document.getElementById('voteChart').getContext('2d');
    var votesData = @json($votesData);

    const months = Object.keys(votesData);
    const datasets = [];

    // Ciclo attraverso le fasce di voto
    const fasce = ['1-2', '3-4', '5']; // Elenco completo delle fasce di voto
    fasce.forEach(fascia => {
        const dataPoints = months.map(month => votesData[month][fascia] || 0);
        datasets.push({
            label: `Fascia ${fascia}`, 
            backgroundColor: getRandomColor(), 
            borderColor: 'rgb(255, 99, 132)',
            data: dataPoints,
        });
    });

    const voteData = {
        labels: months,
        datasets: datasets,
    };

    function getRandomColor() {
    const letters = '0123456789ABCDEF';
    let color = '#';
    for (let i = 0; i < 6; i++) {
        color += letters[Math.floor(Math.random() * 16)];
    }
    return color;
}

</script>
@endsection

<style>
    .chart-container {
        position: relative;
        padding-bottom: 75%; /* Imposta l'aspetto quadrato dei grafici */
        height: 0;
        overflow: hidden;
    }
    
    .chart-container canvas {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
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

        /* h3{
                font-size: 1rem;
            } */
    }


    </style>