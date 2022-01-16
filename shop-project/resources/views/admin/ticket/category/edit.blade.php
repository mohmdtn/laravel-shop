@extends("admin.layouts.master")

@section("head-tag")
    <title>ویرایش دسته بندی تیکت</title>
@endsection

@section("content")

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">خانه</a></li>
            <li class="breadcrumb-item"><a href="#">بخش تیکت ها</a></li>
            <li class="breadcrumb-item"><a href="#">دسته بندی تیکت ها</a></li>
            <li class="breadcrumb-item active" aria-current="page">ویرایش دسته بندی تیکت ها</li>
        </ol>
    </nav>

    <section class="pagesContent py-3 px-2">
        <div class="sectionHeader d-flex justify-content-between align-items-center">
            <h4>ویرایش دسته بندی تیکت ها:</h4>

            <a href="{{ route("admin.ticket.category.index") }}" class="btn btn-info btn-sm border-radius-4 box-shadow-normal">بازگشت</a>
        </div>

        <div class="sectionHeaderBottom d-flex justify-content-between align-items-center py-3">

        </div>

        <section class="pageContentInner">
            <form action="{{ route("admin.ticket.category.update", $ticketCategory["id"]) }}" method="post">
                @csrf
                @method("put")
                <div class="row">

                    <div class="form-group col-md-6">
                        <label for="">نام دسته</label>
                        <input type="text" class="form-control border-radius-5" name="name" value="{{ old("name", $ticketCategory["name"]) }}">

                        @error("name")
                        <div class="errors"><span class="text-danger">{{ $message }}</span></div>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label for="">وضعیت</label>
                        <select id="" class="form-control border-radius-5" name="status">
                            <option value="0" @if(old('status', $ticketCategory["status"]) == 0) selected @endif>غیر فعال</option>
                            <option value="1" @if(old('status', $ticketCategory["status"]) == 1) selected @endif>فعال</option>
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
