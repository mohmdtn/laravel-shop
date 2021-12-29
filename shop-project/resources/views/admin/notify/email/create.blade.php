@extends("admin.layouts.master")

@section("head-tag")
    <title>ایجاد اطلاعیه ایمیلی</title>
@endsection

@section("content")

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">خانه</a></li>
            <li class="breadcrumb-item"><a href="#">بخش اطلاع رسانی</a></li>
            <li class="breadcrumb-item"><a href="#">اطلاعیه ایمیلی</a></li>
            <li class="breadcrumb-item active" aria-current="page">اطلاعیه ایمیلی</li>
        </ol>
    </nav>

    <section class="pagesContent py-3 px-2">
        <div class="sectionHeader d-flex justify-content-between align-items-center">
            <h4>ایجاد اطلاعیه ایمیلی:</h4>

            <a href="{{ route("admin.notify.email.index") }}" class="btn btn-info btn-sm border-radius-4 box-shadow-normal">بازگشت</a>
        </div>

        <div class="sectionHeaderBottom d-flex justify-content-between align-items-center py-3">

        </div>

        <section class="pageContentInner">
            <form action="">
                <div class="row">

                    <div class="form-group col-md-6">
                        <label for="">عنوان اطلاعیه</label>
                        <input type="text" class="form-control border-radius-5">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="">تاریخ ارسال</label>
                        <input type="text" class="form-control border-radius-5">
                    </div>

                    <div class="form-group col-md-12">
                        <label for="">متن ایمیل</label>
                        <textarea class="form-control border-radius-5" name="body" id="body" rows="3"></textarea>
                    </div>


                    <div class="col-md-12 d-flex justify-content-center pt-5">
                        <input type="button" class="btn btn-primary border-radius-4 box-shadow-normal submit-custom" value="ثبت">
                    </div>
                </div>
            </form>
        </section>


    </section>

@endsection

@section("scripts")

    <script src="{{ asset("admin-assets/ckeditor/ckeditor.js") }}"></script>
    <script>
        CKEDITOR.replace("body");
    </script>

@endsection
