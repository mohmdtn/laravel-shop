<div class="headerWrapper">
    <header class="headerOrg">
        <section class="sidebarHeader">
            <section class="px-2 d-flex justify-content-between">
                    <span class="d-flex align-items-center">
                        <div class="menu-button">
                            <div class="bar"></div>
                            <div class="bar"></div>
                            <div class="bar"></div>
                        </div>
                    </span>
                <span class="siteLogo">لوگو سایت</span>
                <span class="d-md-none underMenu"><i class="fas fa-ellipsis-h"></i></span>
            </section>
        </section>

        <section class="bodyHeader">
            <section class="d-flex justify-content-between px-2 px-md-5">

                <section>
                    <span class="d-none d-md-inline"><i class="fas fa-search"></i></span>
                </section>

                <section>

                        <span class="px-2 position-relative notifWrapperClick">
                            <span class="pointer notificationClick"><i class="far fa-bell shake"></i>
                                @if($notifications->count() !== 0)
                                    <sup class="badge badge-info">{{ $notifications->count() }}</sup>
                                @endif
                            </span>

                            <div class="notifWrapper notifWrapper1 position-absolute">
                                <div class="headOfNotif d-flex justify-content-between align-items-center px-3">
                                    <span class="font-weight-bold">نوتفیکیشن ها</span>
                                    <span class="badge badge-danger">جدید</span>
                                </div>
                                <ul class="list-group">

                                    @forelse($notifications as $notification)
                                        <li class="list-group-item">
                                            <div class="media align-items-center">
                                                <div class="media-body pr-2 d-flex justify-content-center align-items-center">
                                                    <i class="fa fa-user pl-2"></i><h6 class="mb-0">{{ $notification["data"]["message"] }}</h6>
                                                </div>
                                            </div>
                                        </li>

                                    @empty
                                        <span class="text-center">نوتفیکیشن جدید وجود ندارد</span>
                                    @endforelse

                                </ul>
                            </div>
                        </span>

                    <span class="px-2 position-relative notifWrapperClick">
                            <span class="pointer"><i class="far fa-comment shake"></i>
                                @if($unseenComments->count() !== 0)
                                    <sup class="badge badge-info">{{ $unseenComments->count() }}</sup>
                                @endif
                            </span>

                            <div class="notifWrapper notifWrapper2 position-absolute">
                                <div class="headOfNotif d-flex justify-content-between align-items-center px-3">
                                    <span class="font-weight-bold">کامنت ها</span>
                                    <span class="badge badge-danger">جدید</span>
                                </div>

                                <div class="p-3 border-bottom"><input class="form-control border-radius-5" type="text" name="" id="" placeholder="جستجو ..."></div>

                                <ul class="list-group">

                                    @forelse($unseenComments as $unseenComment)
                                        <li class="list-group-item">
                                            <div class="media">
                                                <img src="{{ asset("admin-assets/images/unkonwPrfmale.png") }}" alt="">
                                                <div class="media-body pr-2">
                                                    <h6>{{ $unseenComment->user->fullName }}</h6>
                                                    <p class="notifText">{{ $unseenComment["body"] }}</p>
                                                    <p class="notifTime">40 دقیقه قبل</p>
                                                </div>
                                            </div>
                                        </li>
                                    @empty
                                        <span class="text-center">کامنت جدید وجود ندارد</span>
                                    @endforelse
                                </ul>
                            </div>

                        </span>




                    <span class="px-2 position-relative notifWrapperClick">
                            <span class="pointer"><i class="fas fa-shopping-cart shake"></i><sup class="badge badge-info">9</sup></span>
                    </span>


                    <spaan class="pr-5 position-relative notifWrapperClick">
                            <span class="pointer headerProfile">
                                <img src="{{ auth()->user()->profile_photo_path ? asset(auth()->user()->profile_photo_path) : asset("admin-assets/images/unkonwPrfmale.png")}}" alt="">

                                <span class="pr-1">{{ auth()->user()->fullName }}</span>
                                <i class="fas fa-angle-down"></i>
                            </span>

                        <div class="notifWrapper notifWrapper3 position-absolute">
                            <div class="headerProfileInfo px-2 pt-2 pb-0">
                                <a href="{{ route("admin.setting.index") }}">
                                    <div class="">
                                        <i class="fas fa-cog"></i> تنظیمات
                                    </div>
                                </a>

                                <a href="{{ route("admin.setting.index") }}">
                                    <div class="">
                                        <i class="fas fa-user"></i> کاربر
                                    </div>
                                </a>

                                <a href="">
                                    <div class="">
                                        <i class="fas fa-envelope"></i> پیام ها
                                    </div>
                                </a>

                                <a href="">
                                    <div class="">
                                        <i class="fas fa-lock"></i> قفل صفحه
                                    </div>
                                </a>

                                <a href="">
                                    <div class="">
                                        <i class="fas fa-sign-out-alt"></i> خروج
                                    </div>
                                </a>
                            </div>
                        </div>
                    </spaan>

                </section>

            </section>
        </section>
    </header>
</div>
