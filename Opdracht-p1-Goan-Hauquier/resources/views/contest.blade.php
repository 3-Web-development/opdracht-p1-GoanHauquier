@extends('layouts.app')

@section('content')
<h1>Contest</h1>
{!! Form::open(['url' => 'contest/submit']) !!}
    
    <div class="form-group">
        {{Form::label('name', 'Naam')}}
        {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Naam'])}}
    </div>
    <div class="form-group">
        {{Form::label('adress', 'Adres')}}
        {{Form::text('adress', '', ['class' => 'form-control', 'placeholder' => 'Adres'])}}
    </div>
    <div class="form-group">
        {{Form::label('city', 'Woonplaats')}}
        {{Form::text('city', '', ['class' => 'form-control', 'placeholder' => 'Woonplaats'])}}
    </div>
    <div class="form-group">
        {{Form::label('email', 'E-Mail Addres')}}
        {{Form::text('email', '', ['class' => 'form-control', 'placeholder' => 'eMail'])}}
    </div>
    <div class="form-group">
        {{Form::label('code', 'Je persoonlijke code')}}
        {{Form::text('code', '', ['class' => 'form-control', 'placeholder' => 'Code'])}}
    </div>
    <div>
        {{Form::submit('Deelnemen!', ['class' => 'btn btn-primary'])}}
    </div>
    
{!! Form::close() !!}
@endsection


@section('button')
<button><a href=".">Terug</a></button>
@endsection