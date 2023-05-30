@extends("admin.layouts.master")

@section("head-tag")
    <title>تیکت ها</title>
@endsection

@section("content")

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route("admin.home") }}">خانه</a></li>
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

                @foreach($tickets as $ticket)
                    <tr>
                        <th>{{ $loop->iteration }}</th>
                        <td>{{ $ticket["user"]["fullName"] }}</td>
                        <td>{{ $ticket["subject"] }}</td>
                        <td>{{ $ticket["category"]["name"] }}</td>
                        <td>{{ $ticket["priority"]["name"] }}</td>
                        <td>{{ $ticket["admin"]["user"]["fullName"] ?? "-" }}</td>
                        <td class="max-width-18 text-left">
                            <a href="{{ route("admin.ticket.show", $ticket["id"]) }}" class="btn btn-sm btn-info border-radius-2 mb-2 mb-md-0"><i class="fas fa-eye ml-2"></i>نمایش</a>
                            @if($ticket["status"] == 0)
                                <a href="{{ route("admin.ticket.change", $ticket["id"]) }}" class="btn btn-sm btn-success border-radius-2 mb-2 mb-md-0"><i class="fas fa-check ml-2"></i></i>بستن</a>
                            @else
                                <a href="{{ route("admin.ticket.change", $ticket["id"]) }}" class="btn btn-sm btn-danger border-radius-2 mb-2 mb-md-0"><i class="fas fa-window-close ml-2"></i>باز کردن</a>
                            @endif
                        </td>
                    </tr>
                @endforeach

                </tbody>

                <tbody>

                </tbody>
            </table>

        </section>

    </section>

@endsection
