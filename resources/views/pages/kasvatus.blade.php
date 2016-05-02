@extends('master')

@section('content')
<h1>Kasvatus</h1>


<ul id="tabs">
  <li><span class="new">Kuluvan vuoden kasvatit</span></li>
  <li><span class="old">Vanhemmat kasvatit</span></li>
</ul>

<div class="tabc" id="new">
  <table>
    <tr><th colspan="5">Hannover - {{ count($new_hann) }}kpl</th></tr>

    @foreach($new_hann as $horse)
    <tr>
      <td>{{ $horse['skp'][0] }}. <a href="{{ $horse['osoite'] }}">{{ $horse['nimi'] }}</a></td>
      <td>s. {{ $horse['syntaika'] }}</td>
      <td>i. <a href="{{ $horse['isa_o'] }}">{{ $horse['isa'] }}</a></td>
      <td>e. <a href="{{ $horse['ema_o'] }}">{{ $horse['ema'] }}</a></td>
      <td>om. <a href="{{ $horse['omistaja_o'] }}">{{ $horse['omistaja'] }}</a></td>
    </tr>
    @endforeach
  </table>

  <table>
    <tr><th colspan="5">Holstein  - {{ count($new_hol) }}kpl</th></tr>

    @foreach($new_hol as $horse)
    <tr>
      <td>{{ $horse['skp'][0] }}. <a href="{{ $horse['osoite'] }}">{{ $horse['nimi'] }}</a></td>
      <td>s. {{ $horse['syntaika'] }}</td>
      <td>i. <a href="{{ $horse['isa_o'] }}">{{ $horse['isa'] }}</a></td>
      <td>e. <a href="{{ $horse['ema_o'] }}">{{ $horse['ema'] }}</a></td>
      <td>om. <a href="{{ $horse['omistaja_o'] }}">{{ $horse['omistaja'] }}</a></td>
    </tr>
    @endforeach
  </table>

  <table>
    <tr><th colspan="5">Suomenhevonen  - {{ count($new_sh) }}kpl</th></tr>

    @foreach($new_sh as $horse)
    <tr>
      <td>{{ $horse['skp'][0] }}. <a href="{{ $horse['osoite'] }}">{{ $horse['nimi'] }}</a></td>
      <td>s. {{ $horse['syntaika'] }}</td>
      <td>i. <a href="{{ $horse['isa_o'] }}">{{ $horse['isa'] }}</a></td>
      <td>e. <a href="{{ $horse['ema_o'] }}">{{ $horse['ema'] }}</a></td>
      <td>om. <a href="{{ $horse['omistaja_o'] }}">{{ $horse['omistaja'] }}</a></td>
    </tr>
    @endforeach
  </table>

</div>

<div class="tabc" id="old">
  <table>
    <tr><th colspan="5">Hannover - {{ count($old_hann) }}kpl</th></tr>

    @foreach($old_hann as $horse)
    <tr>
      <td>{{ $horse['skp'][0] }}. <a href="{{ $horse['osoite'] }}">{{ $horse['nimi'] }}</a></td>
      <td>s. {{ $horse['syntaika'] }}</td>
      <td>i. <a href="{{ $horse['isa_o'] }}">{{ $horse['isa'] }}</a></td>
      <td>e. <a href="{{ $horse['ema_o'] }}">{{ $horse['ema'] }}</a></td>
      <td>om. <a href="{{ $horse['omistaja_o'] }}">{{ $horse['omistaja'] }}</a></td>
    </tr>
    @endforeach
  </table>

  <table>
    <tr><th colspan="5">Holstein  - {{ count($old_hol) }}kpl</th></tr>

    @foreach($old_hol as $horse)
    <tr>
      <td>{{ $horse['skp'][0] }}. <a href="{{ $horse['osoite'] }}">{{ $horse['nimi'] }}</a></td>
      <td>s. {{ $horse['syntaika'] }}</td>
      <td>i. <a href="{{ $horse['isa_o'] }}">{{ $horse['isa'] }}</a></td>
      <td>e. <a href="{{ $horse['ema_o'] }}">{{ $horse['ema'] }}</a></td>
      <td>om. <a href="{{ $horse['omistaja_o'] }}">{{ $horse['omistaja'] }}</a></td>
    </tr>
    @endforeach
  </table>

  <table>
    <tr><th colspan="5">Muut  - {{ count($old_other) }}kpl</th></tr>

    @foreach($old_other as $horse)
    <tr>
      <td>{{ $horse['skp'][0] }}. <a href="{{ $horse['osoite'] }}">{{ $horse['nimi'] }}</a></td>
      <td>s. {{ $horse['syntaika'] }}</td>
      <td>i. <a href="{{ $horse['isa_o'] }}">{{ $horse['isa'] }}</a></td>
      <td>e. <a href="{{ $horse['ema_o'] }}">{{ $horse['ema'] }}</a></td>
      <td>om. <a href="{{ $horse['omistaja_o'] }}">{{ $horse['omistaja'] }}</a></td>
    </tr>
    @endforeach
  </table>

</div>

@stop

@section('footer')
<script>
//Tabs
$(document).ready(function() {
  $('#tabs li span:not(:first)').addClass('inactive');
  $('.tabc').hide();
  $('.tabc:first').show();

  $('#tabs li span').click(function(){
      var t = $(this).attr('class').replace(" inactive", "");
      console.log(t);
      if($(this).hasClass('inactive')){ //this is the start of our condition
        $('#tabs li span').addClass('inactive');
        $(this).removeClass('inactive');

        $('.tabc').hide();
        $('#' + t).fadeIn(300);
      }
  });
});
</script>

@stop
