@extends('layouts.landing')
@section('title', 'adso')
@section('content')

    @component('_components.card')

        @slot('title','Titulo Card 1')
        @slot('content','Contenido Card 1...')
        
    @endcomponent

    @component('_components.card')

        @slot('title','Titulo Card 2')
        @slot('content','Contenido Card 2...')
        
    @endcomponent
    
@endsection