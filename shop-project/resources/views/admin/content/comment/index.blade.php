@extends("admin.layouts.master")

@section("head-tag")
    <title>نظرات</title>
@endsection

@section("content")

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">خانه</a></li>
            <li class="breadcrumb-item"><a href="#">بخش محتوی</a></li>
            <li class="breadcrumb-item active" aria-current="page">نظرات</li>
        </ol>
    </nav>

    <section class="pagesContent py-3 px-2">
        <div class="sectionHeader sectionHeaderBottom d-flex justify-content-between align-items-center py-3">
            <h4>نظرات:</h4>
            <input type="text" class="form-control form-control-sm border-radius-4 box-shadow-normal" placeholder="جستجو...">
        </div>

        <div class="">
{{--            <a href="{{ route("admin.market.category.create") }}" class="btn btn-info btn-sm border-radius-4 box-shadow-normal">ایجاد دسته بندی</a>--}}
{{--            <input type="text" class="form-control form-control-sm border-radius-4 box-shadow-normal" placeholder="جستجو...">--}}
        </div>

        <section class="table-responsive">

            <table class="table table-striped table-hover">
                <thead class="table-info">
                <th>#</th>
                <th>نظر</th>
                <th>کد کاربر</th>
                <th>نویسنده نظر</th>
                <th>کد پست</th>
                <th>پست</th>
                <th>وضعیت تایید</th>
                <th>وضعیت کامنت</th>
                <th class="width-18 text-center">تنظیمات</th>
                </thead>

                <tbody>

                @foreach($comments as $key => $comment)
                    <tr>
                        <th>{{ $key+=1 }}</th>
                        <td>{{ Str::limit($comment["body"], 20) }}</td>
                        <td>{{ $comment["author_id"] }}</td>
                        <td>{{ $comment["user"]["fullName"] }}</td>
                        <td>{{ $comment["commentable_id"] }}</td>
                        <td>{{ Str::limit($comment["commentable"]["title"], 10) }}</td>
                        <td>{{ $comment["approved"] == 1 ? "تایید شده" : "تایید نشده" }}</td>

                        <td>
                            <label class="switch">
                                <input id="{{ $comment["id"] }}" onchange="changeStatus({{ $comment["id"] }})" data-url="{{ route("admin.content.comment.status" , $comment["id"]) }}" type="checkbox"
                                       @if($comment['status'] === 1)
                                       checked
                                    @endif
                                >
                                <span class="slider round"></span>
                            </label>
                        </td>

                        <td class="max-width-18 text-left">
                            <a href="{{ route("admin.content.comment.show", $comment["id"]) }}" class="btn btn-sm btn-info border-radius-2 mb-2 mb-md-0"><i class="fas fa-eye ml-2"></i>نمایش</a>

                            @if($comment["approved"] == 1)
                                <a href="{{ route("admin.content.comment.approved", $comment["id"]) }}" class="btn btn-sm btn-warning border-radius-2"><i class="fas fa-ban ml-2"></i>عدم تایید</a>
                            @else
                                <a href="{{ route("admin.content.comment.approved", $comment["id"]) }}" class="btn btn-sm btn-success border-radius-2"><i class="fa fa-check-circle ml-2"></i>تایید</a>
                            @endif

                        </td>
                    </tr>
                @endforeach

{{--                <tr>--}}
{{--                    <th>2</th>--}}
{{--                    <td>12683</td>--}}
{{--                    <td>سینا مهدوی</td>--}}
{{--                    <td>1378</td>--}}
{{--                    <td>اپل واچ سری 5</td>--}}
{{--                    <td>تایید شده</td>--}}
{{--                    <td class="max-width-18 text-left">--}}
{{--                        <a href="" class="btn btn-sm btn-info border-radius-2 mb-2 mb-md-0"><i class="fas fa-eye ml-2"></i>نمایش</a>--}}
{{--                        <a href="" class="btn btn-sm btn-warning border-radius-2"><i class="fas fa-ban ml-2"></i>عدم تایید</a>--}}
{{--                    </td>--}}
{{--                </tr>--}}
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
                            successToast("کامنت با موفقیت فعال شد.");
                        }
                        else {
                            element.prop("checked" , false);
                            successToast("کامنت با موفقیت غیر فعال شد.");
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
