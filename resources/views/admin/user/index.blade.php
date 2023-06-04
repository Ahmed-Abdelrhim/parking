@extends('frontend.app.master')
@section('main-content')
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <!-- users list start -->
                <section class="app-user-list">
                    <div class="row">
                        <div class="col-lg-3 col-sm-6">
                            <div class="card">
                                <div class="card-body d-flex align-items-center justify-content-between">
                                    <div>
                                        <h3 class="fw-bolder mb-75">21,459</h3>
                                        <span>Total Users</span>
                                    </div>
                                    <div class="avatar bg-light-primary p-50">
                                        <span class="avatar-content">
                                            <i data-feather="user" class="font-medium-4"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="card">
                                <div class="card-body d-flex align-items-center justify-content-between">
                                    <div>
                                        <h3 class="fw-bolder mb-75">4,567</h3>
                                        <span>Paid Users</span>
                                    </div>
                                    <div class="avatar bg-light-danger p-50">
                                        <span class="avatar-content">
                                            <i data-feather="user-plus" class="font-medium-4"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="card">
                                <div class="card-body d-flex align-items-center justify-content-between">
                                    <div>
                                        <h3 class="fw-bolder mb-75">19,860</h3>
                                        <span>Active Users</span>
                                    </div>
                                    <div class="avatar bg-light-success p-50">
                                        <span class="avatar-content">
                                            <i data-feather="user-check" class="font-medium-4"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="card">
                                <div class="card-body d-flex align-items-center justify-content-between">
                                    <div>
                                        <h3 class="fw-bolder mb-75">237</h3>
                                        <span>Pending Users</span>
                                    </div>
                                    <div class="avatar bg-light-warning p-50">
                                        <span class="avatar-content">
                                            <i data-feather="user-x" class="font-medium-4"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Ajax Sourced Server-side -->
                    <section id="ajax-datatable">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header border-bottom">
                                        <h4 class="card-title">Users Data</h4>
                                    </div>
                                    <div class="card-datatable">
                                        <table class="datatables-ajax table table-responsive" id="users_table" data-url="{{route('admin.users.data')}}">
                                            <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <!--/ Ajax Sourced Server-side -->


                </section>
                <!-- users list ends -->

            </div>
        </div>
    </div>
    <!-- END: Content-->
@endsection

@section('scripts')

    <script src="{{ asset('assets/modules/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/modules/js/jquery.dataTables.min.js') }}" defer></script>


    <script>
     $(window).on('load', function() {
        var table = $('#users_table').DataTable({
        processing : true,
        serverSide : true,
        ajax : {
        url : $('#users_table').attr('data-url'),
        },
        columns : [
        {data : 'id', name : 'id'},
        {data : 'name', name : 'name'},
        {data : 'email', name : 'email'},
        {data : 'action', name : 'action'},
        ],
        "ordering" : true,
        });
    });
    </script>
@endsection
