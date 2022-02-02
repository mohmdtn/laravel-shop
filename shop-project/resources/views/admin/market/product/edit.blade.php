@extends("admin.layouts.master")

@section("head-tag")
    <title>ویرایش کالا</title>
    <link rel="stylesheet" href="{{ asset("admin-assets/jalalidatepicker/persian-datepicker.min.css") }}">
@endsection

@section("content")

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">خانه</a></li>
            <li class="breadcrumb-item"><a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item"><a href="#">کالا ها</a></li>
            <li class="breadcrumb-item active" aria-current="page">ویرایش کالا</li>
        </ol>
    </nav>

    <section class="pagesContent py-3 px-2">
        <div class="sectionHeader d-flex justify-content-between align-items-center">
            <h4>ویرایش کالا:</h4>

            <a href="{{ route("admin.market.product.index") }}" class="btn btn-info btn-sm border-radius-4 box-shadow-normal">بازگشت</a>
        </div>

        <div class="sectionHeaderBottom d-flex justify-content-between align-items-center py-3">

        </div>

        <section class="pageContentInner">
            <form action="{{ route("admin.market.product.update", $product["id"]) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method("put")
                <div class="row">

                    <div class="form-group col-md-4">
                        <label for="">نام کالا</label>
                        <input type="text" class="form-control border-radius-5" name="name" value="{{ old("name", $product["name"]) }}">

                        @error("name")
                        <div class="errors"><span class="text-danger">{{ $message }}</span></div>
                        @enderror
                    </div>

                    <div class="form-group col-md-4">
                        <label for="">دسته کالا</label>
                        <select class="form-control border-radius-5" name="category_id">
                        <option value="">انتخاب دسته</option>
                        @foreach($categories as $category)
                            <option value="{{ $category["id"] }}" @if(old("category_id", $product["category_id"]) == $category["id"]) selected @endif>{{ $category["name"] }}</option>
                        @endforeach
                        </select>

                        @error("category_id")
                        <div class="errors"><span class="text-danger">{{ $message }}</span></div>
                        @enderror
                    </div>

                    <div class="form-group col-md-4">
                        <label for="">قیمت کالا</label>
                        <input type="text" class="form-control border-radius-5" name="price" value="{{ old("price", $product["price"]) }}">

                        @error("price")
                        <div class="errors"><span class="text-danger">{{ $message }}</span></div>
                        @enderror
                    </div>

                    <div class="form-group col-md-4">
                        <label for="">وزن</label>
                        <input type="text" class="form-control border-radius-5" name="weight" value="{{ old("weight", $product["weight"]) }}">

                        @error("weight")
                        <div class="errors"><span class="text-danger">{{ $message }}</span></div>
                        @enderror
                    </div>

                    <div class="form-group col-md-4">
                        <label for="">طول</label>
                        <input type="text" class="form-control border-radius-5" name="length" value="{{ old("length", $product["length"]) }}">

                        @error("length")
                        <div class="errors"><span class="text-danger">{{ $message }}</span></div>
                        @enderror
                    </div>

                    <div class="form-group col-md-4">
                        <label for="">عرض</label>
                        <input type="text" class="form-control border-radius-5" name="width" value="{{ old("width", $product["width"]) }}">

                        @error("width")
                        <div class="errors"><span class="text-danger">{{ $message }}</span></div>
                        @enderror
                    </div>

                    <div class="form-group col-md-4">
                        <label for="">ارتفاع</label>
                        <input type="text" class="form-control border-radius-5" name="height" value="{{ old("height", $product["height"]) }}">

                        @error("height")
                        <div class="errors"><span class="text-danger">{{ $message }}</span></div>
                        @enderror
                    </div>

                    <div class="form-group col-md-4">
                        <label for="">وضعیت</label>
                        <select id="" class="form-control border-radius-5" name="status">
                            <option value="0" @if(old('status', $product["status"]) == 0) selected @endif>غیر فعال</option>
                            <option value="1" @if(old('status', $product["status"]) == 1) selected @endif>فعال</option>
                        </select>

                        @error("status")
                        <div class="errors"><span class="text-danger">{{ $message }}</span></div>
                        @enderror
                    </div>

                    <div class="form-group col-md-4">
                        <label for="">قابل فروش بودن</label>
                        <select id="" class="form-control border-radius-5" name="marketable">
                            <option value="0" @if(old('marketable', $product["marketable"]) == 0) selected @endif>غیر فعال</option>
                            <option value="1" @if(old('marketable', $product["marketable"]) == 1) selected @endif>فعال</option>
                        </select>

                        @error("marketable")
                        <div class="errors"><span class="text-danger">{{ $message }}</span></div>
                        @enderror
                    </div>

                    <div class="form-group col-md-4">
                        <label for="">تصویر کالا</label><br>

                        <div class="imageSelectWrapper border-radius-5">
                            <label for="imgInp"><i class="fa fa-plus"></i> انتخاب عکس</label>
                        </div>

                        <input type="file" id="imgInp" class="d-none" name="image">

                        <div class="imagePreview editImagePreview">
                            <center><img src="{{ asset($product['image']['indexArray'][$product['image']['currentImage']]) }}" alt="" id="blah"></center>
                        </div>

                        @error("image")
                        <div class="errors"><span class="text-danger">{{ $message }}</span></div>
                        @enderror
                    </div>

                    <div class="form-group col-md-4">
                        <label for="">برند</label>
                        <select id="" class="form-control border-radius-5" name="brand_id">
                            <option value="">انتخاب برند</option>
                            @foreach($brands as $brand)
                                <option value="{{ $brand["id"] }}" @if(old("brand_id", $product["brand_id"]) == $brand["id"]) selected @endif>{{ $brand["persian_name"] . " - " . $brand["original_name"] }}</option>
                            @endforeach
                        </select>

                        @error("brand_id")
                        <div class="errors"><span class="text-danger">{{ $message }}</span></div>
                        @enderror
                    </div>

                    <div class="form-group col-md-4">
                        <label for="">تگ ها</label>
                        <input type="hidden" class="form-control border-radius-5" name="tags" id="tags" value="{{ old('tags', $product["tags"]) }}">
                        <select class="select2 form-control border-radius-5" id="select_tags" multiple></select>

                        @error("tags")
                        <div class="errors"><span class="text-danger">{{ $message }}</span></div>
                        @enderror
                    </div>

                    <div class="form-group col-md-4">
                        <label for="">تاریخ انتشار</label>
                        <input type="hidden" class="form-control border-radius-5" id="published_at" name="published_at" value="{{ old("published_at", $product["published_at"]) }}">
                        <input type="text" class="form-control border-radius-5" id="published_at_view" value="{{ old("published_at", $product["published_at"]) }}">

                        @error("published_at")
                        <div class="errors"><span class="text-danger">{{ $message }}</span></div>
                        @enderror
                    </div>

                    <div class="form-group col-md-12">
                        <label for="">توضیحات</label>
                        <textarea class="form-control border-radius-5" name="introduction" id="body" rows="3">{{ old("introduction", $product["introduction"]) }}</textarea>

                        @error("introduction")
                        <div class="errors"><span class="text-danger">{{ $message }}</span></div>
                        @enderror
                    </div>

                    <div class="form-group col-md-12 pt-5">
                        <div class="row">
                            <div class="form-group col-md-5 col-6 pl-0 pl-md-2 d-flex align-items-center">
                                <label for="">ویژگی</label>
                                <input type="text" class="form-control border-radius-5 mr-2" name="meta_key[]">
                            </div>

                            <div class="form-group col-md-5 col-6 pr-1 pr-md-2  d-flex align-items-center">
                                <label for="">مقدار</label>
                                <input type="text" class="form-control border-radius-5 mr-2" name="meta_value[]">
                            </div>

                            <div class="form-group col-md-2 text-left">
                                <input type="button" class="btn btn-success border-radius-4" id="buttonCopy" value="اضافه کردن">
                            </div>
                        </div>
                        <div class="row otherMeta">
                            @foreach($product->metas as $meta)
                                <div class="form-group col-md-5 col-6 pl-0 pl-md-2 d-flex align-items-center">
                                    <label for="">ویژگی</label>
                                    <input type="text" class="form-control border-radius-5 mr-2" name="meta_key[{{ $meta["id"] }}]" value="{{ $meta["meta_key"] }}">
                                </div>

                                <div class="form-group col-md-5 col-6 pr-1 pr-md-2  d-flex align-items-center">
                                    <label for="">مقدار</label>
                                    <input type="text" class="form-control border-radius-5 mr-2" name="meta_value[]" value="{{ $meta["meta_value"] }}">
                                </div>
                            @endforeach
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

@section("scripts")

    <script src="{{ asset("admin-assets/ckeditor/ckeditor.js") }}"></script>
    <script>
        CKEDITOR.replace("body");
    </script>

    <script src="{{ asset("admin-assets/jalalidatepicker/persian-datepicker.min.js") }}"></script>
    <script src="{{ asset("admin-assets/jalalidatepicker/persian-date.min.js") }}"></script>

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

    <script>
        $("#buttonCopy").click(function () {
            var ele = $(this).parent().siblings().clone(true);
            $(".otherMeta").append(ele);
        });
    </script>

@endsection
