@extends("admin.layouts.master")

@section("head-tag")
    <title>ادمین ها</title>
@endsection

@section("content")

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">خانه</a></li>
            <li class="breadcrumb-item"><a href="#">بخش کاربران</a></li>
            <li class="breadcrumb-item active" aria-current="page">ادمین ها</li>
        </ol>
    </nav>

    <section class="pagesContent py-3 px-2">
        <div class="sectionHeader sectionHeaderBottom d-flex justify-content-between align-items-center py-3">
            <h4>ادمین ها:</h4>
        </div>

        <div class="sectionHeaderBottom d-flex justify-content-between align-items-center py-3">
            <a href="{{ route("admin.user.adminUser.create") }}" class="btn btn-info btn-sm border-radius-4 box-shadow-normal">ایجاد ادمین</a>
            <input type="text" class="form-control form-control-sm border-radius-4 box-shadow-normal" placeholder="جستجو...">
        </div>

        <section class="table-responsive">

            <table class="table table-striped table-hover">
                <thead class="table-info">
                <th>#</th>
                <th>ایمیل</th>
                <th>شماره موبایل</th>
                <th>نام</th>
                <th>نام خانوادگی</th>
                <th>نقش</th>
                <th class="width-18 text-center">تنظیمات</th>
                </thead>

                <tbody>
                <tr>
                    <th>1</th>
                    <td>mohammad@gmail.com</td>
                    <td>0911111111</td>
                    <td>محمد</td>
                    <td> تقی نسب</td>
                    <td>سوپر ادمین</td>
                    <td class="max-width-18 text-left">
                        <a href="{{ route("admin.user.adminUser.create") }}" class="btn btn-sm btn-info border-radius-2 mb-2 mb-md-0"><i class="fas fa-user-cog ml-2"></i>نقش</a>
                        <a href="" class="btn btn-sm btn-success border-radius-2 mb-2 mb-md-0"><i class="fas fa-user-edit ml-2"></i>ویرایش</a>
                        <a href="" class="btn btn-sm btn-danger border-radius-2"><i class="fa fa-trash ml-2"></i>حذف</a>
                    </td>
                </tr>

                <tr>
                    <th>2</th>
                    <td>sina@gmail.com</td>
                    <td>0922222222</td>
                    <td>سینا</td>
                    <td>مهدوی</td>
                    <td>سوپر ادمین</td>
                    <td class="max-width-18 text-left">
                        <a href="{{ route("admin.content.comment.show") }}" class="btn btn-sm btn-info border-radius-2 mb-2 mb-md-0"><i class="fas fa-user-cog ml-2"></i>نقش</a>
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
