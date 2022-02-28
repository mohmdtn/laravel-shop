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
                            <td>
                                @if($order["payment_status"] == 0) پرداخت نشده
                                @elseif($order["payment_status"] == 1) پرداخت شده
                                @elseif($order["payment_status"] == 2) باطل شده
                                @elseif($order["payment_status"] == 3) برگشت داده شده
                                @endif
                            </td>
                            <td>
                                @if($order["payment_type"] == 0)آنلاین
                                @elseif($order["payment_type"] == 1)آفلاین
                                @elseif($order["payment_type"] == 2)در محل
                                @endif
                            </td>
                            <td>{{ $order->payment->paymanetable->grtway ?? "-" }}</td>
                            <td>
                                @if($order["delivery_status"] == 0) ارسال نشده
                                @elseif($order["delivery_status"] == 1) در حال ارسال
                                @elseif($order["delivery_status"] == 2) ارسال شده
                                @elseif($order["delivery_status"] == 3) تحویل شده
                                @endif
                            </td>
                            <td>{{ $order->delivery->name }}</td>
                            <td>
                                @if($order["status"] == 0) در انتظار تایید
                                @elseif($order["status"] == 1) تایید نشده
                                @elseif($order["status"] == 2) تایید شده
                                @endif
                            </td>
                            <td>
                                <div class="dropdown">
                                    <a href="#" class="btn btn-sm btn-info border-radius-2 dropdown-toggle" role="button" id="dropdownBtn" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-tools ml-1"></i>عملیات</a>

                                    <div class="dropdown-menu border-radius-5 text-right" aria-labelledby="dropdownBtn">
                                        <a href="" class="dropdown-item"><i class="fa fa-images ml-1"></i>مشاهده فاکتور</a>
                                        <a href="" class="dropdown-item"><i class="fa fa-list-ul ml-1"></i>تغییر وضعیت ارسال</a>
                                        <a href="" class="dropdown-item"><i class="fa fa-edit ml-1"></i>تغییر وضعیت سفارش</a>
                                        <a href="" class="dropdown-item"><i class="fa fa-window-close ml-1"></i>باطل کردن سفارش</a>
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
