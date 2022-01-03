@if(session("swal-error"))

    <script>
        $(document).ready(function (){

            Swal.fire({
                icon: 'error',
                title: 'خطا!',
                text: '{{ session("swal-error") }}',
                confirmButtonText: 'باشه'
            })

        });
    </script>

@endif



@if(session("swal-success"))

    <script>
        $(document).ready(function (){

            Swal.fire({
                icon: 'success',
                title: 'عملیات با موفقیت انجام شد',
                text: '{{ session("swal-success") }}',
                confirmButtonText: 'باشه'
            })

        });
    </script>

@endif
