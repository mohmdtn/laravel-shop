@extends("admin.layouts.master")

@section("head-tag")
    <title>فرم کالا</title>
@endsection

@section("content")

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route("admin.home") }}">خانه</a></li>
            <li class="breadcrumb-item"><a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item active" aria-current="page">فرم کالا</li>
        </ol>
    </nav>

    <section class="pagesContent py-3 px-2">
        <div class="sectionHeader">
            <h4>فرم کالا:</h4>
        </div>

        <div class="sectionHeaderBottom d-flex justify-content-between align-items-center py-3">
            <a href="{{ route("admin.market.property.create") }}" class="btn btn-info btn-sm border-radius-4 box-shadow-normal">ایجاد فرم کالا</a>
            <input type="text" class="form-control form-control-sm border-radius-4 box-shadow-normal" placeholder="جستجو...">
        </div>

        <section class="table-responsive">

            <table class="table table-striped table-hover">
                <thead class="table-info">
                    <th>#</th>
                    <th>نام فرم</th>
                    <th>واحد اندازه گیری</th>
                    <th>فرم والد</th>
                    <th class="width-18 text-center">تنظیمات</th>
                </thead>

                <tbody>
                    @foreach($categoryAttributes as $categoryAttribute)
                        <tr>
                            <th>{{ $loop->iteration }}</th>
                            <td>{{ $categoryAttribute["name"] }}</td>
                            <td>{{ $categoryAttribute["unit"] }}</td>
                            <td>{{ $categoryAttribute->category->name }}</td>
                            <td class="max-width-18 text-left">
                                <a href="{{ route("admin.market.property.value.index", $categoryAttribute["id"]) }}" class="btn btn-sm btn-warning border-radius-2 mb-1 mb-md-0"><i class="fa fa-edit ml-2"></i>ویژگی ها</a>
                                <a href="{{ route("admin.market.property.edit", $categoryAttribute["id"]) }}" class="btn btn-sm btn-info border-radius-2 mb-1 mb-md-0"><i class="fa fa-edit ml-2"></i>ویرایش</a>
                                <form action="{{ route("admin.market.property.destroy", $categoryAttribute["id"]) }}" method="post">
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
