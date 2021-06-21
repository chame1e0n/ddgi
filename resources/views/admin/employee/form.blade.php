<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Добавить сотрудника ({{$title}})</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"
                            data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="name" class="col-form-label">Имя</label>
                            <input required
                                   class="form-control @error(strtolower(class_basename($object)) . '.name') is-invalid @enderror"
                                   id="name"
                                   name="{{strtolower(class_basename($object))}}[name]"
                                   value="{{old(strtolower(class_basename($object)) . '.name', $object->name)}}" />
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="surname" class="col-form-label">Фамилия</label>
                            <input required
                                   class="form-control @error(strtolower(class_basename($object)) . '.surname') is-invalid @enderror"
                                   id="surname"
                                   name="{{strtolower(class_basename($object))}}[surname]"
                                   value="{{old(strtolower(class_basename($object)) . '.surname', $object->surname)}}" />
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="middlename" class="col-form-label">Отчество</label>
                            <input required
                                   class="form-control @error(strtolower(class_basename($object)) . '.middlename') is-invalid @enderror"
                                   id="middlename"
                                   name="{{strtolower(class_basename($object))}}[middlename]"
                                   value="{{old(strtolower(class_basename($object)) . '.middlename', $object->middlename)}}" />
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="branch_id" class="col-form-label">Филиал</label>
                            <select required
                                    class="form-control select2 @error(strtolower(class_basename($object)) . '.branch_id') is-invalid @enderror"
                                    id="branch_id"
                                    name="{{strtolower(class_basename($object))}}[branch_id]">
                            @foreach($branches as $id => $value)
                                <option @if($id == old(strtolower(class_basename($object)) . '.branch_id', $object->branch_id)) selected="selected" @endif
                                        value="{{$id}}">
                                    {{$value}}
                                </option>
                            @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="birthdate" class="col-form-label">Дата рождения</label>
                            <input required
                                   class="form-control @error(strtolower(class_basename($object)) . '.birthdate') is-invalid @enderror"
                                   id="birthdate"
                                   name="{{strtolower(class_basename($object))}}[birthdate]"
                                   type="date"
                                   value="{{old(strtolower(class_basename($object)) . '.birthdate', $object->birthdate)}}" />
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="passport_series" class="col-form-label">Серия паспорта</label>
                            <input required
                                   class="form-control @error(strtolower(class_basename($object)) . '.passport_series') is-invalid @enderror"
                                   id="passport_series"
                                   name="{{strtolower(class_basename($object))}}[passport_series]"
                                   value="{{old(strtolower(class_basename($object)) . '.passport_series', $object->passport_series)}}" />
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="passport_number" class="col-form-label">Номер паспорта</label>
                            <input required
                                   class="form-control @error(strtolower(class_basename($object)) . '.passport_number') is-invalid @enderror"
                                   id="passport_number"
                                   name="{{strtolower(class_basename($object))}}[passport_number]"
                                   value="{{old(strtolower(class_basename($object)) . '.passport_number', $object->passport_number)}}" />
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="work_start_date" class="col-form-label">Период работы</label>
                            <div class="card-flex"
                                 style="display: flex;">
                                <input required
                                       class="form-control @error(strtolower(class_basename($object)) . '.work_start_date') is-invalid @enderror"
                                       id="work_start_date"
                                       name="{{strtolower(class_basename($object))}}[work_start_date]"
                                       style="width: 50%;"
                                       type="date"
                                       value="{{old(strtolower(class_basename($object)) . '.work_start_date', $object->work_start_date)}}" />
                                <input required
                                       class="form-control @error(strtolower(class_basename($object)) . '.work_end_date') is-invalid @enderror"
                                       id="work_end_date"
                                       name="{{strtolower(class_basename($object))}}[work_end_date]"
                                       style="width: 50%;"
                                       type="date"
                                       value="{{old(strtolower(class_basename($object)) . '.work_end_date', $object->work_end_date)}}" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="phone" class="col-form-label">Телефон</label>
                            <input required
                                   class="form-control @error(strtolower(class_basename($object)) . '.phone') is-invalid @enderror"
                                   id="phone"
                                   name="{{strtolower(class_basename($object))}}[phone]"
                                   value="{{old(strtolower(class_basename($object)) . '.phone', $object->phone)}}" />
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="address" class="col-form-label">Адрес</label>
                            <input required
                                   class="form-control @error(strtolower(class_basename($object)) . '.address') is-invalid @enderror"
                                   id="address"
                                   name="{{strtolower(class_basename($object))}}[address]"
                                   value="{{old(strtolower(class_basename($object)) . '.address', $object->address)}}" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('admin.common.panels.user', ['object' => $object->user])
