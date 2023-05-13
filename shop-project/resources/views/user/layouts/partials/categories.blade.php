<section class="sidebar-nav">
    @foreach($categories as $category)
        <section class="sidebar-nav-item">
            <span class="sidebar-nav-item-title">
                <a class="d-inline-block" href="{{ route("user.products", $category->id) }}">{{ $category->name }}</a>
                @if($category->children->count())
                    <i class="fa fa-angle-left"></i>
                @endif
            </span>
            @include("user.layouts.partials.subCategories", ["categories" => $category->children])
        </section>
    @endforeach
</section>
