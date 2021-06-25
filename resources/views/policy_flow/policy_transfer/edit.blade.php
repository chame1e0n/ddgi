@extends('layouts.index')
@include('policy_flow._form_elements._from_whom.edit')
@include('policy_flow._form_elements._director_manager_agent.edit')
@php $currentFileName = 'Распределение полисов' @endphp
@include('policy_flow.edit')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                @include('includes.messages')
                @if(auth()->user()->id == $policy->to_user_id && $policy->status == 'pending_transfer')
                    <div class="alert alert-default-primary">
                        <form method="post" action="{{route('policy_transfer.confirm', $policy->id)}}">
                            @csrf
                            <p>Подтвердить распределение?</p>
                            <div class="icheck-success ">
                                <input name="confirmation"
                                       class="form-check-input client-type-radio"
                                       checked type="radio" id="yes" value="yes">
                                <label class="form-check-label" for="yes">Да</label>
                            </div>
                            <div class="icheck-success ">
                                <input class="form-check-input client-type-radio" value="no" type="radio" name="confirmation" id="no">
                                <label class="form-check-label" for="no">Нет</label>
                            </div>
                            <button type="submit" id="submit-button" class="btn btn-primary">Отправить</button>
                        </form>
                    </div>
                @endif
            </div>
        </div>

        <div class="content">
            <div class="container-fluid">
                <form method="post" id="polis-registration-form" action="{{ route('policy_transfer.update', $policy->id) }}"
                      enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    @yield('form_content')
                </form>
            </div>
        </div>
    </div>
    <!-- /.content -->
@endsection

@section('scripts')
    <script>
        let fromNumber = 0;
        let toNumber = 0;

        function countBlanks(type, value) {
            if (type) {
                fromNumber = value;
            } else {
                toNumber = value;
            }

            if(fromNumber > 0 && toNumber > 0) {
                let blanksInput = document.getElementById('countBlanksInput');
                blanksInput.value = (toNumber - fromNumber) + 1;
            }
        }
    </script>
    @yield('form_scripts')
    <!-- /.content -->
@endsection
