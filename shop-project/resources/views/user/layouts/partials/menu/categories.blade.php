{{--@foreach($categories as $category)--}}
{{--    <section class="sublist-item">--}}
{{--        <section class="sublist-item-toggle">{{ $category->name }}</section>--}}
{{--        <section class="sublist-item-sublist">--}}
{{--            <section class="sublist-item-sublist-wrapper d-flex justify-content-around align-items-center">--}}
{{--                @foreach($category->children as $categoryChild)--}}
{{--                <section class="sublist-column col">--}}
{{--                        <a href="{{ route("user.products", $categoryChild->id) }}" class="sub-category">{{ $categoryChild->name }}</a>--}}
{{--                        @include("user.layouts.partials.menu.subCategories", ["subCategories" => $categoryChild->children])--}}
{{--                </section>--}}
{{--                @endforeach--}}
{{--            </section>--}}
{{--        </section>--}}
{{--    </section>--}}
{{--@endforeach--}}
