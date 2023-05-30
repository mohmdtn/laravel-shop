@extends("admin.layouts.master")

@section("head-tag")
    <title>مقدار فرم کالا</title>
@endsection

@section("content")

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route("admin.home") }}">خانه</a></li>
            <li class="breadcrumb-item"><a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item"><a href="#">فرم کالا</a></li>
            <li class="breadcrumb-item active" aria-current="page">مقدار فرم کالا</li>
        </ol>
    </nav>

    <section class="pagesContent py-3 px-2">
        <div class="sectionHeader">
            <h4>ویژگی ها:</h4>
        </div>

        <div class="sectionHeaderBottom d-flex justify-content-between align-items-center py-3">
            <a href="{{ route("admin.market.property.value.create", $categoryAttribute["id"]) }}" class="btn btn-info btn-sm border-radius-4 box-shadow-normal">ایجاد مقدار فرم کالا جدید</a>
            <input type="text" class="form-control form-control-sm border-radius-4 box-shadow-normal" placeholder="جستجو...">
        </div>

        <section class="table-responsive">

            <table class="table table-striped table-hover">
                <thead class="table-info">
                    <th>#</th>
                    <th>نام فرم</th>
                    <th>نام محصول</th>
                    <th>مقدار</th>
                    <th>افزایش قیمت</th>
                    <th>نوع</th>
                    <th class="width-18 text-center">تنظیمات</th>
                </thead>

                <tbody>
                    @foreach($categoryAttribute->values as $value)
                        <tr>
                            <th>{{ $loop->iteration }}</th>
                            <td>{{ $categoryAttribute["name"] }}</td>
                            <td>{{ $value->product->name }}</td>
                            <td>{{ json_decode($value["value"])->value }}</td>
                            <td>{{ json_decode($value["value"])->price_increase }} تومان</td>
                            <td>{{ $value["type"] == 0 ? "ساده" : "انتخابی" }}</td>
                            <td class="max-width-18 text-left">
                                <a href="{{ route("admin.market.property.value.edit", ["categoryAttribute" => $categoryAttribute["id"], "value" => $value["id"]]) }}" class="btn btn-sm btn-info border-radius-2 mb-1 mb-md-0"><i class="fa fa-edit ml-2"></i>ویرایش</a>
                                <form action="{{ route("admin.market.property.value.destroy", ["categoryAttribute" => $categoryAttribute["id"], "value" => $value["id"]]) }}" method="post">
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
