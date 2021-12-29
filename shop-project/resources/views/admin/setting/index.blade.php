@extends("admin.layouts.master")

@section("head-tag")
    <title>تنطیمات</title>
@endsection

@section("content")

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">خانه</a></li>
            <li class="breadcrumb-item"><a href="#">بخش تنطیمات</a></li>
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
                <th>شماره تماس</th>
                <th>آدرس سایت</th>
                <th>لوگو سایت</th>
                <th>ایمیل</th>
                <th class="width-18 text-center">تنظیمات</th>
                </thead>

                <tbody>
                <tr>
                    <th>1</th>
                    <td>سایت فروشگاهی</td>
                    <td>0911111111</td>
                    <td>test.com</td>
                    <td>-</td>
                    <td>mohammad@gmail.com</td>
                    <td class="max-width-18 text-left">
                        <a href="{{}}" class="btn btn-sm btn-info border-radius-2 mb-2 mb-md-0"><i class="fas fa-edit ml-2"></i>ویرایش</a>
                    </td>
                </tr>

                </tbody>

                <tbody>

                </tbody>
            </table>

        </section>

    </section>

@endsection
