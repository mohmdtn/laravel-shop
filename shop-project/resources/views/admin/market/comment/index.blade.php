@extends("admin.layouts.master")

@section("head-tag")
    <title>نظرات</title>
@endsection

@section("content")

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">خانه</a></li>
            <li class="breadcrumb-item"><a href="#">بخش فروش</a></li>
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
                <th>کد کاربر</th>
                <th>نویسنده نظر</th>
                <th>کد کالا</th>
                <th>کالا</th>
                <th>وضعیت</th>
                <th class="width-18 text-center">تنظیمات</th>
                </thead>

                <tbody>
                <tr>
                    <th>1</th>
                    <td>12683</td>
                    <td>محمد تقی نسب</td>
                    <td>1378</td>
                    <td>آیفون 13 پرو مکس</td>
                    <td>در انتظار تایید</td>
                    <td class="max-width-18 text-left">
                        <a href="{{ route("admin.market.comment.show") }}" class="btn btn-sm btn-info border-radius-2 mb-2 mb-md-0"><i class="fas fa-eye ml-2"></i>نمایش</a>
                        <a href="" class="btn btn-sm btn-success border-radius-2"><i class="fa fa-check-circle ml-2"></i>تایید</a>
                    </td>
                </tr>

                <tr>
                    <th>2</th>
                    <td>12683</td>
                    <td>سینا مهدوی</td>
                    <td>1378</td>
                    <td>اپل واچ سری 5</td>
                    <td>تایید شده</td>
                    <td class="max-width-18 text-left">
                        <a href="" class="btn btn-sm btn-info border-radius-2 mb-2 mb-md-0"><i class="fas fa-eye ml-2"></i>نمایش</a>
                        <a href="" class="btn btn-sm btn-warning border-radius-2"><i class="fa fa-ban ml-2"></i>عدم تایید</a>
                    </td>
                </tr>
                </tbody>

                <tbody>

                </tbody>
            </table>

        </section>

    </section>

@endsection
