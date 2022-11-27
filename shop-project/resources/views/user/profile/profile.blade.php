@extends("user.layouts.master-one-col")

@section("head-tag")
    <title>حساب کاربری</title>
    <style>
        .errors{
            font-size: 12px;
            color: #aa1111;
            margin-top: 1px;
            font-weight: bolder;
        }
    </style>
@endsection

@section("content")

    <!-- start body -->
    <section class="">
        <section id="main-body-two-col" class="container-xxl body-container">
            @if (session("success"))
                <div class="alert alert-success">
                    <i class="fas fa-check"></i> {{ session("success") }}
                </div>
            @endif
            <section class="row">
                <aside id="sidebar" class="sidebar col-md-3">
                    @include("user.layouts.partials.profile-sidebar")
                </aside>
                <main id="main-body" class="main-body col-md-9">
                    <section class="content-wrapper bg-white p-3 rounded-2 mb-2">

                        <!-- start vontent header -->
                        <section class="content-header mb-4">
                            <section class="d-flex justify-content-between align-items-center">
                                <h2 class="content-header-title">
                                    <span>اطلاعات حساب</span>
                                </h2>
                                <section class="content-header-link">
                                    <!--<a href="#">مشاهده همه</a>-->
                                </section>
                            </section>
                        </section>
                        <!-- end vontent header -->

                        <section class="d-flex justify-content-end my-4">
                            <button class="btn btn-link btn-sm text-info text-decoration-none mx-1 editProfileBtn" data-bs-toggle="modal" data-bs-target="#edit-profile" ><i class="fa fa-edit px-1"></i>ویرایش حساب</button>
                        </section>


                        <section class="row">
                            <section class="col-6 border-bottom mb-2 py-2">
                                <section class="field-title">نام</section>
                                <section class="field-value overflow-auto">{{ $user->first_name ?? "-" }}</section>
                            </section>

                            <section class="col-6 border-bottom my-2 py-2">
                                <section class="field-title">نام خانوادگی</section>
                                <section class="field-value overflow-auto">{{ $user->last_name ?? "-" }}</section>
                            </section>

                            <section class="col-6 border-bottom my-2 py-2">
                                <section class="field-title">شماره تلفن همراه</section>
                                <section class="field-value overflow-auto">{{ "0".$user->mobile ?? "-" }}</section>
                            </section>

                            <section class="col-6 border-bottom my-2 py-2">
                                <section class="field-title">ایمیل</section>
                                <section class="field-value overflow-auto">{{ $user->email ?? "-" }}</section>
                            </section>

                            <section class="col-6 my-2 py-2">
                                <section class="field-title">کد ملی</section>
                                <section class="field-value overflow-auto">{{ $user->national_code ?? "-" }}</section>
                            </section>

{{--                            <section class="col-6 my-2 py-2">--}}
{{--                                <section class="field-title">رمز عبور</section>--}}
{{--                                <section class="field-value overflow-auto"> --- </section>--}}
{{--                            </section>--}}

                        </section>


                        <!-- start edit profile Modal -->
                        <section class="modal fade" id="edit-profile" tabindex="-1" aria-labelledby="add-address-label" aria-hidden="true">
                            <section class="modal-dialog modal-dialog-centered">
                                <section class="modal-content">
                                    <section class="modal-header">
                                        <h5 class="modal-title" id="add-address-label"><i class="fa fa-plus"></i> ویرایش حساب</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </section>
                                    <section class="modal-body">
                                        <form class="row" method="post" action="{{ route("user.profile.update") }}">
                                            @csrf
                                            @method("put")

                                            <section class="col-6 mb-2">
                                                <label for="postal_code" class="form-label mb-1">نام</label>
                                                <input type="text" class="form-control form-control-sm" id="postal_code" placeholder="نام" name="first_name" value="{{ old("first_name", $user->first_name) }}">
                                                @error('first_name')
                                                <div class="errors">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </section>

                                            <section class="col-6 mb-2">
                                                <label for="no" class="form-label mb-1">نام خانوادگی</label>
                                                <input type="text" class="form-control form-control-sm" id="no" placeholder="نام خانوادگی" name="last_name" value="{{ old("last_name", $user->last_name) }}">
                                                @error('last_name')
                                                <div class="errors">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </section>

                                            <section class="col-12 mb-2">
                                                <label for="no" class="form-label mb-1">کد ملی</label>
                                                <input type="text" class="form-control form-control-sm" id="no" placeholder="کد ملی" name="national_code" value="{{ old("national_code", $user->national_code) }}">
                                                @error('national_code')
                                                <div class="errors">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </section>


                                    </section>
                                    <section class="modal-footer py-1">
                                        <button type="submit" class="btn btn-sm btn-primary">ویرایش حساب</button>
                                        <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal">بستن</button>
                                    </section>
                                    </form>

                                </section>
                            </section>
                        </section>
                        <!-- end edit profile Modal -->

                    </section>
                </main>
            </section>
        </section>
    </section>
    <!-- end body -->

@endsection

@section("scripts")
    @if($errors->any())
        <script>
            $(".editProfileBtn").click();
        </script>
    @endif
@endsection
