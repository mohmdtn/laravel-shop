@extends("admin.layouts.master")

@section("head-tag")
    <title>ویرایش تخفیف عمومی</title>
    <link rel="stylesheet" href="{{ asset("admin-assets/jalalidatepicker/persian-datepicker.min.css") }}">
@endsection

@section("content")

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route("admin.home") }}">خانه</a></li>
            <li class="breadcrumb-item"><a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item"><a href="{{ route("admin.market.discount.commonDiscount") }}">تخفیف عمومی</a></li>
            <li class="breadcrumb-item active" aria-current="page">ویرایش تخفیف عمومی</li>
        </ol>
    </nav>

    <section class="pagesContent py-3 px-2">
        <div class="sectionHeader d-flex justify-content-between align-items-center">
            <h4>ویرایش تخفیف عمومی:</h4>

            <a href="{{ route("admin.market.discount.commonDiscount") }}" class="btn btn-info btn-sm border-radius-4 box-shadow-normal">بازگشت</a>
        </div>

        <div class="sectionHeaderBottom d-flex justify-content-between align-items-center py-3">

        </div>

        <section class="pageContentInner">
            <form action="{{ route("admin.market.discount.commonDiscount.update", $commonDiscount["id"]) }}" method="post">
                @csrf
                @method("put")
                <div class="row">

                    <div class="form-group col-md-4">
                        <label for="">درصد تخفیف</label>
                        <input type="text" class="form-control border-radius-5" name="percentage" value="{{ old("percentage", $commonDiscount["percentage"]) }}">

                        @error("percentage")
                        <div class="errors"><span class="text-danger">{{ $message }}</span></div>
                        @enderror
                    </div>

                    <div class="form-group col-md-4">
                        <label for="">حداکثر تخفیف</label>
                        <input type="text" class="form-control border-radius-5" name="discount_ceiling" value="{{ old("discount_ceiling", $commonDiscount["discount_ceiling"]) }}">

                        @error("discount_ceiling")
                        <div class="errors"><span class="text-danger">{{ $message }}</span></div>
                        @enderror
                    </div>

                    <div class="form-group col-md-4">
                        <label for="">حداقل مبلغ خرید</label>
                        <input type="text" class="form-control border-radius-5" name="minimal_order_amount" value="{{ old("minimal_order_amount", $commonDiscount["minimal_order_amount"]) }}">

                        @error("minimal_order_amount")
                        <div class="errors"><span class="text-danger">{{ $message }}</span></div>
                        @enderror
                    </div>

                    <div class="form-group col-md-4">
                        <label for="">عنوان مناسبت</label>
                        <input type="text" class="form-control border-radius-5" name="name" value="{{ old("name", $commonDiscount["name"]) }}">

                        @error("name")
                        <div class="errors"><span class="text-danger">{{ $message }}</span></div>
                        @enderror
                    </div>

                    <div class="form-group col-md-4">
                        <label for="">تاریخ شروع</label>
                        <input type="hidden" class="form-control border-radius-5" id="start_date" name="start_date" value="{{ old("start_date", $commonDiscount["start_date"]) }}">
                        <input type="text" class="form-control border-radius-5" id="start_date_view" value="{{ old("start_date", $commonDiscount["start_date"]) }}">

                        @error("start_date")
                        <div class="errors"><span class="text-danger">{{ $message }}</span></div>
                        @enderror
                    </div>

                    <div class="form-group col-md-4">
                        <label for="">تاریخ پایان</label>
                        <input type="hidden" class="form-control border-radius-5" id="end_date" name="end_date" value="{{ old("end_date", $commonDiscount["end_date"]) }}">
                        <input type="text" class="form-control border-radius-5" id="end_date_view" value="{{ old("end_date", $commonDiscount["end_date"]) }}">

                        @error("end_date")
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
