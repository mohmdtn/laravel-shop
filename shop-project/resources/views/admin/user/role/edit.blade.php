@extends("admin.layouts.master")

@section("head-tag")
    <title>ایجاد نقش</title>
@endsection

@section("content")

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">خانه</a></li>
            <li class="breadcrumb-item"><a href="#">بخش کاربران</a></li>
            <li class="breadcrumb-item"><a href="#">نقش ها</a></li>
            <li class="breadcrumb-item active" aria-current="page">ویرایش نقش</li>
        </ol>
    </nav>

    <section class="pagesContent py-3 px-2">
        <div class="sectionHeader d-flex justify-content-between align-items-center">
            <h4>ویرایش نقش:</h4>

            <a href="{{ route("admin.user.role.index") }}" class="btn btn-info btn-sm border-radius-4 box-shadow-normal">بازگشت</a>
        </div>

        <div class="sectionHeaderBottom d-flex justify-content-between align-items-center py-3">

        </div>

        <section class="pageContentInner">
            <form action="{{ route("admin.user.role.update", $role["id"]) }}" method="post">
                @csrf
                @method("put")
                <div class="row">

                    <div class="form-group col-md-6">
                        <label for="">عنوان نقش</label>
                        <input type="text" class="form-control border-radius-5" name="name" value="{{ old("name", $role["name"]) }}">
                        @error("name")
                        <div class="errors"><span class="text-danger">{{ $message }}</span></div>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label for="">توضیح نقش</label>
                        <input type="text" class="form-control border-radius-5" name="description" value="{{ old("description", $role["description"]) }}">
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
