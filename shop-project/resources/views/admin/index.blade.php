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
        <div class="row">
            <div class="col-md-8">
                <section class="chartWrapper">
                    <canvas id="myChart"></canvas>
                </section>
            </div>
            <div class="col-md-4">

            </div>
        </div>
    </section>

@endsection

@section("scripts")

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js"></script>
    <script>
        const ctx = document.getElementById('myChart').getContext('2d');
        var labels = ['galaxy s21 ultra', 'iphone 13 pro max', 'xiaomi redmi note 9', 'surface pro 7', 'galaxy a71', 'iphone X', 'iphone 12 pro'];
        var data = [12, 19, 3, 5, 2, 3, 9];
        const myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'محصولات پر فروش این ماه',
                    data: data,
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
        });
    </script>

@endsection
