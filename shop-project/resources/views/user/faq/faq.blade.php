@extends("user.layouts.master-one-col")

@section("head-tag")
    <title>سوالات متداول</title>
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
                        <span>سوالات متداول</span>
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

                            @forelse($faqs as $faq)
                                <section class="faq p-md-4 p-3">
                                    <h5 class="position-relative d-block"> {{ $faq->question }}<span><i class="fa fa-angle-down"></i></span></h5>
                                    <p>{!! $faq->answer !!}</p>
                                </section>
                                @empty
                                    <h5 class="mb-0 text-danger fw-bold text-center">سوالات متداولی وجود ندارد.</h5>
                            @endforelse
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
