<div class="form-group">
    <label for="{{ $field_name }}" class="col-form-label">{{ $field_title }}</label>
    <select id="{{ $field_name }}" name="{{ strtolower(class_basename($object)) }}[{{ $field_name }}]" class="form-control select2 @error(strtolower(class_basename($object)) . '.' . $field_name) is-invalid @enderror"
            required>
        @foreach($list as $field_id => $field_value)
            <option value="{{ $field_id }}" @if($field_id == old(strtolower(class_basename($object)) . '.' . $field_name, $object->{$field_name})) selected="selected" @endif>{{ $field_value }}</option>
        @endforeach
    </select>
</div>
