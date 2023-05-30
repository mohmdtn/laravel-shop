@extends("admin.layouts.master")

@section("head-tag")
    <title>ایجاد نقش ادمین</title>
@endsection

@section("content")

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route("admin.home") }}">خانه</a></li>
            <li class="breadcrumb-item"><a href="#">بخش کاربران</a></li>
            <li class="breadcrumb-item"><a href="{{ route("admin.user.adminUser.index") }}">ادمین ها</a></li>
            <li class="breadcrumb-item active" aria-current="page">ایجاد نقش ادمین</li>
        </ol>
    </nav>

    <section class="pagesContent py-3 px-2">
        <div class="sectionHeader d-flex justify-content-between align-items-center">
            <h4>ایجاد نقش ادمین:</h4>

            <a href="{{ route("admin.user.adminUser.index") }}" class="btn btn-info btn-sm border-radius-4 box-shadow-normal">بازگشت</a>
        </div>

        <div class="sectionHeaderBottom d-flex justify-content-between align-items-center py-3">

        </div>

        <section class="pageContentInner">
            <form action="{{ route("admin.user.adminUser.roles.store", $admin) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="form-group col-md-12">
                        <label class="text-info font-weight-bold h5">نام ادمین:</label>
                        <h6 class="font-weight-bold d-inline h5">{{$admin->fullName}}</h6>
                    </div>

                    <div class="form-group col-md-12 pt-4">
                        <label for="">نقش ها:</label>
                        <div class="row">
                            @foreach($roles as $key => $role)
                                <div class="col-md-3">
                                    <div class="form-check form-check-inline pb-3">
                                        <input type="checkbox" id="{{ $role["id"] }}" class="form-check-input" name="roles[]" value="{{ $role["id"] }}" @foreach($admin->roles as $user_role) @if($user_role->id === $role->id) checked @endif @endforeach>
                                        <label for="{{ $role["id"] }}" class="form-check-label mr-1">{{ $role["name"] }}</label>
                                    </div>
                                    @error("role")
                                        <div class="errors"><span class="text-danger">{{ $message }}</span></div>
                                    @enderror
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="col-md-12 d-flex justify-content-center pt-5">
                        <input type="submit" class="btn btn-primary border-radius-4 box-shadow-normal submit-custom" value="ثبت">
                    </div>
                </div>
            </form>
        </section>


    </section>

@endsection
