<option>Select Zone...</option>
@if(!empty($apZones))
  @foreach($apZones as $key => $value)
    <option value="{{ $key }}">{{ $value }}</option>
  @endforeach
@endif
