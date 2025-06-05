@extends('layouts.main')

@section('title','Produtos')

@section('content')

<div id="event-create-container" class="col-md-6 offset-md-3">
    <h1>Crie seu evento</h1>
    <form action="/events" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Evento:</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Insira o nome do evento">
        </div>
        <div class="form-group">
            <label for="city">Cidade:</label>
            <input type="text" class="form-control" id="city" name="city" placeholder="Insira a cidade do evento">
        </div>
        <div class="form-group">
            <label for="title">Privado:</label>
            <select name="private" id="private">
                <option value="0">Não</option>
                <option value="1">Sim</option>
            </select>
        </div>
            <div class="form-group">
                <label for="description">Descrição:</label>
                    <textarea class="form-control" name="description" id="description" rows="3" placeholder="Sobre o que é o evento?"></textarea>
            </div>

        <input type="submit" class="btn btn-primary" value="Criar evento"> 
        <input type="reset" class="btn btn-warning" value="Cancelar"> 
                </div>
    </form>
</div>

@endsection