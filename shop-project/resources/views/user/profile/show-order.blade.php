@extends("user.layouts.master-one-col")

@section("head-tag")
    <title>جزئیات سفارش</title>
    <style>
        .order-item-products .item{
            padding: 15px;
            border-top: 1px solid #c0c0c0;
        }
        .order-item-products .item img{
            max-width: 180px;
        }
        .order-item-products .item .info p, .order-item-products .item .info h6{
            margin-bottom: 5px;
        }
        .order-item-products .item .info p{
            color: #6f797d;
            font-size: 14px;
        }
        .order-item-products .item .info p i{
            font-size: 17px;
            margin-left: 6px;
        }
        .order-item-products .item .info .color{
            display: flex;
            align-items: center;
        }
        .order-item-products .item .info .color span{
            width: 15px;
            height: 15px;
            display: inline-block;
            border-radius: 50%;
            border: 1px solid #d4d4d4;
            margin-left: 9px;
        }
        .order-item-products .item .info .discount{
            font-size: 13px;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .order-item-products .item .info .price{
            font-size: 17px;
            font-weight: bold;
        }
        @media screen and (max-width: 768px){
            .item-name{
                font-size: 12px;
            }
            .order-item-products .item img{
                max-width: 90px;
            }
        }
    </style>
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

                        <!-- start content header -->
                        <section class="content-header mb-4">
                            <section class="d-flex justify-content-between align-items-center">
                                <h2 class="content-header-title">
                                    <span>جزئیات سفارش</span>
                                </h2>
                                <section class="content-header-link">
                                    <a class="btn btn-danger text-white" href="{{ route("user.profile.orders") }}">بازگشت</a>
                                </section>
                            </section>
                        </section>
                        <!-- end content header -->


                        <section class="info">
                            <section>
                                <h6>
                                    کد پیگیری سفارش:
                                    <span class="fw-bold">{{ $order->id }}</span>
                                </h6>
                                <h6>
                                    زمان ثبت:
                                    <span class="fw-bold">{{ jalaliDate($order["created_at"], "H:i %A %d %B %Y") ?? "-" }}</span>
                                </h6>

                                <h6 class="d-inline-block me-4">
                                    وضعیت سفارش:
                                    <span class="fw-bold">{{ $order->orderStatusValue }}</span>
                                </h6>

                                <h6 class="d-inline-block">
                                    وضعیت مرسوله:
                                    <span class="fw-bold">{{ $order->deliveryStatusValue }}</span>
                                </h6>

                                <hr>

                                <h6 class="d-inline-block me-4">
                                    ارسال با:
                                    <span class="fw-bold">{{ $order->delivery->name }}</span>
                                </h6>

                                <h6 class="d-inline-block me-4">
                                    نام تحویل گیرنده:
                                    <span class="fw-bold">
                                        @if($order->address->recipient_first_name !== null)
                                            {{ $order->address->recipient_first_name . " " . $order->address->recipient_last_name }}
                                        @else
                                            {{ $order->user->fullName }}
                                        @endif
                                    </span>
                                </h6>

                                <h6 class="d-inline-block">
                                    شماره تماس:
                                    <span class="fw-bold">{{ $order->address->mobile ?? "0" . $order->user->mobile }}</span>
                                </h6>

                                <h6>
                                    آدرس:
                                    <span class="fw-bold">{{ $order->address->address }}</span>
                                </h6>

                                <hr>

                                <h6 class="d-inline-block me-4">
                                    مبلغ سفارش:
                                    <span class="fw-bold">{{ priceFormat($order->order_final_amount) }} تومان</span>
                                </h6>

                                <h6 class="d-inline-block me-4">
                                    میزان تخفیف:
                                    <span class="fw-bold">{{ priceFormat($order->order_total_products_discount_amount) }} تومان</span>
                                </h6>

                                <h6 class="d-inline-block me-4">
                                    شیوه پرداخت:
                                    <span class="fw-bold">{{ $order->paymentTypeValue }}</span>
                                </h6>

                                <h6 class="d-inline-block me-4">
                                    وضعیت پرداخت:
                                    <span class="fw-bold">{{ $order->paymentStatusValue }}</span>
                                </h6>

                            </section>
                            <section class="order-item-products">
                                @foreach($order->orderItems as $item)
                                    <section class="item d-flex">
                                        <section class="me-md-4 me-2">
                                            <img src="{{ asset($item->singleProduct['image']['indexArray'][$item->singleProduct['image']['currentImage']]) }}" alt="{{ $item->singleProduct->name }}">
                                        </section>
                                        <section class="info">
                                            <div>
                                                <h6 class="fw-bold item-name">{{ $item->singleProduct->name }}</h6>
                                                @if($item->guarantee)
                                                    <p class=""><i class="fa fa-shield-alt"></i> {{ $item->guarantee->name }}</p>
                                                @endif
                                                @if($item->color)
                                                    <p class="color"><span style="background-color: {{ $item->color->color }}"></span> {{ $item->color->color_name }}</p>
                                                @endif
                                                <p>{{ $item->number }} عدد</p>
                                            </div>
                                            <div class="mt-4">
                                                @if($item->amazing_sale_discount_amount != 0)
                                                    <h6 class="discount text-danger" title="تخفیف">{{ priceFormat($item->amazing_sale_discount_amount) . "-" }} تومان</h6>
                                                @endif
                                                <h6 class="price">{{ priceFormat($item->final_product_price) }} تومان</h6>
                                            </div>
                                        </section>
                                    </section>
                                @endforeach
                            </section>
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
