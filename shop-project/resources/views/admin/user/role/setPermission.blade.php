@extends("admin.layouts.master")

@section("head-tag")
    <title>مدیریت دسترسی ها</title>
@endsection

@section("content")

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">خانه</a></li>
            <li class="breadcrumb-item"><a href="#">بخش کاربران</a></li>
            <li class="breadcrumb-item"><a href="#">نقش ها</a></li>
            <li class="breadcrumb-item active" aria-current="page">مدیریت دسترسی ها</li>
        </ol>
    </nav>

    <section class="pagesContent py-3 px-2">
        <div class="sectionHeader d-flex justify-content-between align-items-center">
            <h4>مدیریت دسترسی ها:</h4>

            <a href="{{ route("admin.user.role.index") }}" class="btn btn-info btn-sm border-radius-4 box-shadow-normal">بازگشت</a>
        </div>

        <div class="sectionHeaderBottom d-flex justify-content-between align-items-center py-3">

        </div>

        <section class="pageContentInner">
            <form action="{{ route("admin.user.role.permissionUpdate", $role["id"]) }}" method="post">
                @csrf
                @method("put")
                <div class="row">

                    @php
                        $rolePermissionArray = $role->permissions->pluck("id")->toArray();
                    @endphp

                    <div class="form-group col-md-6">
                        <label class="text-info font-weight-bold">عنوان نقش:</label>
                        <h6 class="font-weight-bold d-inline">{{$role["name"]}}</h6>
                    </div>

                    <div class="form-group col-md-6">
                        <label class="text-info font-weight-bold">توضیح نقش:</label>
                        <h6 class="font-weight-bold d-inline">{{$role["description"]}}</h6>
                    </div>

                    <div class="form-group col-md-12 pt-4">
                        <div class="row">
                            @foreach($permissions as $key => $permission)
                            <div class="col-md-3">
                                <div class="form-check form-check-inline pb-3">
                                    <input type="checkbox" id="{{ $permission["id"] }}" class="form-check-input" name="permissions[]" value="{{ $permission["id"] }}" @if(in_array($permission["id"], $rolePermissionArray)) checked @endif>
                                    <label for="{{ $permission["id"] }}" class="form-check-label mr-1">{{ $permission["name"] }}</label>
                                </div>
                                @error("permissions." . $key)
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
