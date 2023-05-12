@extends("user.layouts.master-one-col")

@section("head-tag")
    <title>افزودن تیکت جدید</title>
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
                                    <span>افزودن تیکت جدید</span>
                                </h2>
                                <section class="content-header-link m-1">
                                    <a href="{{ route("user.profile.tickets") }}" class="btn btn-danger text-white">بازگشت</a>
                                </section>
                            </section>
                        </section>
                        <!-- end vontent header -->


                        <section class="order-wrapper mt-3">

                            <section class="pageContentInner">

                                <form action="{{ route("user.profile.tickets.store") }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col-12 mb-3">
                                            <label for="subject">عنوان:</label>
                                            <input name="subject" id="subject" class="form-control" value="{{ old("subject") }}">
                                            @error("subject")
                                                <div class="errors"><span class="text-danger">{{ $message }}</span></div>
                                            @enderror
                                        </div>

                                        <div class="form-group col-md-6 mb-3">
                                            <label for="">انتخاب دسته:</label>
                                            <select name="category_id" id="" class="form-control">
                                                <option value="">دسته خود را انتخاب کنید</option>
                                                @foreach($categories as $category)
                                                    <option value="{{ $category["id"] }}"  @if(old("category_id") == $category["id"]) selected @endif>{{ $category["name"] }}</option>
                                                @endforeach
                                            </select>
                                            @error("category_id")
                                                <div class="errors"><span class="text-danger">{{ $message }}</span></div>
                                            @enderror
                                        </div>

                                        <div class="form-group col-md-6 mb-3">
                                            <label for="">انتخاب اولویت:</label>
                                            <select name="priority_id" id="" class="form-control">
                                                <option value="">اولویت خود را انتخاب کنید</option>
                                                @foreach($priorities as $priority)
                                                    <option value="{{ $priority["id"] }}"  @if(old("priority_id") == $priority["id"]) selected @endif>{{ $priority["name"] }}</option>
                                                @endforeach
                                            </select>
                                            @error("priority_id")
                                                <div class="errors"><span class="text-danger">{{ $message }}</span></div>
                                            @enderror
                                        </div>

                                        <div class="form-group col-12 py-3">
                                            <label for="replay">متن:</label>
                                            <textarea name="description" id="replay" rows="4" class="form-control">{{ old("description") }}</textarea>
                                            @error("description")
                                                <div class="errors"><span class="text-danger">{{ $message }}</span></div>
                                            @enderror
                                        </div>

                                        <div class="form-group col-12">
                                            <label for="file-upload">فایل:</label><br>
                                            <input type="file" id="file-upload" class="form-control" name="file">
                                            @error("file")
                                                <div class="errors"><span class="text-danger">{{ $message }}</span></div>
                                            @enderror
                                        </div>

                                    </div>

                                    <div class="col-md-12 d-flex justify-content-center pt-3">
                                        <input type="submit" class="btn btn-primary border-radius-4 box-shadow-normal submit-custom" value="ثبت">
                                    </div>
                                </form>

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
