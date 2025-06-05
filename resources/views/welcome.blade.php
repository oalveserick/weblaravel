@extends('layouts.main')

@section('title', 'Pisca Eventos')

@section('content')

<div id="search-container" class="col-md-12">
    <h1>Busque o evento</h1>
    <form action="">
        <input type="text" id="search" name="search" class="form-control" placeholder="Busque aqui">
    </form>
</div>
<div id="events-container" class="container col-md-12">
    <h2>Próximos Eventos</h2>
    <p class="subtitle">Veja os eventos dos próximos dias</p>
    <div id="cards-container" class="row">
        @foreach($events as $event)
        <div class="card col-md-3">
            <img src="/img/EVENTOS-CORPORATIVOS-FOTOS-E-VÍDEOS-5-1600x1068.jpg" alt="{{$event->title}}">
            <div class="card-body">
                <p class="card-date">10/06/2025</p>
                <h5 class="card-title">{{$event->title}}</h5>
                <p class="card-participantes">tantos participantes</p>
                <a href="#" class="btn btn-primary">Saiba mais</a>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection