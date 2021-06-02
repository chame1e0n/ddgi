<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Добавить класс</h3>
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
                            <label for="group_id">Группа</label>
                            <select id="group_id" name="type[group_id]" class="form-control select2"
                                    style="margin-top: 6px;"
                                    required>
                                @foreach($groups as $group)
                                    <option value="{{$group->id}}" @if($group->id == old('type.group_id', $object->group_id)) selected="selected" @endif>{{$group->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="code" class="col-form-label">Код</label>
                            <input
                                id="code"
                                class="form-control"
                                name="type[code]"
                                required
                                value="{{ old('type.code', $object->code) }}"
                            >
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="name" class="col-form-label">Наименование</label>
                            <input
                                id="name"
                                class="form-control"
                                name="type[name]"
                                required
                                value="{{ old('type.name', $object->name) }}"
                            >
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="description" class="col-form-label">Описание</label>
                            <textarea
                                id="description"
                                class="form-control"
                                name="type[description]"
                                required
                            >{{ old('type.description', $object->description) }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
