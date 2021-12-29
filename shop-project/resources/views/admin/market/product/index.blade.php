@extends("admin.layouts.master")

@section("head-tag")
    <title>کالا ها</title>
@endsection

@section("content")

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">خانه</a></li>
            <li class="breadcrumb-item"><a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item active" aria-current="page">کالا ها</li>
        </ol>
    </nav>

    <section class="pagesContent py-3 px-2">
        <div class="sectionHeader sectionHeaderBottom d-flex justify-content-between align-items-center py-3">
            <h4>کالا ها:</h4>
        </div>

        <div class="sectionHeaderBottom d-flex justify-content-between align-items-center py-3">
            <a href="{{ route("admin.market.product.create") }}" class="btn btn-info btn-sm border-radius-4 box-shadow-normal">ایجاد کالا</a>
            <input type="text" class="form-control form-control-sm border-radius-4 box-shadow-normal" placeholder="جستجو...">
        </div>

        <section class="table-responsive">

            <table class="table table-striped table-hover">
                <thead class="table-info">
                <th>#</th>
                <th>نام کالا</th>
                <th>تصویر کالا</th>
                <th>قیمت</th>
                <th>وزن</th>
                <th>دسته</th>
                <th>فرم</th>
                <th class="max-width-18">تنظیمات</th>

                </thead>

                <tbody>
                <tr>
                    <th>1</th>
                    <td>سورفیس پرو 7</td>
                    <td><img src="{{ asset("admin-assets/images/surface.jpg") }}" alt=""></td>
                    <td>51000000 تومان</td>
                    <td>500 گرم</td>
                    <td>کالای الکتریکی</td>
                    <td>لپتاپ</td>
                    <td>
                        <div class="dropdown">
                            <a href="#" class="btn btn-sm btn-info border-radius-2 dropdown-toggle" role="button" id="dropdownBtn" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-tools ml-1"></i>عملیات</a>

                            <div class="dropdown-menu border-radius-5 text-right" aria-labelledby="dropdownBtn">
                                <a href="" class="dropdown-item"><i class="fa fa-images ml-1"></i>گالری</a>
                                <a href="" class="dropdown-item"><i class="fa fa-list-ul ml-1"></i>فرم کالا</a>
                                <a href="" class="dropdown-item"><i class="fa fa-edit ml-1"></i>ویرایش</a>
                                <a href="" class="dropdown-item"><i class="fa fa-trash ml-1"></i>حذف</a>
                            </div>
                        </div>
                    </td>
                </tr>

                <tr>
                    <th>2</th>
                    <td>آیفون 13</td>
                    <td><img src="{{ asset("admin-assets/images/iphone.jpg") }}" alt=""></td>
                    <td>31000000 تومان</td>
                    <td>160 گرم</td>
                    <td>کالای الکتریکی</td>
                    <td>موبایل</td>
                    <td>
                        <div class="dropdown">
                            <a href="#" class="btn btn-sm btn-info border-radius-2 dropdown-toggle" role="button" id="dropdownBtn" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-tools ml-1"></i>عملیات</a>

                            <div class="dropdown-menu border-radius-5 text-right" aria-labelledby="dropdownBtn">
                                <a href="" class="dropdown-item"><i class="fa fa-images ml-1"></i>گالری</a>
                                <a href="" class="dropdown-item"><i class="fa fa-list-ul ml-1"></i>فرم کالا</a>
                                <a href="" class="dropdown-item"><i class="fa fa-edit ml-1"></i>ویرایش</a>
                                <a href="" class="dropdown-item"><i class="fa fa-trash ml-1"></i>حذف</a>
                            </div>
                        </div>
                    </td>
                </tr>
                </tbody>

                <tbody>

                </tbody>
            </table>

        </section>

    </section>

@endsection
