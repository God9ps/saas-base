@extends('tenant.dashboard.index')

@section('adicionalCss')

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('admin-panel/app-assets/vendors/css/vendors.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin-panel/app-assets/vendors/css/extensions/toastr.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin-panel/app-assets/vendors/css/extensions/sweetalert2.min.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('admin-panel/app-assets/vendors/css/forms/icheck/icheck.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin-panel/app-assets/vendors/css/forms/icheck/custom.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin-panel/app-assets/vendors/css/forms/toggle/switchery.min.css')}}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('admin-panel/app-assets/css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin-panel/app-assets/css/bootstrap-extended.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin-panel/app-assets/css/colors.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin-panel/app-assets/css/components.css')}}">
    <!-- END: Theme CSS-->

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css"
          href="{{asset('admin-panel/app-assets/css/core/menu/menu-types/horizontal-menu.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{asset('admin-panel/app-assets/css/core/colors/palette-gradient.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin-panel/app-assets/css/plugins/extensions/toastr.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('admin-panel/app-assets/css/plugins/forms/switch.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin-panel/app-assets/css/pages/page-users.css')}}">
    <!-- END: Page CSS-->
@endsection

@section('styles')

@endsection

@section('content')

    <div class="content-body">
        <!-- users list start -->
        <section class="users-list-wrapper">

                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{trans('global.actions')}}</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <!-- Basic context menu starts -->
                            <a class="btn btn-primary mr-1 mb-1 basic-context-menu" type="button" href="{{route('tenant.user.create', ['subdomain' => request()->subdomain])}}">
                                {{trans('cruds.userManagement.create_new_user')}}
                            </a>

                            <!-- /Basic context menu starts -->

                        </div>
                    </div>
                </div>

            <!-- active users and my task timeline cards starts here -->
            <div class="row match-height">
                <!-- active users card -->
                <div class="col-12">
                    <div class="card active-users">
                        <div class="card-header border-0">
                            <h4 class="card-title">{{trans('cruds.user.active')}}</h4>
                            <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a data-action="reload"><i class="feather icon-rotate-cw"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-content">
                            <div id="audience-list-scroll" class="table-responsive position-relative" style="height: calc(100vh - 400px);">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th></th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Vat Number</th>
                                        <th>Phone Number</th>
                                        <th>Is Admin</th>
                                        <th>More</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($admins as $admin)
                                        <tr>
                                            <td class="text-truncate">
                                                <div class="avatar avatar-md mr-1">
                                                    <img class="rounded-circle"
                                                         src="{{!is_null($admin->avatar) ? asset('storage/'.$admin->avatar) : asset('storage/admin/default.png')}}"
                                                         alt="{{$admin->name}}">
                                                </div>
                                            </td>
                                            <td class="align-middle">
                                                <span>{{$admin->name}}</span>
                                            </td>
                                            <td class="align-middle">
                                                <span>{{$admin->email}}</span>
                                            </td>
                                            <td class="align-middle">
                                                <span>{{$admin->vat_number}}</span>
                                            </td>
                                            <td class="align-middle">
                                                <span>{{$admin->phone_number}}</span>
                                            </td>
<!--                                            <td class="align-middle">
                                                <div class="progress my-75">
                                                    <div class="progress-bar progress-bar-striped bg-success"
                                                         role="progressbar" aria-valuenow="20" aria-valuemin="20"
                                                         aria-valuemax="100" style="width:55%">55%
                                                    </div>
                                                </div>
                                            </td>-->
                                            <td class="align-middle">
                                                <input type="checkbox" onchange="toggleAdmin(this, {{$admin->id}})" class="switch" {{$admin->is_admin == 1 ? 'checked' : ''}} id="is_admin" data-group-cls="btn-group-sm" hidden="">
                                            </td>
                                            <td class="align-middle">
                                                <div class="dropdown">
                                                        <span class="feather icon-more-vertical dropdown-toggle"
                                                              id="dropdownMenuButton" data-toggle="dropdown"
                                                              aria-haspopup="true" aria-expanded="false">
                                                        </span>
                                                    <div class="dropdown-menu dropdown-menu-right"
                                                         aria-labelledby="dropdownMenuButton">
                                                        <a class="dropdown-item" href="{{route('tenant.user.edit', ['admin' => $admin->id, 'subdomain' => request()->subdomain])}}">
                                                            <span class="feather icon-edit"></span> {{trans('global.edit')}}
                                                        </a>
                                                        @if($admins->count() > 1 && $admin->email !== $admin->owner->email)
                                                        <a class="dropdown-item" onclick="deleteUser({{$admin->id}})">
                                                            <span class="feather icon-delete"></span> {{trans('global.delete')}}
                                                        </a>
                                                        @endif
<!--                                                        <a class="dropdown-item" href="#">Extras</a>
                                                        <a class="dropdown-item" href="#">Newsletter</a>-->
                                                    </div>
                                                </div>
                                                </span>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
            <!-- active users and my task timeline cards ends here -->
        </section>
        <!-- users list ends -->
    </div>
@endsection
@section('adicionalJs')
    <!-- BEGIN: Vendor JS-->

    <script src="{{asset('admin-panel/app-assets/vendors/js/vendors.min.js')}}"></script>

    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{asset('admin-panel/app-assets/vendors/js/ui/jquery.sticky.js')}}"></script>
    <script src="{{asset('admin-panel/app-assets/vendors/js/charts/jquery.sparkline.min.js')}}"></script>
    <script src="{{asset('admin-panel/app-assets/vendors/js/extensions/toastr.min.js')}}"></script>
    <script src="{{asset('admin-panel/app-assets/vendors/js/extensions/sweetalert2.all.min.js')}}"></script>

    <script src="{{asset('admin-panel/app-assets/vendors/js/forms/icheck/icheck.min.js')}}"></script>
    <script src="{{asset('admin-panel/app-assets/vendors/js/forms/toggle/bootstrap-checkbox.min.js')}}"></script>
    <script src="{{asset('admin-panel/app-assets/vendors/js/forms/toggle/switchery.min.js')}}"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{asset('admin-panel/app-assets/js/core/app-menu.js')}}"></script>
    <script src="{{asset('admin-panel/app-assets/js/core/app.js')}}"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{asset('admin-panel/app-assets/js/scripts/ui/breadcrumbs-with-stats.js')}}"></script>

    <script src="{{asset('admin-panel/app-assets/js/scripts/pages/page-users.js')}}"></script>
    <!-- END: Page JS-->

    <script src="{{asset('admin-panel/app-assets/js/scripts/tables/components/table-components.js')}}"></script>
@endsection
@section('scripts')
    <script>

        function toggleAdmin(event, id){
            let is_admin = event.checked ? 1 : 0;

            $.ajax({
                headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
                url: '/dashboard/user/' + id,
                dataType: 'json',
                type: 'put',
                data: {
                    is_admin: is_admin,
                },

                success: function (response) {
                    if(response.success){
                        toastr.success('{{trans('global.toast_messages.admin_status_success')}}', '{{trans('global.toast_messages.success_title')}}');
                    }else{
                        toastr.error('{{trans('global.toast_messages.admin_status_error')}}', '{{trans('global.toast_messages.error_title')}}');
                    }
                },
                error: function (error) {
                    console.log(error);
                }
            });
        }

        function deleteUser(user){
            Swal.fire({
                title: "{{trans('global.areYouSure')}}",
                text: "{{trans('global.youWillCanRevert')}}",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "{{strtoupper(trans('global.yes'))}}",
                confirmButtonClass: "btn btn-warning",
                cancelButtonClass: "btn btn-danger ml-1",
                buttonsStyling: false
            }).then(function(result) {
                if (result.value) {
                    $.ajax({
                        headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
                        url: '/dashboard/user/' + user,
                        dataType: 'json',
                        type: 'delete',
                        success: function (response) {
                            console.log(response);
                            if(response.success){
                                Swal.fire(
                                    '{{trans('global.toast_messages.success_title')}}',
                                    '{{trans('global.toast_messages.user_deleted_success')}}',
                                    'success'
                                )
                                window.location.reload();
                            }else{
                                Swal.fire(
                                    '{{trans('global.toast_messages.error_title')}}',
                                    '{{trans('global.toast_messages.admin_status_error')}}',
                                    'error'
                                )
                            }
                        },
                        error: function (error) {
                            console.log(error);
                        }

                    })
                }
            });

        }
    </script>
@endsection
