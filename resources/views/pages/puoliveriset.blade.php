@extends('master')

@section('content')
<h1>Puoliveriset</h1>

<div>
<div class="fs-row">

<ul id="tabs">
  <li><a href="#hann">Hannover</a></li>
  <li><a href="#hols">Holstein</a></li>
</ul>

<div class="tabc  wide" id="hann">
  <h3>Orit - {{count($hann_o)}}kpl</h3>

  <div class="fs-row">

    @foreach ($hann_o as $heppa)
      <div class="h_list fs-cell fs-xs-full fs-sm-half fs-md-third fs-lg-fourth">
        <div class="img_hover">
          <a href="{{ url('hevoset/'.$heppa['lempinimi']) }}">
            <img src="http://www.illuusion.net/hopeapaju/k/h/{{ $heppa['lempinimi'] }}.jpg" class="h_list" />
            <span class="hover_text"><span>-</span></span>
          </a>
        </div>
        <a href="{{ url('hevoset/'.$heppa['lempinimi']) }}">{{ $heppa['nimi'] }}</a><br />
        i. {{ $heppa['isa'] }}<br />e. {{ $heppa['ema'] }}<br />{{ $heppa['suku']}}<br />
      </div>

    @endforeach
  </div>

<h3>Tammat - {{count($hann_t)}}kpl</h3>

<div class="fs-row">

  @foreach ($hann_t as $heppa)
    <div class="h_list fs-cell fs-xs-full fs-sm-half fs-md-third fs-lg-fourth">
      <div class="img_hover">
        <a href="{{ url('hevoset/'.$heppa['lempinimi']) }}">
          <img src="http://www.illuusion.net/hopeapaju/k/h/{{ strtolower($heppa['lempinimi']) }}.jpg" class="h_list" />
          <span class="hover_text"><span>-</span></span>
        </a>
      </div>
      <a href="{{ url('hevoset/'.$heppa['lempinimi']) }}">{{ $heppa['nimi'] }}</a><br />
      i. {{ $heppa['isa'] }}<br />e. {{ $heppa['ema'] }}<br />{{ $heppa['suku'] }}<br />
    </div>

  @endforeach
</div>


</div>
<div class="tabc   wide" id="hols">
  <h3>Orit - {{ count($hol_o) }}kpl</h3>

  <div class="fs-row">

    @foreach ($hol_o as $heppa)
      <div class="h_list fs-cell fs-xs-full fs-sm-half fs-md-third fs-lg-fourth">
        <div class="img_hover">
          <a href="{{ url('hevoset/'.$heppa['lempinimi']) }}">
            <img src="http://www.illuusion.net/hopeapaju/k/h/{{ strtolower($heppa['lempinimi']) }}.jpg" class="h_list" />
            <span class="hover_text"><span>-</span></span>
          </a>
        </div>
        <a href="{{ url('hevoset/'.$heppa['lempinimi']) }}">{{ $heppa['nimi'] }}</a><br />
        i. {{ $heppa['isa'] }}<br />e. {{ $heppa['ema'] }}<br />{{ $heppa['suku'] }}<br />
      </div>

    @endforeach
  </div>

<h3>Tammat - {{ count($hol_t) }}kpl</h3>

<div class="fs-row">

  @foreach ($hol_t as $heppa)
    <div class="h_list fs-cell fs-xs-full fs-sm-half fs-md-third fs-lg-fourth">
      <div class="img_hover">
        <a href="{{ url('hevoset/'.$heppa['lempinimi']) }}">
          <img src="http://www.illuusion.net/hopeapaju/k/h/{{ strtolower($heppa['lempinimi']) }}.jpg" class="h_list" />
          <span class="hover_text"><span>-</span></span>
        </a>
      </div>
      <a href="{{ url('hevoset/'.$heppa['lempinimi']) }}">{{ $heppa['nimi'] }}</a><br />
      i. {{ $heppa['isa'] }}<br />e. {{ $heppa['ema'] }}<br />{{ $heppa['suku'] }}<br />
    </div>

  @endforeach
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
