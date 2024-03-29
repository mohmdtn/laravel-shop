@extends("user.layouts.master-one-col")

@section("head-tag")
    <title>{{ $product["name"] }}</title>
    <style>
        .rate {
            /*float: right;*/
            height: 49px;
            /*padding: 0 10px;*/
        }
        .rate:not(:checked) > input {
            position:absolute;
            /*top:-9999px;*/
            display: none;
        }
        .rate:not(:checked) > label {
            float:right;
            width:1em;
            overflow:hidden;
            white-space:nowrap;
            cursor:pointer;
            font-size:30px;
            color:#ccc;
        }
        .rate:not(:checked) > label:before {
            content: '★ ';
        }
        .rate > input:checked ~ label {
            color: #ffc700;
        }
        .rate:not(:checked) > label:hover,
        .rate:not(:checked) > label:hover ~ label {
            color: #deb217;
        }
        .rate > input:checked + label:hover,
        .rate > input:checked + label:hover ~ label,
        .rate > input:checked ~ label:hover,
        .rate > input:checked ~ label:hover ~ label,
        .rate > label:hover ~ input:checked ~ label {
            color: #c59b08;
        }

        .rate-info{
            font-size: 14px;
        }

        .rate-info .count{
            font-size: 11px;
        }
    </style>
@endsection

@section("content")
    <!-- start cart -->
    <section class="mb-4">
        <section class="container-xxl" >
            <section class="row">
                <section class="col">
                    <!-- start vontent header -->
                    <section class="content-header">
                        <section class="d-flex justify-content-between align-items-center">
                            <h2 class="content-header-title">
                                <span>{{ $product["name"] }}</span>
                            </h2>
                            <section class="content-header-link">
                                <!--<a href="#">مشاهده همه</a>-->
                            </section>
                        </section>
                    </section>

                    <section class="row mt-4">
                        <!-- start image gallery -->
                        <section class="col-md-4">
                            <section class="content-wrapper bg-white p-3 rounded-2 mb-4">
                                <section class="product-gallery">
                                    @php
                                        $imageGallery = $product->images()->get();
                                        $images = collect();
                                        $images->push($product->image["indexArray"]["medium"]);
                                        foreach ($imageGallery as $gallery){
                                            $images->push($gallery->image);
                                        }
                                    @endphp
                                    <section class="product-gallery-selected-image mb-3" id="zoom">
                                        <img src="{{ asset($images->first()) }}" alt="">
                                    </section>
                                    <section class="product-gallery-thumbs">
                                        @foreach($images as $key => $image)
                                            <img class="product-gallery-thumb" src="{{ asset($image) }}" alt="{{ asset($image) . "-" . $key }}" data-input="{{ asset($image) }}">
                                        @endforeach
                                    </section>
                                </section>
                            </section>
                        </section>
                        <!-- end image gallery -->

                        <!-- start product info -->
                        <section class="col-md-5">

                            <section class="content-wrapper bg-white p-3 rounded-2 mb-4">
                                <form action="{{ route("user.salesProcess.addToCart", $product) }}" method="post" class="productForm" id="add_to_cart">
                                    @csrf
                                    <!-- start vontent header -->
                                    <section class="content-header mb-3">
                                        <section class="d-flex justify-content-between align-items-center">
                                            <h2 class="content-header-title content-header-title-small">
                                                {{ $product["name"] }}
                                            </h2>
                                            <section class="rate-info">
                                                <div class="d-inline-block text-secondary count" class="d-inline-block" data-bs-toggle="tooltip" data-bs-placement="top" title="تعداد آرا">({{ $product->ratingsCount() }})</div>
                                                <div class="d-inline-block" data-bs-toggle="tooltip" data-bs-placement="top" title="میانگین امتیازات">
                                                    <i class="fas fa-star text-warning"></i> <span class="d-inline">{{ number_format($product->ratingsAvg(), 1, ".") }}</span>
                                                </div>
                                            </section>
                                        </section>
                                    </section>
                                    <section class="product-info">

                                        @if($product->colors->count() != 0)
                                            <p><span>رنگ انتخاب شده : <span id="selected_color_name">{{ $product->colors->first()->color_name }}</span></span></p>
                                            <p>
                                                @foreach($product->colors as $key => $color)
                                                    <label for="{{ "color_" . $color->id }}" style="background-color: {{ $color->color }};" class="product-info-colors me-1" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{ $color->color_name }}"></label>
                                                    <input class="d-none" type="radio" name="color" id="{{ "color_" . $color->id }}" value="{{ $color->id }}" data-color-name="{{ $color->color_name }}" data-color-price="{{ $color->price_increase }}" @if($key == 0) checked @endif>
                                                @endforeach
                                            </p>
                                        @endif

                                        @if($product->guarantees->count() != 0)
                                            <p class="d-flex justify-content-center align-items-center"><i class="fa fa-shield-alt cart-product-selected-warranty me-1"></i>
                                            گارانتی:
                                                <select name="guarantee" id="guarantee" class="p-1 form-control">
                                                    @foreach($product->guarantees as $key => $guarantee)
                                                        <option value="{{ $guarantee->id }}" data-guarantee-price="{{ $guarantee->price_increase }}" @if($key == 0) selected @endif>{{ $guarantee->name }}</option>
                                                    @endforeach
                                                </select>
                                            </p>
                                        @endif

                                        @if($product["marketable_number"] > 0)
                                            <p><i class="fa fa-store-alt cart-product-selected-store me-1"></i> <span>کالا موجود در انبار</span></p>
                                        @else
                                            <p><i class="fa fa-store-alt cart-product-selected-store me-1"></i> <span>کالا ناموجود</span></p>
                                        @endif

                                            @guest
                                                <p>
                                                    <button type="button" class="btn btn-light p-1 btn-sm text-decoration-none add_to_favorite2" data-url="{{ route("user.market.addToFavorite", $product) }}">
                                                        <i class="fa fa-heart text-dark"></i><span class="addFave"> افزودن به علاقه مندی</span>
                                                    </button>
                                                </p>
                                            @endguest
                                            @auth
                                                @if($product->user->contains(auth()->user()->id))
                                                    <p>
                                                        <button type="button" class="btn btn-light p-1 btn-sm text-decoration-none add_to_favorite2" data-url="{{ route("user.market.addToFavorite", $product) }}">
                                                            <i class="fa fa-heart text-danger"></i><span class="addFave"> حذف از علاقه مندی</span>
                                                        </button>
                                                    </p>
                                                @else
                                                    <p>
                                                        <button type="button" class="btn btn-light p-1 btn-sm text-decoration-none add_to_favorite2" data-url="{{ route("user.market.addToFavorite", $product) }}">
                                                            <i class="fa fa-heart text-dark"></i><span class="addFave"> افزودن به علاقه مندی</span>
                                                        </button>
                                                    </p>
                                                @endif
                                            @endauth

                                            {{-- compare section --}}
                                            @guest
                                                <p>
                                                    <button type="button" class="btn btn-light p-1 btn-sm text-decoration-none add_to_compare" data-url="{{ route("user.market.addToCompare", $product) }}">
                                                        <i class="fas fa-chart-bar text-dark"></i><span class="addFave"> افزودن به لیست مقایسه</span>
                                                    </button>
                                                </p>
                                            @endguest
                                            @auth
                                                @if($product->compares->contains(function($compare, $key) {
                                                    return $compare->id === auth()->user()->compare->id;
                                                }))
                                                    <p>
                                                        <button type="button" class="btn btn-light p-1 btn-sm text-decoration-none add_to_compare" data-url="{{ route("user.market.addToCompare", $product) }}">
                                                            <i class="fas fa-chart-bar text-danger"></i><span class="addFave"> حذف از لیست مقایسه</span>
                                                        </button>
                                                    </p>
                                                @else
                                                    <p>
                                                        <button type="button" class="btn btn-light p-1 btn-sm text-decoration-none add_to_compare" data-url="{{ route("user.market.addToCompare", $product) }}">
                                                            <i class="fas fa-chart-bar text-dark"></i><span class="addFave"> افزودن به لیست مقایسه</span>
                                                        </button>
                                                    </p>
                                                @endif
                                            @endauth

                                        <section>
                                            <section class="cart-product-number d-inline-block ">
                                                <button class="cart-number cart-number-down" type="button">-</button>
                                                <input id="number" name="number" type="number" min="1" max="{{ $product["marketable_number"] }}" step="1" value="1" data-max-number="{{ $product["marketable_number"] }}" readonly="readonly">
                                                <button class="cart-number cart-number-up" type="button">+</button>
                                            </section>
                                        </section>
                                        <p class="mb-3 mt-5">
                                            <i class="fa fa-info-circle me-1"></i>کاربر گرامی  خرید شما هنوز نهایی نشده است. برای ثبت سفارش و تکمیل خرید باید ابتدا آدرس خود را انتخاب کنید و سپس نحوه ارسال را انتخاب کنید. نحوه ارسال انتخابی شما محاسبه و به این مبلغ اضافه شده خواهد شد. و در نهایت پرداخت این سفارش صورت میگیرد. پس از ثبت سفارش کالا بر اساس نحوه ارسال که شما انتخاب کرده اید کالا برای شما در مدت زمان مذکور ارسال می گردد.
                                        </p>
                                    </section>
                                </form>
                            </section>

                        </section>
                        <!-- end product info -->

                        <section class="col-md-3">
                            <section class="content-wrapper bg-white p-3 rounded-2 cart-total-price">
                                <section class="d-flex justify-content-between align-items-center">
                                    <p class="text-muted">قیمت کالا</p>
                                    <p class="text-muted"><span id="product_price">{{ priceFormat($product["price"]) }}</span> <span class="small">تومان</span></p>
                                </section>

                                @php
                                    $amazingSale = $product->activeAmazingSale();
                                @endphp
                                @if(!empty($amazingSale))
                                    <section class="d-flex justify-content-between align-items-center">
                                        <p class="text-muted">تخفیف کالا</p>
                                        <p class="text-danger fw-bolder" id="product_discount_price" data-product-discount-price="{{ $product["price"] * $amazingSale["percentage"] / 100 }}">{{ priceFormat($product["price"] * $amazingSale["percentage"] / 100) }} <span class="small">تومان</span></p>
                                    </section>
                                @endif
                                <section class="border-bottom mb-3"></section>

                                <section class="d-flex justify-content-end align-items-center">
                                    <p class="fw-bolder"><span id="final_price"></span> <span class="small">تومان</span></p>
                                </section>

                                <section class="">
                                    @if($product["marketable_number"] > 0)
                                        <button id="next-level" class="btn btn-danger d-block w-100" onclick="document.getElementById('add_to_cart').submit()">افزودن به سبد خرید</button>
                                    @else
                                        <a id="next-level" href="#" class="btn btn-secondary text-white disabled d-block">محصول ناموجود می باشد</a>
                                    @endif
                                </section>

                            </section>
                        </section>
                    </section>
                </section>
            </section>

        </section>
    </section>
    <!-- end cart -->



    <!-- start product lazy load -->
    <section class="mb-4">
        <section class="container-xxl" >
            <section class="row">
                <section class="col">
                    <section class="content-wrapper bg-white p-3 rounded-2">
                        <!-- start vontent header -->
                        <section class="content-header">
                            <section class="d-flex justify-content-between align-items-center">
                                <h2 class="content-header-title">
                                    <span>کالاهای مرتبط</span>
                                </h2>
                                <section class="content-header-link">
                                    <!--<a href="#">مشاهده همه</a>-->
                                </section>
                            </section>
                        </section>
                        <!-- start vontent header -->
                        <section class="lazyload-wrapper" >
                            <section class="lazyload light-owl-nav owl-carousel owl-theme">

                                @foreach($relatedProducts as $relatedProduct)
                                    <section class="item">
                                        <section class="lazyload-item-wrapper">
                                            <section class="product">

                                                @if($relatedProduct["marketable_number"] > 0 && auth()->check())
                                                    <form action="{{ route("user.salesProcess.addToCart", $relatedProduct) }}" method="post" id="form-2-{{ $relatedProduct->id }}">
                                                        @csrf
                                                        <input type="hidden" name="guarantee" value="{{ $relatedProduct->guarantees->first() ? $relatedProduct->guarantees->first()->id : null }}">
                                                        <input type="hidden" name="color" value="{{ $relatedProduct->colors->first() ? $relatedProduct->colors->first()->id : null }}">
                                                        <input type="hidden" name="number" value="1">
                                                        <section class="product-add-to-cart"><a href="#" onclick="document.getElementById('form-2-{{ $relatedProduct->id }}').submit();" data-bs-toggle="tooltip" data-bs-placement="left" title="افزودن به سبد خرید"><i class="fa fa-cart-plus"></i></a></section>
                                                    </form>
                                                @endif
                                                @guest
                                                    <section class="product-add-to-cart"><a href="{{ route("auth.user.loginRegisterForm") }}" data-bs-toggle="tooltip" data-bs-placement="left" title="افزودن به سبد خرید"><i class="fa fa-cart-plus"></i></a></section>
                                                @endguest

                                                @guest
                                                    <section class="product-add-to-favorite">
                                                        <span class="add_to_favorite" data-url="{{ route("user.market.addToFavorite", $relatedProduct) }}" data-bs-toggle="tooltip" data-bs-placement="left" title="افزودن به علاقه مندی">
                                                            <i class="fa fa-heart"></i>
                                                        </span>
                                                    </section>
                                                @endguest

                                                @auth
                                                    @if($relatedProduct->user->contains(auth()->user()->id))
                                                        <section class="product-add-to-favorite">
                                                            <span class="add_to_favorite bg-white text-danger" data-url="{{ route("user.market.addToFavorite", $relatedProduct) }}" data-bs-toggle="tooltip" data-bs-placement="left" title="حذف از علاقه مندی">
                                                                <i class="fa fa-heart"></i>
                                                            </span>
                                                        </section>
                                                    @else
                                                        <section class="product-add-to-favorite">
                                                            <span class="add_to_favorite" data-url="{{ route("user.market.addToFavorite", $relatedProduct) }}" data-bs-toggle="tooltip" data-bs-placement="left" title="افزودن به علاقه مندی">
                                                                <i class="fa fa-heart"></i>
                                                            </span>
                                                        </section>
                                                    @endif
                                                @endauth
                                                <a class="product-link" href="{{ route("user.market.product", $relatedProduct["slug"]) }}">
                                                    <section class="product-image">
                                                        <img class="" src="{{ asset($relatedProduct['image']['indexArray'][$relatedProduct['image']['currentImage']]) }}" alt="{{ $relatedProduct["name"] }}">
                                                    </section>
                                                    <section class="product-colors"></section>
                                                    <section class="product-name"><h3>{{ \Illuminate\Support\Str::limit($relatedProduct["name"], 20) }}</h3></section>
                                                    <section class="product-price-wrapper">
                                                        <section class="product-discount">
                                                            @php
                                                                $amazingSale = $relatedProduct->activeAmazingSale();
                                                                $productDiscount = empty($relatedProduct->activeAmazingSale()) ? 0 : $relatedProduct->price * ($relatedProduct->activeAmazingSale()->percentage / 100);
                                                            @endphp
                                                            @if(!empty($amazingSale))
                                                                <span class="product-old-price">{{ priceFormat($relatedProduct["price"]) }}</span>
                                                                <span class="product-discount-amount">{{ $amazingSale["percentage"] }}%</span>
                                                            @endif
                                                        </section>
                                                        <section class="product-price">{{ priceFormat($relatedProduct["price"] - $productDiscount) }} تومان</section>
                                                    </section>
                                                    <section class="product-colors">
                                                        @foreach($relatedProduct->colors as $color)
                                                            <section class="product-colors-item" style="background-color: {{ $color->color }};"></section>
                                                        @endforeach
                                                    </section>
                                                </a>
                                            </section>
                                        </section>
                                    </section>
                                @endforeach

                            </section>
                        </section>
                    </section>
                </section>
            </section>
        </section>
    </section>
    <!-- end product lazy load -->

    <!-- start description, features and comments -->
    <section class="mb-4">
        <section class="container-xxl" >
            <section class="row">
                <section class="col">
                    <section class="content-wrapper bg-white p-3 rounded-2">
                        <!-- start content header -->
                        <section id="introduction-features-comments" class="introduction-features-comments">
                            <section class="content-header">
                                <section class="d-flex justify-content-between align-items-center">
                                    <h2 class="content-header-title">
                                        <span class="me-2"><a class="text-decoration-none text-dark" href="#introduction">معرفی</a></span>
                                        <span class="me-2"><a class="text-decoration-none text-dark" href="#features">ویژگی ها</a></span>
                                        <span class="me-2"><a class="text-decoration-none text-dark" href="#comments">دیدگاه ها</a></span>
                                        <span class="me-2"><a class="text-decoration-none text-dark" href="#rates">امتیاز ها</a></span>
                                    </h2>
                                    <section class="content-header-link">
                                        <!--<a href="#">مشاهده همه</a>-->
                                    </section>
                                </section>
                            </section>
                        </section>
                        <!-- start content header -->

                        <section class="py-4">

                            <!-- start vontent header -->
                            <section id="introduction" class="content-header mt-2 mb-4">
                                <section class="d-flex justify-content-between align-items-center">
                                    <h2 class="content-header-title content-header-title-small">
                                        معرفی
                                    </h2>
                                    <section class="content-header-link">
                                        <!--<a href="#">مشاهده همه</a>-->
                                    </section>
                                </section>
                            </section>
                            <section class="product-introduction mb-4">
                                {!! $product["introduction"] !!}
                            </section>

                            <!-- start vontent header -->
                            <section id="features" class="content-header mt-2 mb-4">
                                <section class="d-flex justify-content-between align-items-center">
                                    <h2 class="content-header-title content-header-title-small">
                                        ویژگی ها
                                    </h2>
                                    <section class="content-header-link">
                                        <!--<a href="#">مشاهده همه</a>-->
                                    </section>
                                </section>
                            </section>
                            <section class="product-features mb-4 table-responsive">
                                <table class="table table-bordered border-white">
                                    @foreach($product->values as $value)
                                        <tr>
                                            <td>{{ $value->attribute->name }}</td>
                                            <td>{{ json_decode($value->value)->value . " " . $value->attribute->unit }}</td>
                                        </tr>
                                    @endforeach

                                    @foreach($product->metas as $meta)
                                        <tr>
                                            <td>{{ $meta->meta_key }}</td>
                                            <td>{{ $meta->meta_value }}</td>
                                        </tr>
                                    @endforeach
                                </table>
                            </section>

                            <!-- start vontent header -->
                            <section id="comments" class="content-header mt-2 mb-4">
                                <section class="d-flex justify-content-between align-items-center">
                                    <h2 class="content-header-title content-header-title-small">
                                        دیدگاه ها
                                    </h2>
                                </section>
                            </section>
                            <section class="product-comments mb-4">

                                <section class="comment-add-wrapper">
                                    <button class="comment-add-button" type="button" data-bs-toggle="modal" data-bs-target="#add-comment" ><i class="fa fa-plus"></i> افزودن دیدگاه</button>
                                    <!-- start add comment Modal -->
                                    <section class="modal fade" id="add-comment" tabindex="-1" aria-labelledby="add-comment-label" aria-hidden="true">
                                        <section class="modal-dialog">
                                            <section class="modal-content">
                                                <section class="modal-header">
                                                    <h5 class="modal-title" id="add-comment-label"><i class="fa fa-plus"></i> افزودن دیدگاه</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </section>

                                                @auth
                                                    <section class="modal-body">
                                                        <form class="row" action="{{ route("user.market.addComment", $product) }}" method="post">
                                                            @csrf
                                                            <section class="col-12 mb-2">
                                                                <label for="comment" class="form-label mb-1">دیدگاه شما</label>
                                                                <textarea class="form-control form-control-sm" id="comment" name="body" placeholder="دیدگاه شما ..." rows="4"></textarea>
                                                            </section>

                                                            <section class="modal-footer py-1">
                                                                <button type="submit" class="btn btn-sm btn-primary">ثبت دیدگاه</button>
                                                                <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal">بستن</button>
                                                            </section>
                                                        </form>
                                                    </section>
                                                @endauth

                                                @guest
                                                    <section class="modal-body">
                                                        <p>کاربر گرامی لطفا برای ثبت نظر ابتدا وارد حساب کاربری خود شوید.</p>
                                                        <section class="text-center">
                                                            <a class="btn btn-info text-white" href="{{ route("auth.user.loginRegisterForm") }}">ورود / ثبت نام</a>
                                                        </section>
                                                    </section>
                                                @endguest

                                            </section>
                                        </section>
                                    </section>
                                </section>

                                @foreach($product->activeComments() as $comment)
                                    <section class="product-comment">
                                        <section class="product-comment-header d-flex justify-content-start">
                                            <section class="product-comment-date">{{ jalaliDate($comment["created_at"]) }}</section>
                                            <section class="product-comment-title">
                                                <i class="fas fa-user"></i>
                                                @if(empty($comment->user->first_name))
                                                    ناشناس
                                                @else
                                                    {{ $comment->user->fullName }}
                                                @endif
                                            </section>
                                        </section>
                                        <section class="product-comment-body">
                                            {{ $comment["body"] }}
                                        </section>

                                        @if($comment->answers()->count() > 0)
                                            @foreach($comment->answers as $answer)
                                                <section class="product-comment product-comment-answer ms-5 border-bottom-0">
                                                    <section class="product-comment-header d-flex justify-content-start">
                                                        <section class="product-comment-date">{{ jalaliDate($answer["created_at"]) }}</section>
                                                        <section class="product-comment-title"><i class="fas fa-user-tie"></i> ادمین</section>
                                                    </section>
                                                    <section class="product-comment-body">
                                                        {{ $answer["body"] }}
                                                    </section>
                                                </section>
                                            @endforeach
                                        @endif
                                    </section>
                                @endforeach

                            </section>


                            <section id="rates" class="content-header mt-2 mb-4">
                                <section class="d-flex justify-content-between align-items-center">
                                    <h2 class="content-header-title content-header-title-small">
                                        امتیاز ها
                                    </h2>
                                </section>
                            </section>

                            @auth
                                <section class="text-center">
                                    <form class="text-center" action="{{ route("user.market.addRate", $product) }}" method="post">
                                        @csrf
                                        <div class="rate d-inline-block">
                                            <input type="radio" id="star5" name="rating" value="5" />
                                            <label for="star5" title="text">5 stars</label>
                                            <input type="radio" id="star4" name="rating" value="4" />
                                            <label for="star4" title="text">4 stars</label>
                                            <input type="radio" id="star3" name="rating" value="3" />
                                            <label for="star3" title="text">3 stars</label>
                                            <input type="radio" id="star2" name="rating" value="2" />
                                            <label for="star2" title="text">2 stars</label>
                                            <input type="radio" id="star1" name="rating" value="1" />
                                            <label for="star1" title="text">1 star</label>
                                        </div>
                                        <div class="text-center">
                                            <button class="btn btn-sm btn-danger text-white mx-2">ثبت امتیاز</button>
                                        </div>
                                    </form>
                                </section>
                            @endauth
                            @guest
                                <section>
                                    <h6 class="text-secondary mb-0 d-inline">کاربر گرامی لطفا برای ثبت امتیاز ابتدا وارد حساب کاربری خود شوید.</h6>
                                    <a href="{{ route("auth.user.loginRegisterForm") }}" class="text-white text-decoration-none btn btn-sm btn-info rounded-3">ثبت نام / ورود</a>
                                </section>
                            @endguest
                        </section>

                    </section>
                </section>
            </section>
        </section>
    </section>


    <section class="position-fixed p-4 flex-row-reverse" style="z-index: 99999; left: 0; bottom: 0; width: 26rem; max-width: 80%;">
        <section class="toast toast1" data-delay="6000">
            <section class="toast-header p-1 px-3 d-flex justify-content-between text-white font-weight-bold bg-info">
                <strong>
                    پیغام
                </strong>
                <p type="button" class="ml-2 mb-1 close" data-dismiss="toast" data-bs-dismiss="toast" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </p>
            </section>
            <section class="toast-body">
                برای افزودن کالا به لیست علاقه مندی ها باید ابتدا وارد حساب کاربری خود شوید.
                <br>
                <a href="{{ route("auth.user.loginRegisterForm") }}" class="text-white text-decoration-none btn btn-info rounded-3 mt-3">ثبت نام / ورود</a>
            </section>
        </section>

        <section class="toast toast2" data-delay="6000">
            <section class="toast-header p-1 px-3 d-flex justify-content-between text-white font-weight-bold bg-info">
                <strong>
                    پیغام
                </strong>
                <p type="button" class="ml-2 mb-1 close" data-dismiss="toast" data-bs-dismiss="toast" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </p>
            </section>
            <section class="toast-body">
                تعداد کلا ها برای مقایسه بیشتر از حد مجاز است.
            </section>
        </section>
    </section>
    <!-- end description, features and comments -->
@endsection

@section("scripts")
    <script>
        $(document).ready(function(){
            bill();

            $("input[name='color']").change(function (){
                bill();
            });

            $("select[name='guarantee']").change(function (){
                bill();
            });

            $(".cart-number").click(function (){
                bill();
            });

        });

        function bill(){
            const selected_color = $("input[name='color']:checked");

            if ($("input[name='color']:checked").length != 0){
                $("#selected_color_name").html(selected_color.attr("data-color-name"));
            }

            // calculate price
            var selected_color_price = 0;
            var selected_guarantee_price = 0;
            var number = 1;
            var product_discount_price = 0;
            var product_original_price = parseFloat({{ $product->price }});

            if ($("input[name='color']:checked").length != 0){
                selected_color_price = parseFloat(selected_color.attr("data-color-price"));
            }

            if ($("#guarantee option:selected").length != 0){
                selected_guarantee_price = parseFloat($("#guarantee option:selected").attr("data-guarantee-price"));
            }

            if ($("#number").val() > 0){
                number = $("#number").val();
            }

            if ($("#product_discount_price").length != 0){
                product_discount_price = parseFloat($("#product_discount_price").attr("data-product-discount-price"));
            }

            // final price
            var product_price = product_original_price + selected_color_price + selected_guarantee_price;
            var final_price = number * (product_price - product_discount_price);

            $("#product_price").html(toFarsiNumber(product_price));
            $("#final_price").html(toFarsiNumber(final_price));
        }


        function toFarsiNumber(number){
            const farsiDigits = ["۰", "۱", "۲", "۳", "۴", "۵", "۶", "۷", "۸", "۹"];

            // add comma
            number = new Intl.NumberFormat().format(number);

            // convert to persian
            return number.toString().replace(/\d/g, x => farsiDigits[x]);
        }
    </script>

    <script>
        $(".add_to_favorite").click(function (){
            var url = $(this).attr("data-url");
            var element = $(this);

            $.ajax({
                url: url,
                success: function (result) {
                    if (result.status == 1){
                        element.addClass("text-danger");
                        element.addClass("bg-white");
                        element.attr("data-original-title", "حذف از علاقه مندی ها");
                        element.attr("data-bs-original-title", "حذف از علاقه مندی ها");
                    }

                    else if (result.status == 2){
                        element.removeClass("text-danger");
                        element.removeClass("bg-white");
                        element.attr("data-bs-original-title", "افزودن به علاقه مندی ها");
                    }

                    else if (result.status == 3){
                        $(".toast1").toast("show");
                    }
                }
            })
        });
    </script>


    <script>
        $(".add_to_favorite2").click(function (){
            var url = $(this).attr("data-url");
            var element = $(this);

            $.ajax({
                url: url,
                success: function (result) {
                    if (result.status == 1){
                        element.find("i").removeClass("text-dark");
                        element.find("i").addClass("text-danger");
                        element.find(".addFave").html(" حذف از علاقه مندی ها");
                    }

                    else if (result.status == 2){
                        element.find("i").removeClass("text-danger");
                        element.find(".addFave").html(" افزودن به علاقه مندی ها");
                    }

                    else if (result.status == 3){
                        $(".toast1").toast("show");
                    }
                }
            })
        });

        $(".add_to_compare").click(function (){
            var url = $(this).attr("data-url");
            var element = $(this);

            $.ajax({
                url: url,
                success: function (result) {
                    if (result.status == 1){
                        element.find("i").removeClass("text-dark");
                        element.find("i").addClass("text-danger");
                        element.find(".addFave").html(" حذف از لیست مقایسه");
                    }

                    else if (result.status == 2){
                        element.find("i").removeClass("text-danger");
                        element.find(".addFave").html(" افزودن به لیست مقایسه");
                    }

                    else if (result.status == 3){
                        $(".toast1").toast("show");
                    }

                    else if (result.status == 4){
                        $(".toast2").toast("show");
                    }
                }
            })
        });
    </script>

    <script>
        //start product introduction, features and comment
        $(document).ready(function() {
            var s = $("#introduction-features-comments");
            var pos = s.position();
            $(window).scroll(function() {
                var windowpos = $(window).scrollTop();

                if (windowpos >= pos.top) {
                    s.addClass("stick");
                } else {
                    s.removeClass("stick");
                }
            });
        });
        //end product introduction, features and comment
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-zoom/1.7.21/jquery.zoom.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#zoom').zoom({magnify: 2});
        });
    </script>
@endsection
