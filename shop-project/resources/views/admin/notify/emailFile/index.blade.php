@extends("admin.layouts.master")

@section("head-tag")
    <title>فایل های اطلاعیه ایمیلی</title>
@endsection

@section("content")

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route("admin.home") }}">خانه</a></li>
            <li class="breadcrumb-item"><a href="#">بخش اطلاع رسانی</a></li>
            <li class="breadcrumb-item"><a href="{{ route("admin.notify.email.index") }}">اطلاعیه ایمیلی</a></li>
            <li class="breadcrumb-item active" aria-current="page">فایل های اطلاعیه ایمیلی</li>
        </ol>
    </nav>

    <section class="pagesContent py-3 px-2">
        <div class="sectionHeader">
            <h4>فایل های اطلاعیه ایمیلی:</h4>
        </div>

        <div class="sectionHeaderBottom d-flex justify-content-between align-items-center py-3">
            <a href="{{ route("admin.notify.emailFile.create", $email["id"]) }}" class="btn btn-info btn-sm border-radius-4 box-shadow-normal">ایجاد فایل</a>
            <input type="text" class="form-control form-control-sm border-radius-4 box-shadow-normal" placeholder="جستجو...">
        </div>

        <section class="table-responsive">

            <table class="table table-striped table-hover">
                <thead class="table-info">
                    <th>#</th>
                    <th>عنوان ایمیل</th>
                    <th>سایز فایل</th>
                    <th>نوع فایل</th>
                    <th>وضعیت</th>
                    <th class="width-18 text-center">تنظیمات</th>
                </thead>

                <tbody>
                @foreach($email->files as $key => $file)
                    <tr>
                        <th>{{ $key+=1 }}</th>
                        <td>{{ $email["subject"] }}</td>
                        <td>{{ $file["file_size"] }}</td>
                        <td>{{ $file["file_type"] }}</td>
                        <td>
                            <label class="switch">
                                <input id="{{ $file["id"] }}" onchange="changeStatus({{ $file["id"] }})" data-url="{{ route("admin.notify.emailFile.status" , $file["id"]) }}" type="checkbox"
                                       @if($file['status'] === 1)
                                       checked
                                    @endif
                                >
                                <span class="slider round"></span>
                            </label>
                        </td>
                        <td class="max-width-18 text-left">
                            <a href="{{ route("admin.notify.emailFile.edit", $file["id"]) }}" class="btn btn-sm btn-info mb-1 mb-md-0 border-radius-2"><i class="fa fa-edit ml-2"></i>ویرایش</a>
                            <form action="{{ route("admin.notify.emailFile.destroy" , $file["id"]) }}" method="post">
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
                            successToast("فایل ایمیل با موفقیت فعال شد.");
                        }
                        else {
                            element.prop("checked" , false);
                            successToast("فایل ایمیل با موفقیت غیر فعال شد.");
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
