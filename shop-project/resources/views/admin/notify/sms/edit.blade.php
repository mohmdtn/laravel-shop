@extends("admin.layouts.master")

@section("head-tag")
    <title>ویرایش اطلاعیه پیامکی</title>
    <link rel="stylesheet" href="{{ asset("admin-assets/jalalidatepicker/persian-datepicker.min.css") }}">
@endsection

@section("content")

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">خانه</a></li>
            <li class="breadcrumb-item"><a href="#">بخش اطلاع رسانی</a></li>
            <li class="breadcrumb-item"><a href="#">اطلاعیه پیامکی</a></li>
            <li class="breadcrumb-item active" aria-current="page">ویرایش اطلاعیه پیامکی</li>
        </ol>
    </nav>

    <section class="pagesContent py-3 px-2">
        <div class="sectionHeader d-flex justify-content-between align-items-center">
            <h4>ویرایش اطلاعیه پیامکی:</h4>

            <a href="{{ route("admin.notify.sms.index") }}" class="btn btn-info btn-sm border-radius-4 box-shadow-normal">بازگشت</a>
        </div>

        <div class="sectionHeaderBottom d-flex justify-content-between align-items-center py-3">

        </div>

        <section class="pageContentInner">
            <form action="{{ route("admin.notify.sms.update", $sms["id"]) }}" method="post">
                @csrf
                @method("put")
                <div class="row">

                    <div class="form-group col-md-4">
                        <label for="">عنوان اطلاعیه</label>
                        <input type="text" class="form-control border-radius-5" name="title" value="{{ old("title", $sms["title"]) }}">

                        @error("title")
                        <div class="errors"><span class="text-danger">{{ $message }}</span></div>
                        @enderror
                    </div>

                    <div class="form-group col-md-4">
                        <label for="">تاریخ ارسال</label>
                        <input type="hidden" class="form-control border-radius-5" id="published_at" name="published_at" value="{{ $sms["published_at"] }}">
                        <input type="text" class="form-control border-radius-5" id="published_at_view" value="{{ $sms["published_at"] }}">

                        @error("published_at")
                        <div class="errors"><span class="text-danger">{{ $message }}</span></div>
                        @enderror
                    </div>

                    <div class="form-group col-md-4">
                        <label for="">وضعیت</label>
                        <select id="" class="form-control border-radius-5" name="status">
                            <option value="0" @if(old('status', $sms["status"]) == 0) selected @endif>غیر فعال</option>
                            <option value="1" @if(old('status', $sms["status"]) == 1) selected @endif>فعال</option>
                        </select>

                        @error("status")
                        <div class="errors"><span class="text-danger">{{ $message }}</span></div>
                        @enderror
                    </div>

                    <div class="form-group col-md-12">
                        <label for="">متن پیام</label>
                        <textarea class="form-control border-radius-5" name="body" id="body" rows="4">{{ old("body", $sms["body"]) }}</textarea>

                        @error("body")
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
            $("#published_at_view").persianDatepicker({
                format: 'YYYY/MM/DD',
                altField: '#published_at',
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
