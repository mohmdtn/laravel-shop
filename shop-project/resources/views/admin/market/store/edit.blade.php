@extends("admin.layouts.master")

@section("head-tag")
    <title>ویرایش انبار</title>
@endsection

@section("content")

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">خانه</a></li>
            <li class="breadcrumb-item"><a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item"><a href="#">انبار</a></li>
            <li class="breadcrumb-item active" aria-current="page">ویرایش انبار</li>
        </ol>
    </nav>

    <section class="pagesContent py-3 px-2">
        <div class="sectionHeader d-flex justify-content-between align-items-center">
            <h4>ویرایش انبار:</h4>
            <a href="{{ route("admin.market.store.index") }}" class="btn btn-info btn-sm border-radius-4 box-shadow-normal">بازگشت</a>
        </div>

        <div class="sectionHeaderBottom d-flex justify-content-between align-items-center py-3">

        </div>

        <section class="pageContentInner">
            <form action="{{ route("admin.market.store.update", $product["id"]) }}" method="post">
                @csrf
                @method("put")
                <h5 class="pb-4 font-weight-bold text-center color-blue">نام محصول: {{ $product["name"] }}</h5>

                <div class="row">

                    <div class="form-group col-md-4">
                        <label for="">تعداد قابل فروش</label>
                        <input type="text" class="form-control border-radius-5" name="marketable_number" value="{{ old("marketable_number", $product["marketable_number"]) }}">

                        @error("marketable_number")
                        <div class="errors"><span class="text-danger">{{ $message }}</span></div>
                        @enderror
                    </div>


                    <div class="form-group col-md-4">
                        <label for="">تعداد فروخته شده</label>
                        <input type="text" class="form-control border-radius-5" name="sold_number" value="{{ old("sold_number", $product["sold_number"]) }}">

                        @error("sold_number")
                        <div class="errors"><span class="text-danger">{{ $message }}</span></div>
                        @enderror
                    </div>


                    <div class="form-group col-md-4">
                        <label for="">تعداد رزرو شده</label>
                        <input type="text" class="form-control border-radius-5" name="frozen_number" value="{{ old("frozen_number", $product["frozen_number"]) }}">

                        @error("frozen_number")
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
