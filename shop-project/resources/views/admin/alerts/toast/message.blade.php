@if(session("toast-message"))

    <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-delay="5000">

        <div class="toast-header">
            <button type="button" class="ml-2 close" data-dismiss="toast" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <strong class="">پیغام</strong>
            <small class="text-muted mr-auto">2 ثانیه قبل</small>
        </div>

        <div class="toast-body">
            عملیات شما با موفقیت انجام شد
        </div>

    </div>

    <script>
        $(document).ready(function () {
            $('.toast').toast('show');
        })
    </script>

@endif

