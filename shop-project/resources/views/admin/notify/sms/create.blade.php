@extends("admin.layouts.master")

@section("head-tag")
    <title>ایجاد اطلاعیه پیامکی</title>
    <link rel="stylesheet" href="{{ asset("admin-assets/jalalidatepicker/persian-datepicker.min.css") }}">
@endsection

@section("content")

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route("admin.home") }}">خانه</a></li>
            <li class="breadcrumb-item"><a href="#">بخش اطلاع رسانی</a></li>
            <li class="breadcrumb-item"><a href="{{ route("admin.notify.sms.index") }}">اطلاعیه پیامکی</a></li>
            <li class="breadcrumb-item active" aria-current="page">ایجاد اطلاعیه پیامکی</li>
        </ol>
    </nav>

    <section class="pagesContent py-3 px-2">
        <div class="sectionHeader d-flex justify-content-between align-items-center">
            <h4>ایجاد اطلاعیه پیامکی:</h4>

            <a href="{{ route("admin.notify.sms.index") }}" class="btn btn-info btn-sm border-radius-4 box-shadow-normal">بازگشت</a>
        </div>

        <div class="sectionHeaderBottom d-flex justify-content-between align-items-center py-3">

        </div>

        <section class="pageContentInner">
            <form action="{{ route("admin.notify.sms.store") }}" method="post">
                @csrf
                <div class="row">

                    <div class="form-group col-md-4">
                        <label for="">عنوان اطلاعیه</label>
                        <input type="text" class="form-control border-radius-5" name="title" value="{{ old("title") }}">

                        @error("title")
                        <div class="errors"><span class="text-danger">{{ $message }}</span></div>
                        @enderror
                    </div>

                    <div class="form-group col-md-4">
                        <label for="">تاریخ ارسال</label>
                        <input type="hidden" class="form-control border-radius-5" id="published_at" name="published_at" value="">
                        <input type="text" class="form-control border-radius-5" id="published_at_view">

                        @error("published_at")
                        <div class="errors"><span class="text-danger">{{ $message }}</span></div>
                        @enderror
                    </div>

                    <div class="form-group col-md-4">
                        <label for="">وضعیت</label>
                        <select id="" class="form-control border-radius-5" name="status">
                            <option value="0" @if(old('status') == 0) selected @endif>غیر فعال</option>
                            <option value="1" @if(old('status') == 1) selected @endif>فعال</option>
                        </select>

                        @error("status")
                        <div class="errors"><span class="text-danger">{{ $message }}</span></div>
                        @enderror
                    </div>

                    <div class="form-group col-md-12">
                        <label for="">متن پیام</label>
                        <textarea class="form-control border-radius-5" name="body" id="body" rows="4">{{ old("body") }}</textarea>

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
