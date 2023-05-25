<x-laravel-ui-adminlte::adminlte-layout>

    <body class="hold-transition login-page">
        <div class="login-box">
            <div class="login-logo">
                <a href="{{ url('/home') }}"><b>{{ config('app.name') }}</b></a>
            </div>

            <div class="card">
                <div class="card-body login-card-body">
                    <p class="login-box-msg">Your password has expired, please change it.</p>

                    <form action="{{ route('password.post_expired') }}" method="POST">
                        @csrf

                        @php
                            if (!isset($token)) {
                                $token = \Request::route('token');
                            }
                        @endphp

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="input-group mb-3">
                            <input type="password" name="current_password" class="form-control"
                                placeholder="Current Password">
                            <div class="input-group-append">
                                <div class="input-group-text"><span class="fas fa-lock"></span></div>
                            </div>
                            @if ($errors->has('current_password'))
                                <span
                                    class="error invalid-feedback">{{ $errors->first('current_password') }}</span>
                            @endif
                        </div>

                        <div class="input-group mb-3">
                            <input type="password" name="password" class="form-control"
                                placeholder="New Password">
                            <div class="input-group-append">
                                <div class="input-group-text"><span class="fas fa-lock"></span></div>
                            </div>
                            @if ($errors->has('password'))
                                <span
                                    class="error invalid-feedback">{{ $errors->first('password') }}</span>
                            @endif
                        </div>

                        <div class="input-group mb-3">
                            <input type="password" name="password_confirmation" class="form-control"
                                placeholder="Confirm Password">
                            <div class="input-group-append">
                                <div class="input-group-text"><span class="fas fa-lock"></span></div>
                            </div>
                            @if ($errors->has('password_confirmation'))
                                <span
                                    class="error invalid-feedback">{{ $errors->first('password_confirmation') }}</span>
                            @endif
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary btn-block">Reset Password</button>
                            </div>
                            <!-- /.col -->
                        </div>
                    </form>

                    <p class="mt-3 mb-1">
                        <a href="{{ route('login') }}">Back To Login</a>
                    </p>
                </div>
                <!-- /.login-card-body -->
            </div>

        </div>
    </body>
</x-laravel-ui-adminlte::adminlte-layout>
