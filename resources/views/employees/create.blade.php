@extends('layouts.app')

@section('content')
<div>
    <h1>Registrar horas</h1>
    <form  action="/employees" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Nome</label>
            <input class="form-control" type="text" name="name" id="name">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input class="form-control" type="text" name="email" id="email">
        </div>
        <div class="form-group">
            <label for="hours">Horas</label>
            <input class="form-control" type="text" name="hours" id="hours">
        </div>
        <div class="form-group">
            <label for="start">De</label>
        <select class="form-control" name="start" id="start">
            @for ($i = 1; $i <= 52; $i++)
            <option  value="semana {{$i}}">Semana {{$i}}</option>
            @endfor
        </select>
        </div>
        <input class="btn btn-dark" type="submit" value="Registrar">
    </form>
    <br>
    <a href="/employees"><button class="btn btn-secondary">Ir a lista de horas</button></a>
</div>
@endsection