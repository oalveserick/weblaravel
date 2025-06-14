@extends('layouts.main')

@section('title', 'Pisca Eventos')

@section('content')

<div id="search-container" class="col-md-12">
    <h1>Busque o evento</h1>
    <form action="/" method="get">
        <input type="text" id="search" name="search" class="form-control" placeholder="Busque aqui">
    </form>
</div>
<div id="events-container" class="container col-md-12">
     @if($search)
    <h2>Buscando por: {{$search}}</h2>
    @else
    <h2>Próximos Eventos</h2>
    <p class="subtitle">Veja os eventos dos próximos dias</p>
    @endif
    <div id="cards-container" class="row">
        @foreach($events as $event)
        <div class="card col-md-3">
            <img src="/img/events/{{$event->img}}" alt="{{$event->title}}">
            <div class="card-body">
                <p class="card-date">{{date('d/m/Y', strtotime($event->date))}}</p>
                <h5 class="card-title">{{$event->title}}</h5>
                <p class="card-participantes">{{count($event->users)}} participantes</p>
                <a href="/events/{{ $event->id }}" class="btn btn-primary">Saiba mais</a>
            </div>
        </div>
        @endforeach

        @if(count($events) == 0 && $search)
            <p>Não foi possível encontrar nenhum evento com {{$search}}! <a href="/">Ver todos</a></p>
        @elseif(count($events) == 0)
            <p>Não há nenhum evento próximo disponível!!!</p>
            <p>teste</p>
        @endif
    </div>
</div>
@endsection