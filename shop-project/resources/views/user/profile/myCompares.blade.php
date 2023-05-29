@extends("user.layouts.master-one-col")

@section("head-tag")
    <title>لیست مقایسه های شما</title>
    <style>
        .compare-wrapper div{
            text-align: center;
        }
        .compare-wrapper img{
            max-width: 100px;
        }
        .compare-wrapper .close-btn {
            font-size: 19px;
            color: #666;
            width: 30px;
            aspect-ratio: 1/1;
            border-radius: 50%;
            background-color: #dddddd;
            display: flex;
            justify-content: center;
            align-items: center;
            text-decoration: none;
            transition: .4s;
            position: absolute;
            left: 0;
            top: 0;
        }
        .compare-wrapper .close-btn:hover{
            background-color: #b4b4b4;
            font-size: 17px;
        }
        .compare-wrapper .product-name{
            font-size: 14px;
            font-weight: bold;
        }
        .compare-wrapper .price{
            font-size: 14px;
            font-weight: bold;
        }
        .compare-wrapper .rate i{
            font-size: 16px;
        }
        .compare-wrapper .rate span{
            font-size: 14px;
        }
        .compare-wrapper .price span{
            font-size: 10px;
        }
        .compare-wrapper .metas {
            color: #171a1d;
            font-size: 14px;
            min-height: 100px;
        }
        .compare-wrapper .metas span{
            font-size: 12px;
            display: block;
            width: 100%;
            color: #9e9e9e;
            margin-bottom: 5px;
            text-align: center;
        }
    </style>
@endsection

@section("content")

    <!-- start body -->
    <section class="">
        <section id="main-body-two-col" class="container-xxl body-container">
            @if (session("success"))
                <div class="alert alert-success">
                    {{ session("success") }}
                </div>
            @endif
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
                                    <span>لیست مقایسه های من</span>
                                </h2>
                                <section class="content-header-link">
                                    <!--<a href="#">مشاهده همه</a>-->
                                </section>
                            </section>
                        </section>
                        <!-- end Content header -->


                        <section class="d-flex justify-center">
                            @foreach(auth()->user()->compare->products as $product)
                                <section class="compare-wrapper col">
                                    <div class="position-relative">
                                        <img src="{{ asset($product['image']['indexArray'][$product['image']['currentImage']]) }}" alt="">
                                        <a class="close-btn" href="{{ route("user.profile.compares.remove", $product->slug) }}"><i class="fa fa-times"></i></a>
                                    </div>
                                    <div class="product-name">{{ $product->name }}</div>
                                    <div class="price">{{ priceFormat($product->price) }} <span>تومان</span></div>
                                    <div class="rate mb-5"><i class="fas fa-star text-warning"></i> <span class="d-inline">{{ number_format($product->ratingsAvg(), 1) }}</span></div>
                                    @foreach($product->metas as $meta)
                                        <div class="metas mt-3 pt-2 border-bottom">
                                            <span>{{ $meta->meta_key }}</span>
                                            {{ $meta->meta_value }}
                                        </div>
                                    @endforeach
                                </section>
                            @endforeach
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
