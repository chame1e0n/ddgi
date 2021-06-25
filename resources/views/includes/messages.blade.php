@foreach($errors->default->all() as $error)
    <div class="alert alert-danger " role="alert">
        {{$error}}

        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endforeach

@if(session('success'))
    <div class="alert alert-success" role="alert">
        {{session()->get('success')}}

        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
