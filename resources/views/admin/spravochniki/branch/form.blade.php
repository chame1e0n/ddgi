<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Добавить филиал</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"
                            data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="name" class="col-form-label">Наименование</label>
                            <input required
                                   class="form-control @error(strtolower(class_basename($object)) . '.name') is-invalid @enderror"
                                   id="name"
                                   name="{{strtolower(class_basename($object))}}[name]"
                                   value="{{old(strtolower(class_basename($object)) . '.name', $object->name)}}" />
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="region_id" class="col-form-label">Регион</label>
                            <select required
                                    class="form-control select2 @error(strtolower(class_basename($object)) . '.region_id') is-invalid @enderror"
                                    id="region_id"
                                    name="{{strtolower(class_basename($object))}}[region_id]">
                            @foreach($regions as $id => $value)
                                <option @if($id == old(strtolower(class_basename($object)) . '.region_id', $object->region_id)) selected="selected" @endif
                                        value="{{$id}}">
                                    {{$value}}
                                </option>
                            @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="founded_date" class="col-form-label">Дата создания</label>
                            <input required
                                   class="form-control @error(strtolower(class_basename($object)) . '.founded_date') is-invalid @enderror"
                                   id="founded_date"
                                   name="{{strtolower(class_basename($object))}}[founded_date]"
                                   type="date"
                                   value="{{old(strtolower(class_basename($object)) . '.founded_date', $object->founded_date)}}" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="address" class="col-form-label">Адрес</label>
                            <input required
                                   class="form-control @error(strtolower(class_basename($object)) . '.address') is-invalid @enderror"
                                   id="address"
                                   name="{{strtolower(class_basename($object))}}[address]"
                                   value="{{old(strtolower(class_basename($object)) . '.address', $object->address)}}" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="phone_number" class="col-form-label">Телефон</label>
                            <input required
                                   class="form-control @error(strtolower(class_basename($object)) . '.phone_number') is-invalid @enderror"
                                   id="phone_number"
                                   name="{{strtolower(class_basename($object))}}[phone_number]"
                                   value="{{old(strtolower(class_basename($object)) . '.phone_number', $object->phone_number)}}" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
