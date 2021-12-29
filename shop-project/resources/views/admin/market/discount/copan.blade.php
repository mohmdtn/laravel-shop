@extends("admin.layouts.master")

@section("head-tag")
    <title>کوپن تخفیف</title>
@endsection

@section("content")

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">خانه</a></li>
            <li class="breadcrumb-item"><a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item active" aria-current="page">کوپن تخفیف</li>
        </ol>
    </nav>

    <section class="pagesContent py-3 px-2">
        <div class="sectionHeader">
            <h4>کوپن تخفیف:</h4>
        </div>

        <div class="sectionHeaderBottom d-flex justify-content-between align-items-center py-3">
            <a href="{{ route("admin.market.discount.copan.create") }}" class="btn btn-info btn-sm border-radius-4 box-shadow-normal">ایجاد کوپن تخفیف</a>
            <input type="text" class="form-control form-control-sm border-radius-4 box-shadow-normal" placeholder="جستجو...">
        </div>

        <section class="table-responsive">

            <table class="table table-striped table-hover">
                <thead class="table-info">
                <th>#</th>
                <th>کد تخفیف</th>
                <th>درصد تخفیف</th>
                <th>سقف تخفیف</th>
                <th>نوع کوپن</th>
                <th>تاریخ شروع</th>
                <th>تاریخ پایان</th>
                <th class="width-18 text-center">تنظیمات</th>
                </thead>

                <tbody>
                <tr>
                    <th>1</th>
                    <td>XRTUA</td>
                    <td>20%</td>
                    <td>26000 تومان</td>
                    <td>عمومی</td>
                    <td>15 آذر 1400</td>
                    <td>30 آذر 1400</td>
                    <td class="max-width-18 text-left">
                        <a href="" class="btn btn-sm btn-info border-radius-2"><i class="fa fa-edit ml-2"></i>ویرایش</a>
                        <a href="" class="btn btn-sm btn-danger border-radius-2"><i class="fa fa-trash-alt ml-2"></i>حذف</a>
                    </td>
                </tr>

                </tbody>

                <tbody>

                </tbody>
            </table>

        </section>

    </section>

@endsection
