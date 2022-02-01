@extends("admin.layouts.master")

@section("head-tag")
    <title>ویرایش دسته بندی</title>
@endsection

@section("content")

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">خانه</a></li>
            <li class="breadcrumb-item"><a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item"><a href="#">دسته بندی</a></li>
            <li class="breadcrumb-item active" aria-current="page">ویرایش دسته بندی</li>
        </ol>
    </nav>

    <section class="pagesContent py-3 px-2">
        <div class="sectionHeader d-flex justify-content-between align-items-center">
            <h4>ویرایش دسته بندی:</h4>

            <a href="{{ route("admin.market.category.index") }}" class="btn btn-info btn-sm border-radius-4 box-shadow-normal">بازگشت</a>
        </div>

        <div class="sectionHeaderBottom d-flex justify-content-between align-items-center py-3">

        </div>

        <section class="pageContentInner">
            <form action="{{ route("admin.market.category.update", $productCategory["id"]) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method("put")
                <div class="row">

                    <div class="form-group col-md-4">
                        <label for="">نام دسته</label>
                        <input type="text" class="form-control border-radius-5" name="name" value="{{ old("name", $productCategory["name"]) }}">

                        @error("name")
                        <div class="errors"><span class="text-danger">{{ $message }}</span></div>
                        @enderror
                    </div>

                    <div class="form-group col-md-4">
                        <label for="">دسته والد</label>
                        <select name="parent_id" id="" class="form-control border-radius-5">
                            <option value="">دسته اصلی</option>
                            @foreach($productCategories as $category)
                                <option value="{{ $category["id"] }}" @if(old("parent_id") == $category["id"]) selected @endif>{{ $category["name"] }}</option>
                            @endforeach
                        </select>

                        @error("parent_id")
                        <div class="errors"><span class="text-danger">{{ $message }}</span></div>
                        @enderror
                    </div>

                    <div class="form-group col-md-4">
                        <label for="">تگ ها</label>
                        <input type="hidden" class="form-control border-radius-5" name="tags" id="tags" value="{{ old('tags', $productCategory["tags"]) }}">
                        <select class="select2 form-control border-radius-5" id="select_tags" multiple></select>

                        @error("tags")
                        <div class="errors"><span class="text-danger">{{ $message }}</span></div>
                        @enderror
                    </div>

                    <div class="form-group col-md-4">
                        <label for="">وضعیت</label>
                        <select id="" class="form-control border-radius-5" name="status">
                            <option value="0" @if(old('status', $productCategory["status"]) == 0) selected @endif>غیر فعال</option>
                            <option value="1" @if(old('status', $productCategory["status"]) == 1) selected @endif>فعال</option>
                        </select>

                        @error("status")
                        <div class="errors"><span class="text-danger">{{ $message }}</span></div>
                        @enderror
                    </div>

                    <div class="form-group col-md-4">
                        <label for="">نمایش در منو</label>
                        <select id="" class="form-control border-radius-5" name="show_in_menu">
                            <option value="0" @if(old('show_in_menu', $productCategory["show_in_menu"]) == 0) selected @endif>غیر فعال</option>
                            <option value="1" @if(old('show_in_menu', $productCategory["show_in_menu"]) == 1) selected @endif>فعال</option>
                        </select>

                        @error("show_in_menu")
                        <div class="errors"><span class="text-danger">{{ $message }}</span></div>
                        @enderror
                    </div>

                    <div class="form-group col-md-4">
                        <label for="">تصویر</label><br>

                        <div class="imageSelectWrapper border-radius-5">
                            <label for="imgInp"><i class="fa fa-plus"></i> انتخاب عکس</label>
                        </div>

                        <input type="file" id="imgInp" class="d-none" name="image">

                        <div class="imagePreview editImagePreview">
                            <center><img src="{{ asset($productCategory['image']['indexArray'][$productCategory['image']['currentImage']]) }}" alt="" id="blah"></center>
                        </div>

                        @error("image")
                        <div class="errors"><span class="text-danger">{{ $message }}</span></div>
                        @enderror
                    </div>

                    <div class="form-group col-md-12">
                        <label for="">توضیحات</label>
                        <textarea name="description" id="" class="form-control border-radius-5" rows="3">{{ old('description', $productCategory["description"]) }}</textarea>

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

@section("scripts")

    <script>
        $(document).ready(function (){
            var tags_input = $("#tags");
            var select_tags = $("#select_tags");
            var default_tags = tags_input.val();
            var default_data = null;


            if (tags_input.val() !== null && tags_input.val().length > 0){
                default_data = default_tags.split(",");
            }


            select_tags.select2({
                placeholder : 'لطفا تگ های خود را وارد کنید',
                tags : true,
                data : default_data
            });
            select_tags.children("option").attr("selected", true).trigger("change");



            $("form").submit(function (){
                if (select_tags.val() !== null && select_tags.val().length > 0){
                    var selectedSrc = select_tags.val().join(",");
                    tags_input.val(selectedSrc);
                }
            });

        });


    </script>

@endsection

