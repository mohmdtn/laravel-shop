@extends("admin.layouts.master")

@section("head-tag")
    <title>ویرایش منو</title>
@endsection

@section("content")

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route("admin.home") }}">خانه</a></li>
            <li class="breadcrumb-item"><a href="#">بخش محتوی</a></li>
            <li class="breadcrumb-item"><a href="{{ route("admin.content.menu.index") }}">منو</a></li>
            <li class="breadcrumb-item active" aria-current="page">ویرایش منو</li>
        </ol>
    </nav>

    <section class="pagesContent py-3 px-2">
        <div class="sectionHeader d-flex justify-content-between align-items-center">
            <h4>ویرایش منو:</h4>

            <a href="{{ route("admin.content.menu.index") }}" class="btn btn-info btn-sm border-radius-4 box-shadow-normal">بازگشت</a>
        </div>

        <div class="sectionHeaderBottom d-flex justify-content-between align-items-center py-3">

        </div>

        <section class="pageContentInner">
            <form action="{{ route("admin.content.menu.update", $menu["id"]) }}" method="post">
                @csrf
                @method("put")
                <div class="row">

                    <div class="form-group col-md-6">
                        <label for="">نام منو</label>
                        <input type="text" class="form-control border-radius-5" name="name" value="{{ old("name", $menu["name"]) }}">

                        @error("name")
                        <div class="errors"><span class="text-danger">{{ $message }}</span></div>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label for="">منو والد</label>
                        <select name="parent_id" id="" class="form-control border-radius-5">
                            <option value="">منوی اصلی</option>
                            @foreach($allMenus as $allMenu)
                                <option value="{{ $allMenu["id"] }}" @if(old("parent_id", $menu["parent_id"]) == $allMenu["id"]) selected @endif>{{ $allMenu["name"] }}</option>
                            @endforeach
                        </select>

                        @error("parent_id")
                        <div class="errors"><span class="text-danger">{{ $message }}</span></div>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label for="">آدرس URL</label>
                        <input type="text" class="form-control border-radius-5" name="url" value="{{ old("url", $menu["url"]) }}">

                        @error("url")
                        <div class="errors"><span class="text-danger">{{ $message }}</span></div>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label for="">وضعیت</label>
                        <select id="" class="form-control border-radius-5" name="status">
                            <option value="0" @if(old('status', $menu["status"]) == 0) selected @endif>غیر فعال</option>
                            <option value="1" @if(old('status', $menu["status"]) == 1) selected @endif>فعال</option>
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
