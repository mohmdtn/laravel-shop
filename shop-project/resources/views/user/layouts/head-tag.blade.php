<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="{{ asset("user-assets/css/bootstrap/bootstrap-reboot.rtl.min.css") }}">
<link rel="stylesheet" href="{{ asset("user-assets/css/bootstrap/bootstrap.rtl.min.css") }}">
<link rel="stylesheet" href="{{ asset("user-assets/fontawesome/css/all.min.css") }}">
<link rel="stylesheet" href="{{ asset("user-assets/plugins/owlcarousel/assets/owl.carousel.min.css") }}">
<link rel="stylesheet" href="{{ asset("user-assets/plugins/owlcarousel/assets/owl.theme.default.min.css") }}">
<link rel="stylesheet" href="{{ asset("user-assets/css/style.css") }}">
<link rel="stylesheet" href="{{ asset("user-assets/css/cart.css") }}">
<link rel="stylesheet" href="{{ asset("user-assets/css/address.css") }}">
<link rel="stylesheet" href="{{ asset("user-assets/css/payment.css") }}">
<link rel="stylesheet" href="{{ asset("user-assets/css/filter.css") }}">
<link rel="stylesheet" href="{{ asset("user-assets/css/product.css") }}">
<link rel="stylesheet" href="{{ asset("user-assets/css/profile.css") }}">
<link rel="stylesheet" href="{{ asset("user-assets/css/login.css") }}">
<style>
    .loading-page{
        width: 100%;
        height: 100%;
        position: fixed;
        top: 0;
        left: 0;
        background-color: rgba(158, 158, 158, 0.65);
        z-index: 9999999;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .spinner {
        width: 60px;
        height: 60px;
        position: relative;
    }

    .double-bounce1,
    .double-bounce2 {
        width: 100%;
        height: 100%;
        border-radius: 50%;
        background-color: #9762ee;
        opacity: 0.6;
        position: absolute;
        top: 0;
        left: 0;

        -webkit-animation: bounce 2s infinite ease-in-out;
        animation: bounce 2s infinite ease-in-out;
    }

    .double-bounce2 {
        -webkit-animation-delay: -1s;
        animation-delay: -1s;
    }

    @-webkit-keyframes bounce {
        0%,
        100% {
            -webkit-transform: scale(0);
        }
        50% {
            -webkit-transform: scale(1);
        }
    }

    @keyframes bounce {
        0%,
        100% {
            transform: scale(0);
            -webkit-transform: scale(0);
        }
        50% {
            transform: scale(1);
            -webkit-transform: scale(1);
        }
    }
</style>
