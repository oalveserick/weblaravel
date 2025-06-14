@extends('layouts.main')

@section('title','Produtos')

@section('content')

<div id="event-create-container" class="col-md-6 offset-md-3">
    <h1>Crie seu evento</h1>
    <form action="/events" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="img">Imagem:</label>
            <input type="file" name="img" id="img" class="form-control-file">
        </div>
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
            <label for="city">Data do evento:</label>
            <input type="date" class="form-control" id="date" name="date">
        </div>
            <div class="form-group">
                <label for="description">Descrição:</label>
                    <textarea class="form-control" name="description" id="description" rows="3" placeholder="Sobre o que é o evento?"></textarea>
            </div>
            <div class="form-group">
                <label for="description">Adciione itens de infraestrutura:</label>
                    <div class="form-group">
                        <input type="checkbox" name="items[]" value="cadeiras"> Cadeiras
                    </div>
                    <div class="form-group">
                        <input type="checkbox" name="items[]" value="palco"> Palco
                    </div>
                    <div class="form-group">
                        <input type="checkbox" name="items[]" value="openbar"> Open Bar
                    </div>
                    <div class="form-group">
                        <input type="checkbox" name="items[]" value="openfood"> Open Food
                    </div>
            </div>
        <input type="submit" class="btn btn-primary" value="Criar evento"> 
        <input type="reset" class="btn btn-warning" value="Cancelar"> 
                </div>
    </form>
</div>

@endsection