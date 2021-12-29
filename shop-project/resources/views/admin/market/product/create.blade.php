@extends("admin.layouts.master")

@section("head-tag")
    <title>ایجاد کالا</title>
@endsection

@section("content")

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">خانه</a></li>
            <li class="breadcrumb-item"><a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item"><a href="#">کالا ها</a></li>
            <li class="breadcrumb-item active" aria-current="page">ایجاد کالا</li>
        </ol>
    </nav>

    <section class="pagesContent py-3 px-2">
        <div class="sectionHeader d-flex justify-content-between align-items-center">
            <h4>ایجاد کالا:</h4>

            <a href="{{ route("admin.market.product.index") }}" class="btn btn-info btn-sm border-radius-4 box-shadow-normal">بازگشت</a>
        </div>

        <div class="sectionHeaderBottom d-flex justify-content-between align-items-center py-3">

        </div>

        <section class="pageContentInner">
            <form action="">
                <div class="row">

                    <div class="form-group col-md-4">
                        <label for="">نام کالا</label>
                        <input type="text" class="form-control border-radius-5">
                    </div>

                    <div class="form-group col-md-4">
                        <label for="">دسته کالا</label>
                        <select name="" id="" class="form-control border-radius-5">
                            <option value="">الکترونیکی</option>
                            <option value="">پوشاک</option>
                        </select>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="">فرم کالا</label>
                        <select name="" id="" class="form-control border-radius-5">
                            <option value="">الکترونیکی</option>
                            <option value="">پوشاک</option>
                        </select>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="">تصویر کالا</label><br>

                        <div class="imageSelectWrapper border-radius-5">
                            <label for="imgInp"><i class="fa fa-plus"></i> انتخاب عکس</label>
                        </div>

                        <input type="file" id="imgInp" class="d-none">

                        <div class="imagePreview">
                            <center><img src="" alt="" id="blah"></center>
                        </div>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="">قیمت کالا</label>
                        <input type="text" class="form-control border-radius-5">
                    </div>

                    <div class="form-group col-md-4">
                        <label for="">وزن</label>
                        <input type="text" class="form-control border-radius-5">
                    </div>

                    <div class="form-group col-md-12">
                        <label for="">توضیحات</label>
                        <textarea class="form-control border-radius-5" name="body" id="body" rows="3"></textarea>
                    </div>

                    <div class="form-group col-md-12 pt-5">
                        <div class="row">
                            <div class="form-group col-md-5 d-flex align-items-center">
                                <label for="">ویژگی</label>
                                <input type="text" class="form-control border-radius-5 mr-2">
                            </div>

                            <div class="form-group col-md-5 d-flex align-items-center">
                                <label for="">مقدار</label>
                                <input type="text" class="form-control border-radius-5 mr-2">
                            </div>

                            <div class="form-group col-md-2 text-left">
                                <input type="button" class="btn btn-success border-radius-4" value="اضافه کردن">
                            </div>
                        </div>
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
