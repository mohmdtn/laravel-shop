@extends("admin.layouts.master")

@section("head-tag")
    <title>ایجاد نقش</title>
@endsection

@section("content")

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">خانه</a></li>
            <li class="breadcrumb-item"><a href="#">بخش کاربران</a></li>
            <li class="breadcrumb-item"><a href="#">نقش ها</a></li>
            <li class="breadcrumb-item active" aria-current="page">ایجاد نقش</li>
        </ol>
    </nav>

    <section class="pagesContent py-3 px-2">
        <div class="sectionHeader d-flex justify-content-between align-items-center">
            <h4>ایجاد نقش:</h4>

            <a href="{{ route("admin.user.role.index") }}" class="btn btn-info btn-sm border-radius-4 box-shadow-normal">بازگشت</a>
        </div>

        <div class="sectionHeaderBottom d-flex justify-content-between align-items-center py-3">

        </div>

        <section class="pageContentInner">
            <form action="">
                <div class="row">

                    <div class="form-group col-md-6">
                        <label for="">عنوان نقش</label>
                        <input type="text" class="form-control border-radius-5">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="">توضیح نقش</label>
                        <input type="text" class="form-control border-radius-5">
                    </div>

                    <div class="form-group col-md-12 pt-4">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-check form-check-inline pb-3">
                                    <input type="checkbox" id="" class="form-check-input" checked>
                                    <label for="" class="form-check-label mr-1">نمایش دسته جدید</label>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-check form-check-inline pb-3">
                                    <input type="checkbox" id="" class="form-check-input" checked>
                                    <label for="" class="form-check-label mr-1">ایجاد دسته جدید</label>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-check form-check-inline pb-3">
                                    <input type="checkbox" id="" class="form-check-input" checked>
                                    <label for="" class="form-check-label mr-1">ویرایش دسته جدید</label>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-check form-check-inline pb-3">
                                    <input type="checkbox" id="" class="form-check-input" checked>
                                    <label for="" class="form-check-label mr-1">حذف دسته جدید</label>
                                </div>
                            </div>




                            <div class="col-md-3">
                                <div class="form-check form-check-inline pb-3">
                                    <input type="checkbox" id="" class="form-check-input" checked>
                                    <label for="" class="form-check-label mr-1">نمایش کالای جدید</label>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-check form-check-inline pb-3">
                                    <input type="checkbox" id="" class="form-check-input" checked>
                                    <label for="" class="form-check-label mr-1">ایجاد کالای جدید</label>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-check form-check-inline pb-3">
                                    <input type="checkbox" id="" class="form-check-input" checked>
                                    <label for="" class="form-check-label mr-1">ویرایش کالای جدید</label>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-check form-check-inline pb-3">
                                    <input type="checkbox" id="" class="form-check-input" checked>
                                    <label for="" class="form-check-label mr-1">حذف کالای جدید</label>
                                </div>
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
