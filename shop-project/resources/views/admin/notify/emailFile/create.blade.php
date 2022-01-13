@extends("admin.layouts.master")

@section("head-tag")
    <title>ایجاد فایل اطلاعیه ایمیلی</title>
@endsection

@section("content")

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">خانه</a></li>
            <li class="breadcrumb-item"><a href="#">بخش اطلاع رسانی</a></li>
            <li class="breadcrumb-item"><a href="#">اطلاعیه ایمیلی</a></li>
            <li class="breadcrumb-item active" aria-current="page">ایجاد فایل اطلاعیه ایمیلی</li>
        </ol>
    </nav>

    <section class="pagesContent py-3 px-2">
        <div class="sectionHeader d-flex justify-content-between align-items-center">
            <h4>ایجاد فایل اطلاعیه ایمیلی:</h4>

            <a href="{{ route("admin.notify.emailFile.index", $email["id"]) }}" class="btn btn-info btn-sm border-radius-4 box-shadow-normal">بازگشت</a>
        </div>

        <div class="sectionHeaderBottom d-flex justify-content-between align-items-center py-3">

        </div>

        <section class="pageContentInner">
            <form action="{{ route("admin.notify.emailFile.store", $email["id"]) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">

                    <div class="form-group col-md-6">
                        <label for="">فایل</label><br>

                        <div class="imageSelectWrapper border-radius-5">
                            <label for="file-upload"><i class="fa fa-file"></i> انتخاب فایل</label>
                        </div>

                        <input type="file" id="file-upload" class="d-none" name="file">

                        <div class="imagePreview">
                            <center><h5 class="pt-2"></h5></center>
                        </div>

                        @error("file")
                        <div class="errors"><span class="text-danger">{{ $message }}</span></div>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label for="">وضعیت</label>
                        <select id="" class="form-control border-radius-5" name="status">
                            <option value="0" @if(old('status') == 0) selected @endif>غیر فعال</option>
                            <option value="1" @if(old('status') == 1) selected @endif>فعال</option>
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
