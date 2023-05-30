@extends("admin.layouts.master")

@section("head-tag")
    <title>ویرایش روش ارسال</title>
@endsection

@section("content")

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route("admin.home") }}">خانه</a></li>
            <li class="breadcrumb-item"><a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item"><a href="{{ route("admin.market.delivery.index") }}">روش ارسال</a></li>
            <li class="breadcrumb-item active" aria-current="page">ویرایش روش ارسال</li>
        </ol>
    </nav>

    <section class="pagesContent py-3 px-2">
        <div class="sectionHeader d-flex justify-content-between align-items-center">
            <h4>ویرایش روش ارسال:</h4>

            <a href="{{ route("admin.market.delivery.index") }}" class="btn btn-info btn-sm border-radius-4 box-shadow-normal">بازگشت</a>
        </div>

        <div class="sectionHeaderBottom d-flex justify-content-between align-items-center py-3">

        </div>

        <section class="pageContentInner">
            <form action="{{ route("admin.market.delivery.update", $delivery["id"]) }}" method="post">
                @csrf
                @method("put")
                <div class="row">

                    <div class="form-group col-md-6">
                        <label for="">نام روش ارسال</label>
                        <input type="text" name="name" class="form-control border-radius-5" value="{{ old("name", $delivery["name"]) }}">

                        @error("name")
                        <div class="errors"><span class="text-danger">{{ $message }}</span></div>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label for="">هزینه ارسال</label>
                        <input type="text" name="amount" class="form-control border-radius-5" value="{{ old("amount", $delivery["amount"]) }}">

                        @error("amount")
                        <div class="errors"><span class="text-danger">{{ $message }}</span></div>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label for="">زمان ارسال</label>
                        <input type="text" name="delivery_time" class="form-control border-radius-5" value="{{ old("delivery_time", $delivery["delivery_time"]) }}">

                        @error("delivery_time")
                        <div class="errors"><span class="text-danger">{{ $message }}</span></div>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label for="">واحد زمان ارسال</label>
                        <input type="text" name="delivery_time_unit" class="form-control border-radius-5" value="{{ old("delivery_time_unit", $delivery["delivery_time_unit"]) }}">

                        @error("delivery_time_unit")
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
