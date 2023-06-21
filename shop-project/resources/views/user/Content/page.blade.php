@extends("user.layouts.master-one-col")

@section("head-tag")
    <title>{{ $page->title }}</title>
@endsection

@section("content")
    <!-- start cart -->
    <section class="mb-4">
        <section class="container-xxl" >
            <section class="content-header">
                <section class="text-center">
                    <h2 class="content-header-title" style="text-align: center; font-size: 33px">
                        <span>{{ $page->title }}</span>
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
                            <p>{!! $page->body !!}</p>
                        </section>
                    </section>
                </section>
            </section>
        </section>
    </section>

@endsection

@section("scripts")
@endsection
