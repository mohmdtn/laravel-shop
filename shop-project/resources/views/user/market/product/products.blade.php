@extends("user.layouts.master-one-col")

@section("head-tag")
    <title>فروشگاه آمازون</title>
@endsection

@section("content")
    <!-- start body -->
    <section class="">
        <section id="main-body-two-col" class="container-xxl body-container">
            <section class="row">
                @include("user.layouts.partials.product-sidebar")
                <main id="main-body" class="main-body col-md-9">
                    <section class="content-wrapper bg-white p-3 rounded-2 mb-2">
                        <section class="filters mb-3">
                            @if(request()->search)
                                <span class="d-inline-block border p-1 rounded bg-light">نتیجه جستجو برای : <span class="badge bg-info text-dark">"{{ request()->search }}"</span></span>
                            @endif
                            @if(request()->brands)
                                <span class="d-inline-block border p-1 rounded bg-light">برند : <span class="badge bg-info text-dark">"{{ implode(", ", $selectedBrandsArray) }}"</span></span>
                            @endif
                            @if(request()->categories)
                                <span class="d-inline-block border p-1 rounded bg-light">دسته : <span class="badge bg-info text-dark">"کتاب"</span></span>
                            @endif
                            @if(request()->min_price)
                                <span class="d-inline-block border p-1 rounded bg-light">قیمت از : <span class="badge bg-info text-dark">{{ priceFormat(request()->min_price) }} تومان</span></span>
                            @endif
                            @if(request()->max_price)
                                <span class="d-inline-block border p-1 rounded bg-light">قیمت تا : <span class="badge bg-info text-dark">{{ priceFormat(request()->max_price) }} تومان</span></span>
                            @endif

                        </section>
                        <section class="sort ">
                            <span>مرتب سازی بر اساس : </span>
                            <a class="btn {{ request()->sort == 1 ? "btn-info" : "btn-light" }} btn-sm px-1 py-0" href="{{ route("user.products", ["search" => request()->search, "min_price" => request()->min_price, "max_price" => request()->max_price,"brands" => request()->brands, "category" => request()->category ? request()->category->id : null, "sort" => "1"]) }}">جدیدترین</a>
                            <a class="btn {{ request()->sort == 2 ? "btn-info" : "btn-light" }} btn-sm px-1 py-0" href="{{ route("user.products", ["search" => request()->search, "min_price" => request()->min_price, "max_price" => request()->max_price,"brands" => request()->brands, "category" => request()->category ? request()->category->id : null, "sort" => "2"]) }}">گران ترین</a>
                            <a class="btn {{ request()->sort == 3 ? "btn-info" : "btn-light" }} btn-sm px-1 py-0" href="{{ route("user.products", ["search" => request()->search, "min_price" => request()->min_price, "max_price" => request()->max_price,"brands" => request()->brands, "category" => request()->category ? request()->category->id : null, "sort" => "3"]) }}">ارزان ترین</a>
                            <a class="btn {{ request()->sort == 4 ? "btn-info" : "btn-light" }} btn-sm px-1 py-0" href="{{ route("user.products", ["search" => request()->search, "min_price" => request()->min_price, "max_price" => request()->max_price,"brands" => request()->brands, "category" => request()->category ? request()->category->id : null, "sort" => "4"]) }}">پربازدیدترین</a>
                            <a class="btn {{ request()->sort == 5 ? "btn-info" : "btn-light" }} btn-sm px-1 py-0" href="{{ route("user.products", ["search" => request()->search, "min_price" => request()->min_price, "max_price" => request()->max_price,"brands" => request()->brands, "category" => request()->category ? request()->category->id : null, "sort" => "5"]) }}">پرفروش ترین</a>
                        </section>


                        <section class="main-product-wrapper row my-4" >
                            @forelse($products as $product)
                                <section class="col-md-3 p-0">
                                    <section class="product">
                                        <section class="product-add-to-cart">
                                            <a href="#" data-bs-toggle="tooltip" data-bs-placement="left" title="افزودن به سبد خرید">
                                                <i class="fa fa-cart-plus"></i>
                                            </a>
                                        </section>
                                        @guest
                                            <section class="product-add-to-favorite">
                                                        <span class="add_to_favorite" data-url="{{ route("user.market.addToFavorite", $product) }}" data-bs-toggle="tooltip" data-bs-placement="left" title="افزودن به علاقه مندی">
                                                            <i class="fa fa-heart"></i>
                                                        </span>
                                            </section>
                                        @endguest

                                        @auth
                                            @if($product->user->contains(auth()->user()->id))
                                                <section class="product-add-to-favorite">
                                                            <span class="add_to_favorite bg-white text-danger" data-url="{{ route("user.market.addToFavorite", $product) }}" data-bs-toggle="tooltip" data-bs-placement="left" title="حذف از علاقه مندی">
                                                                <i class="fa fa-heart"></i>
                                                            </span>
                                                </section>
                                            @else
                                                <section class="product-add-to-favorite">
                                                            <span class="add_to_favorite" data-url="{{ route("user.market.addToFavorite", $product) }}" data-bs-toggle="tooltip" data-bs-placement="left" title="افزودن به علاقه مندی">
                                                                <i class="fa fa-heart"></i>
                                                            </span>
                                                </section>
                                            @endif
                                        @endauth
                                        <a class="product-link" href="{{ route("user.market.product", $product["slug"]) }}">
                                            <section class="product-image">
                                                <img class="" src="{{ asset($product['image']['indexArray'][$product['image']['currentImage']]) }}" alt="{{ $product["name"] }}">
                                            </section>
                                            <section class="product-colors"></section>
                                            <section class="product-name"><h3>{{ \Illuminate\Support\Str::limit($product["name"], 20) }}</h3></section>
                                            <section class="product-price-wrapper">
                                                <section class="product-discount">
                                                    @php
                                                        $amazingSale = $product->activeAmazingSale();
                                                        $productDiscount = empty($product->activeAmazingSale()) ? 0 : $product->price * ($product->activeAmazingSale()->percentage / 100);
                                                    @endphp
                                                    @if(!empty($amazingSale))
                                                        <span class="product-old-price">{{ priceFormat($product["price"]) }}</span>
                                                        <span class="product-discount-amount">{{ $amazingSale["percentage"] }}%</span>
                                                    @endif
                                                </section>
                                                <section class="product-price">{{ priceFormat($product["price"] - $productDiscount) }} تومان</section>
                                            </section>
                                            <section class="product-colors">
                                                @foreach($product->colors as $color)
                                                    <section class="product-colors-item" style="background-color: {{ $color->color }};"></section>
                                                @endforeach
                                            </section>
                                        </a>
                                    </section>
                                </section>
                            @empty
                                <h3 class="text-danger fw-bold text-center">محصولی یافت نشد.</h3>
                            @endforelse


                            <section class="col-12">
                                <section class="my-4 d-flex justify-content-center">
                                    {{ $products->links("pagination::bootstrap-5") }}
                                </section>
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
