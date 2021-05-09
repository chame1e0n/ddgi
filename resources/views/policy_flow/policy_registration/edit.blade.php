@extends('layouts.index')
@php $currentFileName = 'Регистрация полисов' @endphp
@include('policy_flow.edit')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                @include('layouts._success_or_error')
            </div>
        </div>

        <div class="content">
            <div class="container-fluid">
                <form method="post" id="polis-registration-form" action="{{ route('policy_registration.update', $policy->id) }}"
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
    <!-- /.content -->
@endsection