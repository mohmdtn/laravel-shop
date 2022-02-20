<script>
    $(document).ready(function (){
        var className = "{{ $className }}";
        var element = $("." + className);

        element.on("click" , function (e){

            e.preventDefault();
            const swalCustom = swal.mixin({

                customClass: {
                    confirmButton : 'btn btn-success mx-2',
                    cancelButton : 'btn btn-danger mx-2'
                },

                buttonsStyling : false

            });


            swalCustom.fire({
                title: 'آیا از برگشت دادن پرداخت مطما هستید؟',
                text: 'شما میتواند درخواست خود را لغو نمایید',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'بله برگشت داده شود',
                cancelButtonText: 'خیر درخواست لغو شود',
                reverseButtons: true
            }).then((result) => {

                if (result.value == true){
                    var link = $(this).attr("href");
                    window.location.href = link;
                }
                else if (result.dismiss === Swal.DismissReason.cancel){
                    swalCustom.fire({
                        title: 'لغو درخواست',
                        text: 'درخواست شما با موفقیت لغو شد',
                        icon: 'error',
                        confirmButtonText: 'باشه'
                    });
                }

            })

        });
    });
</script>
