@extends("admin.layouts.master")

@section("head-tag")
    <title>کالا ها</title>
@endsection

@section("content")

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">خانه</a></li>
            <li class="breadcrumb-item"><a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item active" aria-current="page">کالا ها</li>
        </ol>
    </nav>

    <section class="pagesContent py-3 px-2">
        <div class="sectionHeader sectionHeaderBottom d-flex justify-content-between align-items-center py-3">
            <h4>کالا ها:</h4>
        </div>

        <div class="sectionHeaderBottom d-flex justify-content-between align-items-center py-3">
            <a href="{{ route("admin.market.product.create") }}" class="btn btn-info btn-sm border-radius-4 box-shadow-normal">ایجاد کالا</a>
            <input type="text" class="form-control form-control-sm border-radius-4 box-shadow-normal" placeholder="جستجو...">
        </div>

        <section class="table-responsive">

            <table class="table table-striped table-hover">
                <thead class="table-info">
                <th>#</th>
                <th>نام کالا</th>
                <th>تصویر کالا</th>
                <th>قیمت</th>
                <th>وزن</th>
                <th>دسته</th>
                <th>برند</th>
                <th>فرم</th>
                <th>وضعیت</th>
                <th class="max-width-18">تنظیمات</th>

                </thead>

                <tbody>
                @foreach($products as $product)
                    <tr>
                        <th>{{ $loop->iteration }}</th>
                        <td>{{ $product["name"] }}</td>
                        <td><img src="{{ asset($product['image']['indexArray'][$product['image']['currentImage']]) }}" alt=""></td>
                        <td>{{ $product["price"] }}تومان </td>
                        <td>{{ $product["weight"] }}</td>
                        <td>{{ $product->category->name }}</td>
                        <td>{{ $product->brand->persian_name }}</td>
                        <td>لپتاپ</td>
                        <td>
                            <label class="switch">
                                <input id="{{ $product["id"] }}" onchange="changeStatus({{ $product["id"] }})" data-url="{{ route("admin.market.product.status" , $product["id"]) }}" type="checkbox"
                                       @if($product['status'] === 1)
                                       checked
                                    @endif
                                >
                                <span class="slider round"></span>
                            </label>
                        </td>
                        <td>
                            <div class="dropdown">
                                <a href="#" class="btn btn-sm btn-info border-radius-2 dropdown-toggle" role="button" id="dropdownBtn" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-tools ml-1"></i>عملیات</a>

                                <div class="dropdown-menu border-radius-5 text-right" aria-labelledby="dropdownBtn">
                                    <a href="{{ route("admin.market.gallery.index", $product["id"]) }}" class="dropdown-item"><i class="fa fa-images ml-1"></i>گالری</a>
                                    <a href="{{ route("admin.market.color.index", $product["id"]) }}" class="dropdown-item"><i class="	fas fa-paint-roller ml-1"></i>رنگ کالا</a>
                                    <a href="{{ route("admin.market.product.edit", $product["id"]) }}" class="dropdown-item"><i class="fa fa-edit ml-1"></i>ویرایش</a>
                                    <form action="{{ route("admin.market.product.destroy" , $product["id"]) }}" method="post">
                                        @csrf
                                        @method("delete")
                                        <button class="dropdown-item deleteBtn"><i class="fa fa-trash ml-1"></i>حذف</button>
                                    </form>
                                </div>
                            </div>
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
                            successToast("محصول با موفقیت فعال شد.");
                        }
                        else {
                            element.prop("checked" , false);
                            successToast("محصول با موفقیت غیر فعال شد.");
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
