@extends("admin.layouts.master")

@section("head-tag")
    <title>ویرایش پست</title>
    <link rel="stylesheet" href="{{ asset("admin-assets/jalalidatepicker/persian-datepicker.min.css") }}">
@endsection

@section("content")

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">خانه</a></li>
            <li class="breadcrumb-item"><a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item"><a href="#">پست ها</a></li>
            <li class="breadcrumb-item active" aria-current="page">ویرایش پست</li>
        </ol>
    </nav>

    <section class="pagesContent py-3 px-2">
        <div class="sectionHeader d-flex justify-content-between align-items-center">
            <h4>ویرایش پست:</h4>

            <a href="{{ route("admin.content.post.index") }}" class="btn btn-info btn-sm border-radius-4 box-shadow-normal">بازگشت</a>
        </div>

        <div class="sectionHeaderBottom d-flex justify-content-between align-items-center py-3">

        </div>

        <section class="pageContentInner">
            <form action="{{ route("admin.content.post.update" , $post["id"]) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method("put")
                <div class="row">

                    <div class="form-group col-md-4">
                        <label for="">عنوان پست</label>
                        <input type="text" class="form-control border-radius-5" name="title" value="{{ old("title", $post["title"]) }}">

                        @error("title")
                        <div class="errors"><span class="text-danger">{{ $message }}</span></div>
                        @enderror
                    </div>

                    <div class="form-group col-md-4">
                        <label for="">خلاصه</label>
                        <textarea name="summary" id="" rows="2" class="form-control border-radius-5">{{ old("summary", $post["summary"]) }}</textarea>

                        @error("summary")
                        <div class="errors"><span class="text-danger">{{ $message }}</span></div>
                        @enderror
                    </div>

                    <div class="form-group col-md-4">
                        <label for="">تگ ها</label>
                        <input type="hidden" class="form-control border-radius-5" name="tags" id="tags" value="{{ old('tags', $post["tags"]) }}">
                        <select class="select2 form-control border-radius-5" id="select_tags" multiple></select>

                        @error("tags")
                        <div class="errors"><span class="text-danger">{{ $message }}</span></div>
                        @enderror
                    </div>

                    <div class="form-group col-md-4">
                        <label for="">انتخاب دسته</label>
                        <select name="category_id" id="" class="form-control border-radius-5">
                            <option value="">دسته خود را انتخاب کنید</option>
                            @foreach($categories as $category)
                                <option value="{{ $category["id"] }}"  @if(old("category_id", $post["category_id"]) == $category["id"]) selected @endif>{{ $category["name"] }}</option>
                            @endforeach
                        </select>

                        @error("category_id")
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
                            <center><img src="{{ asset($post['image']['indexArray'][$post['image']['currentImage']]) }}" alt="" id="blah"></center>
                        </div>

                        @error("image")
                        <div class="errors"><span class="text-danger">{{ $message }}</span></div>
                        @enderror
                    </div>

                    <div class="form-group col-md-4">
                        <label for="">وضعیت</label>
                        <select id="" class="form-control border-radius-5" name="status">
                            <option value="0" @if(old('status', $post['status']) == 0) selected @endif>غیر فعال</option>
                            <option value="1" @if(old('status', $post['status']) == 1) selected @endif>فعال</option>
                        </select>

                        @error("status")
                        <div class="errors"><span class="text-danger">{{ $message }}</span></div>
                        @enderror
                    </div>

                    <div class="form-group col-md-4">
                        <label for="">امکان درج کامنت</label>
                        <select id="" class="form-control border-radius-5" name="commentable">
                            <option value="0" @if(old('commentable', $post['commentable']) == 0) selected @endif>غیر فعال</option>
                            <option value="1" @if(old('commentable', $post['commentable']) == 1) selected @endif>فعال</option>
                        </select>

                        @error("commentable")
                        <div class="errors"><span class="text-danger">{{ $message }}</span></div>
                        @enderror
                    </div>

                    <div class="form-group col-md-4">
                        <label for="">تاریخ انتشار</label>
                        <input type="hidden" class="form-control border-radius-5" id="published_at" name="published_at" value="">
                        <input type="text" class="form-control border-radius-5" id="published_at_view">

                        @error("published_at")
                        <div class="errors"><span class="text-danger">{{ $message }}</span></div>
                        @enderror
                    </div>

                    <div class="form-group col-md-12">
                        <label for="">متن پست</label>
                        <textarea class="form-control border-radius-5" name="body" id="body" rows="3">{{ old("body", $post["body"]) }}</textarea>

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

    <script src="{{ asset("admin-assets/ckeditor/ckeditor.js") }}"></script>
    <script src="{{ asset("admin-assets/jalalidatepicker/persian-datepicker.min.js") }}"></script>
    <script src="{{ asset("admin-assets/jalalidatepicker/persian-date.min.js") }}"></script>

    <script>
        CKEDITOR.replace("body");
    </script>

    <script>
        $(document).ready(function (){
            $("#published_at_view").persianDatepicker({
                format: 'YYYY/MM/DD',
                altField: '#published_at'
            });
        });
    </script>

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
