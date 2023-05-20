@extends("admin.layouts.master")

@section("head-tag")
    <title>جزئیات سفارش</title>
@endsection

@section("content")

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">خانه</a></li>
            <li class="breadcrumb-item"><a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item"><a href="{{ route("admin.market.order.all") }}">سفارشات</a></li>
            <li class="breadcrumb-item active" aria-current="page">جزئیات سفارش</li>
        </ol>
    </nav>

    <section class="pagesContent py-3 px-2">
        <div class="sectionHeader d-flex justify-content-between align-items-center">
            <h4>جزئیات سفارش:</h4>
            <a href="{{ route("admin.market.order.show", $order["id"]) }}" class="btn btn-info btn-sm border-radius-4 box-shadow-normal">بازگشت</a>
        </div>

        <div class="sectionHeaderBottom d-flex justify-content-between align-items-center py-3">

        </div>

        <section class="table-responsive">

            <table class="table table-striped table-hover">
                <thead class="table-info">
                    <th>#</th>
                    <th>نام محصول</th>
                    <th>تصویر</th>
                    <th>درصد فروش فوق العاده</th>
                    <th>مبلغ فروش فوق العاده</th>
                    <th>تعداد</th>
                    <th>جمع قیمت محصول</th>
                    <th>مبلغ نهایی</th>
                    <th>دسته بندی محصول</th>
                    <th>برند محصول</th>
                    <th>رنگ</th>
                    <th>گارانتی</th>
                    <th>ویژگی ها</th>
                </thead>

                <tbody>
                @foreach($order->orderItems as $item)
                    <tr>
                        <th>{{ $loop->iteration }}</th>
                        <td>{{ $item->singleProduct->name ?? "-" }}</td>
                        <td><img src="{{ asset($item->singleProduct['image']['indexArray'][$item->singleProduct['image']['currentImage']]) }}" alt=""></td>
                        <td>{{ $item->amazingSale->percentage ?? "-" }}</td>
                        <td>{{ $item["amazing_sale_discount_amount"] ?? "-" }} تومان</td>
                        <td>{{ $item["number"] ?? "-" }}</td>
                        <td>{{ $item["final_product_price"] ?? "-" }} تومان</td>
                        <td>{{ $item["final_product_price"] * $item["number"] ?? "-" }} تومان</td>
                        <td>{{ $item->singleProduct->category->name ?? "-" }}</td>
                        <td>{{ $item->singleProduct->brand->original_name ?? "-" }}</td>
                        <td>{{ $item->productColor->color_name ?? "-" }}</td>
                        <td>{{ $item->guarantee->name ?? "-" }}</td>
                        <td>
                            @forelse( $item->orderItemAttributes as $orderAttribute)
                                {{ $orderAttribute->categoryAttribute->name ?? "-" }} : {{ $orderAttribute->categoryAttributeValue->value ?? "-" }}
                            @empty
                                -
                            @endforelse
                        </td>

                    </tr>
                @endforeach
                </tbody>

            </table>

        </section>


    </section>

@endsection

@section("scripts")
    <script>
        $("#print").click(function (){
            var restorePage = $("body").html();
            var printContent = $("#printable").clone();
            $("body").empty().html(printContent);
            window.print();
            $("body").empty().html(restorePage);
        });
    </script>
@endsection
