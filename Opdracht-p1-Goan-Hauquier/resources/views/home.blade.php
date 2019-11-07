

@extends('layouts.app')

@section('content')
<h1>Dr Oetker</h1>
<br/>
<h3>Win een gratis pizza!</h3>
<p>Op elke doos Ristorante Pizza staat een code. Geef jou code in en misschien win jij wel een gratis pizza!</p>
<button><a href="contest">Wedstrijd</a></button>

@endsection


@section('right')
<h2>Voorbije Winnaars</h2>
        @foreach($winners as $winner)
            @if($winner->isShowed != 0)
                <h3>Blije Winnaar</h3>
                <ul class="list-group">
                    <li class="list-group-item">Naam: {{$winner->name}}</li> 
                    <li class="list-group-item">Woonplaats: {{$winner->city}}</li>
                    <li class="list-group-item">Code: {{$winner->city}}</li>
                </ul>
            @endif
        @endforeach 
@endsection