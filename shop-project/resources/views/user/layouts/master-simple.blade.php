<!doctype html>
<html lang="en">
<head>

    @include("user.layouts.head-tag")

    @yield("head-tag")

</head>
<body>

    <main id="main-body-one-col" class="main-body">
        @yield("content")
    </main>

</body>

@include("user.layouts.scripts")

@yield("scripts")

</html>
