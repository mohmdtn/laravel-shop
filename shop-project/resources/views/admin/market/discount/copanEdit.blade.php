@extends("admin.layouts.master")

@section("head-tag")
    <title>ویرایش کوپن تخفیف</title>
    <link rel="stylesheet" href="{{ asset("admin-assets/jalalidatepicker/persian-datepicker.min.css") }}">
    <style>
        .privateUserWrapper{
            display: none;
        }

        .ajaxLoading{
            padding-top: 20px;
            display: none;
        }
        .ajaxLoading div{
            background-color: #17a2b8;
            width: 40px;
            height: 40px;
            margin: 0 auto;
            border-radius: 50%;
            animation: ajaxLoading .3s alternate infinite;
        }

        @keyframes ajaxLoading {
            0%{
                transform: scale(.1);
                opacity: 1;
            }
            100%{
                transform: scale(1.2);
                opacity: .1;
            }
        }

    </style>
@endsection

@section("content")

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route("admin.home") }}">خانه</a></li>
            <li class="breadcrumb-item"><a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item"><a href="{{ route("admin.market.discount.copan") }}">کوپن تخفیف</a></li>
            <li class="breadcrumb-item active" aria-current="page">ویرایش کوپن تخفیف</li>
        </ol>
    </nav>

    <section class="pagesContent py-3 px-2">
        <div class="sectionHeader d-flex justify-content-between align-items-center">
            <h4>ویرایش کوپن تخفیف:</h4>

            <a href="{{ route("admin.market.discount.copan") }}" class="btn btn-info btn-sm border-radius-4 box-shadow-normal">بازگشت</a>
        </div>

        <div class="sectionHeaderBottom d-flex justify-content-between align-items-center py-3">

        </div>

        <section class="pageContentInner">
            <form action="{{ route("admin.market.discount.copan.update", $copan["id"]) }}" method="post">
                @csrf
                @method("put")
                <div class="row">

                    <div class="form-group col-md-4">
                        <label for="">کد کوپن</label>
                        <input type="text" class="form-control border-radius-5" name="code" value="{{ old("code", $copan["code"]) }}">
                        @error("code")
                        <div class="errors"><span class="text-danger">{{ $message }}</span></div>
                        @enderror
                    </div>

                    <div class="form-group col-md-4">
                        <label for="">مقدار تخفیف</label>
                        <input type="text" class="form-control border-radius-5" name="amount" value="{{ old("amount", $copan["amount"]) }}">
                        @error("amount")
                        <div class="errors"><span class="text-danger">{{ $message }}</span></div>
                        @enderror
                    </div>

                    <div class="form-group col-md-4">
                        <label for="">نوع مقدار تخفیف</label>
                        <select id="" class="form-control border-radius-5" name="amount_type">
                            <option value="0" @if(old('amount_type', $copan["amount_type"]) == 0) selected @endif>درصدی</option>
                            <option value="1" @if(old('amount_type', $copan["amount_type"]) == 1) selected @endif>عددی</option>
                        </select>
                        @error("amount_type")
                        <div class="errors"><span class="text-danger">{{ $message }}</span></div>
                        @enderror
                    </div>

                    <div class="form-group col-md-4">
                        <label for="">نوع کوپن</label>
                        <select id="" class="form-control border-radius-5" name="type">
                            <option value="0" @if(old('type', $copan["type"]) == 0) selected @endif>عمومی</option>
                            <option value="1" @if(old('type', $copan["type"]) == 1) selected @endif>خصوصی</option>
                        </select>
                        @error("type")
                        <div class="errors"><span class="text-danger">{{ $message }}</span></div>
                        @enderror

                        <div class="ajaxLoading">
                            <div></div>
                        </div>

                        <div class="privateUserWrapper @if($copan["type"] == 1) d-block @endif pt-3">
                            <label for="">انتخاب کاربر</label>
                            <select id="" class="form-control border-radius-5" name="user_id" value="{{ old("user_id") }}">
                                @if($copan["type"] == 1)
                                    @foreach($users as $user)
                                        <option value="$user_id" @if(old('user_id' , $copan["user_id"]) == 0) selected @endif>{{ $user["email"] . " - " . $user["fullName"] }}</option>
                                    @endforeach
                                @endif
                            </select>
                            @error("user_id")
                            <div class="errors"><span class="text-danger">{{ $message }}</span></div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="">حداکثر تخفیف</label>
                        <input type="text" class="form-control border-radius-5" name="discount_ceiling" value="{{ old("discount_ceiling", $copan["discount_ceiling"]) }}">
                        @error("discount_ceiling")
                        <div class="errors"><span class="text-danger">{{ $message }}</span></div>
                        @enderror
                    </div>


                    <div class="form-group col-md-4">
                        <label for="">تاریخ شروع</label>
                        <input type="hidden" class="form-control border-radius-5" id="start_date" name="start_date" value="{{ old("start_date", $copan["start_date"]) }}">
                        <input type="text" class="form-control border-radius-5" id="start_date_view" value="{{ old("start_date", $copan["start_date"]) }}">
                        @error("start_date")
                        <div class="errors"><span class="text-danger">{{ $message }}</span></div>
                        @enderror
                    </div>

                    <div class="form-group col-md-4">
                        <label for="">تاریخ پایان</label>
                        <input type="hidden" class="form-control border-radius-5" id="end_date" name="end_date" value="{{ old("end_date", $copan["end_date"]) }}">
                        <input type="text" class="form-control border-radius-5" id="end_date_view" value="{{ old("end_date", $copan["end_date"]) }}">
                        @error("end_date")
                        <div class="errors"><span class="text-danger">{{ $message }}</span></div>
                        @enderror
                    </div>

                    <div class="form-group col-md-4">
                        <label for="">وضعیت</label>
                        <select id="" class="form-control border-radius-5" name="status" value="{{ old("status") }}">
                            <option value="0" @if(old('status', $copan["status"]) == 0) selected @endif>غیر فعال</option>
                            <option value="1" @if(old('status', $copan["status"]) == 1) selected @endif>فعال</option>
                        </select>
                        @error("status")
                        <div class="errors"><span class="text-danger">{{ $message }}</span></div>
                        @enderror
                    </div>

                    <div class="col-md-12 d-flex justify-content-center pt-5">
                        <input type="submit" class="btn btn-primary border-radius-4 box-shadow-normal submit-custom" value="ثبت">
                    </div>
                </div>
            </form>
        </section>


    </section>

@endsection

@section("scripts")

    <script src="{{ asset("admin-assets/jalalidatepicker/persian-datepicker.min.js") }}"></script>
    <script src="{{ asset("admin-assets/jalalidatepicker/persian-date.min.js") }}"></script>

    <script>
        $(document).ready(function (){
            $("#end_date_view").persianDatepicker({
                format: 'YYYY/MM/DD',
                altField: '#end_date',
                timePicker: {
                    enabled: true,
                    meridiem: {
                        enabled: true
                    }
                }
            });

            $("#start_date_view").persianDatepicker({
                format: 'YYYY/MM/DD',
                altField: '#start_date',
                timePicker: {
                    enabled: true,
                    meridiem: {
                        enabled: true
                    }
                }
            });
        });
    </script>

    <script>
        $("select[name='type']").change(function (){
            var value = $(this).val();

            if (value == 1){
                $.ajax({
                    url: "{{ route("admin.market.discount.copan.getUsers") }}",
                    type: "get",
                    beforeSend: function() {
                        $(".ajaxLoading").slideDown(".00001");
                    },
                    complete: function(){
                        $(".ajaxLoading").slideUp(".00001");
                    },
                    success: function (response) {
                        if (response.status) {
                            $(".privateUserWrapper").slideDown("slow");
                            $.each(response.users, function (i) {
                                $(".privateUserWrapper select").append('<option value="'+ response.users[i].id +'" @if(old('user_id') == 0) selected @endif>'+ response.users[i].email + " - " + response.users[i].first_name + " " + response.users[i].last_name +'</option>');
                            });
                        }
                        else {
                            alert("هنگام انجام عملیات مشکلی به وجود آمده.")
                        }
                    },
                    error: function () {
                        alert("خطا!! ارتباط برقرار نشد.")
                    }
                });
            }
            else {
                $(".privateUserWrapper").slideUp();
                $(".privateUserWrapper select").children().remove();
            }
        });
    </script>

@endsection
