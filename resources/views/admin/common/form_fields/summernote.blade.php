<div class="form-group">
    <label for="{{ $field_name }}" class="col-form-label">{{ $field_title }}</label>
    <textarea
        id="{{ $field_name }}"
        class="summernote form-control @error(strtolower(class_basename($object)) . '.' . $field_name) is-invalid @enderror"
        name="{{ strtolower(class_basename($object)) }}[{{ $field_name }}]"
        required
    >{{ old(strtolower(class_basename($object)) . '.' . $field_name, $object->{$field_name}) }}</textarea>
</div>
