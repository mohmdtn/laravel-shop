<section class="sidebar-nav-sub-wrapper">
    <section class="sidebar-nav-sub-item">
        @foreach($categories as $category)
            <span class="sidebar-nav-sub-item-title">
                <a href="#">{{ $category->name }}</a>
                @if($category->children->count())
                    <i class="fa fa-angle-left"></i>
                @endif
            </span>
            @include("user.layouts.partials.subCategories", ["categories" => $category->children])
        @endforeach
        <section class="sidebar-nav-sub-sub-wrapper">
            <section class="sidebar-nav-sub-sub-item"><a href="#">هندزفری</a></section>
            <section class="sidebar-nav-sub-sub-item"><a href="#">هدست</a></section>
            <section class="sidebar-nav-sub-sub-item"><a href="#">اسپیکر موبایل</a></section>
            <section class="sidebar-nav-sub-sub-item"><a href="#">پاوربانک</a></section>
            <section class="sidebar-nav-sub-sub-item"><a href="#">هندزفری بیسیم</a></section>
            <section class="sidebar-nav-sub-sub-item"><a href="#">قاب موبایل</a></section>
            <section class="sidebar-nav-sub-sub-item"><a href="#">هولدر نگهدارنده</a></section>
            <section class="sidebar-nav-sub-sub-item"><a href="#">شارژر بیسیم</a></section>
            <section class="sidebar-nav-sub-sub-item"><a href="#">مونوپاد</a></section>
        </section>
    </section>
</section>
