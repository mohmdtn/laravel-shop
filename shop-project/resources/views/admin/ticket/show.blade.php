@extends("admin.layouts.master")

@section("head-tag")
    <title>نمایش تیکت</title>
@endsection

@section("content")

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">خانه</a></li>
            <li class="breadcrumb-item"><a href="#">بخش تیکت ها</a></li>
            <li class="breadcrumb-item"><a href="#">تیکت ها</a></li>
            <li class="breadcrumb-item active" aria-current="page">نمایش تیکت</li>
        </ol>
    </nav>

    <section class="pagesContent py-3 px-2">
        <div class="sectionHeader d-flex justify-content-between align-items-center">
            <h4>نمایش تیکت:</h4>

            <a href="{{ route("admin.ticket.index") }}" class="btn btn-info btn-sm border-radius-4 box-shadow-normal">بازگشت</a>
        </div>

        <div class="sectionHeaderBottom d-flex justify-content-between align-items-center py-3">

        </div>

        <section class="pageContentInner">

            <div class="productInfo my-3 border-radius-3">
                <div class="productInfoInner py-3 px-2 border-radius-3 d-flex justify-content-between align-items-center bg-gradiant-1">
                    <div><i class="fas fa-user pl-1"></i> {{ $ticket["user"]["fullName"] }} - {{ $ticket["user_id"] }}</div>

                    <div><i class="fas fa-clock"></i> {{ jalaliDate($ticket["created_at"], "H:i:s , %A %d %B %Y") }}</div>
                </div>
                <div class="productInfoInnerSec py-4 px-3">
                    <div class="d-flex justify-content-between">
                        <div>
                            <p class="pl-4 d-inline-block"><span>موضوع:</span>{{ $ticket["subject"] }}</p>
                        </div>
                    </div>

                    <i class="fas fa-comment pl-2">:</i>{{ $ticket["description"] }}
                </div>
            </div>

            @if($ticket["ticket_id"] == null)
            <form action="{{ route("admin.ticket.answer", $ticket["id"]) }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="replay">پاسخ تیکت</label>
                    <textarea name="description" id="replay" rows="4" class="form-control border-radius-5">{{ old("description") }}</textarea>

                    @error("description")
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
