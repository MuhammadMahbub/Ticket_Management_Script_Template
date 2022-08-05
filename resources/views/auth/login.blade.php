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
                            <h4>{{ login_page_info()->img_title ?? '' }}</h4>
                            <p>{{ login_page_info()->img_subtitle ?? '' }} </p>

                            <div class="img">
                                <img class="img-fluid" src="{{ asset('uploads/loginPage') }}/{{ login_page_info()->image ?? '' }}" alt="not found">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card-body p-md-4 mx-md-4">

                                <div class="text-center login-right mb-5 mt-4">
                                    <h4>{{ login_page_info()->title ?? '' }}</h4>
                                    <p>{{ login_page_info()->subtitle ?? '' }}</p>
                                </div>

                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Email</label>
                                        <input type="email" name="email" class="form-control" id="exampleFormControlInput1"
                                            placeholder="Enter Email Address">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Password</label>
                                        <div class="password-wrapper">
                                            <input type="password" class="form-control password-wrapper__input" name="password" id="exampleFormControlInput1"
                                            placeholder="Enter Password">
                                            <button type="button" class="password-wrapper__toggler">
                                                <i class="fa fa-eye  password-wrapper__toggler__icon" aria-hidden="true"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="remfor d-flex justify-content-between">
                                        <label class="list-group-item">
                                            <input class="form-check-input me-1" type="checkbox" value="">
                                            Remember Me
                                        </label>
                                        <a class="forget_pss" href="{{ route('password.request') }}">Forgot your password?</a>
                                    </div>
                                    <button type="submit" class="btn w-100 login-btn mt-3">Login</button>
                                </form>
                                {{-- <p class="timeline text-center">or</p>

                                <button class="btn w-100 loginWithGoogle">
                                    <img class="img-fluid me-2" src="{{ asset('dashboard_assets/assets') }}/images/Logo.png" alt="logo">
                                    <span><a style="text-decoration: none" href="{{ route('googleRedirect') }}">Continue With Google</a></span>
                                </button> --}}

                                <a class="dont_account mt-4" href="{{ route('register') }}">Don’t have an account? <b>Sign Up</b></a>
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
