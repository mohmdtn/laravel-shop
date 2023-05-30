@extends("admin.layouts.master")

@section("head-tag")
    <title>اضافه کردن به انبار</title>
@endsection

@section("content")

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route("admin.home") }}">خانه</a></li>
            <li class="breadcrumb-item"><a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item"><a href="{{ route("admin.market.store.index") }}">انبار</a></li>
            <li class="breadcrumb-item active" aria-current="page">اضافه کردن به انبار</li>
        </ol>
    </nav>

    <section class="pagesContent py-3 px-2">
        <div class="sectionHeader d-flex justify-content-between align-items-center">
            <h4>اضافه کردن به انبار:</h4>
            <a href="{{ route("admin.market.store.index") }}" class="btn btn-info btn-sm border-radius-4 box-shadow-normal">بازگشت</a>
        </div>

        <div class="sectionHeaderBottom d-flex justify-content-between align-items-center py-3">

        </div>

        <section class="pageContentInner">
            <form action="{{ route("admin.market.store.store", $product["id"]) }}" method="post">
                @csrf
                <h5 class="pb-4 font-weight-bold text-center color-blue">نام محصول: {{ $product["name"] }}</h5>

                <div class="row">

                    <div class="form-group col-md-4">
                        <label for="">نام تحویل گیرنده</label>
                        <input type="text" class="form-control border-radius-5" name="receiver" value="{{ old("receiver") }}">

                        @error("receiver")
                        <div class="errors"><span class="text-danger">{{ $message }}</span></div>
                        @enderror
                    </div>

                    <div class="form-group col-md-4">
                        <label for="">نام تحویل دهنده</label>
                        <input type="text" class="form-control border-radius-5" name="deliverer" value="{{ old("deliverer") }}">

                        @error("deliverer")
                        <div class="errors"><span class="text-danger">{{ $message }}</span></div>
                        @enderror
                    </div>

                    <div class="form-group col-md-4">
                        <label for="">تعداد</label>
                        <input type="text" class="form-control border-radius-5" name="marketable_number" value="{{ old("marketable_number") }}">

                        @error("marketable_number")
                        <div class="errors"><span class="text-danger">{{ $message }}</span></div>
                        @enderror
                    </div>

                    <div class="form-group col-md-12">
                        <label for="">توضیحات</label>
                        <textarea id="" rows="4" class="form-control border-radius-5" name="description">{{ old("description") }}</textarea>

                        @error("description")
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
