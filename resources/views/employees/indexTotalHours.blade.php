@extends('layouts.app')

@section('content')
<div>
    <h1>Total de horas: <span style="font-weight: 900;">{{$count}}</span></h1>
    @foreach ($periods as $period)
    <a href="/employees/hours/{{$period}}"><button class="btn btn-dark">{{$period}}</button></a><br/><br/>
    @endforeach
    <br>
    <a href="/employees"><button class="btn btn-dark">Voltar</button></a>
    
</div>
@endsection