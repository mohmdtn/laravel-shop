@extends("admin.layouts.master")

@section("head-tag")
    <title>رنگ کالا</title>
@endsection

@section("content")

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route("admin.home") }}">خانه</a></li>
            <li class="breadcrumb-item"><a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item"><a href="{{ route("admin.market.product.index") }}">کالا ها</a></li>
            <li class="breadcrumb-item active" aria-current="page">رنگ کالا</li>
        </ol>
    </nav>

    <section class="pagesContent py-3 px-2">
        <div class="sectionHeader sectionHeaderBottom d-flex justify-content-between align-items-center py-3">
            <h4>رنگ ها:</h4>
        </div>

        <div class="sectionHeaderBottom d-flex justify-content-between align-items-center py-3">
            <a href="{{ route("admin.market.color.create", $product["id"]) }}" class="btn btn-info btn-sm border-radius-4 box-shadow-normal">ایجاد رنگ جدید</a>
            <input type="text" class="form-control form-control-sm border-radius-4 box-shadow-normal" placeholder="جستجو...">
        </div>

        <section class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="table-info">
                <th>#</th>
                <th>نام کالا</th>
                <th>نام رنگ کالا</th>
                <th>رنگ کالا</th>
                <th>افزایش قیمت</th>
                <th class="max-width-18 text-center">تنظیمات</th>

                </thead>

                <tbody>
                    @foreach($product->colors as $color)
                        <tr>
                            <th>{{ $loop->iteration }}</th>
                            <td>{{ $product["name"] }}</td>
                            <td>{{ $color["color_name"] }}</td>
                            <td><div style="width: 25px; height: 25px; background-color: {{ $color["color"] }}"></div></td>
                            <td>{{ $color["price_increase"] }}تومان </td>
                            <td class="max-width-18 text-center">
                                <form action="{{ route("admin.market.color.destroy", ["product" => $product["id"], "color" => $color["id"]]) }}" method="post">
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

