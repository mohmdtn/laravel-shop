@extends("admin.layouts.master")

@section("head-tag")
    <title>ویرایش بنر</title>
@endsection

@section("content")

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">خانه</a></li>
            <li class="breadcrumb-item"><a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item"><a href="#">بنر ها</a></li>
            <li class="breadcrumb-item active" aria-current="page">ویرایش بنر</li>
        </ol>
    </nav>

    <section class="pagesContent py-3 px-2">
        <div class="sectionHeader d-flex justify-content-between align-items-center">
            <h4>ویرایش بنر:</h4>

            <a href="{{ route("admin.content.banner.index") }}" class="btn btn-info btn-sm border-radius-4 box-shadow-normal">بازگشت</a>
        </div>

        <div class="sectionHeaderBottom d-flex justify-content-between align-items-center py-3">

        </div>

        <section class="pageContentInner">
            <form action="{{ route("admin.content.banner.update" , $banner["id"]) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method("put")
                <div class="row">

                    <div class="form-group col-md-4">
                        <label for="">عنوان بنر</label>
                        <input type="text" class="form-control border-radius-5" name="title" value="{{ old("title", $banner["title"]) }}">

                        @error("title")
                        <div class="errors"><span class="text-danger">{{ $message }}</span></div>
                        @enderror
                    </div>

                    <div class="form-group col-md-4">
                        <label for="">تصویر</label><br>

                        <div class="imageSelectWrapper editImageSelectWrapper border-radius-5">
                            <label for="imgInp"><i class="fa fa-plus"></i> انتخاب عکس</label>
                        </div>

                        <input type="file" id="imgInp" class="d-none" name="image">

                        <div class="imagePreview editImagePreview">
                            <center><img src="{{ asset($banner['image']) }}" alt="" id="blah"></center>
                        </div>

                        @error("image")
                        <div class="errors"><span class="text-danger">{{ $message }}</span></div>
                        @enderror
                    </div>

                    <div class="form-group col-md-4">
                        <label for="">وضعیت</label>
                        <select id="" class="form-control border-radius-5" name="status">
                            <option value="0" @if(old('status', $banner['status']) == 0) selected @endif>غیر فعال</option>
                            <option value="1" @if(old('status', $banner['status']) == 1) selected @endif>فعال</option>
                        </select>

                        @error("status")
                        <div class="errors"><span class="text-danger">{{ $message }}</span></div>
                        @enderror
                    </div>

                    <div class="form-group col-md-4">
                        <label for="">آدرس (URL)</label>
                        <input type="text" class="form-control border-radius-5" name="url" value="{{ old("url", $banner["url"]) }}">

                        @error("url")
                        <div class="errors"><span class="text-danger">{{ $message }}</span></div>
                        @enderror
                    </div>

                    <div class="form-group col-md-4">
                        <label for="">مکان</label>
                        <select id="" class="form-control border-radius-5" name="position">
                            @foreach($positions as $key => $value)
                                <option value="{{ $key }}" @if(old('position', $banner["position"]) == $key) selected @endif>{{ $value }}</option>
                            @endforeach
                        </select>

                        @error("position")
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

