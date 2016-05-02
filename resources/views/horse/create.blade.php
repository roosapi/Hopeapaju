@extends('horsemaster')

@section('content')
  <h1>Uusi hevonen</h1>

  {{ Form::open(['method' => 'POST', 'action' => ['HorseController@store'] ]) }}
    @include('horse/partials/horseform')
  {{ Form::close() }}
@stop
