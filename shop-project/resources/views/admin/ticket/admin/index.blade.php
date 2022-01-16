@extends("admin.layouts.master")

@section("head-tag")
    <title>ادمین تیکت</title>
@endsection

@section("content")

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">خانه</a></li>
            <li class="breadcrumb-item"><a href="#">بخش تیکت ها</a></li>
            <li class="breadcrumb-item active" aria-current="page">ادمین تیکت</li>
        </ol>
    </nav>

    <section class="pagesContent py-3 px-2">
        <div class="sectionHeader sectionHeaderBottom d-flex justify-content-between align-items-center py-3">
            <h4>ادمین تیکت:</h4>
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
                    <th>نام ادمین</th>
                    <th>ایمیل ادمین</th>
                    <th class="width-18 text-center">تنظیمات</th>
                </thead>

                <tbody>
                    @foreach($admins as $key => $admin)
                    <tr>
                        <th>{{ $key+=1 }}</th>
                        <td>{{ $admin["fullName"] }}</td>
                        <td>{{ $admin["email"] }}</td>
                        <td class="max-width-18 text-left">
                            @if($admin["ticketAdmin"] == null)
                                <a href="{{ route("admin.ticket.admin.set", $admin["id"]) }}" class="btn btn-sm btn-info border-radius-2 mb-2 mb-md-0"><i class="fas fa-user-plus ml-2"></i></i>اضافه</a>
                            @else
                                <a href="{{ route("admin.ticket.admin.set", $admin["id"]) }}" class="btn btn-sm btn-danger border-radius-2 mb-2 mb-md-0"><i class="fas fa-trash ml-2"></i>حذف</a>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </section>

    </section>

@endsection
