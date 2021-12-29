@extends("admin.layouts.master")

@section("head-tag")
    <title>ایجاد پست</title>
@endsection

@section("content")

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">خانه</a></li>
            <li class="breadcrumb-item"><a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item"><a href="#">پست ها</a></li>
            <li class="breadcrumb-item active" aria-current="page">ایجاد پست</li>
        </ol>
    </nav>

    <section class="pagesContent py-3 px-2">
        <div class="sectionHeader d-flex justify-content-between align-items-center">
            <h4>ایجاد پست:</h4>

            <a href="{{ route("admin.content.post.index") }}" class="btn btn-info btn-sm border-radius-4 box-shadow-normal">بازگشت</a>
        </div>

        <div class="sectionHeaderBottom d-flex justify-content-between align-items-center py-3">

        </div>

        <section class="pageContentInner">
            <form action="">
                <div class="row">

                    <div class="form-group col-md-6">
                        <label for="">عنوان پیج</label>
                        <input type="text" class="form-control border-radius-5">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="">انتخاب دسته</label>
                        <select name="" id="" class="form-control border-radius-5">
                            <option value="">اقتصادی</option>
                            <option value="">علمی</option>
                            <option value="">الکترونیکی</option>
                        </select>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="">تصویر</label><br>

                        <div class="imageSelectWrapper border-radius-5">
                            <label for="imgInp"><i class="fa fa-plus"></i> انتخاب عکس</label>
                        </div>

                        <input type="file" id="imgInp" class="d-none">

                        <div class="imagePreview">
                            <center><img src="" alt="" id="blah"></center>
                        </div>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="">تاریخ انتشار</label>
                        <input type="text" class="form-control border-radius-5">
                    </div>

                    <div class="form-group col-md-12">
                        <label for="">متن پست</label>
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
