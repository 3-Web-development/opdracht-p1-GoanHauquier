@extends('layouts.app')

@section('content')
<h1>Deelnames</h1>
@if(count($participants) > 0)
    @foreach($participants as $participant)
        <ul class="list-group">
            <li class="list-group-item">Naam: {{$participant->name}}</li> 
            <li class="list-group-item">Adres: {{$participant->adress}}</li>
            <li class="list-group-item">Woonplaats: {{$participant->city}}</li>
            <li class="list-group-item">Email: {{$participant->email}}</li>
        </ul>
    @endforeach
@endif
@endsection


@section('button')
<button><a href=".">Terug</a></button>
@endsection