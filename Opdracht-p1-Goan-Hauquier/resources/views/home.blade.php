

@extends('layouts.app')

@section('content')
<h1>Dr Oetker</h1>
<br/>
<button><a href="contest">Wedstrijd</a></button>

@endsection


@section('right')
<h2>Voorbije Winnaars</h2>
    @foreach($winners as $winner)
        <h3>Blije Winnaar</h3>
        <ul class="list-group">
            <li class="list-group-item">Naam: {{$winner->name}}</li> 
            <li class="list-group-item">Woonplaats: {{$winner->city}}</li>
        </ul>
    @endforeach
@endsection