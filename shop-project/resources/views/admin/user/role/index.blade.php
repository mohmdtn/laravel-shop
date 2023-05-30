@extends("admin.layouts.master")

@section("head-tag")
    <title>نقش ها</title>
@endsection

@section("content")

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route("admin.home") }}">خانه</a></li>
            <li class="breadcrumb-item"><a href="#">بخش کاربران</a></li>
            <li class="breadcrumb-item active" aria-current="page">نقش ها</li>
        </ol>
    </nav>

    <section class="pagesContent py-3 px-2">
        <div class="sectionHeader sectionHeaderBottom d-flex justify-content-between align-items-center py-3">
            <h4>نقش ها:</h4>
        </div>

        <div class="sectionHeaderBottom d-flex justify-content-between align-items-center py-3">
            <a href="{{ route("admin.user.role.create") }}" class="btn btn-info btn-sm border-radius-4 box-shadow-normal">ایجاد نقش</a>
            <input type="text" class="form-control form-control-sm border-radius-4 box-shadow-normal" placeholder="جستجو...">
        </div>

        <section class="table-responsive">

            <table class="table table-striped table-hover">
                <thead class="table-info">
                    <th>#</th>
                    <th>نام نقش</th>
                    <th>دسترسی ها</th>
                    <th class="width-18 text-center">تنظیمات</th>
                </thead>

                <tbody>

                @foreach($roles as $role)
                    <tr>
                        <th>{{ $loop->iteration }}</th>
                        <td>{{ $role["name"] }}</td>
                        <td>
                            @if(empty( $role->permissions()->get()->toArray() ))
                                <span class="text-danger">برای این نقش هیچ سطح دسترسی تعریف نشده است.</span>
                            @else
                                @foreach($role["permissions"] as $permission)
                                    {{ $loop->iteration . ". " . $permission["name"] }}<br>
                                @endforeach
                            @endif
                        </td>
                        <td class="max-width-18 text-left">
                            <a href="{{ route("admin.user.role.permissionForm", $role["id"]) }}" class="btn btn-sm btn-info border-radius-2 mb-2 mb-md-0"><i class="fas fa-user-cog ml-2"></i>نقش</a>
                            <a href="{{ route("admin.user.role.edit", $role["id"]) }}" class="btn btn-sm btn-success border-radius-2 mb-2 mb-md-0"><i class="fas fa-user-edit ml-2"></i>ویرایش</a>
                            <form action="{{ route("admin.user.role.destroy" , $role["id"]) }}" method="post">
                                @csrf
                                @method("delete")
                                <button class="btn btn-sm btn-danger border-radius-2 deleteBtn"><i class="fa fa-trash-alt ml-2"></i>حذف</button>
                            </form>
                        </td>
                    </tr>
                @endforeach

                </tbody>

            </table>

        </section>

    </section>


@endsection

@section("scripts")
    @include("admin.alerts.sweetAlert.deleteConfirm" , ["className" => "deleteBtn"])
@endsection
