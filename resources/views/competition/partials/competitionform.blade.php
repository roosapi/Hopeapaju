<table class="forms">
  <tr><td class="label">
  {{ Form::label('hevonen_id', 'hevonen:') }}</td><td>
  {{ Form::number('hevonen_id',  $horseid, ['readonly']) }}
  </td></tr><tr><td class="label">
  {{ Form::label('laji', 'laji:') }}</td><td>
  {{ Form::select('laji', array(
                                null => 'Select...',
                                'KRJ' => 'KRJ',
                                'ERJ' => 'ERJ')
                          , null, ['required']) }}
  </td></tr><tr><td class="label">
  {{ Form::label('kisat', 'kisat:') }}</td><td>
  {{ Form::textarea('kisat') }}
  </td></tr>
<tr><td colspan="2"><center>{{ Form::submit('Submit') }}</center></td></tr>
</table>
