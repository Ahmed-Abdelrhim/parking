{{--<script src="{{asset('frontend/js/shared/dataTables.bootstrap5.min.js')}}"></script>--}}
{{--<script src="{{asset('frontend/js/shared/datatables.buttons.min.js')}}"></script>--}}
{{--<script src="{{asset('frontend/js/shared/dataTables.responsive.min.js')}}"></script>--}}

@yield('scripts')

<script src="{{asset('frontend/js/shared/moment.min.js')}}"></script>
<script src="{{asset('frontend/js/shared/responsive.bootstrap5.min.js')}}"></script>
<script src="{{asset('frontend/js/shared/toastr.min.js')}}"></script>
<script src="{{asset('frontend/js/shared/vendors.min.js')}}"></script>

<!-- BEGIN: Theme JS-->
<script src="{{asset('frontend/js/shared/app-menu.min.js')}}"></script>
<script src="{{asset('frontend/js/shared/app.min.js')}}"></script>
<!-- END: Theme JS-->

<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"
        integrity="sha512-fD9DI5bZwQxOi7MhYWnnNPlvXdp/2Pj3XSTRrFs5FQa4mizyGLnJcN6tuvUS6LbmgN1ut+XGSABKvjN0H6Aoow==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<script>
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        })
</script>

<script src="{{ asset('assets/modules/js/iziToast.min.js') }}"></script>
<script>
    @if(Session::has('message'))
        var type = "{{ Session::get('alert-type','info') }}"
    switch (type) {
        case 'info':
            iziToast.info({
                title: 'info',
                message: '{{ session('message') }}',
                position: 'topRight'
            });
            break;

        case 'success':
            iziToast.success({
                title: 'Success',
                message: '{{ session('message') }}',
                position: 'topRight'
            });
            break;

        case 'warning':
            iziToast.warning({
                title: 'warning',
                message: '{{ session('message') }}',
                position: 'topRight'
            });
            break;

        case 'error':
            iziToast.error({
                title: 'error',
                message: '{{ session('message') }}',
                position: 'topRight'
            });
            break;
    }
    @endif
</script>

