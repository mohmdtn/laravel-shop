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
                <th>مبلغ</th>
                <th>پرداخت کننده</th>
                <th>وضعیت پرداخت</th>
                <th>نوع پرداخت</th>
                <th class="max-width-20 text-center">تنظیمات</th>
                </thead>

                <tbody>

                    @foreach($payments as $payment)
                        <tr>
                            <th>{{ $loop->iteration }}</th>
                            <td>{{ $payment->paymentable->transaction_id ?? "-" }}</td>
                            <td>{{ $payment->paymentable->gateway ?? "-" }}</td>
                            <td>{{ $payment->paymentable->amount }}</td>
                            <td>{{ $payment->user->FullName }}</td>
                            <td>
                                @if($payment["status"] == 0) پرداخت نشده <i class="fa fa-window-close"></i>
                                @elseif($payment["status"] == 1) پرداخت شده <i class="fa fa-check-square"></i>
                                @elseif($payment["status"] == 2) باطل شده <i class="fas fa-ban"></i>
                                @elseif($payment["status"] == 3) برگشت داده شده <i class="fa fa-undo"></i>
                                @endif
                            </td>
                            <td>
                                @if($payment["type"] == 0) آنلاین <i class="fas fa-credit-card"></i>
                                @elseif($payment["type"] == 1) آفلاین <i class="fas fa-money-check-alt"></i>
                                @else در محل <i class="fas fa-money-bill-wave"></i>
                                @endif
                            </td>
                            <td class=" text-left">
                                <a href="" class="btn btn-sm btn-info border-radius-2 mb-2 mb-md-0"><i class="fas fa-eye ml-2"></i>مشاهده</a>
                                <a href="{{ route("admin.market.payment.canceled", $payment["id"]) }}" class="btn btn-sm btn-warning border-radius-2 text-white mb-2 mb-md-0 cancelBtn"><i class="fa fa-window-close ml-2"></i>باطل کردن</a>
                                <a href="{{ route("admin.market.payment.returned", $payment["id"]) }}" class="btn btn-sm btn-danger border-radius-2 returnBtn"><i class="fa fa-undo ml-2"></i>برگرداندن</a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>

        </section>

    </section>

@endsection

@section("scripts")

    @include("admin.alerts.sweetAlert.cancelConfirm" , ["className" => "cancelBtn"])
    @include("admin.alerts.sweetAlert.returnConfirm" , ["className" => "returnBtn"])

@endsection
