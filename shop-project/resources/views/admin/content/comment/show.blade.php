@extends("admin.layouts.master")

@section("head-tag")
    <title>نمایش نظر</title>
@endsection

@section("content")

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route("admin.home") }}">خانه</a></li>
            <li class="breadcrumb-item"><a href="#">بخش محتوی</a></li>
            <li class="breadcrumb-item"><a href="{{ route("admin.content.comment.index") }}">نظرات</a></li>
            <li class="breadcrumb-item active" aria-current="page">نمایش نظر</li>
        </ol>
    </nav>

    <section class="pagesContent py-3 px-2">
        <div class="sectionHeader d-flex justify-content-between align-items-center">
            <h4>نمایش نظر:</h4>

            <a href="{{ route("admin.content.comment.index") }}" class="btn btn-info btn-sm border-radius-4 box-shadow-normal">بازگشت</a>
        </div>

        <div class="sectionHeaderBottom d-flex justify-content-between align-items-center py-3">

        </div>

        <section class="pageContentInner">

            <div class="productInfo my-3 border-radius-3">
                <div class="productInfoInner py-3 px-2 border-radius-3 d-flex justify-content-between align-items-center">
                    <div><i class="fas fa-user pl-1"></i> {{ $comment["user"]["fullName"] }} - {{ $comment["author_id"] }}</div>

                    <div><i class="fas fa-clock"></i> {{ jalaliDate($comment["created_at"], "H:i:s %A %d %B %Y") }}</div>
                </div>
                <div class="productInfoInnerSec py-4 px-3">
                    <div class="d-flex justify-content-between">
                        <div>
                            <p class="pl-4 d-inline-block"><span>عنوان پست:</span> {{ $comment["commentable"]["title"] }}</p>
                            <p class="d-inline-block"><span>کد پست:</span> {{ $comment["commentable"]["id"] }} </p>
                        </div>

                    </div>

                    <i class="fas fa-comment pl-2">:</i>{{ $comment["body"] }}
                </div>
            </div>

            @foreach($comment->answers as $answer)
                <div class="productInfo my-3 border-radius-3 mr-4">
                    <div class="productInfoInner py-2 px-2 border-radius-3 d-flex justify-content-between align-items-center bg-gradiant-1">
                        <div><i class="fas fa-user pl-1"></i> {{ $answer->admin ? $answer->admin->user->fullname : $answer["user"]["fullName"] }}</div>
                        <div><i class="fas fa-clock"></i> {{ jalaliDate($answer["created_at"], "H:i:s , %A %d %B %Y") }}</div>
                    </div>
                    <div class="productInfoInnerSec py-4 px-3">
                        <i class="fas fa-comment pl-2">:</i>{{ $answer["body"] }}
                    </div>
                </div>
            @endforeach

            @if($comment["parent_id"] == null)
            <form action="{{ route("admin.content.comment.answer", $comment["id"]) }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="replay">پاسخ ادمین</label>
                    <textarea name="body" id="replay" rows="4" class="form-control border-radius-5"></textarea>

                    @error("body")
                    <div class="errors"><span class="text-danger">{{ $message }}</span></div>
                    @enderror
                </div>

                <div class="col-md-12 d-flex justify-content-center pt-5">
                    <input type="submit" class="btn btn-primary border-radius-4 box-shadow-normal submit-custom" value="ثبت">
                </div>
            </form>
            @endif

        </section>


    </section>

@endsection
