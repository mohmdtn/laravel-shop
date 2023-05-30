@extends("admin.layouts.master")

@section("head-tag")
    <title>ایجاد مقدار فرم کالا</title>
@endsection

@section("content")

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route("admin.home") }}">خانه</a></li>
            <li class="breadcrumb-item"><a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item"><a href="{{ route("admin.market.property.index") }}">فرم کالا</a></li>
            <li class="breadcrumb-item"><a href="{{ route("admin.market.property.value.index", $categoryAttribute["id"]) }}">مقدار فرم کالا</a></li>
            <li class="breadcrumb-item active" aria-current="page">ایجاد مقدار فرم کالا</li>
        </ol>
    </nav>

    <section class="pagesContent py-3 px-2">
        <div class="sectionHeader d-flex justify-content-between align-items-center">
            <h4>ایجاد مقدار فرم کالا:</h4>

            <a href="{{ route("admin.market.property.value.index", $categoryAttribute["id"]) }}" class="btn btn-info btn-sm border-radius-4 box-shadow-normal">بازگشت</a>
        </div>

        <div class="sectionHeaderBottom d-flex justify-content-between align-items-center py-3">

        </div>

        <section class="pageContentInner">
            <form action="{{ route("admin.market.property.value.store", $categoryAttribute["id"]) }}" method="post">
                @csrf
                <div class="row">

                    <div class="form-group col-md-6">
                        <label for="">انتخاب محصول</label>
                        <select id="" class="form-control border-radius-5" name="product_id">
                            <option value="">محصول را انتخاب کنید</option>
                            @foreach($categoryAttribute->category->products as $product)
                                <option value="{{ $product["id"] }}" @if( old("category_id") == $product["id"]) selected @endif>{{ $product["name"] }}</option>
                            @endforeach
                        </select>

                        @error("product_id")
                        <div class="errors"><span class="text-danger">{{ $message }}</span></div>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label for="">مقدار</label>
                        <input type="text" class="form-control border-radius-5" name="value" value="{{ old("value") }}">

                        @error("value")
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

                    <div class="form-group col-md-6">
                        <label for="">نوع</label>
                        <select id="" class="form-control border-radius-5" name="type">
                            <option value="0" @if(old('type') == 0) selected @endif>ساده</option>
                            <option value="1" @if(old('type') == 1) selected @endif>انتخابی</option>
                        </select>

                        @error("type")
                        <div class="errors"><span class="text-danger">{{ $message }}</span></div>
                        @enderror
                    </div>


                    <div class="col-md-12 d-flex justify-content-center pt-5">
                        <input type="submit" class="btn btn-primary border-radius-4 box-shadow-normal submit-custom" value="ثبت">
                    </div>
                </div>
            </form>
        </section>


    </section>

@endsection
