@extends("user.layouts.master-simple")

@section("head-tag")
    {!! htmlScriptTagJsApi() !!}
@endsection

@section("content")

    <section class="vh-100 d-flex justify-content-center align-items-center pb-5">
        <form action="{{ route("auth.user.loginRegister") }}" method="post">
            @csrf
            <section class="login-wrapper mb-5">
                <section class="login-logo">
                    <img src="{{ asset("user-assets/images/logo/4.png") }}" alt="">
                </section>
                <section class="login-title">ورود / ثبت نام</section>
                <section class="login-info">شماره موبایل یا پست الکترونیک خود را وارد کنید</section>
                <section class="login-input-text">
                    <input type="text" class="form-control" name="id" value="{{ old("id") }}">
                    @error("id")
                        <div class="errors"><span class="text-danger">{{ $message }}</span></div>
                    @enderror
                </section>
                <section class="login-btn d-grid g-2"><button class="btn btn-danger">ورود به آمازون</button></section>
                <section class="login-terms-and-conditions"><a href="#">شرایط و قوانین</a> را خوانده ام و پذیرفته ام</section>
            </section>
        </form>
    </section>

@endsection
