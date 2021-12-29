@extends("admin.layouts.master")

@section("head-tag")
    <title>انبار</title>
@endsection

@section("content")

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">خانه</a></li>
            <li class="breadcrumb-item"><a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item active" aria-current="page">انبار</li>
        </ol>
    </nav>

    <section class="pagesContent py-3 px-2">
        <div class="sectionHeader sectionHeaderBottom d-flex justify-content-between align-items-center py-3">
            <h4>انبار:</h4>
            <input type="text" class="form-control form-control-sm border-radius-4 box-shadow-normal" placeholder="جستجو...">
        </div>

        <div class="sectionHeaderBottom d-flex justify-content-between align-items-center py-3">
{{--            <a href="{{ route("admin.market.category.create") }}" class="btn btn-info btn-sm border-radius-4 box-shadow-normal">ایجاد دسته بندی</a>--}}
{{--            <input type="text" class="form-control form-control-sm border-radius-4 box-shadow-normal" placeholder="جستجو...">--}}
        </div>

        <section class="table-responsive">

            <table class="table table-striped table-hover">
                <thead class="table-info">
                    <th>#</th>
                    <th>نام کالا</th>
                    <th>تصویر کالا</th>
                    <th>موجودی</th>
                    <th>ورودی انبار</th>
                    <th>خروجی انبار</th>
                    <th class="width-18 text-center">تنظیمات</th>
                </thead>

                <tbody>
                    <tr>
                        <th>1</th>
                        <td>آیفون 13</td>
                        <td><img src="{{ asset("admin-assets/images/iphone.jpg") }}" alt=""></td>
                        <td>12</td>
                        <td>22</td>
                        <td>10</td>
                        <td class="max-width-18 text-left">
                            <a href="{{ route("admin.market.store.addToStore") }}" class="btn btn-sm btn-info border-radius-2"><i class="fa fa-edit ml-2"></i>افزایش موجودی</a>
                            <a href="" class="btn btn-sm btn-warning border-radius-2"><i class="fa fa-edit ml-2"></i>اصلاح موجودی</a>
                        </td>
                    </tr>

                    <tr>
                        <th>2</th>
                        <td>سورفیس پرو 5</td>
                        <td><img src="{{ asset("admin-assets/images/surface.jpg") }}" alt=""></td>
                        <td>11</td>
                        <td>24</td>
                        <td>13</td>
                        <td class="max-width-18 text-left">
                            <a href="{{ route("admin.market.store.addToStore") }}" class="btn btn-sm btn-info border-radius-2 mb-1 mb-sm-0"><i class="fa fa-edit ml-2"></i>افزایش موجودی</a>
                            <a href="" class="btn btn-sm btn-warning border-radius-2"><i class="fa fa-edit ml-2"></i>اصلاح موجودی</a>
                        </td>
                    </tr>
                </tbody>

                <tbody>

                </tbody>
            </table>

        </section>

    </section>

@endsection
