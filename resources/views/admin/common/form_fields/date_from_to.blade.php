<div class="form-group">
    <label for="{{ $field_from }}" class="col-form-label">{{ $field_title }}</label>
    <div class="card-flex" style="display: flex;">
        <input
            style="width: 50%;"
            type="date"
            id="{{ $field_from }}"
            class="form-control @error(strtolower(class_basename($object)) . '.' . $field_from) is-invalid @enderror"
            name="{{ strtolower(class_basename($object)) }}[{{ $field_from }}]"
            required
            value="{{ old(strtolower(class_basename($object)) . '.' . $field_from, $object->{$field_from}) }}"
        >
        <input
            style="width: 50%;"
            type="date"
            id="{{ $field_to }}"
            class="form-control @error(strtolower(class_basename($object)) . '.' . $field_to) is-invalid @enderror"
            name="{{ strtolower(class_basename($object)) }}[{{ $field_to }}]"
            required
            value="{{ old(strtolower(class_basename($object)) . '.' . $field_to, $object->{$field_to}) }}"
        >
    </div>
</div>
