@extends('layouts.main')

@section('title', 'Pisca Eventos')

@section('content')
        <h1>Título</h1>

        <img src="/img/evento-corporativo.webp" alt="">

        @if($nome == "Erick")
            <p>O nome é Erick e ele tem {{$idade}} anos de idade.</p>
        @else
            <p>O nome não é Erick, é {{$nome}} e ele tem {{$idade}} anos de idade.</p>
        @endif

        @for($i = 0; $i < count($arr); $i++)
            <p>{{$arr[$i]}}</p>
        @endfor
<hr>
        @foreach($nomes as $nome)
            <!-- <p>{{$loop->index}}</p> -->
            <p>{{$nome}}</p> 
        @endforeach

        {{--Este é o tipo de comentário certo--}}

@endsection