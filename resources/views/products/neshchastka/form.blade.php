@extends('layouts.index')

@include('includes.contract')

@section('content')
    <form action="{{route('mejd.' . ($contract->exists ? 'update' : 'store'), $contract->id)}}"
          enctype="multipart/form-data"
          id="form-contract"
          method="POST">
        @csrf

        @if($contract->exists)
            @method('PUT')
        @endif

        <fieldset @if($block) disabled="disabled" @endif>
            <div class="content-wrapper">
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6"></div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="/">Главная</a></li>
                                    <li class="breadcrumb-item active"><a href="/form">Анкеты</a></li>
                                    <li class="breadcrumb-item active">Создать Анкету</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>

                <section class="content">
                    @include('includes.messages')

                    @yield('includes.contract.block.1')

                    @include('includes.client')

                    @include('includes.insured_person')

                    @yield('includes.contract.block.2')

                    @include('includes.policy_in_section')

                    @yield('includes.contract.block.3')

                    @yield('includes.contract.block.4')

                    @yield('includes.contract.block.5')
                </section>

                @if(!$block)
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary float-right" id="form-save-button">
                            {{$contract->exists ? 'Изменить' : 'Добавить'}}
                        </button>
                    </div>
                @endif
            </div>
        </fieldset>
    </form>
@endsection
