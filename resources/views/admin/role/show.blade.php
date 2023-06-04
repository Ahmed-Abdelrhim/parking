@extends('frontend.app.master')
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
                                    <li class="breadcrumb-item"><a href="{{route('admin.role.index')}}">Role</a>
                                    </li>
                                    <li class="breadcrumb-item active">Permissions
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
                            <form method="post" action="{{ route('admin.role.save.permissions' , $role )}}">
                                @csrf
                                <div class="card">
                                    <div class="card-header border-bottom">
                                        <h4 class="card-title">{{$role->name}} "Permissions" </h4>
                                        {{-- <a class="btn btn-primary">Create New Role</a>  --}}
                                    </div>
                                    <div class="card-datatable">
                                        <table class="dt-responsive table">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Role</th>
                                                <th>Role_Create</th>
                                                <th>Role_Edit</th>
                                                <th>Role_Delete</th>
                                                <th>Role_Show</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            <?php if (count($permissionList)) {
                                            foreach ($permissionList as $permission) { ?>
                                            <tr>
                                                <td data-title="{{ __('#') }}">
                                                    <input type="checkbox" id="<?=$permission->name?>"
                                                           style="width: 15px ; height: 15px;"
                                                           name="<?=$permission->name?>" value="<?=$permission->id?>"
                                                           <?= isset($permissions[$permission->id]) ? 'checked' : '' ?> onclick="processCheck(this);"
                                                           class="mainmodule"/>
                                                </td>
                                                <td data-title="{{ __('Module Name') }}">
                                                        <?= ucfirst($permission->name) ?>
                                                </td>
                                                <td data-title="{{ __('Create') }}">
                                                        <?php
                                                        $permissionCreate = $permission->name . '_create';
                                                    if (isset($permissionArray[$permissionCreate])) { ?>
                                                    <input type="checkbox" id="<?=$permissionCreate?>"
                                                           style="width: 15px ; height: 15px;"
                                                           name="<?=$permissionCreate?>"
                                                           value="<?=$permissionArray[$permissionCreate]?>" <?= isset($permissions[$permissionArray[$permissionCreate]]) ? 'checked' : '' ?> />
                                                    <?php } else {
                                                        echo "&nbsp;";
                                                    } ?>
                                                </td>
                                                <td data-title="{{ __('Edit') }}">
                                                        <?php
                                                        $permissionEdit = $permission->name . '_edit';
                                                    if (isset($permissionArray[$permissionEdit])) { ?>
                                                    <input type="checkbox" id="<?=$permissionEdit?>"
                                                           name="<?=$permissionEdit?>"
                                                           style="width: 15px ; height: 15px;"
                                                           value="<?=$permissionArray[$permissionEdit]?>" <?= isset($permissions[$permissionArray[$permissionEdit]]) ? 'checked' : '' ?> />
                                                    <?php } else {
                                                        echo "&nbsp;";
                                                    } ?>
                                                </td>
                                                <td data-title="{{ __('Delete') }}">
                                                        <?php
                                                        $permissionDelete = $permission->name . '_delete';
                                                    if (isset($permissionArray[$permissionDelete])) { ?>
                                                    <input type="checkbox" id="<?=$permissionDelete?>"
                                                           style="width: 15px ; height: 15px;"
                                                           name="<?=$permissionDelete?>"
                                                           value="<?=$permissionArray[$permissionDelete]?>" <?= isset($permissions[$permissionArray[$permissionDelete]]) ? 'checked' : '' ?> />
                                                    <?php } else {
                                                        echo "&nbsp;";
                                                    } ?>
                                                </td>
                                                <td data-title="{{ __('Show') }}">
                                                        <?php
                                                        $permissionShow = $permission->name . '_show';
                                                    if (isset($permissionArray[$permissionShow])) { ?>
                                                    <input type="checkbox" id="<?=$permissionShow?>"
                                                           name="<?=$permissionShow?>"
                                                           style="width: 15px ; height: 15px;"
                                                           value="<?=$permissionArray[$permissionShow]?>" <?= isset($permissions[$permissionArray[$permissionShow]]) ? 'checked' : '' ?> />
                                                    <?php } else {
                                                        echo "&nbsp;";
                                                    } ?>
                                                </td>
                                            </tr>
                                            <?php }
                                            } ?>

                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="card-footer">
                                        <button class="btn btn-primary mr-1" type="submit">Submit</button>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </section>
                <!--/ Responsive Datatable -->

            </div>
        </div>
    </div>
    <!-- END: Content-->
@endsection

@section('scripts')
    // Js goes here
    <script>
        $('.mainmodule').each(function () {

            var mainmodule = $(this).attr('id');

            var mainidCreate = mainmodule + "_create";
            var mainidEdit = mainmodule + "_edit";
            var mainidDelete = mainmodule + "_delete";
            var mainidShow = mainmodule + "_show";

            if (!$('#' + mainmodule).is(':checked')) {
                $('#' + mainidCreate).prop('disabled', true);
                $('#' + mainidCreate).prop('checked', false);

                $('#' + mainidEdit).prop('disabled', true);
                $('#' + mainidEdit).prop('checked', false);

                $('#' + mainidDelete).prop('disabled', true);
                $('#' + mainidDelete).prop('checked', false);

                $('#' + mainidShow).prop('disabled', true);
                $('#' + mainidShow).prop('checked', false);
            }
        });

        function processCheck(event) {
            var mainmodule = $(event).attr('id');
            // console.log(mainmodule);

            // console.log($('#' + mainmodule));

            var mainidCreate = mainmodule + "_create";
            var mainidEdit = mainmodule + "_edit";
            var mainidDelete = mainmodule + "_delete";
            var mainidShow = mainmodule + "_show";



            if ($('#' + mainmodule).is(':checked')) {
                $('#' + mainidCreate).prop('disabled', false);
                $('#' + mainidCreate).prop('checked', true);

                $('#' + mainidEdit).prop('disabled', false);
                $('#' + mainidEdit).prop('checked', true);

                $('#' + mainidDelete).prop('disabled', false);
                $('#' + mainidDelete).prop('checked', true);

                $('#' + mainidShow).prop('disabled', false);
                $('#' + mainidShow).prop('checked', true);
            } else {
                $('#' + mainidCreate).prop('disabled', true);
                $('#' + mainidCreate).prop('checked', false);

                $('#' + mainidEdit).prop('disabled', true);
                $('#' + mainidEdit).prop('checked', false);

                $('#' + mainidDelete).prop('disabled', true);
                $('#' + mainidDelete).prop('checked', false);

                $('#' + mainidShow).prop('disabled', true);
                $('#' + mainidShow).prop('checked', false);
            }

            if(mainmodule == 'dashboard') {
                $('#' + mainmodule).prop('disabled', false);
                $('#' + mainmodule).prop('checked', true);
            }
        };


    </script>
@endsection
