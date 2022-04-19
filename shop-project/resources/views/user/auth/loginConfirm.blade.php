@extends("user.layouts.master-simple")

@section("head-tag")
    <style>
        .letter-space-6{
            letter-spacing: 6px;
            text-align: left;
            direction: ltr;
        }
    </style>
@endsection

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
                    <input type="text" class="form-control text-center letter-space-6" maxlength="6" name="otp" value="{{ old("otp") }}">
                    @error("otp")
                    <div class="errors"><span class="text-danger">{{ $message }}</span></div>
                    @enderror
                </section>
                <section class="login-btn d-grid g-2"><button class="btn btn-danger">ثبت کد</button></section>
{{--                <section class="login-terms-and-conditions"><a href="#">شرایط و قوانین</a> را خوانده ام و پذیرفته ام</section>--}}
                <div class="text-center fw-bold timer" id="#time"></div>
                <div class="text-center d-none resendOtp"><a href="" class="text-decoration-none text-info fw-bold">ارسال مجدد کد تایید</a></div>
            </section>
        </form>
    </section>

@endsection

@section("scripts")

    @php
        $timer = (( new \Carbon\Carbon($otp["created_at"]))->addMinutes(5)->timestamp - \Carbon\Carbon::now()->timestamp ) * 1000;
    @endphp

    <script>
        var countDownDate = new Date().getTime() + {{ $timer }};

        const x = setInterval(function () {
            var now = new Date().getTime();
            var distance = countDownDate - now;

            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            minutes = minutes < 10 ? "0" + minutes : minutes;
            seconds = seconds < 10 ? "0" + seconds : seconds;

            $(".timer").html(minutes + ":" + seconds);

            if (distance < 0){
                clearInterval(x);
                $(".timer").addClass("d-none");
                $(".resendOtp").removeClass("d-none");
                $(".resendOtp").addClass("d-block");
            }

        }, 1000);
    </script>
@endsection
