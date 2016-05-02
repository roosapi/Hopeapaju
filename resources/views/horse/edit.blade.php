@extends('horsemaster')

@section('content')
  <h1>Muokkaa hevosta</h1>

  {{ Form::model($horse->toArray(), ['method' => 'PATCH', 'action' => ['HorseController@update', $horse->id] ]) }}
    @include('horse/partials/horseform')
  {{ Form::close() }}
@stop
