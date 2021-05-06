@extends('layouts.app')

@section('content')
<div>
            
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">nome</th>
            <th scope="col">email</th>
            <th scope="col">periodo</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($hours as $key => $hour)
        <tr>
            <th scope="row">{{$key+1}}</th>
            <td>{{$hour->name}}</td>
            <td>{{$hour->email}}</td>
            <td>{{$hour->start}}</td>
            <td><a href="/employees/{{$hour->id}}">abrir</a></td>
        </tr>
        @endforeach
        </tbody>
      </table>
    
    <a href="/employees/hours"><button class="btn btn-dark">Total de horas</button></a>
    <br/>
    <br/>
    <a href="/employees/create"><button class="btn btn-dark">Lancar horas</button></a>
</div>


  @endsection