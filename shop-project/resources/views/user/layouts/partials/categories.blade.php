<section class="sidebar-nav">
    @foreach($categories as $category)
        <section class="sidebar-nav-item">
            <span class="sidebar-nav-item-title">
                {{ $category->name }}
                @if($category->children->count())
                    <i class="fa fa-angle-left"></i>
                @endif
            </span>
            @include("user.layouts.partials.subCategories", ["categories" => $category->children])
        </section>
    @endforeach
</section>
