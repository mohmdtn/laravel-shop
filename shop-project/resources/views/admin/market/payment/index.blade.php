@extends("admin.layouts.master")

@section("head-tag")
    <title>پرداخت ها</title>
@endsection

@section("content")

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">خانه</a></li>
            <li class="breadcrumb-item"><a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item active" aria-current="page">پرداخت ها</li>
        </ol>
    </nav>

    <section class="pagesContent py-3 px-2">
        <div class="sectionHeader sectionHeaderBottom d-flex justify-content-between align-items-center py-3">
            <h4>پرداخت ها:</h4>
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
                <th>کد تراکنش</th>
                <th>بانک</th>
                <th>پرداخت کننده</th>
                <th>وضعیت پرداخت</th>
                <th>نوع پرداخت</th>
                <th class="max-width-20 text-center">تنظیمات</th>
                </thead>

                <tbody>
                <tr>
                    <th>1</th>
                    <td>1238173</td>
                    <td>ملت</td>
                    <td>محمد تقی نسب</td>
                    <td>تایید شده</td>
                    <td>آنلاین</td>
                    <td class=" text-left">
                        <a href="{{ route("admin.market.comment.show") }}" class="btn btn-sm btn-info border-radius-2 mb-2 mb-md-0"><i class="fas fa-eye ml-2"></i>مشاهده</a>
                        <a href="" class="btn btn-sm btn-warning border-radius-2 text-white mb-2 mb-md-0"><i class="fa fa-window-close ml-2"></i>باطل کردن</a>
                        <a href="" class="btn btn-sm btn-danger border-radius-2"><i class="fa fa-undo ml-2"></i>برگرداندن</a>
                    </td>
                </tr>

                <tr>
                    <th>2</th>
                    <td>3535678</td>
                    <td>رفاه</td>
                    <td>سینا مهدوی</td>
                    <td>تایید شده</td>
                    <td>آفلاین</td>
                    <td class=" text-left">
                        <a href="{{ route("admin.market.comment.show") }}" class="btn btn-sm btn-info border-radius-2 mb-2 mb-md-0"><i class="fas fa-eye ml-2"></i>مشاهده</a>
                        <a href="" class="btn btn-sm btn-warning border-radius-2 text-white mb-2 mb-md-0"><i class="fa fa-window-close ml-2"></i>باطل کردن</a>
                        <a href="" class="btn btn-sm btn-danger border-radius-2"><i class="fa fa-undo ml-2"></i>برگرداندن</a>
                    </td>
                </tr>

                </tbody>

                <tbody>

                </tbody>
            </table>

        </section>

    </section>

@endsection
