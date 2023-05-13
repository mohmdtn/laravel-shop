<section class="sidebar-nav-sub-wrapper px-2">
    <section class="sidebar-nav-sub-item">
        @foreach($categories as $category)
            <span class="sidebar-nav-sub-item-title">
                <a class="d-inline-block" href="{{ route("user.products", $category->id) }}">{{ $category->name }}</a>
                @if($category->children->count())
                    <i class="fa fa-angle-left"></i>
                @endif
            </span>
            @include("user.layouts.partials.subCategories", ["categories" => $category->children])
        @endforeach
    </section>
</section>
