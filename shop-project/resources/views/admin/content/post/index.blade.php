@extends("admin.layouts.master")

@section("head-tag")
    <title>پست ها</title>
@endsection

@section("content")

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route("admin.home") }}">خانه</a></li>
            <li class="breadcrumb-item"><a href="#">بخش محتوی</a></li>
            <li class="breadcrumb-item active" aria-current="page">پست ها</li>
        </ol>
    </nav>

    <section class="pagesContent py-3 px-2">
        <div class="sectionHeader">
            <h4>پست ها:</h4>
        </div>

        <div class="sectionHeaderBottom d-flex justify-content-between align-items-center py-3">
            <a href="{{ route("admin.content.post.create") }}" class="btn btn-info btn-sm border-radius-4 box-shadow-normal">ایجاد پست</a>
            <input type="text" class="form-control form-control-sm border-radius-4 box-shadow-normal" placeholder="جستجو...">
        </div>

        <section class="table-responsive">

            <table class="table table-striped table-hover">
                <thead class="table-info">
                <th>#</th>
                <th>عنوان پست</th>
                <th>دسته</th>
                <th>تصویر</th>
                <th>درج کامنت</th>
                <th>وضعیت</th>
                <th class="width-18 text-center">تنظیمات</th>
                </thead>

                <tbody>

                @foreach($posts as $key => $post)
                    <tr>
                        <th>{{ $key+=1 }}</th>
                        <td>{{ $post["title"] }}</td>
                        <td>{{ $post["postCategory"]["name"] }}</td>
                        <td><img src="{{ asset($post['image']['indexArray'][$post['image']['currentImage']]) }}" alt=""></td>
                        <td>
                            <label class="switch">
                                <input id="{{ "cm" . $post["id"] }}" onchange="changeCommentable({{ $post["id"] }})" data-url="{{ route("admin.content.post.commentable" , $post["id"]) }}" type="checkbox"
                                       @if($post['commentable'] === 1)
                                       checked
                                    @endif
                                >
                                <span class="slider round"></span>
                            </label>
                        </td>

                        <td>

                            <label class="switch">
                                <input id="{{ $post["id"] }}" onchange="changeStatus({{ $post["id"] }})" data-url="{{ route("admin.content.post.status" , $post["id"]) }}" type="checkbox"
                                       @if($post['status'] === 1)
                                       checked
                                    @endif
                                >
                                <span class="slider round"></span>
                            </label>

                        </td>

                        <td class="max-width-18 text-left">
                            <a href="{{ route("admin.content.post.edit" , $post["id"]) }}" class="btn btn-sm btn-info border-radius-2 mb-1 mb-md-0"><i class="fa fa-edit ml-2"></i>ویرایش</a>
                            <form action="{{ route("admin.content.post.destroy" , $post['id']) }}" method="post">
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
                            successToast("پست با موفقیت فعال شد.");
                        }
                        else {
                            element.prop("checked" , false);
                            successToast("پست با موفقیت غیر فعال شد.");
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









    <script>
        function changeCommentable(id){
            var element = $("#cm" + id);
            var url = element.attr("data-url");
            var elementValue = !element.prop("checked");


            $.ajax({
                url: url,
                type: "GET",
                success: function (response){

                    if (response.commentable){
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
