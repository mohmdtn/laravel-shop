<!doctype html>
<html lang="en">
<head>

    @include("user.layouts.head-tag")

    @yield("head-tag")

</head>
<body>
@include("user.layouts.header")
@include("admin.alerts.alertSection.success")
@include("admin.alerts.alertSection.danger")
<main id="main-body-one-col" class="main-body">
    @yield("content")
</main>

@include("user.layouts.footer")
</body>

@include("user.layouts.scripts")

@yield("scripts")

</html>
