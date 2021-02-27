@extends('tenant.dashboard.index')

@section('adicionalCss')

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('admin-panel/app-assets/vendors/css/vendors.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin-panel/app-assets/vendors/css/forms/selects/select2.min.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('admin-panel/app-assets/vendors/css/forms/icheck/icheck.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin-panel/app-assets/vendors/css/forms/icheck/custom.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin-panel/app-assets/vendors/css/forms/toggle/switchery.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin-panel/app-assets/vendors/css/pickers/pickadate/pickadate.css')}}">

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
<style>
    .help-block{
        font-size: .7rem;
        color: red;
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
                                    <i class="feather icon-user mr-25"></i><span class="d-none d-sm-block">Account</span>
                                </a>
                            </li>
<!--                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center" id="information-tab" data-toggle="tab" href="#information" aria-controls="information" role="tab" aria-selected="false">
                                    <i class="feather icon-info mr-25"></i><span class="d-none d-sm-block">Information</span>
                                </a>
                            </li>-->
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="account" aria-labelledby="account-tab" role="tabpanel">
                                <!-- users edit media object start -->
                                <div class="media mb-2">
                                    <a class="mr-2" href="#">
                                        <img src="{{asset('admin-panel/app-assets/images/portrait/small/avatar-s-26.png')}}" alt="users avatar" class="users-avatar-shadow rounded-circle" height="64" width="64">
                                    </a>
                                    <div class="media-body">
                                        <h4 class="media-heading">Avatar</h4>
                                        <div class="col-12 px-0 d-flex">
                                            <a href="#" class="btn btn-sm btn-primary mr-25">Change</a>
                                            <a href="#" class="btn btn-sm btn-secondary">Reset</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- users edit media object ends -->
                                <!-- users edit account form start -->
                                <form novalidate>
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
                                                <div class="controls">
                                                    <label class="required" for="phone_number">{{ trans('cruds.user.fields.phone_number') }}</label>
                                                    <input class="form-control {{ $errors->has('phone_number') ? 'is-invalid' : '' }}" type="text" name="phone_number" id="phone_number" value="{{ old('phone_number', $admin->phone_number) }}">
                                                    @if($errors->has('phone_number'))
                                                        <div class="invalid-feedback">
                                                            {{ $errors->first('phone_number') }}
                                                        </div>
                                                    @endif
                                                    <span class="help-block">{{ trans('cruds.user.fields.phone_number_helper') }}</span>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="controls">
                                                    <label class="required" for="is_admin">{{ trans('cruds.user.fields.is_admin') }}</label><br>
                                                    <input type="checkbox" class="switch" {{$admin->is_admin == 1 ? 'checked' : ''}} id="is_admin" name="is_admin" data-group-cls="btn-group" hidden="">
                                                    <span class="help-block">{{ trans('cruds.user.fields.is_admin_helper') }}</span>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label class="required" for="address_1">{{ trans('cruds.user.fields.address') }}</label>
                                                    <input class="form-control {{ $errors->has('address_1') ? 'is-invalid' : '' }}" type="text" name="address_1" id="address_1" value="{{ old('address_1', $admin->address_1) }}" required>
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
                                                    <input class="form-control {{ $errors->has('address_2') ? 'is-invalid' : '' }}" type="text" name="address_2" id="address_2" value="{{ old('address_2', $admin->address_2) }}" required>
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
                                                    <select class="form-control select2" name="country_id" id="country_id">
                                                        <option>{{ trans('cruds.user.fields.select_country') }}</option>

                                                    @foreach($countries as $country)
                                                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                                                    @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
                                            <button type="submit" class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1">Save
                                                changes</button>
                                            <button type="reset" class="btn btn-light">Cancel</button>
                                        </div>
                                    </div>
                                </form>
                                <!-- users edit account form ends -->
                            </div>
<!--                            <div class="tab-pane" id="information" aria-labelledby="information-tab" role="tabpanel">
                                &lt;!&ndash; users edit Info form start &ndash;&gt;
                                <form novalidate>
                                    <div class="row">
                                        <div class="col-12 col-sm-6">
                                            <h5 class="mb-1"><i class="feather icon-link mr-25"></i>Social Links</h5>
                                            <div class="form-group">
                                                <label>Twitter</label>
                                                <input class="form-control" type="text" value="https://www.twitter.com/">
                                            </div>
                                            <div class="form-group">
                                                <label>Facebook</label>
                                                <input class="form-control" type="text" value="https://www.facebook.com/">
                                            </div>
                                            <div class="form-group">
                                                <label>Google+</label>
                                                <input class="form-control" type="text">
                                            </div>
                                            <div class="form-group">
                                                <label>LinkedIn</label>
                                                <input class="form-control" type="text">
                                            </div>
                                            <div class="form-group">
                                                <label>Instagram</label>
                                                <input class="form-control" type="text" value="https://www.instagram.com/">
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6 mt-1 mt-sm-0">
                                            <h5 class="mb-1"><i class="feather icon-user mr-25"></i>Personal Info</h5>
                                            <div class="form-group">
                                                <div class="controls position-relative">
                                                    <label>Birth date</label>
                                                    <input type="text" class="form-control birthdate-picker" required placeholder="Birth date" data-validation-required-message="This birthdate field is required">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Country</label>
                                                <select class="form-control" id="accountSelect">
                                                    <option>USA</option>
                                                    <option>India</option>
                                                    <option>Canada</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Languages</label>
                                                <select class="form-control" id="users-language-select2" multiple="multiple">
                                                    <option value="English" selected>English</option>
                                                    <option value="Spanish">Spanish</option>
                                                    <option value="French">French</option>
                                                    <option value="Russian">Russian</option>
                                                    <option value="German">German</option>
                                                    <option value="Arabic" selected>Arabic</option>
                                                    <option value="Sanskrit">Sanskrit</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label>Phone</label>
                                                    <input type="text" class="form-control" required placeholder="Phone number" value="(+656) 254 2568" data-validation-required-message="This phone number field is required">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label>Address</label>
                                                    <input type="text" class="form-control" placeholder="Address" data-validation-required-message="This Address field is required">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>Website</label>
                                                <input type="text" class="form-control" placeholder="Website address">
                                            </div>
                                            <div class="form-group">
                                                <label>Favourite Music</label>
                                                <select class="form-control" id="users-music-select2" multiple="multiple">
                                                    <option value="Rock">Rock</option>
                                                    <option value="Jazz" selected>Jazz</option>
                                                    <option value="Disco">Disco</option>
                                                    <option value="Pop">Pop</option>
                                                    <option value="Techno">Techno</option>
                                                    <option value="Folk" selected>Folk</option>
                                                    <option value="Hip hop">Hip hop</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>Favourite movies</label>
                                                <select class="form-control" id="users-movies-select2" multiple="multiple">
                                                    <option value="The Dark Knight" selected>The Dark Knight
                                                    </option>
                                                    <option value="Harry Potter" selected>Harry Potter</option>
                                                    <option value="Airplane!">Airplane!</option>
                                                    <option value="Perl Harbour">Perl Harbour</option>
                                                    <option value="Spider Man">Spider Man</option>
                                                    <option value="Iron Man" selected>Iron Man</option>
                                                    <option value="Avatar">Avatar</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
                                            <button type="submit" class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1">Save
                                                changes</button>
                                            <button type="reset" class="btn btn-light">Cancel</button>
                                        </div>
                                    </div>
                                </form>
                                &lt;!&ndash; users edit Info form ends &ndash;&gt;
                            </div>-->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- users edit ends -->
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
    <script src="{{asset('admin-panel/app-assets/vendors/js/forms/select/select2.full.min.js')}}"></script>

    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{asset('admin-panel/app-assets/js/core/app-menu.js')}}"></script>
    <script src="{{asset('admin-panel/app-assets/js/core/app.js')}}"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{asset('admin-panel/app-assets/js/scripts/ui/breadcrumbs-with-stats.js')}}"></script>
    <script src="{{asset('admin-panel/app-assets/js/scripts/pages/page-users.js')}}"></script>
    <script src="{{asset('admin-panel/app-assets/js/scripts/forms/select/form-select2.js')}}"></script>
    <!-- END: Page JS-->

    <script src="{{asset('admin-panel/app-assets/js/scripts/tables/components/table-components.js')}}"></script>
    <script src="{{asset('admin-panel/app-assets/js/scripts/navs/navs.js')}}"></script>


    <!-- END: Page Vendor JS-->




@endsection
@section('scripts')
    <script>

    </script>
@endsection