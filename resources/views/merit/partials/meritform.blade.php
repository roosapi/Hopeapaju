<table class="forms">
  <tr><td class="label">
  {{ Form::label('hevonen_id', 'hevonen:') }}</td><td>
  {{ Form::number('hevonen_id',  $horseid, ['readonly']) }}
  </td></tr><tr><td class="label">
  {{ Form::label('saavutus', 'saavutus:') }}</td><td>
  {{ Form::text('saavutus', '', ['required']) }}
  </td></tr><tr><td class="label">
  {{ Form::label('tilaisuus', 'tilaisuus:') }}</td><td>
  {{ Form::text('tilaisuus') }}
  </td></tr><tr><td class="label">
  {{ Form::label('pvm', 'pvm:') }}</td><td>
  {{ Form::date('pvm') }}
  </td></tr><tr><td class="label">
  {{ Form::label('url', 'url:') }}</td><td>
  {{ Form::text('url') }}
  </td></tr><tr><td class="label">
  {{ Form::label('info', 'info:') }}</td><td>
  {{ Form::text('info') }}
  </td></tr>
<tr><td colspan="2"><center>{{ Form::submit('Submit') }}</center></td></tr>
</table>
