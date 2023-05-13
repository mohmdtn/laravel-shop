<aside id="sidebar" class="sidebar col-md-3">

    <form action="{{ route("user.products", ['category' => request()->category ? request()->category->id : null]) }}" method="get">
        <input type="hidden" name="sort" value="{{ request()->sort }}">

        <section class="content-wrapper bg-white p-3 rounded-2 mb-3">
            <!-- start sidebar nav-->
        @include("user.layouts.partials.categories", ["categories" => $categories])
        <!--end sidebar nav-->
        </section>

        <!-- search -->
        <section class="content-wrapper bg-white p-3 rounded-2 mb-3">
            <section class="content-header mb-3">
                <section class="d-flex justify-content-between align-items-center">
                    <h2 class="content-header-title content-header-title-small">
                        جستجو در نتایج
                    </h2>
                    <section class="content-header-link">
                        <!--<a href="#">مشاهده همه</a>-->
                    </section>
                </section>
            </section>

            <section class="">
                <input class="sidebar-input-text" type="text" placeholder="جستجو بر اساس نام، برند ..." name="search" value="{{ request()->search }}">
            </section>
        </section>

        <!-- brands -->
        <section class="content-wrapper bg-white p-3 rounded-2 mb-3">
            <section class="content-header mb-3">
                <section class="d-flex justify-content-between align-items-center">
                    <h2 class="content-header-title content-header-title-small">
                        برند
                    </h2>
                    <section class="content-header-link">
                        <!--<a href="#">مشاهده همه</a>-->
                    </section>
                </section>
            </section>

            <section class="sidebar-brand-wrapper">
                @foreach($brands as $brand)

                    <section class="form-check sidebar-brand-item">
                        <input class="form-check-input" type="checkbox" @if(request()->brands && in_array($brand->id, request()->brands)) checked @endif name="brands[]" value="{{ $brand["id"] }}" id="{{ "brand" . $brand["id"] }}">
                        <label class="form-check-label d-flex justify-content-between" for="{{ "brand" . $brand["id"] }}">
                            <span>{{ $brand["persian_name"] }}</span>
                            <span>{{ $brand["original_name"] }}</span>
                        </label>
                    </section>
                @endforeach
            </section>
        </section>

        <!-- price -->
        <section class="content-wrapper bg-white p-3 rounded-2 mb-3">
            <section class="content-header mb-3">
                <section class="d-flex justify-content-between align-items-center">
                    <h2 class="content-header-title content-header-title-small">
                        محدوده قیمت
                    </h2>
                    <section class="content-header-link">
                        <!--<a href="#">مشاهده همه</a>-->
                    </section>
                </section>
            </section>
            <section class="sidebar-price-range d-flex justify-content-between">
                <section class="p-1"><input type="text" placeholder="قیمت از ..." name="min_price" value="{{ request()->min_price }}"></section>
                <section class="p-1"><input type="text" placeholder="قیمت تا ..." name="max_price" value="{{ request()->max_price }}"></section>
            </section>
        </section>

        <section class="content-wrapper bg-white p-3 rounded-2 mb-3">
            <section class="sidebar-filter-btn d-grid gap-2">
                <button class="btn btn-danger" type="submit">اعمال فیلتر</button>
                <a class="btn btn-success text-white" href="{{ route("user.products") }}">حذف فیلتر ها</a>
            </section>
        </section>
    </form>


</aside>
