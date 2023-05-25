@extends("user.layouts.master-one-col")

@section("head-tag")
    <title>فروشگاه آمازون</title>
    @php
        auth()->loginUsingId(7);
    @endphp
@endsection

@section("content")
    <!-- start slideshow -->
    <section class="container-xxl my-4">

        @if (session("success"))
            <div class="alert alert-success">
                {{ session("success") }}
            </div>
        @endif

        @if (session("danger"))
            <div class="alert alert-danger">
                {{ session("danger") }}
            </div>
        @endif



        <section class="row">
            <section class="col-md-8 pe-md-1 ">
                <section id="slideshow" class="owl-carousel owl-theme">
                    @foreach($slideShowImages as $slideShowImage)
                        <section class="item">
                            <a class="w-100 d-block h-auto text-decoration-none" href="{{ urldecode($slideShowImage["url"]) }}">
                                <img class="w-100 rounded-2 d-block h-auto" src="{{ asset($slideShowImage["image"]) }}" alt="{{ $slideShowImage["title"] }}">
                            </a>
                        </section>
                    @endforeach
                </section>
            </section>
            <section class="col-md-4 ps-md-1 mt-2 mt-md-0">
                @foreach($topBanners as $topBanner)
                    <section class="mb-2">
                        <a href="{{ urldecode($topBanner["url"]) }}" class="d-block">
                            <img class="w-100 rounded-2" src="{{ asset($topBanner["image"]) }}" alt="{{ $topBanner["title"] }}">
                        </a>
                    </section>
                @endforeach
            </section>
        </section>
    </section>
    <!-- end slideshow -->



    <!-- start product lazy load -->
    <section class="mb-3">
        <section class="container-xxl" >
            <section class="row">
                <section class="col">
                    <section class="content-wrapper bg-white p-3 rounded-2">
                        <!-- start vontent header -->
                        <section class="content-header">
                            <section class="d-flex justify-content-between align-items-center">
                                <h2 class="content-header-title">
                                    <span>پربازدیدترین کالاها</span>
                                </h2>
                                <section class="content-header-link">
                                    <a href="{{ route("user.products", ["sort" => '4']) }}">مشاهده همه</a>
                                </section>
                            </section>
                        </section>
                        <!-- start vontent header -->
                        <section class="lazyload-wrapper" >
                            <section class="lazyload light-owl-nav owl-carousel owl-theme">

                                @foreach($mostVisitedProducts as $mostVisitedProduct)
                                    <section class="item">
                                        <section class="lazyload-item-wrapper">
                                            <section class="product">

                                                @if($mostVisitedProduct["marketable_number"] > 0 && auth()->check())
                                                    <form action="{{ route("user.salesProcess.addToCart", $mostVisitedProduct) }}" method="post" id="form-1-{{ $mostVisitedProduct->id }}">
                                                        @csrf
                                                        <input type="hidden" name="guarantee" value="{{ $mostVisitedProduct->guarantees->first() ? $mostVisitedProduct->guarantees->first()->id : null }}">
                                                        <input type="hidden" name="color" value="{{ $mostVisitedProduct->colors->first() ? $mostVisitedProduct->colors->first()->id : null }}">
                                                        <input type="hidden" name="number" value="1">
                                                        <section class="product-add-to-cart"><a href="#" onclick="document.getElementById('form-1-{{ $mostVisitedProduct->id }}').submit();" data-bs-toggle="tooltip" data-bs-placement="left" title="افزودن به سبد خرید"><i class="fa fa-cart-plus"></i></a></section>
                                                    </form>
                                                @endif
                                                @guest
                                                        <section class="product-add-to-cart"><a href="{{ route("auth.user.loginRegisterForm") }}" data-bs-toggle="tooltip" data-bs-placement="left" title="افزودن به سبد خرید"><i class="fa fa-cart-plus"></i></a></section>
                                                @endguest

                                                @guest
                                                    <section class="product-add-to-favorite">
                                                        <span class="add_to_favorite" data-url="{{ route("user.market.addToFavorite", $mostVisitedProduct) }}" data-bs-toggle="tooltip" data-bs-placement="left" title="افزودن به علاقه مندی">
                                                            <i class="fa fa-heart"></i>
                                                        </span>
                                                    </section>
                                                @endguest

                                                @auth
                                                    @if($mostVisitedProduct->user->contains(auth()->user()->id))
                                                        <section class="product-add-to-favorite">
                                                            <span class="add_to_favorite bg-white text-danger" data-url="{{ route("user.market.addToFavorite", $mostVisitedProduct) }}" data-bs-toggle="tooltip" data-bs-placement="left" title="حذف از علاقه مندی">
                                                                <i class="fa fa-heart"></i>
                                                            </span>
                                                        </section>
                                                    @else
                                                        <section class="product-add-to-favorite">
                                                            <span class="add_to_favorite" data-url="{{ route("user.market.addToFavorite", $mostVisitedProduct) }}" data-bs-toggle="tooltip" data-bs-placement="left" title="افزودن به علاقه مندی">
                                                                <i class="fa fa-heart"></i>
                                                            </span>
                                                        </section>
                                                    @endif
                                                @endauth

                                                <a class="product-link" href="{{ route("user.market.product", $mostVisitedProduct["slug"]) }}">
                                                    <section class="product-image">
                                                        <img class="" src="{{ asset($mostVisitedProduct['image']['indexArray'][$mostVisitedProduct['image']['currentImage']]) }}" alt="{{ $mostVisitedProduct["name"] }}">
                                                    </section>
                                                    <section class="product-colors"></section>
                                                    <section class="product-name"><h3>{{ \Illuminate\Support\Str::limit($mostVisitedProduct["name"], 20) }}</h3></section>
                                                    <section class="product-price-wrapper">
                                                        <section class="product-discount">
                                                            @php
                                                                $amazingSale = $mostVisitedProduct->activeAmazingSale();
                                                            @endphp
                                                            @if(!empty($amazingSale))
                                                                <span class="product-old-price">{{ priceFormat($mostVisitedProduct["price"]) }}</span>
                                                                <span class="product-discount-amount">{{ $amazingSale["percentage"] }}%</span>
                                                            @endif
                                                        </section>
                                                        <section class="product-price">{{ priceFormat($mostVisitedProduct["price"]) }} تومان</section>
                                                    </section>
                                                    <section class="product-colors">
                                                        @foreach($mostVisitedProduct->colors as $color)
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



    <!-- start ads section -->
    <section class="mb-3">
        <section class="container-xxl">
            <!-- two column-->
            <section class="row py-4">
                @foreach($middleBanners as $middleBanner)
                    <section class="col-12 col-md-6 mt-2 mt-md-0">
                        <a href="{{ urldecode($middleBanner["url"]) }}" class="d-block">
                            <img class="d-block rounded-2 w-100" src="{{ $middleBanner["image"] }}" alt="{{ $middleBanner["name"] }}">
                        </a>
                    </section>
                @endforeach
            </section>

        </section>
    </section>
    <!-- end ads section -->


    <!-- start product lazy load -->
    <section class="mb-3">
        <section class="container-xxl" >
            <section class="row">
                <section class="col">
                    <section class="content-wrapper bg-white p-3 rounded-2">
                        <!-- start vontent header -->
                        <section class="content-header">
                            <section class="d-flex justify-content-between align-items-center">
                                <h2 class="content-header-title">
                                    <span>پیشنهاد آمازون به شما</span>
                                </h2>
                                <section class="content-header-link">
                                    <a href="{{ route("user.products", ["sort" => "5"]) }}">مشاهده همه</a>
                                </section>
                            </section>
                        </section>
                        <!-- start vontent header -->
                        <section class="lazyload-wrapper" >
                            <section class="lazyload light-owl-nav owl-carousel owl-theme">

                                @foreach($offerProducts as $offerProduct)
                                    <section class="item">
                                        <section class="lazyload-item-wrapper">
                                            <section class="product">

                                                @if($offerProduct["marketable_number"] > 0 && auth()->check())
                                                    <form action="{{ route("user.salesProcess.addToCart", $offerProduct) }}" method="post" id="form-2-{{ $offerProduct->id }}">
                                                        @csrf
                                                        <input type="hidden" name="guarantee" value="{{ $offerProduct->guarantees->first() ? $offerProduct->guarantees->first()->id : null }}">
                                                        <input type="hidden" name="color" value="{{ $offerProduct->colors->first() ? $offerProduct->colors->first()->id : null }}">
                                                        <input type="hidden" name="number" value="1">
                                                        <section class="product-add-to-cart"><a href="#" onclick="document.getElementById('form-2-{{ $offerProduct->id }}').submit();" data-bs-toggle="tooltip" data-bs-placement="left" title="افزودن به سبد خرید"><i class="fa fa-cart-plus"></i></a></section>
                                                    </form>
                                                @endif
                                                @guest
                                                    <section class="product-add-to-cart"><a href="{{ route("auth.user.loginRegisterForm") }}" data-bs-toggle="tooltip" data-bs-placement="left" title="افزودن به سبد خرید"><i class="fa fa-cart-plus"></i></a></section>
                                                @endguest

                                                @guest
                                                    <section class="product-add-to-favorite">
                                                        <span class="add_to_favorite" data-url="{{ route("user.market.addToFavorite", $mostVisitedProduct) }}" data-bs-toggle="tooltip" data-bs-placement="left" title="افزودن به علاقه مندی">
                                                            <i class="fa fa-heart"></i>
                                                        </span>
                                                    </section>
                                                @endguest

                                                @auth
                                                    @if($offerProduct->user->contains(auth()->user()->id))
                                                        <section class="product-add-to-favorite">
                                                            <span class="add_to_favorite bg-white text-danger" data-url="{{ route("user.market.addToFavorite", $offerProduct) }}" data-bs-toggle="tooltip" data-bs-placement="left" title="حذف از علاقه مندی">
                                                                <i class="fa fa-heart"></i>
                                                            </span>
                                                        </section>
                                                    @else
                                                        <section class="product-add-to-favorite">
                                                            <span class="add_to_favorite" data-url="{{ route("user.market.addToFavorite", $offerProduct) }}" data-bs-toggle="tooltip" data-bs-placement="left" title="افزودن به علاقه مندی">
                                                                <i class="fa fa-heart"></i>
                                                            </span>
                                                        </section>
                                                    @endif
                                                @endauth
                                                <a class="product-link" href="{{ route("user.market.product", $offerProduct["slug"]) }}">
                                                    <section class="product-image">
                                                        <img class="" src="{{ asset($offerProduct['image']['indexArray'][$offerProduct['image']['currentImage']]) }}" alt="{{ $offerProduct["name"] }}">
                                                    </section>
                                                    <section class="product-colors"></section>
                                                    <section class="product-name"><h3>{{ \Illuminate\Support\Str::limit($offerProduct["name"], 20) }}</h3></section>
                                                    <section class="product-price-wrapper">
                                                        <section class="product-discount">
                                                            <span class="product-old-price">6,895,000 </span>
                                                            <span class="product-discount-amount">10%</span>
                                                        </section>
                                                        <section class="product-price">{{ priceFormat($offerProduct["price"]) }} تومان</section>
                                                    </section>
                                                    <section class="product-colors">
                                                        @foreach($offerProduct->colors as $color)
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


    @if(!empty($bottomBanner))
        <!-- start ads section -->
        <section class="mb-3">
            <section class="container-xxl">
                <!-- one column -->
                <section class="row py-4">
                    <a href="{{ urldecode($bottomBanner["url"]) }}" class="d-block">
                        <section class="col"><img class="d-block rounded-2 w-100" src="{{ $bottomBanner["image"] }}" alt="{{ $bottomBanner["name"] }}"></section>
                    </a>
                </section>
            </section>
        </section>
        <!-- end ads section -->
    @endif


    <!-- start brand part-->
    <section class="brand-part mb-4 py-4">
        <section class="container-xxl">
            <section class="row">
                <section class="col">
                    <!-- start content header -->
                    <section class="content-header">
                        <section class="d-flex align-items-center">
                            <h2 class="content-header-title">
                                <span>برندهای ویژه</span>
                            </h2>
                        </section>
                    </section>
                    <!-- start content header -->
                    <section class="brands-wrapper py-4" >
                        <section class="brands dark-owl-nav owl-carousel owl-theme">
                            @foreach($brands as $brand)
                            <section class="item">
                                <section class="brand-item">
                                    <a href="{{ route("user.products", ["brands[]" => $brand->id]) }}">
                                        <img class="rounded-2" src="{{ $brand["logo"] }}" alt="{{ $brand["name"] }}">
                                    </a>
                                </section>
                            </section>
                            @endforeach
                        </section>
                    </section>
                </section>
            </section>
        </section>
    </section>







    <!-- blog -->
    <section class="mb-3">
        <section class="container-xxl" >
            <section class="row">
                <section class="col">
                    <section class="content-wrapper bg-white p-3 rounded-2">
                        <!-- start content header -->
                        <section class="content-header">
                            <section class="d-flex justify-content-between align-items-center">
                                <h2 class="content-header-title">
                                    <span>مجله بلاگ ها</span>
                                </h2>
                                <section class="content-header-link">
                                    <a href="{{ route("user.content.posts") }}">مشاهده همه</a>
                                </section>
                            </section>
                        </section>
                        <!-- start content header -->
                        <section class="lazyload-wrapper" >
                            <section class="blogs light-owl-nav owl-carousel owl-theme">
                                @foreach($posts as $post)
                                    <a href="{{ route("user.content.post", $post->slug) }}" class="blog-link">
                                        <section class="item">
                                            <section class="lazyload-item-wrapper">
                                                <section class="blog">
                                                    <img class="rounded-3 mb-2" src="{{ asset($post['image']['indexArray']['large']) }}" alt="">
                                                    <section class="blog-info d-flex justify-content-between">
                                                        <span>
                                                            <i class="fa fa-calendar-alt"></i> <span>{{ jalaliDate($post["created_at"], "%d %B %Y") }}</span>
                                                        </span>
                                                        <span>
                                                            <i class="fa fa-comments"></i> <span>{{ $post->comments->count() }}</span>
                                                        </span>
                                                        <span>
                                                            <i class="fa fa-newspaper"></i> <span>{{ $post->postCategory->name }}</span>
                                                        </span>
                                                    </section>
                                                    <h5>{{ Str::limit($post["title"], 25) }}</h5>
                                                    <p>{{ Str::limit($post["summary"], 40) }}</p>
                                                </section>
                                            </section>
                                        </section>
                                    </a>
                                @endforeach
                            </section>
                        </section>
                    </section>
                </section>
            </section>
        </section>
    </section>
    <!-- end of blog -->








    <section class="position-fixed p-4 flex-row-reverse" style="z-index: 99999; left: 0; bottom: 0; width: 26rem; max-width: 80%;">
        <section class="toast" data-delay="6000">
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
    </section>

    <!-- end brand part-->
@endsection

@section("scripts")
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
