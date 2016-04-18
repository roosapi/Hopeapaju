<table class="forms">
  <tr><td class="label">
  {{ Form::label('hevonen', 'hevonen:') }}</td><td>
  {{ Form::number('hevonen',  $id, ['readonly']) }}
  </td></tr><tr><td class="label">
  {{ Form::label('thumb', 'thumb:') }}</td><td>
  {{ Form::text('thumb') }}
  </td></tr><tr><td class="label">
  {{ Form::label('kuva_url', 'kuvan osoite:') }}</td><td>
  {{ Form::text('kuva_url') }}
  </td></tr><tr><td class="label">
  {{ Form::label('kuvaaja', 'kuvaaja:') }}</td><td>
  {{ Form::text('kuvaaja') }}
  </td></tr><tr><td class="label">
  {{ Form::label('kuvaaja_url', 'kuvaajan url:') }}</td><td>
  {{ Form::text('kuvaaja_url') }}
  </td></tr><tr><td class="label">
  {{ Form::label('lisatiedot', 'lisatiedot:') }}</td><td>
  {{ Form::text('lisatiedot') }}
  </td></tr>
<tr><td colspan="2"><center>{{ Form::submit('Submit') }}</center></td></tr>
</table>
