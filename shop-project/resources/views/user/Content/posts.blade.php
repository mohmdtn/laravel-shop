@extends("user.layouts.master-one-col")

@section("head-tag")
    <title>مجله بلاگ ها</title>
@endsection

@section("content")
    <!-- start description and comments -->
    <section class="mb-4 post-page">
        <section class="container-xxl" >
            <section class="row content-wrapper bg-white p-3 rounded-2 mb-2">
                <section class="col-12">
                    <div class="row">
                        @foreach($posts as $post)
                            <div class="col-md-3 col-sm-6 col-12">
                                <a href="{{ route("user.content.post", $post->slug) }}" class="blog-link">
                                    <section class="item">
                                        <section class="">
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
                            </div>
                        @endforeach
                    </div>
                </section>

                {{-- pagination --}}
                <section class="col-12">
                    <section class="my-4 d-flex justify-content-center">
                        {{ $posts->links("pagination::bootstrap-5") }}
                    </section>
                </section>
                {{-- end pagination --}}

            </section>
        </section>
    </section>


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
