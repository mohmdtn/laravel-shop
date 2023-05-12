@extends("user.layouts.master-one-col")

@section("head-tag")
    <title>تیکت شما</title>
    <style>

        .productInfoInner{
            color: #fff;
            font-weight: bold;
            background: linear-gradient(to right, #8383d2, #348ac7);
            border-bottom-left-radius: 0 !important;
            border-bottom-right-radius: 0 !important;
        }

        .bg-gradiant-2{
            background: linear-gradient(to right, #3494e6, #ec6ead);
        }

        .productInfo{
            border: 1px solid #ced4da;
            overflow: hidden;
        }

        .productInfoInnerSec{
            background-color: #fff;
        }

        .productInfoInnerSec div{
            font-weight: bold;
        }

        .productInfoInnerSec i{
            color: var(--site-blue-fonts);
        }

        .productInfoInnerSec div span{
            color: var(--site-blue-fonts);
        }

    </style>
@endsection

@section("content")

    <!-- start body -->
    <section class="">
        <section id="main-body-two-col" class="container-xxl body-container">
            <section class="row">
                <aside id="sidebar" class="sidebar col-md-3">
                    @include("user.layouts.partials.profile-sidebar")
                </aside>
                <main id="main-body" class="main-body col-md-9">
                    <section class="content-wrapper bg-white p-3 rounded-2 mb-2">

                        <!-- start vontent header -->
                        <section class="content-header">
                            <section class="d-flex justify-content-between align-items-center">
                                <h2 class="content-header-title">
                                    <span>تاریخچه تیکت</span>
                                </h2>
                                <section class="content-header-link m-1">
                                    <a href="{{ route("user.profile.tickets") }}" class="btn btn-danger text-white">بازگشت</a>
                                </section>
                            </section>
                        </section>
                        <!-- end vontent header -->


                        <section class="order-wrapper mt-3">

                            <section class="pageContentInner">

                                <div class="productInfo my-3 rounded-3">
                                    <div class="productInfoInner py-3 px-2 rounded-3 d-flex justify-content-between align-items-center bg-gradiant-1">
                                        <div><i class="fas fa-user"></i> {{ $ticket["user"]["fullName"] }}</div>
                                        <div><i class="fas fa-clock"></i> {{ jalaliDate($ticket["created_at"], "H:i:s , %A %d %B %Y") }}</div>
                                    </div>
                                    <div class="productInfoInnerSec py-4 px-3">
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <p class="pl-4 d-inline-block"><span class="text-info">موضوع:</span> {{ $ticket["subject"] }}</p>
                                            </div>
                                        </div>
                                        <i class="fas fa-comment text-info">: </i> {{ $ticket["description"] }}
                                        <div class="mt-3 text-center">
                                            @if($ticket->file()->count() > 0)
                                                <a class="btn btn-primary text-white" href="{{ asset($ticket->file->file_path) }}" download>دانلود فایل ضمیمه</a>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                @foreach($ticket->children as $child)
                                    <div class="productInfo my-3 rounded-3 ms-4">
                                        <div class="productInfoInner py-2 px-2 rounded-3 d-flex justify-content-between align-items-center bg-gradiant-1">
                                            <div><i class="fas fa-user"></i> {{ $child->admin ? $child->admin->user->fullname : $child["user"]["fullName"] }}</div>
                                            <div><i class="fas fa-clock"></i> {{ jalaliDate($child["created_at"], "H:i:s , %A %d %B %Y") }}</div>
                                        </div>
                                        <div class="productInfoInnerSec py-4 px-3">
                                            <i class="fas fa-comment text-info">: </i> {{ $child["description"] }}
                                        </div>
                                    </div>
                                @endforeach

                                @if($ticket["status"] == 0)
                                    <form action="{{ route("user.profile.tickets.answer", $ticket["id"]) }}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <label for="replay">پاسخ تیکت</label>
                                            <textarea name="description" id="replay" rows="4" class="form-control border-radius-5">{{ old("description") }}</textarea>

                                            @error("description")
                                            <div class="errors"><span class="text-danger">{{ $message }}</span></div>
                                            @enderror
                                        </div>

                                        <div class="col-md-12 d-flex justify-content-center pt-3">
                                            <input type="submit" class="btn btn-primary border-radius-4 box-shadow-normal submit-custom" value="ثبت">
                                        </div>
                                    </form>
                                @endif
                            </section>

                        </section>


                    </section>
                </main>
            </section>
        </section>
    </section>
    <!-- end body -->

@endsection

@section("scripts")
@endsection
