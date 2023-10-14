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
        <!-- Sidebar -->
        <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block d-none d-md-block">
            <div class="position-sticky">
                <div class="p-4 fs-5">
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

        </nav>

        <!-- Main content -->
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mt-5">
            <div class="row" style="position: relative;">
                <!-- Profilo -->
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            <h2>Profilo</h2>
                        </div>
                        <div class="card-body">
                            <div class="text-center mb-3">
                                @if($currentMusician == null)
                                <p>Immagine : Inserire un'immagine</p>
                                @else
                                @if (str_starts_with($currentMusician->image, 'http'))
                                <img class="profile-img img-fluid" src="{{$currentMusician->image}}" alt="{{$currentMusician->name}}">
                                @else
                                <img class="profile-img img-fluid" src="{{asset('storage/' . $currentMusician->image)}}" alt="{{$currentMusician->name}}">
                                @endif
                                @endif
                            </div>
                            <hr>
                            <div class="container">
                                <h5 class="mb-3">{{ ucfirst($user->name ?? '') }} {{ucfirst( $currentMusician->surname ?? '')}}</h5>
                                <p>Data di nascita: {{ $currentMusician->birth_date ?? ''}}</p>
                                <p>Indirizzo: {{ $currentMusician->address ?? ''}}</p>
                                <p>Numero di telefono: {{ $currentMusician->num_phone ?? ''}}</p>
                                <p>Prezzo: {{ $currentMusician->price ?? ''}}€</p>
                                <p>Genere Musicale: {{ $currentMusician->musical_genre ?? ''}}</p>
                                @if($user->musician->musicalInstruments)
                                <div>
                                    <h4>Strumenti Musicali:</h4>
                                    <ul>
                                        @foreach ($user->musician->musicalInstruments as $musicalInstrument)
                                        <li>{{ ucfirst($musicalInstrument->name )}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                                <hr>
                                <p>{{ $currentMusician->bio ?? ''}}</p>
                                @if($user->musician->sponsors)
                                <div>
                                    <h2>
                                        Sponsor
                                    </h2>
                                    <p>Cronologia</p>
                                    <ul class="sponsor-height">
                                        <!--per aggiornare il DB digitare nel terminale php artisan schedule:run-->

                                        @foreach($user->musician->sponsors as $sponsor)

                                        <li>Tipologia di sponsor: {{ $sponsor->sponsor_type}} </li>
                                        <li>Data inizio: {{ $sponsor->pivot->sponsor_start}} </li>
                                        <li>Data fine: {{ $sponsor->pivot->sponsor_end}} </li>

                                        @if($sponsor->pivot->active == 1)
                                        <p class="text-success">Attivo</p>
                                        @else
                                        <p class="text-danger">Terminato</p>
                                        @endif
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                            </div>

                            @if (!$currentMusician)
                            <form action="{{ route('admin.musicians.create') }}" method="GET">
                                @csrf
                                <button type="submit" class="btn btn-success mt-3 btn-edit">
                                    <i class="fas fa-plus-circle me-2"></i> Crea Musicista
                                </button>
                            </form>
                            @else
                            <div class="d-flex gap-4 align-items-center mx-4">
                                <form action="{{ route('admin.musicians.edit', ['musician' => $currentMusician->id]) }}" method="GET">
                                    @csrf
                                    <button type="submit" class="btn btn-success btn-sm mt-3 btn-edit">Edit</button>
                                </form>
                                <form action="{{ $currentMusician ? route('admin.musicians.destroy', $currentMusician) : '#' }}" method="POST" class="form-canc">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-sm mt-3 btn-delete">Cancella</button>
                                </form>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Messaggi -->
                <div class="col-md-6 col-lg-4 ">
                    <div class="card">
                        <div class="card-header">
                            <h2>Messaggi</h2>
                        </div>
                        <div class="card-body screen-height">
                            @foreach($messages as $message)
                            @if($message->musician_id == auth()->user()->musician->id)
                            <div class="mb-3">
                                <p class="fw-bold">{{$message->name}}</p>
                                <p>{{ $message->message}}</p>
                            </div>
                            <hr>
                            @endif
                            @endforeach
                        </div>
                        <div class="card-footer">
                            <form action="{{ route('admin.messages.index')}}" method="GET">
                                @csrf
                                <button type="submit" class="btn btn-primary btn-sm mt-3">Show More</button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Recensioni -->
                <div class="col-md-6 col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            <h2>Recensioni</h2>
                        </div>
                        <div class="card-body screen-height">
                            @foreach($reviews as $review)
                                @if($review->musician_id == auth()->user()->musician->id && $review->vote != 0)
                                    <div class="mb-3">
                                        <p class="fw-bold">Voto: {{ $review->vote }}</p>
                                        <p>{{$review->content }}</p>
                                    </div>
                                    <hr>
                                @endif
                            @endforeach
                        </div>
                        <div class="card-footer">
                            <form action="{{ route('admin.reviews.index')}}" method="GET">
                                @csrf
                                <button type="submit" class="btn btn-primary btn-sm mt-3">Show More</button>
                            </form>
                        </div>
                    </div>
                </div>

                <!--PopUp x cancellare -->
                <div class="popup w-50 text-center d-none">
                    <p>Sei sicuro di volerti cancellare?</p>
                    <p>Profilo e registrazione andranno persi...</p>
                    <i class="fa-solid fa-trash-can"></i>
                    <div class="d-flex justify-content-center pb-2">
                        <button class="btn btn-warning me-2 sicurezzaY">Si</button>
                        <button class="btn btn-warning sicurezzaN">No</button>
                    </div>
                </div>

            </div>
        </main>
    </div>
</div>


@endsection

@section('js')

<script>
    //Quando vuoi cancellare il profilo ti chiede prima la conferma
    const formCanc = document.querySelector('form.form-canc');
    console.log(formCanc);

    const popup = document.querySelector('.popup')
    const btnCancYes = document.querySelector('button.sicurezzaY')
    const btnCancNo = document.querySelector('button.sicurezzaN')

    formCanc.addEventListener('submit', function(event) {
        event.preventDefault();
        //popup.classList.add('d-block')
        popup.classList.remove('d-none')

        let result =""
        btnCancNo.addEventListener('click',function(){
            result="no"
            if(result=="no"){
                popup.className=('d-none')
                popup.className=('popup w-50 text-center d-none ')
            }
        })
        btnCancYes.addEventListener('click',function(){
            result="yes"
            if(result=="yes"){
                formCanc.submit()
                popup.className=('popup w-50 text-center d-none')
            }
        })
    })
</script>

@endsection




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

    .popup{
    padding: 0.5rem;
    position: absolute;
    top:50%; left: 50%;
    transform: translate(-50%, -50%);
    z-index: 1;
    background-color: white;
    border: 2px solid rgb(13, 110, 253);
    border-radius: 15px;
    box-shadow: rgba(50, 50, 93, 0.25) 0px 13px 27px -5px, rgba(0, 0, 0, 0.3) 0px 8px 16px -8px;
}

.popup i{
    color: #f88936;
    font-size: 2rem;
    margin-bottom: 1rem;
}








    @media (max-width: 768px) {
        .logo img {
            width: 1.5rem;
            height: 1.5rem;
        }

        .logo h2 {
            font-size: 1.5rem;
        }

        main{
            margin-top: 3rem
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