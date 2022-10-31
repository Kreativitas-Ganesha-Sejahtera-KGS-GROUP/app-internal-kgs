@include('admin.layouts.header-login', ['title' => 'Login - Admin Panel'])
<style>

    .profile-user-wid {
        margin-top: 26px !important;
    }
    .avatar-md {
        height: 4.5rem;
        width: 100%;
        margin: auto;
        max-width: 4.5rem;
    }
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6 col-xl-5">
            <div class="card overflow-hidden">
                <div style="background:#2A3042;color:#fff;">
                    <div class="row">
                        <div class="col-7">
                            <div class="p-4">
                                <h5>Welcome Back !</h5>
                                <p>Sign in to continue to Apps Internal KGS.</p>
                            </div>
                        </div>
                        <div class="col-5 align-self-end">
                            <img src="{{ env('APP_ASSET_URL') }}assets/images/profile-img.png" alt="" class="img-fluid">
                        </div>
                    </div>
                </div>
                <div class="card-body pt-0"> 
                    <div class="auth-logo">
                        <a href="{{ env('APP_URL') }}" class="auth-logo-light">
                            <div class="avatar-md profile-user-wid mb-4">
                                <span class="avatar-title" style="background:#2A3042;border-radius: 50%;">
                                    <img src="{{ env('APP_ASSET_URL') }}assets/logo/LOGO-KGS-01-initial-white.svg" height="34">
                                </span>
                            </div>
                        </a>

                        <a href="{{ env('APP_URL') }}" class="auth-logo-dark">
                            <div class="avatar-md profile-user-wid mb-4">
                                <span class="avatar-title" style="background:#2A3042;border-radius: 50%;">
                                    <img src="{{ env('APP_ASSET_URL') }}assets/logo/LOGO-KGS-01-initial-white.svg" height="34">
                                </span>
                            </div>
                        </a>
                    </div>
                    <div class="p-2">
                        <form role="form" method="POST" action="{{ env('APP_URL') }}{{env('APP_ADMIN_SECTION')}}/login" class="form-horizontal">
                            {!! csrf_field() !!}
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="Enter email">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <div class="input-group auth-pass-inputgroup">
                                    <input type="password" class="form-control" name="password" placeholder="Enter password" aria-label="Password" aria-describedby="password-addon">
                                    <button class="btn btn-light" type="button" id="password-addon"><i class="mdi mdi-eye-outline"></i></button>
                                </div>
                            </div>
                            <div class="mt-3 d-grid">
                                <button class="btn waves-effect waves-light" type="submit" style="background:#2A3042;color:#fff;">Log In</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('admin.layouts.footer-login')

