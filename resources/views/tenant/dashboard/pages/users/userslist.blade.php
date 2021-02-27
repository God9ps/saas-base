@extends('tenant.dashboard.index')

@section('adicionalCss')

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('admin-panel/app-assets/vendors/css/vendors.min.css')}}">
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
            <div class="users-list-filter px-1">
                <form>
                    <div class="row border border-light rounded py-2 mb-2">
                        <div class="col-12 col-sm-6 col-lg-3">
                            <label for="users-list-verified">Verified</label>
                            <fieldset class="form-group">
                                <select class="form-control" id="users-list-verified">
                                    <option value="">Any</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                            </fieldset>
                        </div>
                        <div class="col-12 col-sm-6 col-lg-3">
                            <label for="users-list-role">Role</label>
                            <fieldset class="form-group">
                                <select class="form-control" id="users-list-role">
                                    <option value="">Any</option>
                                    <option value="User">User</option>
                                    <option value="Staff">Staff</option>
                                </select>
                            </fieldset>
                        </div>
                        <div class="col-12 col-sm-6 col-lg-3">
                            <label for="users-list-status">Status</label>
                            <fieldset class="form-group">
                                <select class="form-control" id="users-list-status">
                                    <option value="">Any</option>
                                    <option value="Active">Active</option>
                                    <option value="Close">Close</option>
                                    <option value="Banned">Banned</option>
                                </select>
                            </fieldset>
                        </div>
                        <div class="col-12 col-sm-6 col-lg-3 d-flex align-items-center">
                            <button class="btn btn-block btn-primary glow">Show</button>
                        </div>
                    </div>
                </form>
            </div>

            <!-- active users and my task timeline cards starts here -->
            <div class="row match-height">
                <!-- active users card -->
                <div class="col-12">
                    <div class="card active-users">
                        <div class="card-header border-0">
                            <h4 class="card-title">Active Users</h4>
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
                                                         src=""
                                                         alt="Generic placeholder image">
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
                                                <input type="checkbox" class="switch" {{$admin->is_admin == 1 ? 'checked' : ''}} id="is_admin" data-group-cls="btn-group-sm" hidden="">
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
                                                            <span class="feather icon-edit"></span> Edit
                                                        </a>
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

    </script>
@endsection