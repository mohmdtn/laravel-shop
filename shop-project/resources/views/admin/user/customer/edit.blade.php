@extends("admin.layouts.master")

@section("head-tag")
    <title>ویرایش کاربر</title>
@endsection

@section("content")

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">خانه</a></li>
            <li class="breadcrumb-item"><a href="#">بخش کاربران</a></li>
            <li class="breadcrumb-item"><a href="#">کاربر</a></li>
            <li class="breadcrumb-item active" aria-current="page">ویرایش کاربر</li>
        </ol>
    </nav>

    <section class="pagesContent py-3 px-2">
        <div class="sectionHeader d-flex justify-content-between align-items-center">
            <h4>ویرایش کاربر:</h4>

            <a href="{{ route("admin.user.customer.index") }}" class="btn btn-info btn-sm border-radius-4 box-shadow-normal">بازگشت</a>
        </div>

        <div class="sectionHeaderBottom d-flex justify-content-between align-items-center py-3">

        </div>

        <section class="pageContentInner">
            <form action="{{ route("admin.user.customer.update", $user["id"]) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method("put")
                <div class="row">

                    <div class="form-group col-md-4">
                        <label for="">نام</label>
                        <input type="text" class="form-control border-radius-5" name="first_name" value="{{ old("first_name", $user["first_name"]) }}">

                        @error("first_name")
                        <div class="errors"><span class="text-danger">{{ $message }}</span></div>
                        @enderror
                    </div>

                    <div class="form-group col-md-4">
                        <label for="">نام خانوادگی</label>
                        <input type="text" class="form-control border-radius-5" name="last_name" value="{{ old("last_name", $user["last_name"]) }}">

                        @error("last_name")
                        <div class="errors"><span class="text-danger">{{ $message }}</span></div>
                        @enderror
                    </div>

                    <div class="form-group col-md-4">
                        <label for="">کد ملی</label>
                        <input type="text" class="form-control border-radius-5" name="national_code" value="{{ old("national_code", $user["national_code"]) }}">

                        @error("national_code")
                        <div class="errors"><span class="text-danger">{{ $message }}</span></div>
                        @enderror
                    </div>

                    <div class="form-group col-md-4">
                        <label for="">تصویر</label><br>

                        <div class="imageSelectWrapper border-radius-5">
                            <label for="imgInp"><i class="fa fa-plus"></i> انتخاب عکس</label>
                        </div>

                        <input type="file" id="imgInp" class="d-none" name="profile_photo_path">

                        <div class="imagePreview editImagePreview">
                            <center><img src="{{ asset($user["profile_photo_path"]) }}" alt="" id="blah"></center>
                        </div>

                        @error("photo_path")
                        <div class="errors"><span class="text-danger">{{ $message }}</span></div>
                        @enderror
                    </div>

                    <div class="form-group col-md-4">
                        <label for="">وضعیت فعال سازی ایمیل</label>
                        <select id="" class="form-control border-radius-5" name="activation">
                            <option value="0" @if(old('activation', $user["activation"]) == 0) selected @endif>غیر فعال</option>
                            <option value="1" @if(old('activation', $user["activation"]) == 1) selected @endif>فعال</option>
                        </select>

                        @error("activation")
                        <div class="errors"><span class="text-danger">{{ $message }}</span></div>
                        @enderror
                    </div>

                    <div class="form-group col-md-4">
                        <label for="">وضعیت</label>
                        <select id="" class="form-control border-radius-5" name="status">
                            <option value="0" @if(old('status', $user["status"]) == 0) selected @endif>غیر فعال</option>
                            <option value="1" @if(old('status', $user["status"]) == 1) selected @endif>فعال</option>
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
