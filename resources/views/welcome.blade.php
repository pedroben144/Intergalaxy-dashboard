@extends('layouts.app')

@section('content')
<div class="content">
    <div class="wrapper">
        <img src="/images/intergalaxy-logo.png" alt="intergalaxy-logo">
        <p class="title">Bem vindo a Intergalaxy</p>
    </div>
    <p class="mssg">{{ session('mssg') }}</p>
   <a class="btn btn-dark"href="/employees/create">Lancar horas</a>
   <a class="btn btn-dark"href="/employees">Lista de horas lançadas</a>
</div>
@endsection
