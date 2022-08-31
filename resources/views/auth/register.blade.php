<!DOCTYPE html>
<html lang="en">

    @include('layouts.dashboard_css')

<body>

    <section class="h-100 gradient-form">
        <div class=" container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-xl-10">
                <div class="card rounded-3 text-black">
                    <div class="row g-0">
                        <div class="col-lg-6 text-center login_left px-2 pt-3">
                            <h4>{{ register_page_info()->img_title ?? '' }}</h4>
                            <p>{{ register_page_info()->img_subtitle ?? ''}}</p>

                            <div class="img">
                                <img class="img-fluid" src="{{ asset('uploads/registerPage') }}/{{ register_page_info()->image ?? '' }}" alt="">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card-body p-md-4 mx-md-4">

                                <div class="text-center login-right mb-5 mt-4">
                                    <h4>{{ register_page_info()->title ?? '' }}</h4>
                                    <p>{{ register_page_info()->subtitle ?? '' }} </p>
                                </div>

                                <form method="POST" action="{{ route('register') }}">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">{{ __('Name') }}</label>
                                        <input type="text" name="name" class="form-control" id="exampleFormControlInput1"
                                            placeholder="Enter Your Name">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">{{ __('Email') }}</label>
                                        <input type="email" name="email" class="form-control" id="exampleFormControlInput1"
                                            placeholder="Enter Email Address">
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">{{ __('Password') }}</label>
                                        <div class="password-wrapper">
                                            <input type="password" class="form-control password-wrapper__input" name="password" id="exampleFormControlInput1"
                                            placeholder="Enter Password">
                                            <button type="button" class="password-wrapper__toggler">
                                                <i class="fa fa-eye  password-wrapper__toggler__icon" aria-hidden="true"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="password_confirmation" class="form-label">{{ __('Confirm Password') }}</label>
                                        <div class="password-wrapper">
                                            <input type="password" class="form-control password-wrapper__input" name="password_confirmation" id="password_confirmation"
                                            placeholder="Enter Password">
                                            <button type="button" class="password-wrapper__toggler">
                                                <i class="fa fa-eye  password-wrapper__toggler__icon" aria-hidden="true"></i>
                                            </button>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="value" class="col-form-label">{{ __('Select Country') }} <span class="text-danger">*</span></label></label>
                                        <select name="country_id" id="country_id_for_create_user" class="form-control">
                                            @foreach (get_countries() as $country)
                                                <option value="{{ $country->id }}" {{ $country->id == 19 ? 'selected' : '' }}>{{ $country->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('country_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <button type="submit" class="btn w-100 login-btn mt-3">{{ __('Register') }}</button>
                                </form>
                                {{-- <p class="timeline text-center">OR</p>

                                <button class="btn w-100 loginWithGoogle">
                                    <img class="img-fluid me-2" src="{{ asset('dashboard_assets/assets') }}/images/Logo.png" alt="logo">
                                    <span><a style="text-decoration: none" href="{{ route('googleRedirect') }}">Continue With Google</a></span>
                                </button> --}}

                                <a class="dont_account mt-4" href="{{ route('login') }}">{{ __('Already have an account?') }} <b>{{ __('Login Here') }}</b></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>

    @include('layouts.dashboard_js')

</body>

</html>
