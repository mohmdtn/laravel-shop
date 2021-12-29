@extends("admin.layouts.master")

@section("head-tag")
    <title>تیکت ها</title>
@endsection

@section("content")

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">خانه</a></li>
            <li class="breadcrumb-item"><a href="#">بخش تیکت ها</a></li>
            <li class="breadcrumb-item active" aria-current="page">تیکت ها</li>
        </ol>
    </nav>

    <section class="pagesContent py-3 px-2">
        <div class="sectionHeader sectionHeaderBottom d-flex justify-content-between align-items-center py-3">
            <h4>تیکت ها:</h4>
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
                <th>نویسنده تیکت</th>
                <th>عنوان تیکت</th>
                <th>دسته تیکت</th>
                <th>اولویت تیکت</th>
                <th>ارجاع تیکت</th>
                <th class="width-18 text-center">تنظیمات</th>
                </thead>

                <tbody>
                <tr>
                    <th>1</th>
                    <td>محمد تقی نسب</td>
                    <td>مشکل سبد خرید</td>
                    <td>دسته فروش</td>
                    <td>فوری</td>
                    <td>-</td>
                    <td class="max-width-18 text-left">
                        <a href="{{ route("admin.ticket.show") }}" class="btn btn-sm btn-info border-radius-2 mb-2 mb-md-0"><i class="fas fa-eye ml-2"></i>نمایش</a>
                    </td>
                </tr>

                <tr>
                    <th>2</th>
                    <td>سینا مهدوی</td>
                    <td>مشکل پرداخت آنلاین</td>
                    <td>دسته فروش</td>
                    <td>فوری</td>
                    <td>محمد تقی نسب</td>
                    <td class="max-width-18 text-left">
                        <a href="{{ route("admin.ticket.show") }}" class="btn btn-sm btn-info border-radius-2 mb-2 mb-md-0"><i class="fas fa-eye ml-2"></i>نمایش</a>
                    </td>
                </tr>
                </tbody>

                <tbody>

                </tbody>
            </table>

        </section>

    </section>

@endsection
