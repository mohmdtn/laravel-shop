@extends("user.layouts.master-one-col")

@section("head-tag")
    <title>مدیریت آدرس ها</title>
    <style>
        .errors{
            font-size: 12px;
            color: #aa1111;
            margin-top: 1px;
            font-weight: bolder;
        }
    </style>
@endsection

@section("content")
    <!-- start cart -->
    <section class="mb-4">
        <section class="container-xxl" >
            <section class="row">
                <section class="col">
                    <!-- start vontent header -->
                    <section class="content-header">
                        <section class="d-flex justify-content-between align-items-center">
                            <h2 class="content-header-title">
                                <span>تکمیل اطلاعات ارسال کالا (آدرس گیرنده، مشخصات گیرنده، نحوه ارسال) </span>
                            </h2>
                            <section class="content-header-link">
                                <!--<a href="#">مشاهده همه</a>-->
                            </section>
                        </section>
                    </section>


                    <section class="row mt-4">

                        <section class="col-md-9">
                            <section class="content-wrapper bg-white p-3 rounded-2 mb-4">

                                <!-- start vontent header -->
                                <section class="content-header mb-3">
                                    <section class="d-flex justify-content-between align-items-center">
                                        <h2 class="content-header-title content-header-title-small">
                                            انتخاب آدرس و مشخصات گیرنده
                                        </h2>
                                        <section class="content-header-link">
                                            <!--<a href="#">مشاهده همه</a>-->
                                        </section>
                                    </section>
                                </section>

                                <section class="address-alert alert alert-primary d-flex align-items-center p-2" role="alert">
                                    <i class="fa fa-info-circle flex-shrink-0 me-2"></i>
                                    <secrion>
                                        پس از ایجاد آدرس، آدرس را انتخاب کنید.
                                    </secrion>
                                </section>


                                <section class="address-select">

                                    @foreach($addresses as $address)
                                        <input type="radio" form="my-form" name="address_id" value="{{ $address["id"] }}" id="a-{{ $address["id"] }}"/> <!--checked="checked"-->
                                        <label for="a-{{ $address["id"] }}" class="address-wrapper mb-2 p-2">
                                            <section class="mb-2">
                                                <i class="fa fa-map-marker-alt mx-1"></i>
                                                آدرس : {{ $address->address ?? "-" }}
                                            </section>
                                            <section class="mb-2">
                                                <i class="fa fa-user-tag mx-1"></i>
                                                گیرنده : {{ $address->recipientFullName ?? "-" }}
                                            </section>
                                            <section class="mb-2">
                                                <i class="fa fa-mobile-alt mx-1"></i>
                                                موبایل گیرنده : {{ $address->mobile ?? "-" }}
                                            </section>
                                            <a class="" href="#" data-bs-toggle="modal" data-bs-target="#edit-address-{{ $address->id }}"><i class="fa fa-edit"></i> ویرایش آدرس</a>
                                            <span class="address-selected">کالاها به این آدرس ارسال می شوند</span>
                                        </label>

                                        <!-- start edit address Modal -->
                                        <section class="address-add-wrapper modal fade" id="edit-address-{{ $address->id }}" tabindex="-1" aria-labelledby="add-address-label" aria-hidden="true">
                                            <section class="modal-dialog modal-dialog-centered">
                                                <section class="modal-content">
                                                    <section class="modal-header">
                                                        <h5 class="modal-title" id="add-address-label"><i class="fas fa-edit"></i> ویرایش آدرس</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </section>
                                                    <section class="modal-body">
                                                        <form class="row" method="post" action="{{ route("user.salesProcess.updateAddress", $address) }}">
                                                            @csrf
                                                            @method("put")
                                                            <section class="col-6 mb-2">
                                                                <label for="province-{{ $address->id }}" class="form-label mb-1">استان</label>
                                                                <select class="form-select form-select-sm" id="province-{{ $address->id }}" name="province_id">
                                                                    <option>استان را انتخاب کنید</option>
                                                                @foreach($provinces as $province)
                                                                        <option {{ $address->province_id == $province->id ? "selected" : "" }} value="{{ $province->id }}" data-url="{{ route("user.salesProcess.getCities", $province->id) }}">{{ $province->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                                @error('province_id')
                                                                <div class="errors">
                                                                    {{ $message }}
                                                                </div>
                                                                @enderror
                                                            </section>

                                                            <section class="col-6 mb-2">
                                                                <label for="city-{{ $address->id }}" class="form-label mb-1">شهر</label>
                                                                <select class="form-select form-select-sm" id="city-{{ $address->id }}" name="city_id">
                                                                    <option selected>شهر را انتخاب کنید</option>
                                                                </select>
                                                                @error('city_id')
                                                                <div class="errors">
                                                                    {{ $message }}
                                                                </div>
                                                                @enderror
                                                            </section>

                                                            <section class="col-12 mb-2">
                                                                <label for="address" class="form-label mb-1">نشانی</label>
                                                                <textarea class="form-control form-control-sm" id="address" placeholder="نشانی" name="address" cols="30" rows="3">{{ old("address", $address->address) }}</textarea>
                                                                @error('address')
                                                                <div class="errors">
                                                                    {{ $message }}
                                                                </div>
                                                                @enderror
                                                            </section>

                                                            <section class="col-6 mb-2">
                                                                <label for="postal_code" class="form-label mb-1">کد پستی</label>
                                                                <input type="text" class="form-control form-control-sm" id="postal_code" placeholder="کد پستی" name="postal_code" value="{{ old("postal_code", $address->postal_code) }}">
                                                                @error('postal_code')
                                                                <div class="errors">
                                                                    {{ $message }}
                                                                </div>
                                                                @enderror
                                                            </section>

                                                            <section class="col-3 mb-2">
                                                                <label for="no" class="form-label mb-1">پلاک</label>
                                                                <input type="text" class="form-control form-control-sm" id="no" placeholder="پلاک" name="no" value="{{ old("no", $address->no) }}">
                                                                @error('no')
                                                                <div class="errors">
                                                                    {{ $message }}
                                                                </div>
                                                                @enderror
                                                            </section>

                                                            <section class="col-3 mb-2">
                                                                <label for="unit" class="form-label mb-1">واحد</label>
                                                                <input type="text" class="form-control form-control-sm" id="unit" placeholder="واحد" name="unit" value="{{ old("unit", $address->unit) }}">
                                                                @error('unit')
                                                                <div class="errors">
                                                                    {{ $message }}
                                                                </div>
                                                                @enderror
                                                            </section>

                                                            <section class="border-bottom mt-2 mb-3"></section>

                                                            <section class="col-12 mb-2">
                                                                <section class="form-check">
                                                                    <input class="form-check-input" type="checkbox" value="" id="receiver" name="receiver" {{ $address->recipient_first_name ? "checked" : "" }}>
                                                                    <label class="form-check-label" for="receiver">
                                                                        گیرنده سفارش خودم نیستم (اطلاعات زیر تکمیل شود)
                                                                    </label>
                                                                </section>
                                                            </section>

                                                            <section class="col-6 mb-2">
                                                                <label for="first_name" class="form-label mb-1">نام گیرنده</label>
                                                                <input type="text" class="form-control form-control-sm" id="first_name" placeholder="نام گیرنده" name="recipient_first_name" value="{{ old("recipient_first_name", $address->recipient_first_name) }}">
                                                                @error('recipient_first_name')
                                                                <div class="errors">
                                                                    {{ $message }}
                                                                </div>
                                                                @enderror
                                                            </section>

                                                            <section class="col-6 mb-2">
                                                                <label for="last_name" class="form-label mb-1">نام خانوادگی گیرنده</label>
                                                                <input type="text" class="form-control form-control-sm" id="last_name" placeholder="نام خانوادگی گیرنده" name="recipient_last_name" value="{{ old("recipient_last_name", $address->recipient_last_name) }}">
                                                                @error('recipient_last_name')
                                                                <div class="errors">
                                                                    {{ $message }}
                                                                </div>
                                                                @enderror
                                                            </section>

                                                            <section class="col-6 mb-2">
                                                                <label for="mobile" class="form-label mb-1">شماره موبایل</label>
                                                                <input type="text" class="form-control form-control-sm" id="mobile" placeholder="شماره موبایل" name="mobile" value="{{ old("mobile", $address->mobile) }}">
                                                                @error('mobile')
                                                                <div class="errors">
                                                                    {{ $message }}
                                                                </div>
                                                                @enderror
                                                            </section>
                                                    </section>
                                                    <section class="modal-footer py-1">
                                                        <button type="submit" class="btn btn-sm btn-primary">ثبت آدرس</button>
                                                        <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal">بستن</button>
                                                    </section>
                                                    </form>

                                                </section>
                                            </section>
                                        </section>
                                        <!-- end edit address Modal -->
                                    @endforeach

                                    <section class="address-add-wrapper">
                                        <button class="address-add-button" type="button" data-bs-toggle="modal" data-bs-target="#add-address" ><i class="fa fa-plus"></i> ایجاد آدرس جدید</button>
                                        <!-- start add address Modal -->
                                        <section class="modal fade" id="add-address" tabindex="-1" aria-labelledby="add-address-label" aria-hidden="true">
                                            <section class="modal-dialog modal-dialog-centered">
                                                <section class="modal-content">
                                                    <section class="modal-header">
                                                        <h5 class="modal-title" id="add-address-label"><i class="fa fa-plus"></i> ایجاد آدرس جدید</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </section>
                                                    <section class="modal-body">
                                                        <form class="row" method="post" action="{{ route("user.salesProcess.addAddress") }}">
                                                            @csrf
                                                            <section class="col-6 mb-2">
                                                                <label for="province" class="form-label mb-1">استان</label>
                                                                <select class="form-select form-select-sm" id="province" name="province_id">
                                                                    <option selected>استان را انتخاب کنید</option>
                                                                    @foreach($provinces as $province)
                                                                        <option value="{{ $province->id }}" data-url="{{ route("user.salesProcess.getCities", $province->id) }}">{{ $province->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                                @error('province_id')
                                                                    <div class="errors">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </section>

                                                            <section class="col-6 mb-2">
                                                                <label for="city" class="form-label mb-1">شهر</label>
                                                                <select class="form-select form-select-sm" id="city" name="city_id">
                                                                    <option selected>شهر را انتخاب کنید</option>
                                                                </select>
                                                                @error('city_id')
                                                                    <div class="errors">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </section>

                                                            <section class="col-12 mb-2">
                                                                <label for="address" class="form-label mb-1">نشانی</label>
                                                                <textarea class="form-control form-control-sm" id="address" placeholder="نشانی" name="address" cols="30" rows="3">{{ old("address") }}</textarea>
                                                                @error('address')
                                                                    <div class="errors">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </section>

                                                            <section class="col-6 mb-2">
                                                                <label for="postal_code" class="form-label mb-1">کد پستی</label>
                                                                <input type="text" class="form-control form-control-sm" id="postal_code" placeholder="کد پستی" name="postal_code" value="{{ old("postal_code") }}">
                                                                @error('postal_code')
                                                                    <div class="errors">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </section>

                                                            <section class="col-3 mb-2">
                                                                <label for="no" class="form-label mb-1">پلاک</label>
                                                                <input type="text" class="form-control form-control-sm" id="no" placeholder="پلاک" name="no" value="{{ old("no") }}">
                                                                @error('no')
                                                                    <div class="errors">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </section>

                                                            <section class="col-3 mb-2">
                                                                <label for="unit" class="form-label mb-1">واحد</label>
                                                                <input type="text" class="form-control form-control-sm" id="unit" placeholder="واحد" name="unit" value="{{ old("unit") }}">
                                                                @error('unit')
                                                                    <div class="errors">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </section>

                                                            <section class="border-bottom mt-2 mb-3"></section>

                                                            <section class="col-12 mb-2">
                                                                <section class="form-check">
                                                                    <input class="form-check-input" type="checkbox" value="" id="receiver" name="receiver">
                                                                    <label class="form-check-label" for="receiver">
                                                                        گیرنده سفارش خودم نیستم (اطلاعات زیر تکمیل شود)
                                                                    </label>
                                                                </section>
                                                            </section>

                                                            <section class="col-6 mb-2">
                                                                <label for="first_name" class="form-label mb-1">نام گیرنده</label>
                                                                <input type="text" class="form-control form-control-sm" id="first_name" placeholder="نام گیرنده" name="recipient_first_name" value="{{ old("recipient_first_name") }}">
                                                                @error('recipient_first_name')
                                                                    <div class="errors">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </section>

                                                            <section class="col-6 mb-2">
                                                                <label for="last_name" class="form-label mb-1">نام خانوادگی گیرنده</label>
                                                                <input type="text" class="form-control form-control-sm" id="last_name" placeholder="نام خانوادگی گیرنده" name="recipient_last_name" value="{{ old("recipient_last_name") }}">
                                                                @error('recipient_last_name')
                                                                    <div class="errors">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </section>

                                                            <section class="col-6 mb-2">
                                                                <label for="mobile" class="form-label mb-1">شماره موبایل</label>
                                                                <input type="text" class="form-control form-control-sm" id="mobile" placeholder="شماره موبایل" name="mobile" value="{{ old("mobile") }}">
                                                                @error('mobile')
                                                                    <div class="errors">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </section>
                                                    </section>
                                                    <section class="modal-footer py-1">
                                                        <button type="submit" class="btn btn-sm btn-primary">ثبت آدرس</button>
                                                        <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal">بستن</button>
                                                    </section>
                                                    </form>

                                                </section>
                                            </section>
                                        </section>
                                        <!-- end add address Modal -->
                                    </section>

                                </section>
                            </section>


                            <section class="content-wrapper bg-white p-3 rounded-2 mb-4">

                                <!-- start vontent header -->
                                <section class="content-header mb-3">
                                    <section class="d-flex justify-content-between align-items-center">
                                        <h2 class="content-header-title content-header-title-small">
                                            انتخاب نحوه ارسال
                                        </h2>
                                        <section class="content-header-link">
                                            <!--<a href="#">مشاهده همه</a>-->
                                        </section>
                                    </section>
                                </section>
                                <section class="delivery-select ">

                                    <section class="address-alert alert alert-primary d-flex align-items-center p-2" role="alert">
                                        <i class="fa fa-info-circle flex-shrink-0 me-2"></i>
                                        <secrion>
                                            نحوه ارسال کالا را انتخاب کنید. هنگام انتخاب لطفا مدت زمان ارسال را در نظر بگیرید.
                                        </secrion>
                                    </section>

                                    @foreach($deliveryMethods as $deliveryMethod)
                                        <input class="delivery-input" type="radio" form="my-form" name="delivery_id" value="{{ $deliveryMethod->id }}" id="d-{{ $deliveryMethod->id }}" data-delivery-price="{{ $deliveryMethod->amount }}" />
                                        <label for="d-{{ $deliveryMethod->id }}" class="col-12 col-md-4 delivery-wrapper mb-2 pt-2">
                                            <section class="mb-2">
                                                <i class="fa fa-shipping-fast mx-1"></i>
                                                {{ $deliveryMethod->name }}
                                            </section>
                                            <section class="mb-2">
                                                <i class="fa fa-calendar-alt mx-1"></i>
                                                تامین کالا از {{ $deliveryMethod->delivery_time }} {{ $deliveryMethod->delivery_time_unit }} کاری آینده
                                            </section>
                                        </label>
                                    @endforeach

                                </section>
                            </section>




                        </section>
                        <section class="col-md-3">
                            <section class="content-wrapper bg-white p-3 rounded-2 cart-total-price">
                                @php
                                    $totalProductPrice = 0;
                                    $totalDiscount = 0;
                                @endphp

                                @foreach($cartItems as $cartItem)
                                    @php
                                        $totalProductPrice += $cartItem->cartItemProductPrice() * $cartItem->number;
                                        $totalDiscount += $cartItem->cartItemProductDiscount() * $cartItem->number;
                                    @endphp
                                @endforeach
                                <section class="d-flex justify-content-between align-items-center">
                                    <p class="text-muted">قیمت کالاها ({{ $cartItems->count() }})</p>
                                    <p class="text-muted"><span  id="total_product_price">{{ priceFormat($totalProductPrice) }}</span> تومان</p>
                                </section>

                                @if($totalDiscount != 0)
                                    <section class="d-flex justify-content-between align-items-center">
                                        <p class="text-muted">تخفیف کالاها</p>
                                        <p class="text-danger fw-bolder"><span id="total_discount">{{ priceFormat($totalDiscount) }}</span> تومان</p>
                                    </section>
                                @endif

                                <section class="border-bottom mb-3"></section>

                                <section class="d-flex justify-content-between align-items-center">
                                    <p class="text-muted">جمع سبد خرید</p>
                                    <p class="fw-bolder"><span id="total_price" data-total-price="{{ $totalProductPrice - $totalDiscount }}">{{ priceFormat($totalProductPrice - $totalDiscount) }}</span> تومان</p>
                                </section>

                                <section class="d-flex justify-content-between align-items-center">
                                    <p class="text-muted">هزینه ارسال</p>
                                    <p class="text-warning"><span id="delivery-price"></span> تومان</p>
                                </section>

                                <p class="my-3">
                                    <i class="fa fa-info-circle me-1"></i> کاربر گرامی کالاها بر اساس نوع ارسالی که انتخاب می کنید در مدت زمان ذکر شده ارسال می شود.
                                </p>

                                <section class="border-bottom mb-3"></section>

                                <section class="d-flex justify-content-between align-items-center">
                                    <p class="text-muted">مبلغ قابل پرداخت</p>
                                    <p class="fw-bold"><span id="total-order-price">{{ $totalProductPrice - $totalDiscount }}</span> تومان</p>
                                </section>

                                <section class="">
                                    <section id="address-button" class="text-warning border border-warning text-center py-2 pointer rounded-2 d-block">آدرس و نحوه ارسال را انتخاب کن</section>
                                    <form action="{{ route("user.salesProcess.chooseAddressAndDelivery") }}" method="post" id="my-form">
                                        @csrf
                                        <button id="next-level" class="btn btn-danger d-none w-100">ادامه فرآیند خرید</button>
                                    </form>
                                </section>

                            </section>
                        </section>
                    </section>
                </section>
            </section>

        </section>
    </section>
    <!-- end cart -->

@endsection

@section("scripts")

    <script>
        $("#province").change(function(){
            const element = $("#province option:selected");
            const url = element.data("url");

            $.ajax({
                url: url,
                type: 'GET',
                success: function (response){
                    $("#city option.added").remove();
                    if (response.status == true){
                        let cities = response.cities;
                        cities.map( (city) => {
                                $("#city").append(`<option class="added" value="${city.id}">${city.name}</option>`)
                            }
                        )

                    }
                },
                error: function (){
                    console.log("error");
                }
            });

        });
    </script>

    <script>
        function toFarsiNumber(number){
            const farsiDigits = ["۰", "۱", "۲", "۳", "۴", "۵", "۶", "۷", "۸", "۹"];

            // add comma
            number = new Intl.NumberFormat().format(number);

            // convert to persian
            return number.toString().replace(/\d/g, x => farsiDigits[x]);
        }
    </script>

    @if($errors->any())
        <script>
            $(".address-add-button").click();
        </script>
    @endif


    <script>
        var addresses = {!! auth()->user()->addresses !!};

        addresses.map((address) => {
            var id = address.id;
            var target = `#province-${id}`;
            var selected = `${target} option:selected`;

            $(target).change(function(){
                const element = $(selected);
                const url = element.data("url");

                $.ajax({
                    url: url,
                    type: 'GET',
                    success: function (response){
                        $(`#city-${id} option.added`).remove();
                        if (response.status == true){
                            let cities = response.cities;
                            cities.map( (city) => {
                                    $(`#city-${id}`).append(`<option class="added" value="${city.id}">${city.name}</option>`)
                                }
                            )

                        }
                    },
                    error: function (){
                        console.log("error");
                    }
                });

            });
        });

    </script>

    <script>
        $(document).ready(function (){
            bill();

            $(".delivery-input").change(function (){
                bill();
            });

            function bill(){
                var total_product_price = parseFloat($("#total_price").data("total-price"));
                var delivery_price = parseFloat($("input[name='delivery_id']:checked").data("delivery-price") ?? 0);
                var total_price = 0;

                total_price = total_product_price + delivery_price;

                console.log(total_price + ', ' + delivery_price)

                $("#delivery-price").html(toFarsiNumber(delivery_price));
                $("#total-order-price").html(toFarsiNumber(total_price));

            }
        });
    </script>
@endsection
