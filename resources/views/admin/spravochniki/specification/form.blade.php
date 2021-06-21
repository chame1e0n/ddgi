<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Добавить продукт</h3>
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
                            <label for="code" class="col-form-label">Код</label>
                            <input required
                                   class="form-control @error(strtolower(class_basename($object)) . '.code') is-invalid @enderror"
                                   id="code"
                                   name="{{strtolower(class_basename($object))}}[code]"
                                   value="{{old(strtolower(class_basename($object)) . '.code', $object->code)}}" />
                        </div>
                    </div>
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
                            <label for="type_id" class="col-form-label">Класс</label>
                            <select required
                                    class="form-control select2 @error(strtolower(class_basename($object)) . '.type_id') is-invalid @enderror"
                                    id="type_id"
                                    name="{{strtolower(class_basename($object))}}[type_id]">
                            @foreach($types as $id => $value)
                                <option @if($id == old(strtolower(class_basename($object)) . '.type_id', $object->type_id)) selected="selected" @endif
                                        value="{{$id}}">
                                    {{$value}}
                                </option>
                            @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="tarif" class="col-form-label">Тарифная ставка</label>
                            <input required
                                   class="form-control @error(strtolower(class_basename($object)) . '.tarif') is-invalid @enderror"
                                   id="tarif"
                                   name="{{strtolower(class_basename($object))}}[tarif]"
                                   type="number"
                                   value="{{old(strtolower(class_basename($object)) . '.tarif', $object->tarif)}}" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="max_acceptable_amount" class="col-form-label">Максимально допустимая сумма</label>
                            <input required
                                   class="form-control @error(strtolower(class_basename($object)) . '.max_acceptable_amount') is-invalid @enderror"
                                   id="max_acceptable_amount"
                                   name="{{strtolower(class_basename($object))}}[max_acceptable_amount]"
                                   type="number"
                                   value="{{old(strtolower(class_basename($object)) . '.max_acceptable_amount', $object->max_acceptable_amount)}}" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
