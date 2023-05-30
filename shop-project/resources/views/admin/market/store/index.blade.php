@extends("admin.layouts.master")

@section("head-tag")
    <title>انبار</title>
@endsection

@section("content")

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route("admin.home") }}">خانه</a></li>
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
                    <th>تعداد قابل فروش</th>
                    <th>تعداد فروخته شده</th>
                    <th>تعداد رزرو شده</th>
                    <th class="width-18 text-center">تنظیمات</th>
                </thead>

                <tbody>

                    @foreach($products as $product)
                        <tr>
                            <th>{{ $loop->iteration }}</th>
                            <td>{{ $product["name"] }}</td>
                            <td><img src="{{ asset($product['image']['indexArray'][$product['image']['currentImage']]) }}" alt=""></td>
                            <td>{{ $product["marketable_number"] }}</td>
                            <td>{{ $product["sold_number"] }}</td>
                            <td>{{ $product["frozen_number"] }}</td>
                            <td class="max-width-18 text-left">
                                <a href="{{ route("admin.market.store.addToStore", $product["id"]) }}" class="btn btn-sm btn-info mb-1 mb-md-0 border-radius-2"><i class="fa fa-edit ml-2"></i>افزایش موجودی</a>
                                <a href="{{ route("admin.market.store.edit", $product["id"]) }}" class="btn btn-sm btn-warning border-radius-2"><i class="fa fa-edit ml-2"></i>اصلاح موجودی</a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>

        </section>

    </section>

@endsection
