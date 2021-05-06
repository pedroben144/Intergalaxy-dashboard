@extends('layouts.app')

@section('content')
<div>
    <h1>
        Total de horas lancadas por {{$employee->first()->name}}: {{$count}}
    </h1>
   
<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">nome</th>
        <th scope="col">periodo</th>
        <th scope="col">horas</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($employee as $key => $item)
    <tr>
        <th scope="row">{{$key+1}}</th>
        <td>{{$item->name}}</td>
        <td>{{$item->start}}</td>
        <td>{{$item->hours}}</td>
    </tr>
    @endforeach
    </tbody>
  </table>
  <a class="btn btn-primary" href="{{ URL::to('/pdf', $employee->first()->email) }}">Export to PDF</a><br/><br/>
  <a class="btn btn-dark" href="/">Home</a>

</div>
@endsection