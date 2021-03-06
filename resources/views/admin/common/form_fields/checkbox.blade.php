<div class="form-group">
    <label for="{{ $field_name }}" class="col-form-label">{{ $field_title }}</label>
    <input
        type="checkbox"
        id="{{ $field_name }}"
        class="form-control @error(strtolower(class_basename($object)) . '.' . $field_name) is-invalid @enderror"
        name="{{ strtolower(class_basename($object)) }}[{{ $field_name }}]"
        required
        @if (old(strtolower(class_basename($object)) . '.' . $field_name, $object->{$field_name}))
            checked="checked"
        @endif
    >
</div>
