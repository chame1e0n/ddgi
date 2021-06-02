<div class="form-group">
    <label for="{{ $field_name }}" class="col-form-label">{{ $field_title }}</label>
    <select id="{{ $field_name }}" name="{{ strtolower(class_basename($object)) }}[{{ $field_name }}]" class="form-control select2 @error(strtolower(class_basename($object)) . '.' . $field_name) is-invalid @enderror"
            required>
        @foreach($list as $list_item)
            <option value="{{$list_item->id}}" @if($list_item->id == old(strtolower(class_basename($object)) . '.' . $field_name, $object->{$field_name})) selected="selected" @endif>{{ $list_item->name }}</option>
        @endforeach
    </select>
</div>
