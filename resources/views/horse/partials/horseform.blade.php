<table class="forms">
  <tr><td class="label">
  {{ Form::label('nimi', 'nimi:') }}</td><td>
  {{ Form::text('nimi', null, ['required']) }}
  </td></tr><tr><td class="label">
  {{ Form::label('osoite', 'osoite:') }}</td><td>
  {{ Form::text('osoite') }}
  </td></tr><tr><td class="label">
  {{ Form::label('lempinimi', 'lempinimi:') }}</td><td>
  {{ Form::text('lempinimi') }}
  </td></tr><tr><td class="label">
  {{ Form::label('vh_tunnus', 'vh-tunnus:') }}</td><td>
  {{ Form::text('vh_tunnus') }}
  </td></tr><tr><td class="label">
  {{ Form::label('rotu', 'rotu:') }}</td><td>
  {{ Form::select('rotu', array(
                                null => 'Select...',
                                'arabialainen täysiverinen' => 'arabialainen täysiverinen',
                                'englantilainen täysiverinen' => 'englantilainen täysiverinen',
                                'hannover' => 'hannover',
                                'holstein' => 'holstein',
                                'suomalainen puoliverinen' => 'suomalainen puoliverinen',
                                'suomenhevonen' => 'suomenhevonen')
                          , null, ['required']) }}
  </td></tr><tr><td class="label">
  {{ Form::label('skp', 'skp:') }}</td><td>
  {{ Form::select('skp', array(null => 'Select...',
                                'ori' => 'ori',
                                'tamma' => 'tamma')
                          , null, ['required']) }}
  </td></tr><tr><td class="label">
  {{ Form::label('syntaika', 'syntaika:') }}</td><td>
  {{ Form::date('syntaika') }}
  </td></tr><tr><td class="label">
  {{ Form::label('vari', 'vari:') }}</td><td>
  {{ Form::text('vari') }}
  </td></tr><tr><td class="label">
  {{ Form::label('saka', 'saka:') }}</td><td>
  {{ Form::number('saka') }}
  </td></tr><tr><td class="label">
  {{ Form::label('omistaja', 'omistaja:') }}</td><td>
  {{ Form::text('omistaja') }}
  </td></tr><tr><td class="label">
  {{ Form::label('kasvattaja', 'kasvattaja:') }}</td><td>
  {{ Form::text('kasvattaja') }}
  </td></tr><tr><td class="label">
  {{ Form::label('kasvattaja_url', 'kasvattaja_url:') }}</td><td>
  {{ Form::text('kasvattaja_url') }}
  </td></tr><tr><td class="label">
  {{ Form::label('painotus', 'painotus:') }}</td><td>
  {{ Form::select('painotus', array(null => 'Select..',
                                  'koulu' => 'kouluratsastus',
                                  'este' => 'esteratsastus',
                                  'kentta' => 'kenttaratsastus')) }}
  </td></tr><tr><td class="label">
  {{ Form::label('koulutustaso', 'koulutustaso (ko.re.ke):') }}</td><td>
  {{ Form::text('koulutustaso') }}
  </td></tr><tr><td class="label">
  {{ Form::label('nayttelyt', 'nayttelyt:') }}</td><td>
  {{ Form::radio('nayttelyt', '1') }} Kyllä    {{ Form::radio('nayttelyt', '0', true) }} Ei<br />
  </td></tr><tr><td class="label">
  {{ Form::label('luonne', 'luonne:') }}</td><td>
  {{ Form::textarea('luonne') }}
  </td></tr><tr><td class="label">
  {{ Form::label('isa', 'isa:') }}</td><td>
  {{ Form::number('isa') }}
  </td></tr><tr><td class="label">
  {{ Form::label('ema', 'ema:') }}</td><td>
  {{ Form::number('ema') }}
  </td></tr><tr><td class="label">
  {{ Form::label('suku', 'suku:') }}</td><td>
  {{ Form::number('suku') }}
  </td></tr><tr><td class="label">
  {{ Form::label('evm', 'evm:') }}</td><td>
  {{ Form::radio('evm', '1', false, ['required']) }} Kyllä    {{ Form::radio('evm', '0') }} Ei<br />
  </td></tr><tr><td class="label">
  {{ Form::label('status', 'status:') }}</td><td>
  {{ Form::select('status', array('' => 'Select..',
                                  'ok' => 'ok',
                                  'myynti' => 'myynnissä',
                                  'kuollut' => 'kuollut')) }}
  </td></tr><tr><td class="label">
  {{ Form::label('talli', 'talli:') }}</td><td>
  {{ Form::select('talli', array('' => 'Select..',
                                 'hopeapaju' => 'Hopeapaju',
                                 'muu' => 'Muu')) }}
</td></tr>
<tr><td colspan="2"><center>{{ Form::submit('Submit') }}</center></td></tr>
</table>
