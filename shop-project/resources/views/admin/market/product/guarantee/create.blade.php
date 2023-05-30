@extends("admin.layouts.master")

@section("head-tag")
    <title>ایجاد گارانتی کالا</title>
@endsection

@section("content")

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route("admin.home") }}">خانه</a></li>
            <li class="breadcrumb-item"><a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item"><a href="{{ route("admin.market.product.index") }}">کالا ها</a></li>
            <li class="breadcrumb-item active" aria-current="page">ایجاد گارانتی کالا</li>
        </ol>
    </nav>

    <section class="pagesContent py-3 px-2">
        <div class="sectionHeader d-flex justify-content-between align-items-center">
            <h4>ایجاد گارانتی:</h4>

            <a href="{{ route("admin.market.guarantee.index", $product["id"]) }}" class="btn btn-info btn-sm border-radius-4 box-shadow-normal">بازگشت</a>
        </div>

        <div class="sectionHeaderBottom d-flex justify-content-between align-items-center py-3">

        </div>

        <section class="pageContentInner">
            <form action="{{ route("admin.market.guarantee.store", $product["id"]) }}" method="post">
                @csrf
                <div class="row">

                    <div class="form-group col-md-6">
                        <label for="">نام گارانتی</label>
                        <input type="text" class="form-control border-radius-5" name="name" value="{{ old("name") }}">

                        @error("name")
                        <div class="errors"><span class="text-danger">{{ $message }}</span></div>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label for="">افزایش قیمت</label>
                        <input type="text" class="form-control border-radius-5" name="price_increase" value="{{ old("price_increase") }}">

                        @error("price_increase")
                        <div class="errors"><span class="text-danger">{{ $message }}</span></div>
                        @enderror
                    </div>


                    </div>

                    <div class="col-md-12 d-flex justify-content-center pt-5">
                        <input type="submit" class="btn btn-primary border-radius-4 box-shadow-normal submit-custom" value="ثبت">
                    </div>
                </div>
            </form>
        </section>


    </section>

@endsection
