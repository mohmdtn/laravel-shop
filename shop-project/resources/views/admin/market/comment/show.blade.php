@extends("admin.layouts.master")

@section("head-tag")
    <title>نمایش نظر</title>
@endsection

@section("content")

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">خانه</a></li>
            <li class="breadcrumb-item"><a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item"><a href="#">نظرات</a></li>
            <li class="breadcrumb-item active" aria-current="page">نمایش نظر</li>
        </ol>
    </nav>

    <section class="pagesContent py-3 px-2">
        <div class="sectionHeader d-flex justify-content-between align-items-center">
            <h4>نمایش نظر:</h4>

            <a href="{{ route("admin.market.comment.index") }}" class="btn btn-info btn-sm border-radius-4 box-shadow-normal">بازگشت</a>
        </div>

        <div class="sectionHeaderBottom d-flex justify-content-between align-items-center py-3">

        </div>

        <section class="pageContentInner">

            <div class="productInfo my-3 border-radius-3">
                <div class="productInfoInner py-3 px-2 border-radius-3 d-flex justify-content-between align-items-center">
                    <div><i class="fas fa-user pl-1"></i> سینا مهدوی - 13891</div>

                    <div><i class="fas fa-clock"></i> دوشنبه 20 آذر 1400 , 22:01</div>
                </div>
                <div class="productInfoInnerSec py-4 px-3">
                    <div class="d-flex justify-content-between">
                        <div>
                            <p class="pl-4 d-inline-block"><span>مشخصات کالا:</span> ساعت هوشمند اپل واچ</p>
                            <p class="d-inline-block"><span>کد کالا:</span> 234401 </p>
                        </div>

                    </div>

                    <i class="fas fa-comment pl-2">:</i>به نظر من ساعت خوبیه ولی قیمتش یکم زیاده
                </div>
            </div>

            <form action="">
                <div class="form-group">
                    <label for="replay">پاسخ ادمین</label>
                    <textarea name="" id="replay" rows="4" class="form-control border-radius-5"></textarea>
                </div>

                <div class="col-md-12 d-flex justify-content-center pt-5">
                    <input type="button" class="btn btn-primary border-radius-4 box-shadow-normal submit-custom" value="ثبت">
                </div>
            </form>

        </section>


    </section>

@endsection
