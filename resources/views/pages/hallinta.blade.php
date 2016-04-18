@extends('master')

@section('content')
<h1>Hallinta</h1>
<div>

<a href="{{ url('hevoset/create') }}" class="button">Uusi hevonen</a>


<ul id="tabs">
  <li><a href="#hann">Hannover</a></li>
  <li><a href="#hols">Holstein</a></li>
  <li><a href="#sh">Suomenhevonen</a></li>
  <li><a href="#muut">Muiden hevoset</a></li>
  <li><a href="#evm">Evm</a></li>
</ul>

<div class="tabc" id="hann">

  <table>
    <tr><th>ID</th><th>Hevonen</th><th>Skp</th><th>Isä</th><th>Emä</th>
      <th>Suvun pituus</th><th colspan="4">Muokkaa</th></tr>

    @foreach ($hann as $heppa)
    <tr>
      <td>{{ $heppa['id'] }}</td>
      <td><a href="{{ url('hevoset/'.$heppa['lempinimi']) }}">{{ $heppa['nimi'] }}</a></td>
      <td>{{ $heppa['skp'] }}</td>
      <td>{{ $heppa['isa'] }}</td>
      <td>{{ $heppa['ema'] }}</td>
      <td>{{ $heppa['suku'] }}</td>
      <td><a href="{{ url('hevoset/'.$heppa['id'].'/edit') }}">
         <img src="{{ asset('img/edit_icon.png') }}" alt="" /></a></td>
      <td><a href="{{ url('hevoset/'.$heppa['id'].'/img/create') }}">
        <a href="{{ url('hevoset/'.$heppa['id'].'/img/create') }}">
  <img src="{{ asset('img/img_icon.png') }}" alt="" /></a></a></td>
      <td><img src="{{ asset('img/text_icon.png') }}" alt="" /></td>
      <td><img src="{{ asset('img/merit_icon.png') }}" alt="" /></td>
    </tr>
    @endforeach
  </table>

</div>


<div class="tabc" id="hols">

  <table>
    <tr><th>ID</th><th>Hevonen</th><th>Skp</th><th>Isä</th><th>Emä</th>
      <th>Suvun pituus</th><th colspan="4">Muokkaa</th></tr>

    @foreach ($hols as $heppa)
    <tr>
      <td>{{ $heppa['id'] }}</td>
      <td><a href="{{ url('hevoset/'.$heppa['lempinimi']) }}">{{ $heppa['nimi'] }}</a></td>
      <td>{{ $heppa['skp'] }}</td>
      <td>{{ $heppa['isa'] }}</td>
      <td>{{ $heppa['ema'] }}</td>
      <td>{{ $heppa['suku'] }}</td>
      <td><a href="{{ url('hevoset/'.$heppa['id'].'/edit') }}">
  <img src="{{ asset('img/edit_icon.png') }}" alt="" /></a></td>
      <td><a href="{{ url('hevoset/'.$heppa['id'].'/img/create') }}">
  <img src="{{ asset('img/img_icon.png') }}" alt="" /></a></td>
      <td><img src="{{ asset('img/text_icon.png') }}" alt="" /></td>
      <td><img src="{{ asset('img/merit_icon.png') }}" alt="" /></td>
    </tr>
    @endforeach
  </table>

</div>

<div class="tabc" id="sh">

  <table>
    <tr><th>ID</th><th>Hevonen</th><th>Skp</th><th>Isä</th><th>Emä</th>
      <th>Suvun pituus</th><th colspan="4">Muokkaa</th></tr>

    @foreach ($sh as $heppa)
    <tr>
      <td>{{ $heppa['id'] }}</td>
      <td><a href="{{ url('hevoset/'.$heppa['lempinimi']) }}">{{ $heppa['nimi'] }}</a></td>
      <td>{{ $heppa['skp'] }}</td>
      <td>{{ $heppa['isa'] }}</td>
      <td>{{ $heppa['ema'] }}</td>
      <td>{{ $heppa['suku'] }}</td>
      <td><a href="{{ url('hevoset/'.$heppa['id'].'/edit') }}">
  <img src="{{ asset('img/edit_icon.png') }}" alt="" /></a></td>
      <td><a href="{{ url('hevoset/'.$heppa['id'].'/img/create') }}">
  <img src="{{ asset('img/img_icon.png') }}" alt="" /></a></td>
      <td><img src="{{ asset('img/text_icon.png') }}" alt="" /></td>
      <td><img src="{{ asset('img/merit_icon.png') }}" alt="" /></td>
    </tr>
    @endforeach
  </table>

</div>

<div class="tabc" id="muut">

  <table>
    <tr><th>ID</th><th>Hevonen</th><th>Skp</th><th>Rotu</th>
      <th colspan="2">Muokkaa</th></tr>

    @foreach ($others as $heppa)
    <tr>
      <td>{{ $heppa['id'] }}</td>
      <td><a href="{{ url('hevoset/'.$heppa['lempinimi']) }}">{{ $heppa['nimi'] }}</a></td>
      <td>{{ $heppa['skp'] }}</td>
      <td>{{ $heppa['rotu'] }}</td>
      <td><a href="{{ url('hevoset/'.$heppa['id'].'/edit') }}">
  <img src="{{ asset('img/edit_icon.png') }}" alt="" /></a></td>
      <td><img src="{{ asset('img/merit_icon.png') }}" alt="" /></td>
    </tr>
    @endforeach
  </table>

</div>

<div class="tabc" id="evm">

  <table>
    <tr><th>ID</th><th>Hevonen</th><th>Skp</th><th>Rotu</th>
      <th>Muokkaa</th></tr>

    @foreach ($evm as $heppa)
    <tr>
      <td>{{ $heppa['id'] }}</td>
      <td><a href="{{ url('hevoset/'.$heppa['lempinimi']) }}">{{ $heppa['nimi'] }}</a></td>
      <td>{{ $heppa['skp'] }}</td>
      <td>{{ $heppa['rotu'] }}</td>
      <td><a href="{{ url('hevoset/'.$heppa['id'].'/edit') }}">
  <img src="{{ asset('img/edit_icon.png') }}" alt="" /></a></td>
    </tr>
    @endforeach
  </table>

</div>

</div>
@stop

@section('footer')
<script>
//Tabs
$(document).ready(function() {
  $('#tabs li a:not(:first)').addClass('inactive');
  $('.tabc').hide();
  $('.tabc:first').show();

  $('#tabs li a').click(function(){
      var t = $(this).attr('href');
      if($(this).hasClass('inactive')){ //this is the start of our condition
        $('#tabs li a').addClass('inactive');
        $(this).removeClass('inactive');

        $('.tabc').hide();
        $(t).fadeIn(300);
      }
  });
});
</script>

@stop
