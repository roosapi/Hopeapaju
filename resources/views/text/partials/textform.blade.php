<table class="forms">
  <tr><td class="label">
  {{ Form::label('hevonen_id', 'hevonen:') }}</td><td>
  {{ Form::number('hevonen_id',  $horseid, ['readonly']) }}
  </td></tr><tr><td class="label">
  {{ Form::label('pvm', 'pvm:') }}</td><td>
  {{ Form::date('pvm') }}
  </td></tr><tr><td class="label">
  {{ Form::label('otsikko', 'otsikko:') }}</td><td>
  {{ Form::text('otsikko') }}
  </td></tr><tr><td class="label">
  {{ Form::label('kirjoittaja', 'kirjoittaja:') }}</td><td>
  {{ Form::text('kirjoittaja') }}
  </td></tr><tr><td class="label">
  {{ Form::label('teksti', 'teksti:') }}</td><td>
  {{ Form::textarea('teksti') }}
  </td></tr>
<tr><td colspan="2"><center>{{ Form::submit('Submit') }}</center></td></tr>
</table>
