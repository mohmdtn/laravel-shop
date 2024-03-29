@extends("admin.layouts.master")

@section("head-tag")
    <title>نمایش فاکتور</title>
@endsection

@section("content")

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route("admin.home") }}">خانه</a></li>
            <li class="breadcrumb-item"><a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item"><a href="{{ route("admin.market.order.all") }}">سفارشات</a></li>
            <li class="breadcrumb-item active" aria-current="page">نمایش فاکتور</li>
        </ol>
    </nav>

    <section class="pagesContent py-3 px-2">
        <div class="sectionHeader d-flex justify-content-between align-items-center">
            <h4>فاکتور:</h4>

            <a href="{{ route("admin.market.order.all") }}" class="btn btn-info btn-sm border-radius-4 box-shadow-normal">بازگشت</a>
        </div>

        <div class="sectionHeaderBottom d-flex justify-content-between align-items-center py-3">

        </div>

        <section class="pageContentInner">

            <div class="productInfo my-3 border-radius-3">
                <div class="productInfoInner py-3 px-2 border-radius-3 d-flex justify-content-between align-items-center">
                    <div><i class="fas fa-user pl-1"></i> {{ $order->user->fullName }} - {{ $order["user_id"] }}</div>

                    <div class="">
                        <a class="btn btn-info rounded-pill" id="print" href="#"><i class="fas fa-print pl-1"></i> چاپ </a>
                        <a class="btn btn-success rounded-pill" href="{{ route("admin.market.order.detail", $order["id"]) }}"><i class="fas fa-book pl-1"></i> جزئیات </a>
                    </div>

{{--                    <div><i class="fas fa-clock"></i> {{ jalaliDate($order["created_at"], "H:i:s %A %d %B %Y") }}</div>--}}
                </div>
                <div class="productInfoInnerSec px-3">
                    <div class="d-flex justify-content-between">
                        <div>
{{--                            <p class="pl-4 d-inline-block"><span>مشخصات کالا:</span> {{ $payment["commentable"]["title"] }}</p>--}}
{{--                            <p class="d-inline-block"><span>کد کالا:</span> {{ $payment["commentable"]["id"] }} </p>--}}
                        </div>
                    </div>
                </div>
                <div class="row text-center">

                    <table class="table table-striped table-hover mb-0" id="printable">
{{--                        <thead class="table-info">--}}
{{--                        <th>#</th>--}}
{{--                        <th>#</th>--}}
{{--                        </thead>--}}

                        <tbody>
                            <tr>
                                <th>شماره فاکتور :</th>
                                <td>{{ $order["id"] }}</td>
                            </tr>

                            <tr>
                                <th>نام مشتری :</th>
                                <td>{{ $order->user->fullName ?? "-" }}</td>
                            </tr>

                            <tr>
                                <th>آدرس :</th>
                                <td>{{ $order->address->address ?? "-" }}</td>
                            </tr>

                            <tr>
                                <th>شهر :</th>
                                <td>{{ $order->address->city->name ?? "-" }}</td>
                            </tr>

                            <tr>
                                <th>کد پستی :</th>
                                <td>{{ $order->address->postal_code ?? "-" }}</td>
                            </tr>

                            <tr>
                                <th>پلاک :</th>
                                <td>{{ $order->address->no ?? "-" }}</td>
                            </tr>

                            <tr>
                                <th>واحد :</th>
                                <td>{{ $order->address->unit ?? "-" }}</td>
                            </tr>

                            <tr>
                                <th>نام گیرنده :</th>
                                <td>{{ $order->address->RecipientFullName ?? "-" }}</td>
                            </tr>

                            <tr>
                                <th>موبایل :</th>
                                <td>{{ $order->address->mobile ?? "-" }}</td>
                            </tr>

                            <tr>
                                <th>نوع پرداخت :</th>
                                <td>{{ $order->paymentTypeValue }}</td>
                            </tr>

                            <tr>
                                <th>وضعیت پرداخت :</th>
                                <td>{{ $order->paymentStatusValue }}</td>
                            </tr>

                            <tr>
                                <th>مبلغ ارسال :</th>
                                <td>{{ $order["delivery_amount"] }} تومان</td>
                            </tr>

                            <tr>
                                <th>وضعیت ارسال :</th>
                                <td>{{ $order->deliveryStatusValue }}</td>
                            </tr>

                            <tr>
                                <th>تاریخ ارسال :</th>
                                <td>{{ jalaliDate($order["delivery_date"], "H:i:s %A %d %B %Y") ?? "-" }}</td>
                            </tr>

                            <tr>
                                <th>مجموع مبلغ سفارش (بدون تخفیف) :</th>
                                <td>{{ $order["order_final_amount"] }} تومان</td>
                            </tr>

                            <tr>
                                <th>مجموع مبلغ تخفیف :</th>
                                <td>{{ $order["order_discount_amount"] }} تومان</td>
                            </tr>

                            <tr>
                                <th>مجموع تخفیف همه محصولات :</th>
                                <td>{{ $order["order_total_products_discount_amount"] }} تومان</td>
                            </tr>

                            <tr>
                                <th>مبلغ نهایی :</th>
                                <td>{{ $order["order_final_amount"] - $order["order_discount_amount"] }} تومان</td>
                            </tr>

                            <tr>
                                <th>بانک :</th>
                                <td>{{ $order->payment->paymanetable->grtway ?? "-" }}</td>
                            </tr>

                            <tr>
                                <th>کوپن استفاده شده :</th>
                                <td>{{ $order->copan->code ?? "-" }}</td>
                            </tr>

                            <tr>
                                <th>تخفیف کد تخفیف :</th>
                                <td>{{ $order["order_copan_discount_amount"] ?? "-" }}</td>
                            </tr>

                            <tr>
                                <th>تخفیف عمومی :</th>
                                <td>{{ $order->commonDiscount->name ?? "-" }}</td>
                            </tr>

                            <tr>
                                <th>مبلغ تخفیف عمومی :</th>
                                <td>{{ $order["order_common_discount_amount"] ?? "-" }}</td>
                            </tr>

                            <tr>
                                <th>وضعیت سفارش :</th>
                                <td>{{ $order->orderStatusValue }}</td>
                            </tr>

                        </tbody>

                    </table>
                </div>
            </div>


        </section>


    </section>

@endsection

@section("scripts")
    <script>
        $("#print").click(function (){
            var restorePage = $("body").html();
            var printContent = $("#printable").clone();
            $("body").empty().html(printContent);
            window.print();
            $("body").empty().html(restorePage);
        });
    </script>
@endsection
