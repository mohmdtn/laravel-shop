<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="{{ asset("user-assets/js/jQuery-3.5.1.min.js") }}" ></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="{{ asset("user-assets/js/bootstrap/bootstrap.min.js") }}" ></script>
<script src="{{ asset("user-assets/js/bootstrap/bootstrap.bundle.min.js") }}" ></script>
<script src="{{ asset("user-assets/plugins/owlcarousel/owl.carousel.min.js") }}"></script>
<script src="{{ asset("user-assets/js/main.js") }}" ></script>
<script>
    $("#search").keyup(() => {
        let input = $("#search").val();
        $(".input-value").html(input);
        const url = '{{ route("user.search") }}';
        const urlBrand = '{{ route("user.products") }}';
        const urlProduct = `{{ route("user.home") }}/product/`;
        $.ajax({
            url: url,
            type: "GET",
            data: {search: input},
            success: function (response){
                $(".error-search").remove();
                if (response.status){
                    $(".search-result-item").remove();

                    if (response.data.categories){
                        response.data.categories.map((item) => {
                            $(".data-category").append(`<section class="search-result-item"><a class="text-decoration-none" href="${urlBrand + "/" + item.id }"><i class="fa fa-link"></i> ${item.name}</a></section>`);
                        });
                    }
                    if(response.data.categories.length === 0) {
                        $(".data-category").append(`<section class="search-result-item"><span class="search-no-result">موردی یافت نشد</span></section>`)
                    }

                    if (response.data.brands) {
                        response.data.brands.map((item) => {
                            $(".data-brand").append(`<section class="search-result-item"><a class="text-decoration-none" href="${urlBrand + '?brands%5B%5D=' + item.id}"><i class="fa fa-link"></i> ${item.persian_name}</a></section>`);
                        });
                    }
                    if(response.data.brands.length === 0) {
                        $(".data-brand").append(`<section class="search-result-item"><span class="search-no-result">موردی یافت نشد</span></section>`)
                    }

                    if (response.data.products) {
                        response.data.products.map((item) => {
                            $(".data-product").append(`<section class="search-result-item"><a class="text-decoration-none" href="${urlProduct + item.slug}"><i class="fa fa-link"></i> ${item.name}</a></section>`);
                        });
                    }
                    if(response.data.products.length === 0) {
                        $(".data-product").append(`<section class="search-result-item"><span class="search-no-result">موردی یافت نشد</span></section>`)
                    }
                }
                else {
                    $(".search-result-item").remove();
                    $(".data-category").append(`<section class="search-result-item"><span class="search-no-result">موردی یافت نشد</span></section>`)
                    $(".data-brand").append(`<section class="search-result-item"><span class="search-no-result">موردی یافت نشد</span></section>`)
                    $(".data-product").append(`<section class="search-result-item"><span class="search-no-result">موردی یافت نشد</span></section>`)
                }

            },
            error: function (){
                $(".error-search").remove();
                $(".data-product").after(`<section class="error-search text-danger text-center"><span class="search-no-result">مشکل برقراری ارتباط...</span></section>`)
            }
        });
    });
</script>
