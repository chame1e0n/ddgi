<div class="form-group">
    <label for="{{ $field_name }}" class="col-form-label">{{ $field_title }}</label>
    <div class="input-group">
        <div class="custom-file">
            <input name="{{ strtolower(class_basename($object)) }}[{{ $field_name }}]"
                   type="file"
                   value="{{ old(strtolower(class_basename($object)) . '.' . $field_name, $object->{$field_name}) }}"
                   class="form-control custom-file-input @error(strtolower(class_basename($object)) . '.' . $field_name) is-invalid @enderror"
                   id="{{ $field_name }}">
            <label class="custom-file-label" for="{{ $field_name }}">Выберите файл</label>
        </div>
    </div>
</div>
