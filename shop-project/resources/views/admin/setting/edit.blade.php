@extends("admin.layouts.master")

@section("head-tag")
    <title>ویرایش تنظیمات</title>
@endsection

@section("content")

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">خانه</a></li>
            <li class="breadcrumb-item"><a href="#">بخش تنظیمات</a></li>
            <li class="breadcrumb-item active" aria-current="page">ویرایش تنظیمات</li>
        </ol>
    </nav>

    <section class="pagesContent py-3 px-2">
        <div class="sectionHeader d-flex justify-content-between align-items-center">
            <h4>ویرایش تنظیمات:</h4>

            <a href="{{ route("admin.setting.index") }}" class="btn btn-info btn-sm border-radius-4 box-shadow-normal">بازگشت</a>
        </div>

        <div class="sectionHeaderBottom d-flex justify-content-between align-items-center py-3">

        </div>

        <section class="pageContentInner">
            <form action="{{ route("admin.setting.update" , $setting["id"]) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method("put")
                <div class="row">

                    <div class="form-group col-md-4">
                        <label for="">نام سایت</label>
                        <input type="text" class="form-control border-radius-5" name="title" value="{{ old('title' , $setting["title"]) }}">

                        @error("title")
                            <div class="errors"><span class="text-danger">{{ $message }}</span></div>
                        @enderror
                    </div>

                    <div class="form-group col-md-4">
                        <label for="">توضیحات سایت</label>
                        <textarea name="description" id="" class="form-control border-radius-5" rows="2">{{ old('title' , $setting["description"]) }}</textarea>

                        @error("description")
                            <div class="errors"><span class="text-danger">{{ $message }}</span></div>
                        @enderror
                    </div>

                    <div class="form-group col-md-4">
                        <label for="">کلمات کلیدی سایت</label>
                        <input type="text" class="form-control border-radius-5" name="keywords" value="{{ old('keywords' , $setting["keywords"]) }}">

                        @error("keywords")
                        <div class="errors"><span class="text-danger">{{ $message }}</span></div>
                        @enderror
                    </div>


                    <div class="form-group col-md-4">
                        <label for="">آیکون</label><br>

                        <div class="imageSelectWrapper editImageSelectWrapper border-radius-5">
                            <label for="imgInp"><i class="fa fa-plus"></i> انتخاب عکس</label>
                        </div>

                        <input type="file" id="imgInp" class="d-none" name="icon">

                        <div class="imagePreview editImagePreview">
                            <center><img src="{{ asset($setting['icon']) }}" alt="" id="blah"></center>
                        </div>

                        @error("icon")
                        <div class="errors"><span class="text-danger">{{ $message }}</span></div>
                        @enderror
                    </div>


                    <div class="form-group col-md-4">
                        <label for="">لوگو</label><br>

                        <div class="imageSelectWrapper editImageSelectWrapper border-radius-5">
                            <label for="imgInp1"><i class="fa fa-plus"></i> انتخاب عکس</label>
                        </div>

                        <input type="file" id="imgInp1" class="d-none" name="logo">

                        <div class="imagePreview editImagePreview">
                            <center><img src="{{ asset($setting['logo']) }}" alt="" id="blah1"></center>
                        </div>

                        @error("logo")
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
