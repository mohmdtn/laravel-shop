@extends("admin.layouts.master")

@section("head-tag")
    <title>ایجاد منو</title>
@endsection

@section("content")

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">خانه</a></li>
            <li class="breadcrumb-item"><a href="#">بخش محتوی</a></li>
            <li class="breadcrumb-item"><a href="#">منو</a></li>
            <li class="breadcrumb-item active" aria-current="page">ایجاد منو</li>
        </ol>
    </nav>

    <section class="pagesContent py-3 px-2">
        <div class="sectionHeader d-flex justify-content-between align-items-center">
            <h4>ایجاد منو:</h4>

            <a href="{{ route("admin.content.menu.index") }}" class="btn btn-info btn-sm border-radius-4 box-shadow-normal">بازگشت</a>
        </div>

        <div class="sectionHeaderBottom d-flex justify-content-between align-items-center py-3">

        </div>

        <section class="pageContentInner">
            <form action="">
                <div class="row">

                    <div class="form-group col-md-6">
                        <label for="">نام منو</label>
                        <input type="text" class="form-control border-radius-5">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="">منو والد</label>
                        <select name="" id="" class="form-control border-radius-5">
                            <option value="">انتخاب منو والد</option>
                            <option value="">کالای الکترونیکی</option>
                            <option value="">پوشاک</option>
                        </select>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="">آدرس URL</label>
                        <input type="text" class="form-control border-radius-5">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="">تصویر کالا</label><br>

                        <div class="imageSelectWrapper border-radius-5">
                            <label for="imgInp"><i class="fa fa-plus"></i> انتخاب عکس</label>
                        </div>

                        <input type="file" id="imgInp" class="d-none">

                        <div class="imagePreview">
                            <center><img src="" alt="" id="blah"></center>
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
