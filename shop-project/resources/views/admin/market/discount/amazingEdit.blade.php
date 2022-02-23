@extends("admin.layouts.master")

@section("head-tag")
    <title>ویرایش فروش شگفت انگیز</title>
    <link rel="stylesheet" href="{{ asset("admin-assets/jalalidatepicker/persian-datepicker.min.css") }}">
@endsection

@section("content")

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">خانه</a></li>
            <li class="breadcrumb-item"><a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item"><a href="#">فروش شگفت انگیز</a></li>
            <li class="breadcrumb-item active" aria-current="page">ویرایش فروش شگفت انگیز</li>
        </ol>
    </nav>

    <section class="pagesContent py-3 px-2">
        <div class="sectionHeader d-flex justify-content-between align-items-center">
            <h4>ویرایش فروش شگفت انگیز:</h4>

            <a href="{{ route("admin.market.discount.amazingSale") }}" class="btn btn-info btn-sm border-radius-4 box-shadow-normal">بازگشت</a>
        </div>

        <div class="sectionHeaderBottom d-flex justify-content-between align-items-center py-3">

        </div>

        <section class="pageContentInner">
            <form action="{{ route("admin.market.discount.amazingSale.update", $amazingSale["id"]) }}" method="post">
                @csrf
                @method("put")
                <div class="row">

                    <div class="form-group col-md-4">
                        <label for="">نام محصول</label>
                        <select name="product_id" id="" class="form-control border-radius-5">
                            <option value="">انتخاب محصول</option>
                            @foreach($products as $product)
                                <option value="{{ $product["id"] }}" @if(old("product_id",  $amazingSale["product_id"]) == $product["id"]) selected @endif>{{ $product["name"] }}</option>
                            @endforeach
                        </select>

                        @error("product_id")
                        <div class="errors"><span class="text-danger">{{ $message }}</span></div>
                        @enderror
                    </div>

                    <div class="form-group col-md-4">
                        <label for="">درصد تخفیف</label>
                        <input type="text" class="form-control border-radius-5" name="percentage" value="{{ old("percentage", $amazingSale["percentage"]) }}">

                        @error("percentage")
                        <div class="errors"><span class="text-danger">{{ $message }}</span></div>
                        @enderror
                    </div>

                    <div class="form-group col-md-4">
                        <label for="">تاریخ شروع</label>
                        <input type="hidden" class="form-control border-radius-5" id="start_date" name="start_date" value="{{ old("start_date", $amazingSale["start_date"]) }}">
                        <input type="text" class="form-control border-radius-5" id="start_date_view" value="{{ old("start_date", $amazingSale["start_date"]) }}">

                        @error("start_date")
                        <div class="errors"><span class="text-danger">{{ $message }}</span></div>
                        @enderror
                    </div>

                    <div class="form-group col-md-4">
                        <label for="">تاریخ پایان</label>
                        <input type="hidden" class="form-control border-radius-5" id="end_date" name="end_date" value="{{ old("end_date", $amazingSale["end_date"]) }}">
                        <input type="text" class="form-control border-radius-5" id="end_date_view" value="{{ old("end_date", $amazingSale["end_date"]) }}">

                        @error("end_date")
                        <div class="errors"><span class="text-danger">{{ $message }}</span></div>
                        @enderror
                    </div>

                    <div class="form-group col-md-4">
                        <label for="">وضعیت</label>
                        <select id="" class="form-control border-radius-5" name="status">
                            <option value="0" @if(old('status', $amazingSale["status"]) == 0) selected @endif>غیر فعال</option>
                            <option value="1" @if(old('status', $amazingSale["status"]) == 1) selected @endif>فعال</option>
                        </select>

                        @error("status")
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

@section("scripts")

    <script src="{{ asset("admin-assets/jalalidatepicker/persian-datepicker.min.js") }}"></script>
    <script src="{{ asset("admin-assets/jalalidatepicker/persian-date.min.js") }}"></script>

    <script>
        $(document).ready(function (){
            $("#end_date_view").persianDatepicker({
                format: 'YYYY/MM/DD',
                altField: '#end_date',
                timePicker: {
                    enabled: true,
                    meridiem: {
                        enabled: true
                    }
                }
            });

            $("#start_date_view").persianDatepicker({
                format: 'YYYY/MM/DD',
                altField: '#start_date',
                timePicker: {
                    enabled: true,
                    meridiem: {
                        enabled: true
                    }
                }
            });
        });
    </script>

@endsection
