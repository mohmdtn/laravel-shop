@extends("user.layouts.master-one-col")

@section("head-tag")
    <title>سفارشات شما</title>
@endsection

@section("content")

    <!-- start body -->
    <section class="">
        <section id="main-body-two-col" class="container-xxl body-container">
            <section class="row">
                <aside id="sidebar" class="sidebar col-md-3">
                    @include("user.layouts.partials.profile-sidebar")
                </aside>
                <main id="main-body" class="main-body col-md-9">
                    <section class="content-wrapper bg-white p-3 rounded-2 mb-2">

                        <!-- start vontent header -->
                        <section class="content-header">
                            <section class="d-flex justify-content-between align-items-center">
                                <h2 class="content-header-title">
                                    <span>تاریخچه سفارشات</span>
                                </h2>
                                <section class="content-header-link">
                                    <!--<a href="#">مشاهده همه</a>-->
                                </section>
                            </section>
                        </section>
                        <!-- end vontent header -->


                        <section class="d-flex justify-content-center my-4">
                            <a class="btn btn-info btn-sm text-white mx-1" href="{{ route("user.profile.orders") }}">همه</a>
                            <a class="btn btn-primary btn-sm text-white mx-1" href="{{ route("user.profile.orders" ,"type=0") }}">برسی نشده</a>
                            <a class="btn btn-warning btn-sm text-white mx-1" href="{{ route("user.profile.orders" ,"type=1") }}">در انتظار تایید</a>
                            <a class="btn btn-danger btn-sm mx-1" href="{{ route("user.profile.orders" ,"type=2") }}">تایید نشده</a>
                            <a class="btn btn-success btn-sm mx-1" href="{{ route("user.profile.orders" ,"type=3") }}">تایید شده</a>
                            <a class="btn btn-dark btn-sm mx-1" href="{{ route("user.profile.orders" ,"type=4") }}">باطل شده</a>
                            <a class="btn btn-secondary btn-sm mx-1" href="{{ route("user.profile.orders" ,"type=5") }}">مرجوع شده</a>
                        </section>


                        <!-- start content header -->
                        <section class="content-header mb-3">
                            <section class="d-flex justify-content-between align-items-center">
{{--                                <h2 class="content-header-title content-header-title-small">--}}
{{--                                    در انتظار پرداخت--}}
{{--                                </h2>--}}
                                <section class="content-header-link">
                                    <!--<a href="#">مشاهده همه</a>-->
                                </section>
                            </section>
                        </section>
                        <!-- end content header -->


                        <section class="order-wrapper">

                            @forelse($orders as $order)
                                <section class="order-item">
                                    <section class="d-flex justify-content-between">
                                        <section>
                                            <section class="order-item-date"><i class="fa fa-calendar-alt"></i>{{ jalaliDate($order["created_at"], "H:i:s %A %d %B %Y") ?? "-" }}  </section>
                                            <section class="order-item-id"><i class="fa fa-id-card-alt"></i>کد سفارش :
                                                {{ $order->id }}</section>
                                            <section class="order-item-status"><i class="fa fa-clock"></i> {{ $order->orderStatusValue }}</section>
                                            <section class="order-item-status"><i class="fa fa-credit-card"></i> {{ $order->PaymentStatusValue }}</section>
                                            <section class="order-item-status"><i class="fas fa-shipping-fast"></i> {{ $order->deliveryStatusValue }}</section>
                                            <section class="order-item-products">
                                                @foreach($order->orderItems as $item)
                                                    <a href="{{ route("user.market.product", $item->singleProduct) }}"><img src="{{ asset($item->singleProduct['image']['indexArray'][$item->singleProduct['image']['currentImage']]) }}" alt=""></a>
                                                @endforeach
                                            </section>
                                        </section>
                                        <section class="order-item-link">
                                            <div class="mb-2"><a href="{{ route("user.profile.order.show", $order) }}">مشاهده جزئیات</a></div>
                                            <div><a href="#">پرداخت سفارش</a></div>
                                        </section>
                                    </section>
                                </section>
                            @empty
                                <section class="order-item">
                                    <section class="d-flex justify-content-between">
                                        <p>سفارشی یافت نشد</p>
                                    </section>
                                </section>
                            @endforelse

                        </section>


                    </section>
                </main>
            </section>
        </section>
    </section>
    <!-- end body -->

@endsection

@section("scripts")
@endsection
