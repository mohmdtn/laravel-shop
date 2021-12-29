@extends("admin.layouts.master")

@section("head-tag")
    <title>نمایش تیکت</title>
@endsection

@section("content")

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">خانه</a></li>
            <li class="breadcrumb-item"><a href="#">بخش تیکت ها</a></li>
            <li class="breadcrumb-item"><a href="#">تیکت ها</a></li>
            <li class="breadcrumb-item active" aria-current="page">نمایش تیکت</li>
        </ol>
    </nav>

    <section class="pagesContent py-3 px-2">
        <div class="sectionHeader d-flex justify-content-between align-items-center">
            <h4>نمایش تیکت:</h4>

            <a href="{{ route("admin.ticket.newTickets") }}" class="btn btn-info btn-sm border-radius-4 box-shadow-normal">بازگشت</a>
        </div>

        <div class="sectionHeaderBottom d-flex justify-content-between align-items-center py-3">

        </div>

        <section class="pageContentInner">

            <div class="productInfo my-3 border-radius-3">
                <div class="productInfoInner py-3 px-2 border-radius-3 d-flex justify-content-between align-items-center bg-gradiant-1">
                    <div><i class="fas fa-user pl-1"></i> سینا مهدوی - 13891</div>

                    <div><i class="fas fa-clock"></i> دوشنبه 20 آذر 1400 , 22:01</div>
                </div>
                <div class="productInfoInnerSec py-4 px-3">
                    <div class="d-flex justify-content-between">
                        <div>
                            <p class="pl-4 d-inline-block"><span>موضوع:</span>عدم دسترسی به صفحه سفارشات</p>
                        </div>

                    </div>

                    <i class="fas fa-comment pl-2">:</i>من دیروز خرید کردم ولی الآن نمیتونم به صفحه سفارشات برو و وضعیت سفارشمو ببینم
                </div>
            </div>

            <form action="">
                <div class="form-group">
                    <label for="replay">پاسخ تیکت</label>
                    <textarea name="" id="replay" rows="4" class="form-control border-radius-5"></textarea>
                </div>

                <div class="col-md-12 d-flex justify-content-center pt-5">
                    <input type="button" class="btn btn-primary border-radius-4 box-shadow-normal submit-custom" value="ثبت">
                </div>
            </form>

        </section>


    </section>

@endsection
