@extends("admin.layouts.master")

@section("head-tag")
    <title>dashboard</title>
@endsection

@section("content")

    <section class="cards">
        <div class="row container-fluid m-0">

            <div class="col-lg-3 col-md-6 mb-4 singleCard">
                <a href="">
                    <div class="card">
                        <div class="card-body">
                            <div class="cardInfo">30,000 هزار تومان</div>
                            <div class="cardIcon"><i class="fas fa-chart-line"></i></div>
                        </div>
                        <div class="card-footer">
                            <i class="far fa-clock"></i> آخرین بروز رسانی: 12 بعد از ظهر
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-lg-3 col-md-6 mb-4 singleCard">
                <a href="">
                    <div class="card">
                        <div class="card-body">
                            <div class="cardInfo">30,000 هزار تومان</div>
                            <div class="cardIcon"><i class="fas fa-chart-line"></i></div>
                        </div>
                        <div class="card-footer">
                            <i class="far fa-clock"></i> آخرین بروز رسانی: 12 بعد از ظهر
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-lg-3 col-md-6 mb-4 singleCard">
                <a href="">
                    <div class="card">
                        <div class="card-body">
                            <div class="cardInfo">30,000 هزار تومان</div>
                            <div class="cardIcon"><i class="fas fa-chart-line"></i></div>
                        </div>
                        <div class="card-footer">
                            <i class="far fa-clock"></i> آخرین بروز رسانی: 12 بعد از ظهر
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-lg-3 col-md-6 mb-4 singleCard">
                <a href="">
                    <div class="card">
                        <div class="card-body">
                            <div class="cardInfo">30,000 هزار تومان</div>
                            <div class="cardIcon"><i class="fas fa-chart-line"></i></div>
                        </div>
                        <div class="card-footer">
                            <i class="far fa-clock"></i> آخرین بروز رسانی: 12 بعد از ظهر
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-lg-3 col-md-6 mb-4 singleCard">
                <a href="">
                    <div class="card">
                        <div class="card-body">
                            <div class="cardInfo">30,000 هزار تومان</div>
                            <div class="cardIcon"><i class="fas fa-chart-line"></i></div>
                        </div>
                        <div class="card-footer">
                            <i class="far fa-clock"></i> آخرین بروز رسانی: 12 بعد از ظهر
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-lg-3 col-md-6 mb-4 singleCard">
                <a href="">
                    <div class="card">
                        <div class="card-body">
                            <div class="cardInfo">30,000 هزار تومان</div>
                            <div class="cardIcon"><i class="fas fa-chart-line"></i></div>
                        </div>
                        <div class="card-footer">
                            <i class="far fa-clock"></i> آخرین بروز رسانی: 12 بعد از ظهر
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-lg-3 col-md-6 mb-4 singleCard">
                <a href="">
                    <div class="card">
                        <div class="card-body">
                            <div class="cardInfo">30,000 هزار تومان</div>
                            <div class="cardIcon"><i class="fas fa-chart-line"></i></div>
                        </div>
                        <div class="card-footer">
                            <i class="far fa-clock"></i> آخرین بروز رسانی: 12 بعد از ظهر
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-lg-3 col-md-6 mb-4 singleCard">
                <a href="">
                    <div class="card">
                        <div class="card-body">
                            <div class="cardInfo">30,000 هزار تومان</div>
                            <div class="cardIcon"><i class="fas fa-chart-line"></i></div>
                        </div>
                        <div class="card-footer">
                            <i class="far fa-clock"></i> آخرین بروز رسانی: 12 بعد از ظهر
                        </div>
                    </div>
                </a>
            </div>

        </div>
    </section>

    <section class="container-fluid">
        <div class="row px-2">
            <div class="col-lg-8 pb-3 pb-lg-0">
                <section class="chartWrapper">
                    <canvas id="myChart"></canvas>
                </section>
            </div>
            <div class="col-lg-4">
                <section>
                    <section class="chartWrapper">
                        <canvas id="myChart2"></canvas>
                    </section>
                </section>
            </div>
        </div>
    </section>

@endsection

@section("scripts")

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js"></script>
    <script>
        const ctx = document.getElementById('myChart').getContext('2d');
        var labels = [
            @foreach($mostSalesProducts as $products)
                '{{ $products->name }}',
            @endforeach
        ];
        var data = [
            @foreach($mostSalesProducts as $products)
                '{{ $products->sold_number }}',
            @endforeach
        ];
        const myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'محصولات پر فروش',
                    data: data,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.4)',
                        'rgba(54, 162, 235, 0.4)',
                        'rgba(255, 206, 86, 0.5)',
                        'rgba(75, 192, 192, 0.4)',
                        'rgba(153, 102, 255, 0.4)',
                        'rgba(255, 159, 64, 0.4)',
                        'rgba(255, 133, 64, 0.4)',
                        'rgba(200,54,255,0.45)'
                    ],
                    tension: .15,
                    borderRadius: 5,
                }],
            },
        });
    </script>

    <script>
        const ctx2 = document.getElementById('myChart2').getContext('2d');
        var labels2 = [
            @foreach($mostViewsProducts as $products)
                '{{ $products->name }}',
            @endforeach
        ];
        var data2 = [
            @foreach($mostViewsProducts as $products)
                '{{ $products->view }}',
            @endforeach
        ];
        const myChart2 = new Chart(ctx2, {
            type: 'doughnut',
            data: {
                labels: labels2,
                datasets: [{
                    data: data2,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.4)',
                        'rgba(54, 162, 235, 0.4)',
                        'rgba(255, 206, 86, 0.5)',
                        'rgba(75, 192, 192, 0.4)',
                        'rgba(153, 102, 255, 0.4)',
                        'rgba(255, 159, 64, 0.4)',
                        'rgba(255, 133, 64, 0.4)'
                    ],
                    tension: .15,
                    borderRadius: 5,
                }],
            },
            options: {
                responsive: true,
                plugins: {
                    title: {
                        display: true,
                        text: 'پر طرفدار ترین دسته بندی ها'
                    }
                }
            },
        });
    </script>

@endsection
