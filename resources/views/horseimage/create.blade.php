@extends('horsemaster')

@section('content')
  <h1>Uusi kuva</h1>

  {{ Form::open(['url' => 'hevoset/'.$id.'/img']) }}
    @include('horseimage/partials/horseimageform')
  {{ Form::close() }}
@stop
