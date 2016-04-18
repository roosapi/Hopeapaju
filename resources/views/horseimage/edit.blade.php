@extends('horsemaster')

@section('content')
  <h1>Muokkaa hevosta</h1>

  {{ Form::model($img, ['method' => 'PATCH', 'action' => ['HorseImageController@update', $img->horse, $img->id] ]) }}
    @include('horseimage/partials/horseimageform')
  {{ Form::close() }}
@stop
