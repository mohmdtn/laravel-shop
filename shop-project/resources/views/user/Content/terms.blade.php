@extends("user.layouts.master-one-col")

@section("head-tag")
    <title>قوانین و مقررات</title>
    <style>
        .faq{
            background-color: rgba(246, 246, 246, 0.51);
            border-radius: 5px;
            line-height: 2.15;
            color: #080a38;
            cursor: pointer;
            margin-bottom: 10px;
        }
        .faq h5{
            font-weight: bold;
            font-size: 18px;
            margin-bottom: 0;
        }
        .faq p{
            margin: 10px 15px 0 0;
            display: none;
        }
        .faq h5 span{
            position: absolute;
            left: 0;
            font-size: 23px;
            transition: .3s;
        }
        .open p{
            display: block;
        }
        .open h5 span{
            transform: rotate(180deg);
        }
    </style>
@endsection

@section("content")
    <!-- start cart -->
    <section class="mb-4">
        <section class="container-xxl" >
            <section class="content-header">
                <section class="d-flex justify-content-between align-items-center">
                    <h2 class="content-header-title">
                        <span>قوانین و مقررات</span>
                    </h2>
                </section>
            </section>
        </section>
    </section>
    <!-- end cart -->


    <!-- start description and comments -->
    <section class="mb-4 post-page">
        <section class="container-xxl" >
            <section class="row">
                <section class="col-md-12">
                    <section class="content-wrapper bg-white p-3 rounded-2">
                        <section class="p-md-4 p-2">
                            <h5 class="fw-bold">شرایط و ضوابط استفاده از خدمات فروشگاه</h5>
                            <p>
                                مشتری گرامی رضایت شما و مشتری مداری اولویت کار ماست.<br/>
                                لذا جهت استفاده بهتر از خدمات بهتر فروشگاه و رضایت کامل موارد زیر را با دقت مطالعه نمایید
                                هر کاربری که در فروشگاه عضو می شود و اطلاعات خود را وارد می کند و اقدام به خرید می نمایید به منزله این می باشد که شرایط و ضوابط استفاده از خدمات فروشگاه را مطالعه نموده و مورد تایید می باشد.
                            </p>
                            <h6 class="fw-bold">خلاصه مختصری درباره ما</h6>
                            <p>
                                فروشگاه از کادری مجرب و کارازموده و متخصص با هدف ارائه خدمات به شیوه های نوین تشکیل گردیده و از کارمندانی خبره و صادق ، منظم ، خوش اخلاق ، متعهد به آیین اسلام و متعهد به مسئولیت محوله بهره می برد.
                            </p>
                            <h6 class="fw-bold">رعایت حریم شخصی</h6>
                            <p>
                                هر شخص یا کاربری که در فروشگاه ثبت نام می کند به عنوان مشتری فروشگاه شناخته می شود لذا در این خصوص اطلاعت ثبت شده مشتری در سایت فقط برای مدیر فروشگاه قابل مشاهده می باشد و هیچ شخص دیگری به این اطلاعات دسترسی ندارد.
                            </p>
                            <h6 class="fw-bold">شیوه های ارتباط فروشگاه با مشتری</h6>
                            <p>
                                فروشگاه  فقط با شماره ها و ایمیلی که در قسمت تماس با ما درج شده با مشتری ارتباط برقرار می کند در غیر این صورت اگر شخص یا اشخاصی با شماره یا ایمیل دیگری با هویت فروشگاه با شما تماس گرفتن و هرگونه درخواستی داشتند قبول نکنید چون فروشگاه در قبال آنها هیچگونه مسئولیتی ندارد . لذا خواهشمندیم مورد را از طریق شماره
                                {{ $info->phone }} یا ایمیل
                                {{ $info->email }} به فروشگاه اطلاع دهید.
                            </p>
                            <h6 class="fw-bold">تعهدات فروشگاه در قبال مشتری و سفارش ثبت شده</h6>
                            <p>
                                بعد از ثبت سفارش از جانب مشتری ، مدیریت سفارش را چک کرده و وارد مرحله پردازش و ارسال می گردد.<br/>
                                لذا محصولات جهت ارسال به دو دسته تقسیم می شوند:<br/>
                                1 . محصولات بزرگ ( محصولاتی که با پست قابل حمل نیستن و باید حتمآ با پیک شخصی ارسال گردند )<br/>
                                2 . محصولات کوچک ( محصولاتی که با پست ارسال می گردند )<br/>
                            </p>
                            <h6 class="fw-bold">لغو سفارش</h6>
                            <p>
                                زمانی که سفارش ثبت شده باشد و مبلغ واریز گردد مشتری نمیتواند از خرید خود منصرف شود و امکان بازگشت وجه وجود ندارد
                            </p>
                        </section>
                    </section>
                </section>
            </section>
        </section>
    </section>

@endsection

@section("scripts")
    <script>
        $(document).ready(function() {
            $(".faq").click(function () {
                $(this).toggleClass("open");
            });
        });
    </script>
@endsection
