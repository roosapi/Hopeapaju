@extends('horsemaster')

@section('content')

@if ($horse->status == 'kuollut')
 <h4>&#10013; muistoissa &#10013;</h4>
@endif
<h1 class="h_name">{{ $horse->nimi }}</h1>
@if (!empty($merits[0]))
  <h4>
  @foreach($merits as $merit)
    {{ $merit['saavutus'] }}
  @endforeach
  </h4>
@endif
<div class="popup-gallery">
  @foreach($images as $image)
  <a class="fancybox" href="{{ $image['kuva_url'] }}" rel="group" title="&copy; {{ $image['kuvaaja'] }}
  -- {{ $image['kuvaaja_url'] }} -- {{ $image['lisatiedot'] }}">
    <img src="{{ $image['thumb'] }}" alt="" class="gallery" /></a>
  @endforeach
</div>

<table class="info">
  <tr>
  <th>Nimi</th><td>{{ $horse->nimi }}</td>
  <th>Omistaja</th><td>{{ $horse->omistaja }}</td>
  </tr>
  <tr>
  <th>Rotu &amp; sukupuoli</th><td>{{ $horse->rotu }}, {{ $horse->skp }}</td>
  <th>Kasvattaja</th><td><a href="{{ $horse->kasvattaja_url }}">{{ $horse->kasvattaja }}</a></td>
  </tr>
  <tr>
  <th>Syntymäaika &amp; ikä</th><td>{{ $age['dob'] }}, {{ $age['age'] }}v</td>
  <th>Painotuslaji (taso)</th><td>{{ $horse->painotus }}ratsastus (
    @if (count($competitions) < 1) {{ $points['levelname'] }}
    @else  {{ $level }}
    @endif)</td>
  </tr>
  <tr>
  <th>Väri &amp; säkäkorkeus</th><td>{{ $horse->vari }}, {{ $horse->saka }}cm</td>
  <th>Rekisterinumero</th><td><a href="http://www.virtuaalihevoset.net/?hevoset/hevosrekisteri/hevonen.html?vh={{ $horse->vh_tunnus }}/">{{ $horse->vh_tunnus }}</a></td>
  </tr>
</table>
<p class="sim">virtuaalihevonen - a sim-game horse</p>

<p>{!! str_replace('\n', '</p><p>', $horse->luonne) !!}</p>

  <ul id="tabs">
    <li><span class="suku">Sukutaulu</span></li>
    <li><span class="kilpailut">Kilpailutiedot</span></li>
    <li><span class="varsat">Jälkeläiset</span></li>
  </ul>


  <div class="tabc" id="suku">
    <table class="s">

      @foreach ($pedstuff['pedigree'] as $prefix => $relative)
      @if (strlen($prefix) <= min(3, max(2, $pedstuff['length'])) )
        @if (strlen($prefix) == 1 || substr($prefix, -1) == 'e')
        <tr>
        @endif
        @if (strlen($prefix) == min(3,  min(3, max(2, $pedstuff['length']))))
          <td>
        @else
          <td rowspan="{{ pow(2, min(3, max(2, $pedstuff['length'])) - strlen($prefix)) }}">
        @endif
          {{ $prefix }}.
          @if ($relative['evm'])
            {{ $relative['nimi'] }} <small><b>EVM</b></small>
          @else
            <a href="{{ $relative['osoite'] }}">{{ $relative['nimi'] }}</a>
          @endif
          @if (strlen($prefix) > 2)
          @if ($relative['saav'])
            <small> { {{ $relative['saav'] }} }</small>
          @endif
          @else
          <br /><small>{{ $relative['vari'] }} {{ $relative['rotu'] }}{{ $relative['skp'] }}
            @if ($relative['saka'])
              {{ $relative['saka'] }}cm
            @endif
            @if ($relative['saav'])
              <br />{ {{ $relative['saav'] }} }
            @endif
          </small>
          @endif
        </td>
        @if (strlen($prefix) == min(3, max(2, $pedstuff['length'])))
          </tr>
        @endif
      @endif
      @endforeach
    </table>

  </div>

  <div class="tabc" id="kilpailut">

    @if ($points['level'] >= 0)

    <div class="fs-grid">
      <div class="fs-row">
        <div class="fs-cell fs-sm-3 fs-md-6 fs-lg-12">
        <h3>KRJ - kouluratsastus</h3>
        <p class="barlabel">Koulutustaso: {{ $points['levelname'] }} ({{ $points['level'] }})</p>
        <div class="bar">
          <div class="prog" style="width:{{ min(100, 100*($points['level'] / max(1, $points['maxlevel']))) }}%">
            taso {{ $points['level'] }}/{{ $points['maxlevel'] }}: {{ $points['total'] }}</div>
        </div>
        </div>
      </div>
      <div class="fs-row">
        <div class="fs-cell fs-sm-3 fs-md-3 fs-lg-6">
          <p class="barlabel">Hyppykapasiteetti ja rohkeus</p>
          <div class="bar">
            <div class="prog" style="width:{{ min(100, 100*($points['h_r'] / 4000)) }}%">{{ $points['h_r'] }}</div>
          </div>
        </div>
        <div class="fs-cell fs-sm-3 fs-md-3 fs-lg-6">
          <p class="barlabel">Nopeus ja kestävyys</p>
          <div class="bar">
            <div class="prog" style="width:{{ min(100, 100*($points['n_k'] / 4000)) }}%">{{ $points['n_k'] }}</div>
          </div>
        </div>
      </div>
      <div class="fs-row">
        <div class="fs-cell fs-sm-3 fs-md-3 fs-lg-6">
          <p class="barlabel">Kuuliaisuus ja luonne</p>
          <div class="bar">
            <div class="prog" style="width:{{ min(100, 100*($points['k_l'] / 4000)) }}%">{{ $points['k_l'] }}</div>
          </div>
        </div>
        <div class="fs-cell fs-sm-3 fs-md-3 fs-lg-6">
          <p class="barlabel">Tahti ja irtonaisuus</p>
          <div class="bar">
            <div class="prog" style="width:{{ min(100, 100*($points['t_i'] / 4000)) }}%">{{ $points['t_i'] }}</div>
          </div>
        </div>
      </div>
      <div class="fs-row">
        <div class="fs-cell fs-sm-3 fs-md-3 fs-lg-6">
          <p class="barlabel">Tarkkuus ja ketteryys</p>
          <div class="bar">
            <div class="prog" style="width:{{ min(100, 100*($points['t_k'] / 4000)) }}%">{{ $points['t_k'] }}</div>
          </div>
        </div>
        <div class="fs-cell fs-sm-3 fs-md-3 fs-lg-6">
        </div>
      </div>
    </div>
    @endif

    @if(count($competitions) > 0)
    <table>
      <tr><th colspan="5">KRJ: sijoituksia {{ count($competitions) }}kpl</th></tr>
      @foreach ($competitions as $entry)
      <tr>
        <td>{{ $entry->laji }}</td>
        <td>{{ date('d.m.Y', strtotime($entry->pvm)) }}</td>
        <td>
          @if (!empty($entry->paikka)) {{ $entry->paikka }}
          @else <a href="{{ $entry['kutsu_url'] }}">kutsu</a>
          @endif</td>
        <td>{{$entry->luokka }}</td>
        <td>
          @if ($entry->sija == 1) <u>{{ $entry->sija }}/{{ $entry->osallistujia }}</u>
          @else {{ $entry->sija }}/{{ $entry->osallistujia }}
          @endif
          </td>
      </tr>
      @endforeach
    </table>
    @endif
  </div>

  <div class="tabc" id="varsat">
    <table>
      <tr><th>Sukupuoli</th><th>Nimi</th><th>Syntymäaika</th><th>
        @if ($horse->skp == 'tamma')
          Isä</a>
          @else
          Emä</a>
        @endif</th></tr>
      @foreach ($offspring as $foal)
        <tr><td>{{ $foal['skp'] }}</td>
        <td><a href="{{ $foal['osoite'] }}">{{ $foal['nimi'] }}</a></td>
        <td>{{ date('d.m.Y', strtotime($foal['syntaika'])) }}</td>
        <td>
          @if ($horse->skp == 'tamma')
          i. <a href="{{ $foal['isa']['osoite'] }}">{{ $foal['isa']['nimi'] }}</a>
          @else
          e. <a href="{{ $foal['ema']['osoite'] }}">{{ $foal['ema']['nimi'] }}</a>
          @endif
        </td></tr>
      @endforeach
    </table>
  </div>


@stop
