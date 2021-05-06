@extends('layouts.app')

@section('content')
<div>
    <h1>Horas geral por periodo</h1>
    <h3>O total de horas no periodo da <span style="font-weight: 900;">{{$allPeriods->first()->start}}</span> é de: <span style="font-weight: 900;">{{$count}} horas</span></h3>
    <a href="/employees/hours"><button class="btn btn-dark">Voltar</button></a>
</div>
@endsection