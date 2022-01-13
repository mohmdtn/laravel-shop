@extends("admin.layouts.master")

@section("head-tag")
    <title>ویرایش سوال متداول</title>
@endsection

@section("content")

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">خانه</a></li>
            <li class="breadcrumb-item"><a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item"><a href="#">سوالات متداول</a></li>
            <li class="breadcrumb-item active" aria-current="page">ویرایش سوال متداول</li>
        </ol>
    </nav>

    <section class="pagesContent py-3 px-2">
        <div class="sectionHeader d-flex justify-content-between align-items-center">
            <h4>ویرایش سوال:</h4>

            <a href="{{ route("admin.content.faq.index") }}" class="btn btn-info btn-sm border-radius-4 box-shadow-normal">بازگشت</a>
        </div>

        <div class="sectionHeaderBottom d-flex justify-content-between align-items-center py-3">

        </div>

        <section class="pageContentInner">
            <form action="{{ route("admin.content.faq.update", $faq["id"]) }}" method="post">
                @csrf
                @method("put")
                <div class="row">

                    <div class="form-group col-md-12">
                        <label for="">پرسش</label>
                        <input type="text" class="form-control border-radius-5" name="question" value="{{ old("question", $faq["question"]) }}">

                        @error("question")
                        <div class="errors"><span class="text-danger">{{ $message }}</span></div>
                        @enderror
                    </div>

                    <div class="form-group col-md-12">
                        <label for="">پاسخ</label>
                        <textarea class="form-control border-radius-5" name="answer" id="body" rows="3">{{ old("answer", $faq["answer"]) }}</textarea>

                        @error("answer")
                        <div class="errors"><span class="text-danger">{{ $message }}</span></div>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label for="">وضعیت</label>
                        <select id="" class="form-control border-radius-5" name="status">
                            <option value="0" @if(old('status', $faq['status']) == 0) selected @endif>غیر فعال</option>
                            <option value="1" @if(old('status', $faq['status']) == 1) selected @endif>فعال</option>
                        </select>

                        @error("status")
                        <div class="errors"><span class="text-danger">{{ $message }}</span></div>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label for="">تگ ها</label>
                        <input type="hidden" class="form-control border-radius-5" name="tags" id="tags" value="{{ old('tags', $faq['tags']) }}">
                        <select class="select2 form-control border-radius-5" id="select_tags" multiple></select>

                        @error("tags")
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

    <script>
        CKEDITOR.replace("body");
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
