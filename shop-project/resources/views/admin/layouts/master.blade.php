<!DOCTYPE html>
<html lang="en">

<head>
    @include("admin.layouts.head-tag")
    @yield("head-tag")
</head>

<body>

<!-- //////////////////// header -->
    @include("admin.layouts.header")
<!-- //////////////////// end of header -->




<main>

    <!-- //////////////////// side menu -->
    @include("admin.layouts.sidebar")
    <!-- //////////////////// end of side menu -->



    <!-- /////////////////// content -->

    <section class="main py-4 px-2">
        @yield("content")
    </section>

    <!-- /////////////////// end of content -->

    @include("admin.layouts.scripts")
    @yield("scripts")

    @include("admin.alerts.sweetAlert.error")
    <section class="toast-wrapper">
        @include("admin.alerts.toast.message")
    </section>

</main>



</body>


</html>
