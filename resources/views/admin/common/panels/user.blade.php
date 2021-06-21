<div class="card">
    <div class="card-header">
        <h3 class="card-title">Настройки пользователя</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>

    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="email" class="col-form-label">Электронная почта</label>
                    <input required
                           class="form-control @error(strtolower(class_basename($object)) . '.email') is-invalid @enderror"
                           id="email"
                           name="{{strtolower(class_basename($object))}}[email]"
                           type="email"
                           value="{{old(strtolower(class_basename($object)) . '.email', $object->email)}}" />
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="password" class="col-form-label">Пароль</label>
                    <input id="password"
                           class="form-control @error(strtolower(class_basename($object)) . '.password') is-invalid @enderror"
                           name="{{strtolower(class_basename($object))}}[password]"
                           type="password" />
                </div>
            </div>
        </div>
    </div>
</div>
