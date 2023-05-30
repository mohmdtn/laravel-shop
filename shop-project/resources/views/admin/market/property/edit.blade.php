@extends("admin.layouts.master")

@section("head-tag")
    <title>ویرایش فرم کالا</title>
@endsection

@section("content")

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route("admin.home") }}">خانه</a></li>
            <li class="breadcrumb-item"><a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item"><a href="{{ route("admin.market.property.index") }}">فرم کالا</a></li>
            <li class="breadcrumb-item active" aria-current="page">ویرایش فرم کالا</li>
        </ol>
    </nav>

    <section class="pagesContent py-3 px-2">
        <div class="sectionHeader d-flex justify-content-between align-items-center">
            <h4>ویرایش فرم کالا:</h4>

            <a href="{{ route("admin.market.property.index") }}" class="btn btn-info btn-sm border-radius-4 box-shadow-normal">بازگشت</a>
        </div>

        <div class="sectionHeaderBottom d-flex justify-content-between align-items-center py-3">

        </div>

        <section class="pageContentInner">
            <form action="{{ route("admin.market.property.update", $categoryAttribute["id"]) }}" method="post">
                @csrf
                @method("put")
                <div class="row">

                    <div class="form-group col-md-4">
                        <label for="">نام فرم</label>
                        <input type="text" class="form-control border-radius-5" name="name" value="{{ old("name", $categoryAttribute["name"]) }}">

                        @error("name")
                        <div class="errors"><span class="text-danger">{{ $message }}</span></div>
                        @enderror
                    </div>

                    <div class="form-group col-md-4">
                        <label for="">واحد اندازه گیری</label>
                        <input type="text" class="form-control border-radius-5" name="unit" value="{{ old("unit", $categoryAttribute["unit"]) }}">

                        @error("unit")
                        <div class="errors"><span class="text-danger">{{ $message }}</span></div>
                        @enderror
                    </div>

                    <div class="form-group col-md-4">
                        <label for="">فرم والد</label>
                        <select id="" class="form-control border-radius-5" name="category_id">
                            <option value="">دسته را انتخاب کنید</option>
                            @foreach($productCategories as $productCategory)
                                <option value="{{ $productCategory["id"] }}" @if( old("category_id", $categoryAttribute["category_id"]) == $productCategory["id"]) selected @endif>{{ $productCategory["name"] }}</option>
                            @endforeach
                        </select>

                        @error("category_id")
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
