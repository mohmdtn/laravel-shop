@extends("user.layouts.master-one-col")

@section("head-tag")
    <title>سبد خرید شما</title>
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
                                <span>سبد خرید شما</span>
                            </h2>
                            <section class="content-header-link">
                                <!--<a href="#">مشاهده همه</a>-->
                            </section>
                        </section>
                    </section>

                    <section class="row mt-4">
                        <section class="col-md-9 mb-3">
                            <section class="content-wrapper bg-white p-3 rounded-2">

                                <form action="{{ route("user.salesProcess.updateCart") }}" id="cart_items" method="post">
                                    @csrf
                                    @php
                                        $totalProductPrice = 0;
                                        $totalDiscount = 0;
                                    @endphp

                                    @foreach($cartItems as $cartItem)
                                        @php
                                            $totalProductPrice += $cartItem->cartItemProductPrice();
                                            $totalDiscount += $cartItem->cartItemProductDiscount();
                                        @endphp
                                        <section class="cart-item d-md-flex py-3">
                                            <section class="cart-img align-self-start flex-shrink-1"><img src="{{ asset($cartItem->product['image']['indexArray'][$cartItem->product['image']['currentImage']]) }}" alt=""></section>
                                            <section class="align-self-start w-100">
                                                <p class="fw-bold">{{ $cartItem->product["name"] }}</p>

                                                @if(!empty($cartItem->color))
                                                    <p><span style="background-color: {{ $cartItem->color["color"] }};" class="cart-product-selected-color me-1"></span> <span>{{ $cartItem->color["color_name"] }}</span></p>
                                                @else
                                                    <p></p>
                                                @endif

                                                @if(!empty($cartItem->guarantee))
                                                    <p><i class="fa fa-shield-alt cart-product-selected-warranty me-1"></i> <span>{{ $cartItem->guarantee["name"] }}</span></p>
                                                @else
                                                    <p><i class="fa fa-shield-alt cart-product-selected-warranty me-1"></i> <span>گارانتی وجود ندارد</span></p>
                                                @endif
                                                <p><i class="fa fa-store-alt cart-product-selected-store me-1"></i> <span>کالا موجود در انبار</span></p>
                                                <section>
                                                    <section class="cart-product-number d-inline-block ">
                                                        <button class="cart-number cart-number-down" type="button">-</button>
                                                        <input name="number[{{ $cartItem['id'] }}]" class="number" data-product-price="{{ $cartItem->cartItemProductPrice() }}" data-product-discount="{{ $cartItem->cartItemProductDiscount() }}" type="number" min="1" max="5" step="1" data-max-number="{{ $cartItem->product["marketable_number"] }}" value="{{ $cartItem["number"] }}" readonly="readonly">
                                                        <button class="cart-number cart-number-up" type="button">+</button>
                                                    </section>
                                                    <a class="text-decoration-none ms-4 cart-delete" href="{{ route("user.salesProcess.removeFormCart", $cartItem) }}"><i class="fa fa-trash-alt"></i> حذف از سبد</a>
                                                </section>
                                            </section>
                                            <section class="align-self-end flex-shrink-1">
                                                @if(!empty($cartItem->product->activeAmazingSale()))
                                                    <section class="cart-item-discount text-danger text-nowrap mb-1">تخفیف {{ priceFormat($cartItem->cartItemProductDiscount()) }}</section>
                                                @endif
                                                <section class="text-nowrap fw-bold">{{ priceFormat($cartItem->cartItemProductPrice()) }} تومان</section>
                                            </section>
                                        </section>
                                    @endforeach
                                </form>

                            </section>
                        </section>
                        <section class="col-md-3">
                            <section class="content-wrapper bg-white p-3 rounded-2 cart-total-price">
                                <section class="d-flex justify-content-between align-items-center">
                                    <p class="text-muted">قیمت کالاها ({{ $cartItems->count() }})</p>
                                    <p class="text-muted"><span id="total_product_price">{{ priceFormat($totalProductPrice) }}</span> تومان</p>
                                </section>

                                @if($totalDiscount != 0)
                                    <section class="d-flex justify-content-between align-items-center">
                                        <p class="text-muted">تخفیف کالاها</p>
                                        <p class="text-danger fw-bolder"><span id="total_discount">{{ priceFormat($totalDiscount) }}</span> تومان</p>
                                    </section>
                                @endif

                                <section class="border-bottom mb-3"></section>
                                <section class="d-flex justify-content-between align-items-center">
                                    <p class="text-muted">جمع سبد خرید</p>
                                    <p class="fw-bolder"><span id="total_price">{{ priceFormat($totalProductPrice - $totalDiscount) }}</span> تومان</p>
                                </section>

                                <p class="my-3">
                                    <i class="fa fa-info-circle me-1"></i>کاربر گرامی  خرید شما هنوز نهایی نشده است. برای ثبت سفارش و تکمیل خرید باید ابتدا آدرس خود را انتخاب کنید و سپس نحوه ارسال را انتخاب کنید. نحوه ارسال انتخابی شما محاسبه و به این مبلغ اضافه شده خواهد شد. و در نهایت پرداخت این سفارش صورت میگیرد.
                                </p>


                                <section class="">
                                    <button onclick="document.getElementById('cart_items').submit();" class="btn btn-danger d-block w-100">تکمیل فرآیند خرید</button>
                                </section>

                            </section>
                        </section>
                    </section>
                </section>
            </section>

        </section>
    </section>
    <!-- end cart -->

    <!-- related products -->
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
    <!-- end related products -->
@endsection

@section("scripts")

    <script>
        $(document).ready(function (){
            bill();

            $(".cart-number").click(function (){
                bill();
            });

            function bill(){
                var total_product_price = 0;
                var total_discount = 0;
                var total_price = 0;

                $(".number").each(function (){
                    var productPrice = parseFloat($(this).data("product-price"));
                    var productDiscount = parseFloat($(this).data("product-discount"));
                    var number = parseFloat($(this).val());

                    total_product_price += productPrice * number;
                    total_discount += productDiscount * number;
                });

                total_price = total_product_price - total_discount;

                $("#total_product_price").html(toFarsiNumber(total_product_price));
                $("#total_discount").html(toFarsiNumber(total_discount));
                $("#total_price").html(toFarsiNumber(total_price));

            }
        });
    </script>

    <script>
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
                        $(".toast").toast("show");
                    }
                }
            })
        });
    </script>
@endsection
