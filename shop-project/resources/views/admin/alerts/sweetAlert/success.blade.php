@if(session("swal-success"))

    <script>
        $(document).ready(function (){

            Swal.fire({
                icon: 'success',
                title: 'عملیات با موفقیت انجام شد',
                text: '{{ session("swal-success") }}',
                // footer: '<a href="">Why do I have this issue?</a>',
                confirmButtonText: 'باشه'
            })

        });
    </script>

@endif
