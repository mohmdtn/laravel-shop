@extends("user.layouts.master-one-col")

@section("head-tag")
    <title>صفحه پرداخت</title>
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
                                <span>انتخاب نوع پرداخت </span>
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
                                            کد تخفیف
                                        </h2>
                                        <section class="content-header-link">
                                            <!--<a href="#">مشاهده همه</a>-->
                                        </section>
                                    </section>
                                </section>

                                <section class="payment-alert alert alert-primary d-flex align-items-center p-2" role="alert">
                                    <i class="fa fa-info-circle flex-shrink-0 me-2"></i>
                                    <secrion>
                                        کد تخفیف خود را در این بخش وارد کنید.
                                    </secrion>
                                </section>

                                <section class="row">
                                    <section class="col-md-5">
                                        <form action="{{ route("user.salesProcess.copanDiscount") }}" method="post">
                                            @csrf
                                            <section class="input-group input-group-sm">
                                                <input type="text" class="form-control" name="copan" placeholder="کد تخفیف را وارد کنید">
                                                <button class="btn btn-primary" type="submit">اعمال کد</button>
                                                @error("copan")
                                                    <div class="errors text-danger col-12">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </section>
                                        </form>
                                    </section>

                                </section>
                            </section>


                            <section class="content-wrapper bg-white p-3 rounded-2 mb-4">

                                <!-- start vontent header -->
                                <section class="content-header mb-3">
                                    <section class="d-flex justify-content-between align-items-center">
                                        <h2 class="content-header-title content-header-title-small">
                                            انتخاب نوع پرداخت
                                        </h2>
                                        <section class="content-header-link">
                                            <!--<a href="#">مشاهده همه</a>-->
                                        </section>
                                    </section>
                                </section>
                                <section class="payment-select">

                                    <section class="payment-alert alert alert-primary d-flex align-items-center p-2" role="alert">
                                        <i class="fa fa-info-circle flex-shrink-0 me-2"></i>
                                        <secrion>
                                            برای پیشگیری از انتقال ویروس کرونا پیشنهاد می کنیم روش پرداخت اینترنتی رو پرداخت کنید.
                                        </secrion>
                                    </section>

                                    <input type="radio" name="payment_type" value="1" id="d1"/>
                                    <label for="d1" class="col-12 col-md-4 payment-wrapper mb-2 pt-2">
                                        <section class="mb-2">
                                            <i class="fa fa-credit-card mx-1"></i>
                                            پرداخت آنلاین
                                        </section>
                                        <section class="mb-2">
                                            <i class="fa fa-calendar-alt mx-1"></i>
                                            درگاه پرداخت زرین پال
                                        </section>
                                    </label>

                                    <section class="mb-2"></section>

                                    <input type="radio" name="payment_type" value="2" id="d2"/>
                                    <label for="d2" class="col-12 col-md-4 payment-wrapper mb-2 pt-2">
                                        <section class="mb-2">
                                            <i class="fa fa-id-card-alt mx-1"></i>
                                            پرداخت آفلاین
                                        </section>
                                        <section class="mb-2">
                                            <i class="fa fa-calendar-alt mx-1"></i>
                                            حداکثر در 2 روز کاری بررسی می شود
                                        </section>
                                    </label>

                                    <section class="mb-2"></section>

                                    <input type="radio" name="payment_type" value="3" id="d3"/>
                                    <label for="d3" class="col-12 col-md-4 payment-wrapper mb-2 pt-2">
                                        <section class="mb-2">
                                            <i class="fa fa-money-check mx-1"></i>
                                            پرداخت در محل
                                        </section>
                                        <section class="mb-2">
                                            <i class="fa fa-calendar-alt mx-1"></i>
                                            پرداخت به پیک هنگام دریافت کالا
                                        </section>
                                    </label>


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

                                @if($order->commonDiscount() != null)
                                    <section class="d-flex justify-content-between align-items-center">
                                        <p class="text-muted">میزان تخفیف عمومی</p>
                                        <p class="text-danger fw-bolder"><span id="total_discount">{{ priceFormat($order->commonDiscount->percentage) }}</span> درصد</p>
                                    </section>

                                    <section class="d-flex justify-content-between align-items-center">
                                        <p class="text-muted"> حد اکثر تخفیف عمومی</p>
                                        <p class="text-danger fw-bolder"><span id="total_discount">{{ priceFormat($order->commonDiscount->discount_ceiling) }}</span> تومان</p>
                                    </section>
                                @endif

                                <section class="border-bottom mb-3"></section>

                                <section class="d-flex justify-content-between align-items-center">
                                    <p class="text-muted">جمع سبد خرید</p>
                                    <p class="fw-bolder"><span id="total_price">{{ priceFormat($order->order_final_amount) }}</span> تومان</p>
                                </section>

                                <section class="d-flex justify-content-between align-items-center">
                                    <p class="text-muted">هزینه ارسال</p>
                                    <p class="text-warning">54,000 تومان</p>
                                </section>

                                <p class="my-3">
                                    <i class="fa fa-info-circle me-1"></i> کاربر گرامی کالاها بر اساس نوع ارسالی که انتخاب می کنید در مدت زمان ذکر شده ارسال می شود.
                                </p>

                                <section class="border-bottom mb-3"></section>

                                <section class="d-flex justify-content-between align-items-center">
                                    <p class="text-muted">مبلغ قابل پرداخت</p>
                                    <p class="fw-bold">374,000 تومان</p>
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

@endsection
