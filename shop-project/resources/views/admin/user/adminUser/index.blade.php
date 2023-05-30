@extends("admin.layouts.master")

@section("head-tag")
    <title>ادمین ها</title>
@endsection

@section("content")

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route("admin.home") }}">خانه</a></li>
            <li class="breadcrumb-item"><a href="#">بخش کاربران</a></li>
            <li class="breadcrumb-item active" aria-current="page">ادمین ها</li>
        </ol>
    </nav>

    <section class="pagesContent py-3 px-2">
        <div class="sectionHeader sectionHeaderBottom d-flex justify-content-between align-items-center py-3">
            <h4>ادمین ها:</h4>
        </div>

        <div class="sectionHeaderBottom d-flex justify-content-between align-items-center py-3">
            <a href="{{ route("admin.user.adminUser.create") }}" class="btn btn-info btn-sm border-radius-4 box-shadow-normal">ایجاد ادمین</a>
            <input type="text" class="form-control form-control-sm border-radius-4 box-shadow-normal" placeholder="جستجو...">
        </div>

        <section class="table-responsive">

            <table class="table table-striped table-hover">
                <thead class="table-info">
                <th>#</th>
                <th>نام</th>
                <th>نام خانوادگی</th>
                <th>ایمیل</th>
                <th>شماره موبایل</th>
                <th>نقش ها</th>
                <th>سطوح دسترسی</th>
                <th>وضعیت</th>
                <th class="width-18 text-center">تنظیمات</th>
                </thead>

                <tbody>

                @foreach($admins as $key => $admin)
                    <tr>
                        <th>{{ $key+=1 }}</th>
                        <td>{{ $admin["first_name"] }}</td>
                        <td>{{ $admin["last_name"] }}</td>
                        <td>{{ $admin["email"] }}</td>
                        <td>{{ $admin["mobile"] }}</td>
                        <td>
                            @forelse($admin->roles as $role)
                                <div>{{ $loop->iteration .". " . $role->name }}</div>
                            @empty
                                <div class="text-danger">نقشی وجود ندارد</div>
                            @endforelse
                        </td>
                        <td>
                            @forelse($admin->permissions as $permission)
                                <div>{{ $loop->iteration .". " . $permission->name }}</div>
                            @empty
                                <div class="text-danger">سطوح دسترسی وجود ندارد</div>
                            @endforelse
                        </td>
                        <td>
                            <label class="switch">
                                <input id="{{ $admin["id"] }}" onchange="changeStatus({{ $admin["id"] }})" data-url="{{ route("admin.user.adminUser.status" , $admin["id"]) }}" type="checkbox"
                                       @if($admin['status'] === 1)
                                       checked
                                    @endif
                                >
                                <span class="slider round"></span>
                            </label>
                        </td>
                        <td class="max-width-18 text-left">
                            <a href="{{ route("admin.user.adminUser.permissions", $admin["id"]) }}" class="btn btn-sm btn-secondary border-radius-2 mb-2 mb-md-0"><i class="fas fa-fingerprint ml-2"></i>دسترسی</a>
                            <a href="{{ route("admin.user.adminUser.roles", $admin["id"]) }}" class="btn btn-sm btn-info border-radius-2 mb-2 mb-md-0"><i class="fas fa-user-cog ml-2"></i>نقش</a>
                            <a href="{{ route("admin.user.adminUser.edit", $admin["id"]) }}" class="btn btn-sm btn-success border-radius-2 mb-2 mb-md-0"><i class="fas fa-user-edit ml-2"></i>ویرایش</a>
                            <form action="{{ route("admin.user.adminUser.destroy" , $admin["id"]) }}" method="post">
                                @csrf
                                @method("delete")
                                <button class="btn btn-sm btn-danger border-radius-2 deleteBtn"><i class="fa fa-trash-alt ml-2"></i>حذف</button>
                            </form>
                        </td>
                    </tr>
                @endforeach

                </tbody>

                <tbody>

                </tbody>
            </table>

        </section>

    </section>

@endsection

@section("scripts")

    <script>
        function changeStatus(id){
            var element = $("#" + id);
            var url = element.attr("data-url");
            var elementValue = !element.prop("checked");


            $.ajax({
                url: url,
                type: "GET",
                success: function (response){

                    if (response.status){
                        if (response.checked){
                            element.prop("checked" , true);
                            successToast("ادمین با موفقیت فعال شد.");
                        }
                        else {
                            element.prop("checked" , false);
                            successToast("ادمین با موفقیت غیر فعال شد.");
                        }
                    }
                    else {
                        element.prop("checked" , elementValue);
                        errorToast("هنگام انجام عملیات مشکلی به وجود آمده.");
                    }

                },
                error: function (){
                    element.prop("checked" , elementValue);
                    errorToast("ارتباط برقرار نشد.");
                }
            });

            function successToast(message){
                var element = '<div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-delay="5000">\n' +
                    '<div class="toast-header">\n' +
                    '<button type="button" class="ml-2 close" data-dismiss="toast" aria-label="Close">\n' +
                    '<span aria-hidden="true">&times;</span>\n' +
                    '</button>\n' +
                    '<strong class="">پیغام</strong>\n' +
                    '<small class="mr-auto">2 ثانیه قبل</small>\n' +
                    '</div>\n' +
                    '<div class="toast-body">'+ message +'</div>\n'
                '</div>';

                $(".toast-wrapper").append(element);
                $(".toast").toast("show").delay(5000).queue(function (){
                    $(this).remove();
                });
            }


            function errorToast(message){
                var element = '<div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-delay="5000">\n' +
                    '<div class="toast-header">\n' +
                    '<button type="button" class="ml-2 close" data-dismiss="toast" aria-label="Close">\n' +
                    '<span aria-hidden="true">&times;</span>\n' +
                    '</button>\n' +
                    '<strong class="">پیغام</strong>\n' +
                    '<small class="mr-auto">2 ثانیه قبل</small>\n' +
                    '</div>\n' +
                    '<div class="toast-body">'+ message +'</div>\n'
                '</div>';

                $(".toast-wrapper").append(element);
                $(".toast").toast("show").delay(5000).queue(function (){
                    $(this).remove();
                });
            }

        }
    </script>

    @include("admin.alerts.sweetAlert.deleteConfirm" , ["className" => "deleteBtn"])

@endsection

