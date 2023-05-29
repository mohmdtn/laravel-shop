<aside class="sidebar">
    <div class="sidebarContainer">
        <div class="sidebarWrapper">

            <a href="{{ route("admin.home") }}" class="sidebarLink">
                <div>
                    <i class="fas fa-home"></i>
                    <span>خانه</span>
                </div>
            </a>

            <section class="sidebarTitle">بخش فروش</section>

            @can("access-orders-important")
            <div class="sidebarGroupLink">
                <div class="sidebarGroupToggle">
                    <span>
                        <i class="fas fa-th"></i>
                        <span>ویترین</span>
                    </span>
                    <span class="pl-2 sidebarToggleAngle">
                        <i class="fas fa-angle-left"></i>
                    </span>
                </div>

                <div class="sidebarDropDown">

                    <a href="{{ route("admin.market.category.index") }}" class="sidebarLink">
                        <div>
                            <i class="fa fa-list-alt"></i>
                            <span>دسته بندی</span>
                        </div>
                    </a>

                    <a href="{{ route("admin.market.property.index") }}" class="sidebarLink">
                        <div>
                            <i class="far fa-file-alt"></i>
                            <span>فرم کالا</span>
                        </div>
                    </a>

                    <a href="{{ route("admin.market.brand.index") }}" class="sidebarLink">
                        <div>
                            <i class="fas fa-briefcase"></i>
                            <span>برند ها</span>
                        </div>
                    </a>

                    <a href="{{ route("admin.market.product.index") }}" class="sidebarLink">
                        <div>
                            <i class="fas fa-dolly"></i>
                            <span>کالا ها</span>
                        </div>
                    </a>

                    <a href="{{ route("admin.market.store.index") }}" class="sidebarLink">
                        <div>
                            <i class="fas fa-store"></i>
                            <span>انبار</span>
                        </div>
                    </a>

                    <a href="{{ route("admin.market.comment.index") }}" class="sidebarLink">
                        <div>
                            <i class="fas fa-comments"></i>
                            <span>نظرات</span>
                        </div>
                    </a>

                </div>
            </div>
            @endcan

            @can("access-orders")
            <div class="sidebarGroupLink">
                <div class="sidebarGroupToggle">
                    <span>
                        <i class="fas fa-shopping-cart"></i>
                        <span>سفارشات</span>
                    </span>
                    <span class="pl-2 sidebarToggleAngle">
                        <i class="fas fa-angle-left"></i>
                    </span>
                </div>

                <div class="sidebarDropDown">

                    <a href="{{ route("admin.market.order.newOrder") }}" class="sidebarLink">
                        <div>
                            <i class="fa fa-cart-plus"></i>
                            <span>جدید</span>
                        </div>
                    </a>

                    <a href="{{ route("admin.market.order.sending") }}" class="sidebarLink">
                        <div>
                            <i class="fas fa-truck"></i>
                            <span>در حال ارسال</span>
                        </div>
                    </a>

                    <a href="{{ route("admin.market.order.unpaid") }}" class="sidebarLink">
                        <div>
                            <i class="fas fa-credit-card"></i>
                            <span>پرداخت نشده</span>
                        </div>
                    </a>

                    <a href="{{ route("admin.market.order.canceled") }}" class="sidebarLink">
                        <div>
                            <i class="fas fa-window-close"></i>
                            <span>باطل شده</span>
                        </div>
                    </a>

                    <a href="{{ route("admin.market.order.returned") }}" class="sidebarLink">
                        <div>
                            <i class="fas fa-undo"></i>
                            <span>مرجوعی</span>
                        </div>
                    </a>

                    <a href="{{ route("admin.market.order.all") }}" class="sidebarLink">
                        <div>
                            <i class="far fa-file-alt"></i>
                            <span>تمام سفارشات</span>
                        </div>
                    </a>

                </div>
            </div>
            @endcan

            @can("access-payments")
            <div class="sidebarGroupLink">
                <div class="sidebarGroupToggle">
                    <span>
                        <i class="fas fa-credit-card"></i>
                        <span>پرداخت ها</span>
                    </span>
                    <span class="pl-2 sidebarToggleAngle">
                        <i class="fas fa-angle-left"></i>
                    </span>
                </div>

                <div class="sidebarDropDown">

                    <a href="{{ route("admin.market.payment.index") }}" class="sidebarLink">
                        <div>
                            <i class="fas fa-file-invoice-dollar"></i>
                            <span>تمام پرداخت ها</span>
                        </div>
                    </a>

                    <a href="{{ route("admin.market.payment.online") }}" class="sidebarLink">
                        <div>
                            <i class="fas fa-credit-card"></i>
                            <span>پرداخت های آنلاین</span>
                        </div>
                    </a>

                    <a href="{{ route("admin.market.payment.offline") }}" class="sidebarLink">
                        <div>
                            <i class="fas fa-money-check-alt"></i>
                            <span>پرداخت های آفلاین</span>
                        </div>
                    </a>

                    <a href="{{ route("admin.market.payment.cash") }}" class="sidebarLink">
                        <div>
                            <i class="fas fa-money-bill-wave"></i>
                            <span>پرداخت در محل</span>
                        </div>
                    </a>

                </div>
            </div>
            @endcan

            @can("access-discounts")
            <div class="sidebarGroupLink">
                <div class="sidebarGroupToggle">
                    <span>
                        <i class="fas fa-bullhorn"></i>
                        <span>تخفیف ها</span>
                    </span>
                    <span class="pl-2 sidebarToggleAngle">
                        <i class="fas fa-angle-left"></i>
                    </span>
                </div>

                <div class="sidebarDropDown">

                    <a href="{{ route("admin.market.discount.copan") }}" class="sidebarLink">
                        <div>
                            <i class="fa fa-tag"></i>
                            <span>کوپن تخفیف</span>
                        </div>
                    </a>

                    <a href="{{ route("admin.market.discount.commonDiscount") }}" class="sidebarLink">
                        <div>
                            <i class="fa fa-percent"></i>
                            <span>تخفیف عمومی</span>
                        </div>
                    </a>

                    <a href="{{ route("admin.market.discount.amazingSale") }}" class="sidebarLink">
                        <div>
                            <i class="fas fa-search-dollar"></i>
                            <span>فروش شگفت انگیز</span>
                        </div>
                    </a>


                </div>
            </div>
            @endcan

            @can("access-orders-important")
            <a href="{{ route("admin.market.delivery.index") }}" class="sidebarLink">
                <div>
                    <i class="fas fa-shipping-fast"></i>
                    <span>روش های ارسال</span>
                </div>
            </a>
            @endcan






            <section class="sidebarTitle">بخش محتوی</section>

            @can("show-content")
            <a href="{{ route("admin.content.category.index") }}" class="sidebarLink">
                <div>
                    <i class="fas fa-list-alt"></i>
                    <span>دسته بندی</span>
                </div>
            </a>
            @endcan

            @can("show-content")
            <a href="{{ route("admin.content.post.index") }}" class="sidebarLink">
                <div>
                    <i class="far fa-newspaper"></i>
                    <span>پست ها</span>
                </div>
            </a>
            @endcan

            @can("show-content-comment")
            <a href="{{ route("admin.content.comment.index") }}" class="sidebarLink">
                <div>
                    <i class="fas fa-comments"></i>
                    <span>نظرات</span>
                </div>
            </a>
            @endcan

            @can("show-faq")
            <a href="{{ route("admin.content.faq.index") }}" class="sidebarLink">
                <div>
                    <i class="fa fa-question-circle"></i>
                    <span>سوالات متداول</span>
                </div>
            </a>
            @endcan

            @can("show-add-menu")
            <a href="{{ route("admin.content.menu.index") }}" class="sidebarLink">
                <div>
                    <i class="fas fa-bars"></i>
                    <span>منو</span>
                </div>
            </a>
            @endcan

            @can("show-create-page")
            <a href="{{ route("admin.content.page.index") }}" class="sidebarLink">
                <div>
                    <i class="fas fa-copy"></i>
                    <span>پیج ساز</span>
                </div>
            </a>
            @endcan

            @can("show-banners")
            <a href="{{ route("admin.content.banner.index") }}" class="sidebarLink">
                <div>
                    <i class="fas fa-scroll"></i>
                    <span>بنر ها</span>
                </div>
            </a>
            @endcan





            <section class="sidebarTitle">بخش کاربران</section>

            @can("show-admins")
            <a href="{{ route("admin.user.adminUser.index") }}" class="sidebarLink">
                <div>
                    <i class="fas fa-user-secret"></i>
                    <span>ادمین ها</span>
                </div>
            </a>
            @endcan

            @can("show-users")
            <a href="{{ route("admin.user.customer.index") }}" class="sidebarLink">
                <div>
                    <i class="fas fa-users"></i>
                    <span>کاربران</span>
                </div>
            </a>
            @endcan

            @can("add-admins")
            <a href="{{ route("admin.user.role.index") }}" class="sidebarLink">
                <div>
                    <i class="fas fa-user-cog"></i>
                    <span>سطوح دسترسی</span>
                </div>
            </a>
            @endcan




            <section class="sidebarTitle">بخش تیکت ها</section>

            @can("show-tickets")
            <a href="{{ route("admin.ticket.category.index") }}" class="sidebarLink">
                <div>
                    <i class="fas fa-ticket-alt"></i>
                    <span>دسته بندی تیکت ها</span>
                </div>
            </a>
            @endcan

            @can("show-tickets")
            <a href="{{ route("admin.ticket.priority.index") }}" class="sidebarLink">
                <div>
                    <i class="fas fa-ticket-alt"></i>
                    <span>اولویت تیکت ها</span>
                </div>
            </a>
            @endcan

            @can("show-tickets")
            <a href="{{ route("admin.ticket.admin.index") }}" class="sidebarLink">
                <div>
                    <i class="fas fa-ticket-alt"></i>
                    <span>ادمین تیکت ها</span>
                </div>
            </a>
            @endcan

            @can("show-tickets")
            <a href="{{ route("admin.ticket.newTickets") }}" class="sidebarLink">
                <div>
                    <i class="fas fa-ticket-alt"></i>
                    <span>تیکت های جدید</span>
                </div>
            </a>
            @endcan

            @can("show-tickets")
            <a href="{{ route("admin.ticket.openTickets") }}" class="sidebarLink">
                <div>
                    <i class="fas fa-ticket-alt"></i>
                    <span>تیکت های باز</span>
                </div>
            </a>
            @endcan

            @can("show-tickets")
            <a href="{{ route("admin.ticket.closeTickets") }}" class="sidebarLink">
                <div>
                    <i class="fas fa-ticket-alt"></i>
                    <span>تیکت های بسته</span>
                </div>
            </a>
            @endcan

            @can("show-tickets")
            <a href="{{ route("admin.ticket.index") }}" class="sidebarLink">
                <div>
                    <i class="fas fa-ticket-alt"></i>
                    <span>همه تیکت ها</span>
                </div>
            </a>
            @endcan






            <section class="sidebarTitle">بخش اطلاع رسانی</section>

            @can("notifications")
            <a href="{{ route("admin.notify.email.index") }}" class="sidebarLink">
                <div>
                    <i class="fas fa-envelope-open-text"></i>
                    <span>اطلاعیه ایمیلی</span>
                </div>
            </a>
            @endcan

            @can("notifications")
            <a href="{{ route("admin.notify.sms.index") }}" class="sidebarLink">
                <div>
                    <i class="fas fa-sms"></i>
                    <span>اطلاعیه پیامکی</span>
                </div>
            </a>
            @endcan






            <section class="sidebarTitle">تنظیمات</section>

            @can("access-settings")
            <a href="{{ route("admin.setting.index") }}" class="sidebarLink">
                <div>
                    <i class="fas fa-home"></i>
                    <span>تنظیمات سایت</span>
                </div>
            </a>
            @endcan

        </div>
    </div>
</aside>
