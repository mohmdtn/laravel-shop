@extends("admin.layouts.master")

@section("head-tag")
    <title>سفارشات</title>
@endsection

@section("content")

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">خانه</a></li>
            <li class="breadcrumb-item"><a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item active" aria-current="page">سفارشات</li>
        </ol>
    </nav>

    <section class="pagesContent py-3 px-2">
        <div class="sectionHeader sectionHeaderBottom d-flex justify-content-between align-items-center py-3">
            <h4>سفارشات:</h4>
            <input type="text" class="form-control form-control-sm border-radius-4 box-shadow-normal" placeholder="جستجو...">
        </div>

        <div class="sectionHeaderBottom d-flex justify-content-between align-items-center py-3">
{{--            <a href="{{ route("admin.market.order") }}" class="btn btn-info btn-sm border-radius-4 box-shadow-normal">افزودن کالا به لیست فروش شگفت انگیز</a>--}}
{{--            <input type="text" class="form-control form-control-sm border-radius-4 box-shadow-normal" placeholder="جستجو...">--}}
        </div>

        <section class="table-responsive">

            <table class="table table-striped table-hover">
                <thead class="table-info">
                <th>#</th>
                <th>کد سفارش</th>
                <th>مجموع مبلغ سفارش</th>
                <th>مبلغ تخفیف</th>
                <th>مجموع تخفیف همه محصولات</th>
                <th>مبلغ نهایی</th>
                <th>وضعیت پرداخت</th>
                <th>شیوه پرداخت</th>
                <th>بانک</th>
                <th>وضعیت ارسال</th>
                <th>شیوه ارسال</th>
                <th>وضعیت سفارش</th>
                <th>تنظیمات</th>
                </thead>

                <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <th>{{ $loop->iteration }}</th>
                            <td>{{ $order["id"] }}</td>
                            <td>{{ $order["order_final_amount"] }} تومان</td>
                            <td>{{ $order["order_discount_amount"] }} تومان</td>
                            <td>{{ $order["order_total_products_discount_amount"] }} تومان</td>
                            <td>{{ $order["order_final_amount"] - $order["order_discount_amount"] }} تومان</td>
                            <td>{{ $order->paymentStatusValue }}</td>
                            <td>{{ $order->paymentTypeValue }}</td>
                            <td>{{ $order->payment->paymanetable->grtway ?? "-" }}</td>
                            <td>{{ $order->deliveryStatusValue }}</td>
                            <td>{{ $order->delivery->name }}</td>
                            <td>{{ $order->orderStatusValue }}</td>
                            <td>
                                <div class="dropdown">
                                    <a href="#" class="btn btn-sm btn-info border-radius-2 dropdown-toggle" role="button" id="dropdownBtn" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-tools ml-1"></i>عملیات</a>

                                    <div class="dropdown-menu border-radius-5 text-right" aria-labelledby="dropdownBtn">
                                        <a href="{{ route("admin.market.order.show", $order["id"]) }}" class="dropdown-item"><i class="fas fa-scroll ml-1"></i>مشاهده فاکتور</a>
                                        <a href="{{ route("admin.market.order.changeSendStatus", $order["id"]) }}" class="dropdown-item"><i class="fas fa-shipping-fast ml-1"></i>تغییر وضعیت ارسال</a>
                                        <a href="{{ route("admin.market.order.changeOrderStatus", $order["id"]) }}" class="dropdown-item"><i class="fa fa-edit ml-1"></i>تغییر وضعیت سفارش</a>
                                        <a href="{{ route("admin.market.order.cancelOrder", $order["id"]) }}" class="dropdown-item"><i class="fa fa-window-close ml-1"></i>باطل کردن سفارش</a>
                                    </div>
                                </div>
                            </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>

        </section>

    </section>

@endsection
