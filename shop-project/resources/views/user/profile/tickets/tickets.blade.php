@extends("user.layouts.master-one-col")

@section("head-tag")
    <title>تیکت های شما</title>
    <style>
        .ticket-table thead{
            padding: 15px 0 !important;
        }
    </style>
@endsection

@section("content")

    <!-- start body -->
    <section class="">
        <section id="main-body-two-col" class="container-xxl body-container">
            <section class="row">
                <aside id="sidebar" class="sidebar col-md-3">
                    @include("user.layouts.partials.profile-sidebar")
                </aside>
                <main id="main-body" class="main-body col-md-9">
                    <section class="content-wrapper bg-white p-3 rounded-2 mb-2">

                        <!-- start vontent header -->
                        <section class="content-header">
                            <section class="d-flex justify-content-between align-items-center">
                                <h2 class="content-header-title">
                                    <span>تاریخچه تیکت ها</span>
                                </h2>
                                <section class="content-header-link m-1">
                                    <a href="{{ route("user.profile.tickets.create") }}" class="btn btn-primary text-white">ارسال تیکت جدید</a>
                                </section>
                            </section>
                        </section>
                        <!-- end vontent header -->


                        <section class="order-wrapper mt-3">

                            <table class="ticket-table table table-striped table-hover">
                                <thead class="table-info">
                                    <th>#</th>
                                    <th>عنوان تیکت</th>
                                    <th>وضعیت تیکت</th>
                                    <th>دسته تیکت</th>
                                    <th>اولویت</th>
                                    <th>تیکت مرجع</th>
                                    <th class="">تنظیمات</th>
                                </thead>

                                <tbody>
                                    @forelse($tickets as $ticket)
                                        <tr>
                                            <th>{{ $loop->iteration }}</th>
                                            <td>{{ $ticket["subject"] }}</td>
                                            <td>{{ $ticket["status"] === 0 ? "باز" : "بسته" }}</td>
                                            <td>{{ $ticket["category"]["name"] }}</td>
                                            <td>{{ $ticket["priority"]["name"] }}</td>
                                            <td>{{ $ticket["parent"]["subject"] ?? "-" }}</td>
                                            <td class="max-width-18 text-left">
                                                <a href="{{ route("user.profile.tickets.show", $ticket["id"]) }}" class="btn btn-sm btn-info border-radius-2 mb-2 mb-md-0 text-white"><i class="fas fa-eye me-2"></i>نمایش</a>
{{--                                                @if($ticket["status"] == 0)--}}
{{--                                                    <a href="{{ route("user.profile.tickets.change", $ticket["id"]) }}" class="btn btn-sm btn-success border-radius-2 mb-2 mb-md-0 text-white"><i class="fas fa-check me-2"></i></i>بستن</a>--}}
{{--                                                @else--}}
{{--                                                    <a href="{{ route("user.profile.tickets.change", $ticket["id"]) }}" class="btn btn-sm btn-danger border-radius-2 mb-2 mb-md-0 text-white"><i class="fas fa-window-close me-2"></i>باز کردن</a>--}}
{{--                                                @endif--}}
                                            </td>
                                        </tr>
                                    @empty
                                        <div class="text-center text-danger h5">تیکتی یافت نشد.</div>
                                    @endforelse
                                </tbody>
                            </table>

                        </section>


                    </section>
                </main>
            </section>
        </section>
    </section>
    <!-- end body -->

@endsection

@section("scripts")
@endsection
