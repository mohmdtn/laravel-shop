@extends("admin.layouts.master")

@section("head-tag")
    <title>{{ route("admin.user.adminUser.index") }}</title>
@endsection

@section("content")

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">خانه</a></li>
            <li class="breadcrumb-item"><a href="#">بخش کاربران</a></li>
            <li class="breadcrumb-item active" aria-current="page">کاربران</li>
        </ol>
    </nav>

    <section class="pagesContent py-3 px-2">
        <div class="sectionHeader sectionHeaderBottom d-flex justify-content-between align-items-center py-3">
            <h4>کاربران:</h4>
        </div>

        <div class="sectionHeaderBottom d-flex justify-content-between align-items-center py-3">
            <a href="{{ route("admin.user.customer.create") }}" class="btn btn-info btn-sm border-radius-4 box-shadow-normal">ایجاد کاربر</a>
            <input type="text" class="form-control form-control-sm border-radius-4 box-shadow-normal" placeholder="جستجو...">
        </div>

        <section class="table-responsive">

            <table class="table table-striped table-hover">
                <thead class="table-info">
                <th>#</th>
                <th>ایمیل</th>
                <th>شماره موبایل</th>
                <th>کد ملی</th>
                <th>نام</th>
                <th>نام خانوادگی</th>
                <th class="width-18 text-center">تنظیمات</th>
                </thead>

                <tbody>
                <tr>
                    <th>1</th>
                    <td>mohammad@gmail.com</td>
                    <td>0911111111</td>
                    <td>498103042</td>
                    <td>محمد</td>
                    <td> تقی نسب</td>
                    <td class="max-width-18 text-left">
                        <a href="" class="btn btn-sm btn-success border-radius-2 mb-2 mb-md-0"><i class="fas fa-user-edit ml-2"></i>ویرایش</a>
                        <a href="" class="btn btn-sm btn-danger border-radius-2"><i class="fa fa-trash ml-2"></i>حذف</a>
                    </td>
                </tr>

                <tr>
                    <th>2</th>
                    <td>sina@gmail.com</td>
                    <td>0922222222</td>
                    <td>205020201</td>
                    <td>سینا</td>
                    <td>مهدوی</td>
                    <td class="max-width-18 text-left">
                        <a href="" class="btn btn-sm btn-success border-radius-2 mb-2 mb-md-0"><i class="fas fa-user-edit ml-2"></i>ویرایش</a>
                        <a href="" class="btn btn-sm btn-danger border-radius-2"><i class="fa fa-trash ml-2"></i>حذف</a>
                    </td>
                </tr>
                </tbody>

                <tbody>

                </tbody>
            </table>

        </section>

    </section>

@endsection
