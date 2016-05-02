@extends('horsemaster')

@section('content')
  <h1>Uusi saavutus</h1>

  {{ Form::open(['url' => 'hevoset/'.$horseid.'/text']) }}
    @include('text/partials/textform')
  {{ Form::close() }}
@stop
