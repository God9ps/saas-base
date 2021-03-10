@extends('tenant.dashboard.index')

@section('adicionalCss')

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('admin-panel/app-assets/vendors/css/vendors.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin-panel/app-assets/vendors/css/forms/selects/select2.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin-panel/app-assets/vendors/css/extensions/toastr.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('admin-panel/app-assets/vendors/css/forms/icheck/icheck.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin-panel/app-assets/vendors/css/forms/icheck/custom.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin-panel/app-assets/vendors/css/forms/toggle/switchery.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin-panel/app-assets/vendors/css/pickers/pickadate/pickadate.css')}}">

    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('admin-panel/app-assets/css/bootstrap.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('admin-panel/app-assets/css/bootstrap-extended.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin-panel/app-assets/vendors/js/ui/popper.min.js')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin-panel/app-assets/css/colors.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin-panel/app-assets/css/components.css')}}">
    <!-- END: Theme CSS-->

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css"
          href="{{asset('admin-panel/app-assets/css/core/menu/menu-types/horizontal-menu.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{asset('admin-panel/app-assets/css/core/colors/palette-gradient.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin-panel/app-assets/css/core/colors/palette-tooltip.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('admin-panel/app-assets/css/plugins/extensions/toastr.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('admin-panel/app-assets/css/plugins/images/cropper/cropper.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('admin-panel/app-assets/css/plugins/forms/switch.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin-panel/app-assets/css/pages/page-users.css')}}">
    <!-- END: Page CSS-->
@endsection

@section('styles')
<style>
    .help-block{
        font-size: .7rem;
        color: red;
    }

    @media only screen and (max-width: 600px) {
        input[type="text"],
        input[type="email"],
        option
        {
            font-size:12px;
        }
    }



</style>
@endsection

@section('content')
    <div class="content-body">
        <!-- users edit start -->
        <section class="users-edit">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <ul class="nav nav-tabs mb-2" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center active" id="account-tab" data-toggle="tab" href="#account" aria-controls="account" role="tab" aria-selected="true">
                                    <i class="feather icon-user mr-25"></i><span class="d-none d-sm-block">{{trans('cruds.user.title_singular')}}</span>
                                </a>
                            </li>
                            @if(auth()->id() === $admin->id)
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center" id="information-tab" data-toggle="tab" href="#change_password" aria-controls="information" role="tab" aria-selected="false">
                                    <i class="feather icon-lock mr-25"></i><span class="d-none d-sm-block">{{trans('global.change_password')}}</span>
                                </a>
                            </li>
                            @endif
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="account" aria-labelledby="account-tab" role="tabpanel">
                                <!-- users edit media object start -->
                                <div class="media mb-2">
                                    <a class="mr-2" href="#">
                                        <img src="{{asset('storage/'.$admin->avatar)}}" alt="{{$admin->name}}" id="preview-avatar" class="users-avatar-shadow rounded-circle" height="64" width="64">
                                    </a>
                                    <div class="media-body">
                                        <h4 class="media-heading">Avatar</h4>
                                        <div class="col-12 px-0 d-flex">
                                            <button type="button" class="btn btn-sm btn-primary mr-25" data-toggle="modal" data-target="#avatarModal">
                                                {{trans('cruds.user.fields.change_avatar')}}
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                @if (\Session::has('success'))
                                    <div class="alert alert-success alert-dismissible mb-2" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        <strong>{{trans('global.toast_messages.success_title')}}</strong> {!! \Session::get('success') !!}
                                    </div>
                                @endif
                                <!-- users edit media object ends -->
                                <!-- users edit account form start -->
                                <form action="{{route('tenant.user.update', ['subdomain' => request()->subdomain, 'admin' => $admin->id])}}" name="admin_edit_form" method="post">
                                    @csrf
{{--                                    {{ method_field('PUT') }}--}}
                                    <div class="row">
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label class="required" for="name">{{ trans('cruds.user.fields.name') }}</label>
                                                    <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $admin->name) }}" required>
                                                    @if($errors->has('name'))
                                                        <div class="invalid-feedback">
                                                            {{ $errors->first('name') }}
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label class="required" for="email">{{ trans('cruds.user.fields.email') }}</label>
                                                    <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" id="email" value="{{ old('email', $admin->email) }}" required>
                                                    @if($errors->has('email'))
                                                        <div class="invalid-feedback">
                                                            {{ $errors->first('email') }}
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>




                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="controls">
                                                            <label for="phone_number">{{ trans('cruds.user.fields.phone_number') }}</label>
                                                            <div class="position-relative has-icon-right">
                                                                <input class="form-control {{ $errors->has('phone_number') ? 'is-invalid' : '' }}" type="text" name="phone_number" id="phone_number" value="{{ old('phone_number', $admin->phone_number) }}">
                                                                @if($errors->has('phone_number'))
                                                                    <div class="invalid-feedback">
                                                                        {{ $errors->first('phone_number') }}
                                                                    </div>
                                                                @endif
                                                                <div class="form-control-position">
                                                                    {!! trans('cruds.user.fields.phone_number_helper')  !!}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="controls">
                                                            <label for="vat_number" data-toggle="tooltip" data-placement="top" title="">{{ trans('cruds.user.fields.vat_number') }}</label>
                                                            <div class="position-relative has-icon-right">
                                                                <input class="form-control {{ $errors->has('vat_number') ? 'is-invalid' : '' }}" type="text" name="vat_number" id="vat_number" value="{{ old('vat_number', $admin->vat_number) }}">
                                                                @if($errors->has('vat_number'))
                                                                    <div class="invalid-feedback">
                                                                        {{ $errors->first('vat_number') }}
                                                                    </div>
                                                                @endif
                                                                <div class="form-control-position">
                                                                    {!! trans('cruds.user.fields.vat_number_helper')  !!}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>





                                            @if(auth()->user()->isadmin())
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label class="required" for="is_admin">{{ trans('cruds.user.fields.is_admin') }} {!! trans('cruds.user.fields.is_admin_helper') !!}</label><br>
                                                        <input type="checkbox" class="switch" {{$admin->is_admin == 1 ? 'checked' : ''}} id="is_admin" name="is_admin" data-group-cls="btn-group" hidden="">

                                                    </div>
                                                </div>
                                            @endif

                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label class="required" for="address_1">{{ trans('cruds.user.fields.address') }}</label>
                                                    <input class="form-control {{ $errors->has('address_1') ? 'is-invalid' : '' }}" type="text" name="address_1" id="address_1" value="{{ old('address_1', $admin->address_1) }}" >
                                                    @if($errors->has('address_1'))
                                                        <div class="invalid-feedback">
                                                            {{ $errors->first('address_1') }}
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label class="required" for="address_2">{{ trans('cruds.user.fields.address2') }}</label>
                                                    <input class="form-control {{ $errors->has('address_2') ? 'is-invalid' : '' }}" type="text" name="address_2" id="address_2" value="{{ old('address_2', $admin->address_2) }}" >
                                                    @if($errors->has('address_2'))
                                                        <div class="invalid-feedback">
                                                            {{ $errors->first('address_2') }}
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-4">
                                                        <div class="controls">
                                                            <label class="required" for="postcode">{{ trans('cruds.user.fields.postcode') }}</label>
                                                            <input class="form-control {{ $errors->has('postcode') ? 'is-invalid' : '' }}" type="text" name="postcode" id="postcode" value="{{ old('postcode', $admin->postcode) }}">
                                                            @if($errors->has('postcode'))
                                                                <div class="invalid-feedback">
                                                                    {{ $errors->first('postcode') }}
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-8">
                                                        <div class="controls">
                                                            <label class="required" for="city">{{ trans('cruds.user.fields.city') }}</label>
                                                            <input class="form-control {{ $errors->has('city') ? 'is-invalid' : '' }}" type="text" name="city" id="city" value="{{ old('city', $admin->city) }}">
                                                            @if($errors->has('city'))
                                                                <div class="invalid-feedback">
                                                                    {{ $errors->first('city') }}
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="controls">
                                                    <label class="required" for="country">{{ trans('cruds.user.fields.country') }}</label>
                                                    <select class="form-control select2" name="country_id" id="country_id" required>

                                                    @foreach($countries as $country)
                                                        <option {{$country->id === $admin->country_id ? 'selected' : ''}}
                                                                value="{{ $country->id }}">
                                                            {{$country->name }}
                                                        </option>
                                                    @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
                                            <button type="submit" class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1">{{trans('global.save')}}</button>
                                            <a href="{{route('tenant.dashboard', ['subdomain' => request()->subdomain])}}" class="btn btn-light">{{trans('global.modals.close')}}</a>
                                        </div>
                                    </div>
                                </form>
                                <!-- users edit account form ends -->
                            </div>
                            @if(auth()->id() === $admin->id)
                            <div class="tab-pane" id="change_password" aria-labelledby="information-tab" role="tabpanel">

                                <form method="POST" action="{{route('tenant.change.password', ['subdomain' => request()->subdomain])}}">
                                    @csrf

                                    @foreach ($errors->all() as $error)
                                        <p class="text-danger">{{ $error }}</p>
                                    @endforeach

                                    <div class="form-group row">
                                        <label for="password" class="col-md-4 col-form-label text-md-right">{{trans('cruds.user.fields.current_password')}}</label>

                                        <div class="col-md-6">
                                            <input id="password" type="password" class="form-control" name="current_password" autocomplete="current-password">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="new_password" class="col-md-4 col-form-label text-md-right">{{trans('cruds.user.fields.new_password')}}</label>

                                        <div class="col-md-6">
                                            <input id="new_password" type="password" class="form-control" name="new_password" autocomplete="current-password">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="new_confirm_password" class="col-md-4 col-form-label text-md-right">{{trans('cruds.user.fields.new_password_confirmation')}}</label>

                                        <div class="col-md-6">
                                            <input id="new_confirm_password" type="password" class="form-control" name="new_confirm_password" autocomplete="current-password">
                                        </div>
                                    </div>

                                    <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
                                        <button type="submit" class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1">{{trans('global.save')}}</button>
                                        <a href="{{route('tenant.dashboard', ['subdomain' => request()->subdomain])}}" class="btn btn-light">{{trans('global.modals.close')}}</a>
                                    </div>
                                </form>

                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- users edit ends -->
    </div>


    <!-- Modal -->
    <div class="modal fade text-left" id="avatarModal" tabindex="-1" role="dialog" aria-labelledby="avatarModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <label class="modal-title text-text-bold-600" id="avatarModal">{{trans('cruds.user.fields.change_avatar')}}</label>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="#">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col">
                                <fieldset class="form-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" onchange="loadFile(event)" id="avatar" name="avatar">
                                        <label class="custom-file-label" for="avatar">{{trans('cruds.user.fields.choose_avatar')}}</label>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col" style="max-width: 93%">
                                <img src="" id="output" class="img-fluid">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="reset" class="btn btn-outline-secondary btn-lg" data-dismiss="modal" value="{{trans('global.modals.close')}}">
                        <button onclick="crop(event, {{$admin->id}}); return false;" class="btn btn-outline-primary btn-lg">{{trans('global.modals.submit')}}</button>
                    </div>
                </form>
            </div>
        </div>
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
    <script src="{{asset('admin-panel/app-assets/vendors/js/forms/icheck/icheck.min.js')}}"></script>
    <script src="{{asset('admin-panel/app-assets/vendors/js/forms/toggle/bootstrap-checkbox.min.js')}}"></script>
    <script src="{{asset('admin-panel/app-assets/vendors/js/forms/toggle/switchery.min.js')}}"></script>
    <script src="{{asset('admin-panel/app-assets/vendors/js/forms/select/select2.full.min.js')}}"></script>
    <script src="{{asset('admin-panel/app-assets/vendors/js/forms/validation/jqBootstrapValidation.js')}}"></script>
    <script src="{{asset('admin-panel/app-assets/vendors/js/forms/extended/inputmask/jquery.inputmask.bundle.min.js')}}"></script>

    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{asset('admin-panel/app-assets/js/core/app-menu.js')}}"></script>
    <script src="{{asset('admin-panel/app-assets/js/core/app.js')}}"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{asset('admin-panel/app-assets/js/scripts/ui/breadcrumbs-with-stats.js')}}"></script>
    <script src="{{asset('admin-panel/app-assets/js/scripts/pages/page-users.js')}}"></script>
    <script src="{{asset('admin-panel/app-assets/js/scripts/forms/select/form-select2.js')}}"></script>
    <script src="{{asset('admin-panel/app-assets/js/scripts/tooltip/tooltip.js')}}"></script>
    <!-- END: Page JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.9/cropper.min.js"
            integrity="sha512-9pGiHYK23sqK5Zm0oF45sNBAX/JqbZEP7bSDHyt+nT3GddF+VFIcYNqREt0GDpmFVZI3LZ17Zu9nMMc9iktkCw=="
            crossorigin="anonymous"></script>
    <script src="{{asset('admin-panel/app-assets/js/scripts/tables/components/table-components.js')}}"></script>
    <script src="{{asset('admin-panel/app-assets/js/scripts/navs/navs.js')}}"></script>
    <script src="{{asset('admin-panel/app-assets/js/scripts/forms/extended/form-inputmask.js')}}"></script>



    <!-- END: Page Vendor JS-->




@endsection
@section('scripts')
    <script>
        $(document).ready(function (){

            $('[for="vat_number"]').tooltip()

            $('#phone_number').inputmask({
                mask: ['+99[9] 999 999 999']
            });

            $('#vat_number').inputmask({
                mask: ['AA[A] 999 999 999']
            });



        })


        async function crop(event, id) {
            event.preventDefault();
            event.stopPropagation();
            canvas = cropperGlobal.getCroppedCanvas({
                width: 400,
                height: 400
            });

            canvas.toBlob(function (blob) {
                url = URL.createObjectURL(blob);
                let reader = new FileReader();
                reader.readAsDataURL(blob);
                reader.onloadend = function () {
                    let base64data = reader.result;
                    $.ajax({
                        headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
                        type: "POST",
                        dataType: "json",
                        url: "{{route('tenant.upload.avatar', ['subdomain' => request()->subdomain])}}",
                        data: {
                            'base64': base64data,
                            'id': id,
                        },
                        success: function (data) {
                            if(data.success){
                                event.preventDefault();
                                event.stopPropagation();
                                toastr.success('{{trans('global.toast_messages.admin_avatar_success')}}', '{{trans('global.toast_messages.success_title')}}');
                                document.getElementById('preview-avatar').src = data.avatar
                                document.getElementById('navbar-avatar').src = data.avatar
                                $("#avatarModal").modal('hide')
                            }else{
                                toastr.error('{{trans('global.toast_messages.admin_avatar_error')}}', '{{trans('global.toast_messages.error_title')}}');
                            }
                        },
                        error: function (data) {
                            toastr.error('{{trans('global.toast_messages.admin_avatar_error')}}', '{{trans('global.toast_messages.error_title')}}');
                        }
                    });
                }
            });
        }

        function loadFile(event) {
            var output = document.getElementById('output');
            output.src = URL.createObjectURL(event.target.files[0]);

            output.onload = function () {
                let width = output.naturalWidth,
                    height = output.naturalHeight;
            }

            cropperGlobal = new Cropper(output, {
                minContainerWidth: 350,
                minContainerHeight: 350,
                aspectRatio: 1,
                viewMode: 3
            });
        }
    </script>
@endsection
