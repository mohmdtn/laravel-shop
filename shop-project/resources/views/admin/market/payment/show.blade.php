@extends("admin.layouts.master")

@section("head-tag")
    <title>نمایش پرداخت</title>
@endsection

@section("content")

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">خانه</a></li>
            <li class="breadcrumb-item"><a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item"><a href="#">پرداخت ها</a></li>
            <li class="breadcrumb-item active" aria-current="page">نمایش پرداخت</li>
        </ol>
    </nav>

    <section class="pagesContent py-3 px-2">
        <div class="sectionHeader d-flex justify-content-between align-items-center">
            <h4>نمایش پرداخت:</h4>

            <a href="{{ route("admin.market.payment.index") }}" class="btn btn-info btn-sm border-radius-4 box-shadow-normal">بازگشت</a>
        </div>

        <div class="sectionHeaderBottom d-flex justify-content-between align-items-center py-3">

        </div>

        <section class="pageContentInner">

            <div class="productInfo my-3 border-radius-3">
                <div class="productInfoInner py-3 px-2 border-radius-3 d-flex justify-content-between align-items-center">
                    <div><i class="fas fa-user pl-1"></i> {{ $payment->user->FullName }} - {{ $payment->user->id }}</div>

                    <div><i class="fas fa-clock"></i> {{ jalaliDate($payment["created_at"], "H:i:s %A %d %B %Y") }}</div>
                </div>
                <div class="productInfoInnerSec py-4 px-3">
                    <div class="d-flex justify-content-between">
                        <div>
{{--                            <p class="pl-4 d-inline-block"><span>مشخصات کالا:</span> {{ $payment["commentable"]["title"] }}</p>--}}
{{--                            <p class="d-inline-block"><span>کد کالا:</span> {{ $payment["commentable"]["id"] }} </p>--}}
                        </div>

                    </div>

                <div class="row text-center">
                    <div class="col-md-3 pb-4">
                        مبلع پرداخت: {{ $payment->paymentable->amount }} تومان
                    </div>

                    <div class="col-md-3 pb-4">
                        نام بانک: {{ $payment->paymentable->gateway ?? "-" }}
                    </div>

                    <div class="col-md-3 pb-4">
                        شماره تراکنش: {{ $payment->paymentable->transaction_id ?? "-" }}
                    </div>

                    <div class="col-md-3 pb-4">
                        نوع پرداخت:
                        @if($payment["type"] == 0) آنلاین
                        @elseif($payment["type"] == 1) آفلاین
                        @else در محل
                        @endif
                    </div>
                </div>
                </div>
            </div>


        </section>


    </section>

@endsection
