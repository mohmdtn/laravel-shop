@extends("user.layouts.master-simple")

@section("content")

    <section class="vh-100 d-flex justify-content-center align-items-center pb-5">
        <form action="{{ route("auth.user.loginConfirm", $token) }}" method="post">
            @csrf
            <section class="login-wrapper mb-5">
                <section class="login-logo">
                    <img src="{{ asset("user-assets/images/logo/4.png") }}" alt="">
                </section>
                <section class="login-title text-center">
                    <a href="{{ route("auth.user.loginRegisterForm") }}" class="text-info text-decoration-none">
                        <i class="fa fa-arrow-right"></i>
                        بازگشت
                    </a>
                </section>
                <section class="login-title text-center">
                    کد تایید را وارد کنید:
                </section>
                <section class="login-info">
                    @if( $otp->type == 0 )
                        کد تایید برای شماره موبایل {{ $otp->login_id }} ارسال شد
                    @else
                        کد تایید برای ایمیل {{ $otp->login_id }} ارسال شد
                    @endif

                </section>
                <section class="login-input-text">
                    <input type="text" class="form-control" name="code" value="{{ old("code") }}">
                    @error("code")
                    <div class="errors"><span class="text-danger">{{ $message }}</span></div>
                    @enderror
                </section>
                <section class="login-btn d-grid g-2"><button class="btn btn-danger">ثبت کد</button></section>
{{--                <section class="login-terms-and-conditions"><a href="#">شرایط و قوانین</a> را خوانده ام و پذیرفته ام</section>--}}
            </section>
        </form>
    </section>

@endsection
