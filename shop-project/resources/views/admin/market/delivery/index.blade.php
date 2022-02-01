@extends("admin.layouts.master")

@section("head-tag")
    <title>روش های ارسال</title>
@endsection

@section("content")

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">خانه</a></li>
            <li class="breadcrumb-item"><a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item active" aria-current="page">روش ارسال</li>
        </ol>
    </nav>

    <section class="pagesContent py-3 px-2">
        <div class="sectionHeader">
            <h4>روش ارسال:</h4>
        </div>

        <div class="sectionHeaderBottom d-flex justify-content-between align-items-center py-3">
            <a href="{{ route("admin.market.delivery.create") }}" class="btn btn-info btn-sm border-radius-4 box-shadow-normal">ایجاد روش ارسال</a>
            <input type="text" class="form-control form-control-sm border-radius-4 box-shadow-normal" placeholder="جستجو...">
        </div>

        <section class="table-responsive">

            <table class="table table-striped table-hover">
                <thead class="table-info">
                <th>#</th>
                <th>نام روش ارسال</th>
                <th>هزینه ارسال</th>
                <th>زمان ارسال</th>
                <th>وضعیت</th>
                <th class="width-18 text-center">تنظیمات</th>
                </thead>

                <tbody>
                @foreach($delivery_methods as $delivery)
                    <tr>
                        <th>{{ $loop->iteration }}</th>
                        <td>{{ $delivery["name"] }}</td>
                        <td>{{ $delivery["amount"] }} تومان</td>
                        <td>{{ $delivery["delivery_time"] . " " . $delivery["delivery_time_unit"] }}</td>
                        <td>
                            <label class="switch">
                                <input id="{{ $delivery["id"] }}" onchange="changeStatus({{ $delivery["id"] }})" data-url="{{ route("admin.market.delivery.status" , $delivery["id"]) }}" type="checkbox"
                                       @if($delivery['status'] === 1)
                                       checked
                                    @endif
                                >
                                <span class="slider round"></span>
                            </label>
                        </td>
                        <td class="max-width-18 text-left">
                            <a href="{{ route("admin.market.delivery.edit", $delivery["id"]) }}" class="btn btn-sm btn-info border-radius-2"><i class="fa fa-edit ml-2"></i>ویرایش</a>
                            <form action="{{ route("admin.market.delivery.destroy" , $delivery["id"]) }}" method="post">
                                @csrf
                                @method("delete")
                                <button class="btn btn-sm btn-danger border-radius-2 deleteBtn"><i class="fa fa-trash-alt ml-2"></i>حذف</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
{{--                    <tr>--}}
{{--                        <th>2</th>--}}
{{--                        <td>تی پاکس</td>--}}
{{--                        <td>29000 تومان</td>--}}
{{--                        <td>حداکثر 1 روز</td>--}}
{{--                        <td class="max-width-18 text-left">--}}
{{--                            <a href="" class="btn btn-sm btn-info border-radius-2"><i class="fa fa-edit ml-2"></i>ویرایش</a>--}}
{{--                            <a href="" class="btn btn-sm btn-danger border-radius-2"><i class="fa fa-trash-alt ml-2"></i>حذف</a>--}}
{{--                        </td>--}}
{{--                    </tr>--}}
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
                            successToast("روش ارسال با موفقیت فعال شد.");
                        }
                        else {
                            element.prop("checked" , false);
                            successToast("روش ارسال با موفقیت غیر فعال شد.");
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
