@extends("admin.layouts.master")

@section("head-tag")
    <title>اضافه کردن به انبار</title>
@endsection

@section("content")

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">خانه</a></li>
            <li class="breadcrumb-item"><a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item"><a href="#">انبار</a></li>
            <li class="breadcrumb-item active" aria-current="page">اضافه کردن به انبار</li>
        </ol>
    </nav>

    <section class="pagesContent py-3 px-2">
        <div class="sectionHeader d-flex justify-content-between align-items-center">
            <h4>اضافه کردن به انبار:</h4>

            <a href="{{ route("admin.market.store.index") }}" class="btn btn-info btn-sm border-radius-4 box-shadow-normal">بازگشت</a>
        </div>

        <div class="sectionHeaderBottom d-flex justify-content-between align-items-center py-3">

        </div>

        <section class="pageContentInner">
            <form action="">
                <div class="row">

                    <div class="form-group col-md-4">
                        <label for="">نام تحویل گیرنده</label>
                        <input type="text" class="form-control border-radius-5">
                    </div>

                    <div class="form-group col-md-4">
                        <label for="">نام تحویل دهنده</label>
                        <input type="text" class="form-control border-radius-5">
                    </div>

                    <div class="form-group col-md-4">
                        <label for="">تعداد</label>
                        <input type="text" class="form-control border-radius-5">
                    </div>

                    <div class="form-group col-md-12">
                        <label for="">توضیحات</label>
                        <textarea name="" id="" rows="4" class="form-control border-radius-5"></textarea>
                    </div>

                    <div class="col-md-12 d-flex justify-content-center pt-5">
                        <input type="button" class="btn btn-primary border-radius-4 box-shadow-normal submit-custom" value="ثبت">
                    </div>
                </div>
            </form>
        </section>


    </section>

@endsection
