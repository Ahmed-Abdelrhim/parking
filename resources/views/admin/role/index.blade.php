@extends('frontend.app.master')
@section('styles')
    <link href="{{asset('frontend/css/shared/dataTables.bootstrap5.min.css')}}" rel="stylesheet">
@endsection

@section('main-content')
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-start mb-0">Roles</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">Role</a>
                                    </li>
                                    <li class="breadcrumb-item active">Index
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-header-right text-md-end col-md-3 col-12 d-md-block d-none">
                    <div class="mb-1 breadcrumb-right">
                        <div class="dropdown">
                            <button class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle" type="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                                    data-feather="grid"></i></button>
                            <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item"
                                                                            href="app-todo.html"><i class="me-1"
                                                                                                    data-feather="check-square"></i><span
                                        class="align-middle">Todo</span></a><a class="dropdown-item"
                                                                               href="app-chat.html"><i class="me-1"
                                                                                                       data-feather="message-square"></i><span
                                        class="align-middle">Chat</span></a><a class="dropdown-item"
                                                                               href="app-email.html"><i class="me-1"
                                                                                                        data-feather="mail"></i><span
                                        class="align-middle">Email</span></a><a class="dropdown-item"
                                                                                href="app-calendar.html"><i class="me-1"
                                                                                                            data-feather="calendar"></i><span
                                        class="align-middle">Calendar</span></a></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Responsive Datatable -->
                <section id="responsive-datatable">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header border-bottom">
                                    <h4 class="card-title">Roles Table</h4>
                                    <a class="btn btn-primary">Create New Role</a>
                                </div>
                                <div class="card-datatable">
                                    <table class="dt-responsive table">
                                        <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if(isset($roles))
                                            @foreach($roles as $counter => $role)
                                                <tr>

                                                    <td>{{$counter +1 }}</td>
                                                    <td>{{$role->name}}</td>
                                                    <td>
                                                        <a href="#" title="edit">
                                                            <i class="fa fa-2x fa-edit mr-2"
                                                               style="color: #7367f0;"></i>
                                                        </a>
                                                        <a href="#" title="delete" style="margin-left: 20px;">
                                                            <i class="fa fa-2x fa-trash" style="color: #f00;"></i>
                                                        </a>

                                                        <a href="{{route('admin.role.show' , encrypt($role->id))}}"
                                                           title="add permissions" style="margin-left: 20px;">
                                                            <i class="fa-light fa-3x fa-plus"
                                                               style="color: #28a745;"></i>
                                                        </a>
                                                    </td>

                                                </tr>
                                            @endforeach
                                        @endif

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!--/ Responsive Datatable -->

            </div>
        </div>
    </div>
    <!-- END: Content-->
@endsection

@section('javascript')
    <script src="{{asset('frontend/js/shared/jquery.dataTables.min.js')}}"></script>
@endsection
