@extends("admin.layouts.master")

@section("head-tag")
    <title>تنطیمات</title>
@endsection

@section("content")

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route("admin.home") }}">خانه</a></li>
            <li class="breadcrumb-item"><a href="{{ route("admin.setting.index") }}">بخش تنطیمات</a></li>
            <li class="breadcrumb-item active" aria-current="page">تنطیمات</li>
        </ol>
    </nav>

    <section class="pagesContent py-3 px-2">
        <div class="sectionHeader sectionHeaderBottom d-flex justify-content-between align-items-center py-3">
            <h4>تنطیمات:</h4>
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
                <th>نام سایت</th>
                <th>توضیحات سایت</th>
                <th>کلمات کلیدی</th>
                <th>لوگو سایت</th>
                <th>آیکون سایت</th>
                <th class="width-18 text-center">تنظیمات</th>
                </thead>

                <tbody>
                <tr>
                    <th>1</th>
                    <td>{{ $setting["title"] }}</td>
                    <td>{{ $setting["description"] }}</td>
                    <td>{{ $setting["keywords"] }}</td>
                    <td><img src="{{ asset($setting["logo"]) }}" alt=""></td>
                    <td><img src="{{ asset($setting["icon"]) }}" alt=""></td>
                    <td class="max-width-18 text-left">
                        <a href="{{ route("admin.setting.edit", $setting["id"]) }}" class="btn btn-sm btn-info border-radius-2 mb-2 mb-md-0"><i class="fas fa-edit ml-2"></i>ویرایش</a>
                    </td>
                </tr>

                </tbody>

                <tbody>

                </tbody>
            </table>

        </section>

    </section>

@endsection
