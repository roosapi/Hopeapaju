@extends('horsemaster')

@section('content')
  <h1>Uusi hevonen</h1>

  {{ Form::open(['url' => 'hevoset']) }}
    @include('horse/partials/horseform')
  {{ Form::close() }}
@stop
