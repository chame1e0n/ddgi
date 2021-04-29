@extends('layouts.index')
@include('spravochniki.request.elements._request_form.edit')
@include('spravochniki.request.elements._request_overview_form.edit')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                @include('layouts._success_or_error')
            </div>
        </div>

        <section class="content">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Запросы</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                                title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    @yield('_request_form_content')
                </div>
            </div>
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Рассмотрение запросов</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                                title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    @yield('_request_overview_form_content')
                </div>
            </div>
        </section>
    </div>
@endsection

@section('scripts')
@yield('_request_form_scripts')
@endsection