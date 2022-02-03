@extends("admin.layouts.master")

@section("head-tag")
    <title>گالری</title>
@endsection

@section("content")

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">خانه</a></li>
            <li class="breadcrumb-item"><a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item"><a href="{{ route("admin.market.product.index") }}">کالا ها</a></li>
            <li class="breadcrumb-item active" aria-current="page">گالری</li>
        </ol>
    </nav>

    <section class="pagesContent py-3 px-2">
        <div class="sectionHeader sectionHeaderBottom d-flex justify-content-between align-items-center py-3">
            <h4>گالری:</h4>
        </div>

        <div class="sectionHeaderBottom d-flex justify-content-between align-items-center py-3">
            <a href="{{ route("admin.market.gallery.create", $product["id"]) }}" class="btn btn-info btn-sm border-radius-4 box-shadow-normal">ایجاد گالری جدید</a>
            <input type="text" class="form-control form-control-sm border-radius-4 box-shadow-normal" placeholder="جستجو...">
        </div>

        <section class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="table-info">
                <th>#</th>
                <th>نام کالا</th>
                <th>تصویر کالا</th>
                <th class="max-width-18 text-center">تنظیمات</th>

                </thead>

                <tbody>
                    @foreach($product->images as $gallery)
                        <tr>
                            <th>{{ $loop->iteration }}</th>
                            <td>{{ $product["name"] }}</td>
                            <td><img src="{{ asset($gallery["image"]) }}" alt=""></td>
                            <td class="max-width-18 text-center">
                                <form action="{{ route("admin.market.gallery.destroy", ["product" => $product["id"], "gallery" => $gallery["id"]]) }}" method="post">
                                    @csrf
                                    @method("delete")
                                    <button class="btn btn-sm btn-danger border-radius-2 deleteBtn"><i class="fa fa-trash-alt ml-2"></i>حذف</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>

        </section>

    </section>

@endsection


@section("scripts")

    @include("admin.alerts.sweetAlert.deleteConfirm" , ["className" => "deleteBtn"])

@endsection

