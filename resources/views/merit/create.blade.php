@extends('horsemaster')

@section('content')
  <h1>Uusi saavutus</h1>

  {{ Form::open(['url' => 'hevoset/'.$horseid.'/merit']) }}
    @include('merit/partials/meritform')
  {{ Form::close() }}
@stop
