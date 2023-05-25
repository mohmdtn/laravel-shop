@extends("user.layouts.master-one-col")

@section("head-tag")
    <title>{{ $post["title"] }}</title>
    <style>
        .rate {
            /*float: right;*/
            height: 49px;
            /*padding: 0 10px;*/
        }
        .rate:not(:checked) > input {
            position:absolute;
            /*top:-9999px;*/
            display: none;
        }
        .rate:not(:checked) > label {
            float:right;
            width:1em;
            overflow:hidden;
            white-space:nowrap;
            cursor:pointer;
            font-size:30px;
            color:#ccc;
        }
        .rate:not(:checked) > label:before {
            content: '★ ';
        }
        .rate > input:checked ~ label {
            color: #ffc700;
        }
        .rate:not(:checked) > label:hover,
        .rate:not(:checked) > label:hover ~ label {
            color: #deb217;
        }
        .rate > input:checked + label:hover,
        .rate > input:checked + label:hover ~ label,
        .rate > input:checked ~ label:hover,
        .rate > input:checked ~ label:hover ~ label,
        .rate > label:hover ~ input:checked ~ label {
            color: #c59b08;
        }

        .rate-info{
            font-size: 14px;
        }

        .rate-info .count{
            font-size: 11px;
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
                                <span>{{ $post["title"] }}</span>
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
                        <section class="py-4">

                            <!-- start content header -->
                            <section class="head-title mb-4">
                                <h4 class="fw-bold mb-2">
                                    {{ $post["summary"] }}
                                </h4>
                                <section class="blog-info">
                                    <span class="pe-3"><i class="fa fa-calendar-alt"></i> <span>{{ jalaliDate($post["created_at"], "H:i %A %d %B %Y") }}</span></span>
                                    <span class="pe-3"><i class="fa fa-comments"></i> <span>{{ $post->comments->count() }}</span></span>
                                    <span><i class="fa fa-newspaper"></i> <span>{{ $post->postCategory->name }}</span></span>
                                </section>
                            </section>
                            <section id="introduction" class="content-header mt-2 mb-4">
                                <section class="d-flex justify-content-center align-items-center">
                                    <img class="rounded-3 mb-2" src="{{ asset($post['image']['indexArray']['large']) }}" alt="{{ $post["title"] }}">
                                </section>
                            </section>
                            <section class="product-introduction mb-4">
                                {!! $post["body"] !!}
                            </section>
                            <!-- start vontent header -->

                            <section id="comments" class="content-header mt-2 mb-4">
                                <section class="d-flex justify-content-between align-items-center">
                                    <h2 class="content-header-title content-header-title-small">
                                        دیدگاه ها
                                    </h2>
                                </section>
                            </section>
                            <section class="product-comments mb-4">

                                <section class="comment-add-wrapper">
                                    <button class="comment-add-button" type="button" data-bs-toggle="modal" data-bs-target="#add-comment" ><i class="fa fa-plus"></i> افزودن دیدگاه</button>
                                    <!-- start add comment Modal -->
                                    <section class="modal fade" id="add-comment" tabindex="-1" aria-labelledby="add-comment-label" aria-hidden="true">
                                        <section class="modal-dialog">
                                            <section class="modal-content">
                                                <section class="modal-header">
                                                    <h5 class="modal-title" id="add-comment-label"><i class="fa fa-plus"></i> افزودن دیدگاه</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </section>

                                                @auth
                                                    <section class="modal-body">
                                                        <form class="row" action="{{ route("user.content.addComment", $post->slug) }}" method="post">
                                                            @csrf
                                                            <section class="col-12 mb-2">
                                                                <label for="comment" class="form-label mb-1">دیدگاه شما</label>
                                                                <textarea class="form-control form-control-sm" id="comment" name="body" placeholder="دیدگاه شما ..." rows="4"></textarea>
                                                            </section>

                                                            <section class="modal-footer py-1">
                                                                <button type="submit" class="btn btn-sm btn-primary">ثبت دیدگاه</button>
                                                                <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal">بستن</button>
                                                            </section>
                                                        </form>
                                                    </section>
                                                @endauth

                                                @guest
                                                    <section class="modal-body">
                                                        <p>کاربر گرامی لطفا برای ثبت نظر ابتدا وارد حساب کاربری خود شوید.</p>
                                                        <section class="text-center">
                                                            <a class="btn btn-info text-white" href="{{ route("auth.user.loginRegisterForm") }}">ورود / ثبت نام</a>
                                                        </section>
                                                    </section>
                                                @endguest

                                            </section>
                                        </section>
                                    </section>
                                </section>

                                @foreach($post->activeComments() as $comment)
                                    <section class="product-comment">
                                        <section class="product-comment-header d-flex justify-content-start">
                                            <section class="product-comment-date">{{ jalaliDate($comment["created_at"]) }}</section>
                                            <section class="product-comment-title">
                                                <i class="fas fa-user"></i>
                                                @if(empty($comment->user->first_name))
                                                    ناشناس
                                                @else
                                                    {{ $comment->user->fullName }}
                                                @endif
                                            </section>
                                        </section>
                                        <section class="product-comment-body">
                                            {{ $comment["body"] }}
                                        </section>

                                        @if($comment->answers()->count() > 0)
                                            @foreach($comment->answers as $answer)
                                                <section class="product-comment product-comment-answer ms-5 border-bottom-0">
                                                    <section class="product-comment-header d-flex justify-content-start">
                                                        <section class="product-comment-date">{{ jalaliDate($answer["created_at"]) }}</section>
                                                        <section class="product-comment-title"><i class="fas fa-user-tie"></i> ادمین</section>
                                                    </section>
                                                    <section class="product-comment-body">
                                                        {{ $answer["body"] }}
                                                    </section>
                                                </section>
                                            @endforeach
                                        @endif
                                    </section>
                                @endforeach
                            </section>


{{--                            <section id="rates" class="content-header mt-2 mb-4">--}}
{{--                                <section class="d-flex justify-content-between align-items-center">--}}
{{--                                    <h2 class="content-header-title content-header-title-small">--}}
{{--                                        امتیاز ها--}}
{{--                                    </h2>--}}
{{--                                </section>--}}
{{--                            </section>--}}

{{--                            @auth--}}
{{--                                <section class="text-center">--}}
{{--                                    <form class="text-center" action="{{ route("user.market.addRate", $post) }}" method="post">--}}
{{--                                        @csrf--}}
{{--                                        <div class="rate d-inline-block">--}}
{{--                                            <input type="radio" id="star5" name="rating" value="5" />--}}
{{--                                            <label for="star5" title="text">5 stars</label>--}}
{{--                                            <input type="radio" id="star4" name="rating" value="4" />--}}
{{--                                            <label for="star4" title="text">4 stars</label>--}}
{{--                                            <input type="radio" id="star3" name="rating" value="3" />--}}
{{--                                            <label for="star3" title="text">3 stars</label>--}}
{{--                                            <input type="radio" id="star2" name="rating" value="2" />--}}
{{--                                            <label for="star2" title="text">2 stars</label>--}}
{{--                                            <input type="radio" id="star1" name="rating" value="1" />--}}
{{--                                            <label for="star1" title="text">1 star</label>--}}
{{--                                        </div>--}}
{{--                                        <div class="text-center">--}}
{{--                                            <button class="btn btn-sm btn-danger text-white mx-2">ثبت امتیاز</button>--}}
{{--                                        </div>--}}
{{--                                    </form>--}}
{{--                                </section>--}}
{{--                            @endauth--}}
{{--                            @guest--}}
{{--                                <section>--}}
{{--                                    <h6 class="text-secondary mb-0 d-inline">کاربر گرامی لطفا برای ثبت امتیاز ابتدا وارد حساب کاربری خود شوید.</h6>--}}
{{--                                    <a href="{{ route("auth.user.loginRegisterForm") }}" class="text-white text-decoration-none btn btn-sm btn-info rounded-3">ثبت نام / ورود</a>--}}
{{--                                </section>--}}
{{--                            @endguest--}}
                        </section>

                    </section>
                </section>
                <section class="col-md-3 d-none">
                    <section class="content-wrapper bg-white p-3 rounded-2 post-side-info">
                        <h6 class="fw-bold">اشتراک گذاری</h6>
                        <section class="social-share">
                            <a href="mailto:?&amp;subject={{ url()->full() }}"><i class="fa fa-envelope"></i></a>
                            <a href="https://wa.me/?text={{ url()->full() }}"><i class="fab fa-whatsapp"></i></a>
                            <a href="https://t.me/share/url?url={{ url()->full() }}/&amp;text={{ $post->title }}"><i class="fab fa-telegram-plane"></i></a>
                            <a href="https://www.facebook.com/sharer/sharer.php?u=/{{ url()->full() }}"><i class="fab fa-facebook"></i></a>
                        </section>

                        <h6 class="fw-bold mt-4">برچسب ها</h6>
                        @foreach(explode(',', $post->tags) as $item)
                            <a class="btn btn-sm btn-light tags" href="">{{ $item }}</a>
                        @endforeach
                    </section>
                </section>
            </section>

        </section>
    </section>

    <!-- blog -->
    <section class="mx-3">
        <section class="container-xxl" >
            <section class="row">
                <section class="col">
                    <section class="content-wrapper bg-white p-3 rounded-2">
                        <!-- start content header -->
                        <section class="content-header">
                            <section class="d-flex justify-content-between align-items-center">
                                <h2 class="content-header-title">
                                    <span>بلاگ های مرتبط</span>
                                </h2>
                                <section class="content-header-link">
                                    <a href="{{ route("user.products", ["sort" => '4']) }}">مشاهده همه</a>
                                </section>
                            </section>
                        </section>
                        <!-- start content header -->
                        <section class="lazyload-wrapper" >
                            <section class="blogs light-owl-nav owl-carousel owl-theme">
                                @foreach($posts as $post)
                                    <a href="{{ route("user.content.post", $post->slug) }}" class="blog-link">
                                        <section class="item">
                                            <section class="lazyload-item-wrapper">
                                                <section class="blog">
                                                    <img class="rounded-3 mb-2" src="{{ asset($post['image']['indexArray']['large']) }}" alt="">
                                                    <section class="blog-info d-flex justify-content-between">
                                                        <span>
                                                            <i class="fa fa-calendar-alt"></i> <span>{{ jalaliDate($post["created_at"], "%d %B %Y") }}</span>
                                                        </span>
                                                        <span>
                                                            <i class="fa fa-comments"></i> <span>{{ $post->comments->count() }}</span>
                                                        </span>
                                                        <span>
                                                            <i class="fa fa-newspaper"></i> <span>{{ $post->postCategory->name }}</span>
                                                        </span>
                                                    </section>
                                                    <h5>{{ Str::limit($post["title"], 25) }}</h5>
                                                    <p>{{ Str::limit($post["summary"], 40) }}</p>
                                                </section>
                                            </section>
                                        </section>
                                    </a>
                                @endforeach

                            </section>
                        </section>
                    </section>
                </section>
            </section>
        </section>
    </section>
    <!-- end of blog -->


    <section class="position-fixed p-4 flex-row-reverse" style="z-index: 99999; left: 0; bottom: 0; width: 26rem; max-width: 80%;">
        <section class="toast" data-delay="6000">
            <section class="toast-header p-1 px-3 d-flex justify-content-between text-white font-weight-bold bg-info">
                <strong>
                    پیغام
                </strong>
                <p type="button" class="ml-2 mb-1 close" data-dismiss="toast" data-bs-dismiss="toast" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </p>
            </section>
            <section class="toast-body">
                برای افزودن کالا به لیست علاقه مندی ها باید ابتدا وارد حساب کاربری خود شوید.
                <br>
                <a href="{{ route("auth.user.loginRegisterForm") }}" class="text-white text-decoration-none btn btn-info rounded-3 mt-3">ثبت نام / ورود</a>
            </section>
        </section>
    </section>
    <!-- end description, features and comments -->
@endsection

@section("scripts")
    <script>
        //start product introduction, features and comment
        $(document).ready(function() {
            var s = $("#introduction-features-comments");
            var pos = s.position();
            $(window).scroll(function() {
                var windowpos = $(window).scrollTop();

                if (windowpos >= pos.top) {
                    s.addClass("stick");
                } else {
                    s.removeClass("stick");
                }
            });
        });
        //end product introduction, features and comment
    </script>
@endsection
