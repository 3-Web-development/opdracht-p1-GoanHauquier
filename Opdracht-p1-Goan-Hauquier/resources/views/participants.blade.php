@extends('layouts.app')

@section('content')
<h1>Deelnames</h1>
@if(count($participants) > 0)
    @foreach($participants as $participant)
        @if($participant->isDeleted != 1)
            <ul class="list-group">
                <li class="list-group-item">ID: {{$participant->id}}</li>
                <li class="list-group-item">Naam: {{$participant->name}}</li> 
                <li class="list-group-item">Adres: {{$participant->adress}}</li>
                <li class="list-group-item">Woonplaats: {{$participant->city}}</li>
                <li class="list-group-item">Email: {{$participant->email}}</li>
                <li class="list-group-item">Code: {{$participant->code}}</li>
            </ul>
            <form action=" {!! action('ParticipationController@disqualify',$participant->id) !!}" method="POST">
               
                @csrf
                <button class="btn btn-lg btn-success" type="submit">
                    Disqualificeren
                </button>
            </form>
        @endif
    @endforeach
@endif
@endsection

@section('right')
{!! Form::open(['url' => 'participants/admin']) !!}
    <div class="form-group">
        {{Form::label('email', 'Admin email')}}
        {{Form::text('email', '', ['class' => 'form-control', 'placeholder' => 'email'])}}
    </div>
    <div>
        {{Form::submit('Klaar', ['class' => 'btn btn-primary'])}}
    </div>
{!! Form::close() !!}
@endsection

@section('button')
<button><a href=".">Terug</a></button>
@endsection