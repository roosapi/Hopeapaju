@extends('horsemaster')

@section('content')
  <h1>Lisää kisoja</h1>

  {{ Form::open(['url' => 'hevoset/'.$horseid.'/competition']) }}
    @include('competition/partials/competitionform')
  {{ Form::close() }}
@stop
