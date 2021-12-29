@extends("admin.layouts.master")

@section("head-tag")
    <title>ایجاد تخفیف عمومی</title>
@endsection

@section("content")

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">خانه</a></li>
            <li class="breadcrumb-item"><a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item"><a href="#">تخفیف عمومی</a></li>
            <li class="breadcrumb-item active" aria-current="page">ایجاد تخفیف عمومی</li>
        </ol>
    </nav>

    <section class="pagesContent py-3 px-2">
        <div class="sectionHeader d-flex justify-content-between align-items-center">
            <h4>ایجاد تخفیف عمومی:</h4>

            <a href="{{ route("admin.market.discount.commonDiscount") }}" class="btn btn-info btn-sm border-radius-4 box-shadow-normal">بازگشت</a>
        </div>

        <div class="sectionHeaderBottom d-flex justify-content-between align-items-center py-3">

        </div>

        <section class="pageContentInner">
            <form action="">
                <div class="row">

                    <div class="form-group col-md-4">
                        <label for="">درصد تخفیف</label>
                        <input type="text" class="form-control border-radius-5">
                    </div>

                    <div class="form-group col-md-4">
                        <label for="">حداکثر تخفیف</label>
                        <input type="text" class="form-control border-radius-5">
                    </div>

                    <div class="form-group col-md-4">
                        <label for="">عنوان مناسبت</label>
                        <input type="text" class="form-control border-radius-5">
                    </div>

                    <div class="form-group col-md-4">
                        <label for="">تاریخ شروع</label>
                        <input type="text" class="form-control border-radius-5">
                    </div>

                    <div class="form-group col-md-4">
                        <label for="">تاریخ پایان</label>
                        <input type="text" class="form-control border-radius-5">
                    </div>

                    <div class="col-md-12 d-flex justify-content-center pt-5">
                        <input type="button" class="btn btn-primary border-radius-4 box-shadow-normal submit-custom" value="ثبت">
                    </div>
                </div>
            </form>
        </section>


    </section>

@endsection
