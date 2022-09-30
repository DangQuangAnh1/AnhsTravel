@include('head')
<?php
$user = session()->get('user', '');
?>

<body>
    <div class="col-12 d-flex m-auto">
        <div id="menu_left" class="bg-dark py-2" style="width:5vw; overflow: hidden;">
            <div id="company_name" class="text-white ps-4 mb-3" style="width:20vw; font-size: 35px;">
                A
            </div>
            <div class="col-12 d-flex flex-wrap">
                <a href='/admin/home' class='col-12 m-2 btn btn-link text-decoration-none d-flex' style='position: relative;'>
                    <img src="/storage/images/user/casau.jpg" alt="" width="40px" class="img-xs rounded-circle">
                    <div class='mx-3 text-white py-2' style='text-align:left; min-width:100px;align-items: center;'>{{ $user->name }}</div>
                </a>
            </div>
            <div class="col-12 d-flex flex-wrap navigation">
                <div class="col-12 text-white py-3 px-4" id="navigation">

                </div>
                <a href='/admin/talk' class='col m-2 btn btn-link text-decoration-none d-flex' style='position: relative;'>
                    <i class='fa-brands fa-rocketchat pt-1' style='font-size: 35px;min-width:40px;'></i>
                    <div class='ms-3 text-white py-2' style='text-align:left; min-width:150px;'>Quản lý câu hỏi</div>
                </a>
                <a href='/admin/account' class='col m-2 btn btn-link text-decoration-none d-flex ' style='position: relative;'>
                    <i class='fa-solid fa-user pt-1' style='font-size: 35px;min-width:40px;'></i>
                    <div class='ms-3 text-white py-2' style='text-align:left; min-width:150px;'>Quản lý người dùng</div>
                </a>
                <a href='/admin/tours' class='col m-2 btn btn-link text-decoration-none d-flex' style='position: relative;'>
                    <i class='fa-solid fa-torii-gate pt-1' style='font-size: 35px;min-width:40px;'></i>
                    <div class='ms-3 text-white py-2' style='text-align:left; min-width:150px;'>Quản lý Tours</div>
                </a>
                <a href='/admin/order' class='col m-2 btn btn-link text-decoration-none d-flex' style='position: relative;'>
                    <i class='fa-solid fa-arrows-turn-to-dots pt-1' style='font-size: 35px;min-width:40px;'></i>
                    <div class='ms-3 text-white py-2' style='text-align:left; min-width:150px;'>Quản lý đơn</div>
                </a>
                <a href='/admin/turnover' class='col m-2 btn btn-link text-decoration-none d-flex' style='position: relative;'>
                    <i class='fa-solid fa-chart-line pt-1' style='font-size: 35px;min-width:40px;'></i>
                    <div class='ms-3 text-white py-2' style='text-align:left; min-width:150px;'>Xem thống kê</div>
                </a>
                <a href="{{ route('logout') }}" class='col m-2 btn btn-link text-decoration-none d-flex' style='position: relative;'>
                    <i class='fa-solid fa-right-from-bracket pt-1' style='font-size: 35px;min-width:40px;'></i>
                    <div class='ms-3 text-white py-2' style='text-align:left; min-width:150px;'>Đăng xuất</div>
                </a>
            </div>
        </div>
        <div class="text-white bg-dark" style="flex: 1;">
            @include('admin.header')
            <div class="col-12 bg-black main_container p-5" style="height: calc(100vh - 70px); overflow-y: scroll;">
                <div class="row m-auto">
                    <div class="row col bg-dark me-4 rounded p-3 border-start border-success">
                        <?php
                        date_default_timezone_set('Asia/Ho_Chi_Minh');
                        date_default_timezone_get();
                        $current_time = date_create(date('Y-m-d H:i:s'));
                        $numorder = 0;
                        foreach ($orders as $order) {
                            $date = date_create($order->created_at);
                            $diff = date_diff($date, $current_time);
                            if ($diff->format("%a") <= 7) {
                                $numorder += 1;
                            }
                        }
                        ?>
                        <div class="col-8">
                            <div class="text-success">Lượt đặt tour tuần này:</div>
                            <div style="font-size: 26px;">{{ $numorder }}</div>
                        </div>
                        <div class="col-4 text-center py-3">
                            <i class="fa-solid fa-clipboard-check text-secondary" style="font-size: 30px;"></i>
                        </div>
                    </div>
                    <div class="row col bg-dark me-4 rounded p-3 border-start border-success">
                        <div class="col-8">
                            <div class="text-primary">Tổng số người dùng:</div>
                            <div style="font-size: 26px;">{{ count($users)-1 }}</div>
                        </div>
                        <div class="col-4 text-center py-3">
                            <i class="fa-solid fa-clipboard-user text-secondary" style="font-size: 30px;"></i>
                        </div>
                    </div>
                    <div class="row col bg-dark me-4 rounded p-3 border-start border-success">
                        <div class="col-8">
                            <div class="text-info">Tổng số Tours:</div>
                            <div style="font-size: 26px;">{{ count($tours)}}</div>
                        </div>
                        <div class="col-4 text-center py-3">
                            <i class="fa-solid fa-clipboard-list text-secondary" style="font-size: 30px;"></i>
                        </div>
                    </div>
                    <div class="row col bg-dark rounded p-3 border-start border-success">
                        <div class="col-8">
                            <div class="text-warning">Tổng số lượt đặt tour:</div>
                            <div style="font-size: 26px;">{{ count($orders) }}</div>
                        </div>
                        <div class="col-4 text-center py-3">
                            <i class="fa-solid fa-clipboard-user text-secondary" style="font-size: 30px;"></i>
                        </div>
                    </div>
                </div>
                <div class="row mt-4 m-auto">
                    <div class="col me-4 bg-dark p-3 rounded">
                        <div id="myChart" style="width:100%; height:500px;">
                        </div>
                    </div>
                    <?php
                    echo"
                    <script>
                        google.charts.load('current', {
                            'packages': ['corechart']
                        });
                        google.charts.setOnLoadCallback(drawChart);

                        function drawChart() {
                            var data = google.visualization.arrayToDataTable([
                                ['Contry', 'Mhl'],
                                ['Việt Nam', 54.8],
                                ['Lào', 48.6],
                                ['Camphuchia', 44.4],
                                ['Thái Lan', 23.9],
                                ['Nhiều quốc gia', 14.5]
                            ]);

                            var options = {
                                title: 'Số Tour theo quốc gia.',
                                titleTextStyle: {
                                    color: 'white'
                                },
                                backgroundColor: '#212529',
                                chartArea: {
                                    width: '90%',
                                    height: '90%',
                                    left: '10',
                                },
                                legend: {
                                    textStyle: {
                                        color: 'white'
                                    },
                                }
                            };

                            var chart = new google.visualization.PieChart(document.getElementById('myChart'));
                            chart.draw(data, options);
                        }
                    </script>
                    ";
                    ?>
                    <div class="col bg-dark p-3 rounded">
                        <div id="myChart1" style="width:100%; height:500px;">
                        </div>
                    </div>
                    <?php
                    echo "
                    <script>
                        google.charts.load('current', {
                            'packages': ['corechart']
                        });
                        google.charts.setOnLoadCallback(drawChart);

                        function drawChart() {
                            var data = google.visualization.arrayToDataTable([
                                ['Contry', 'VND'],
                                ['Việt Nam', 55],
                                ['Lào', 49],
                                ['Camphuchia', 44],
                                ['Thái Lan', 24],
                                ['Nhiều quốc gia', 15]
                            ]);

                            var options = {
                                title: 'Doanh thu theo quốc gia.',
                                titleTextStyle: {
                                    color: 'white'
                                },
                                backgroundColor: '#212529',
                                vAxis: {
                                    title: 'Quốc gia',
                                    titleTextStyle: {
                                        color: 'white'
                                    },
                                    textStyle: {
                                        color: 'white'
                                    },
                                },
                                hAxis: {
                                    title: 'Tổng doanh thu',
                                    titleTextStyle: {
                                        color: 'white'
                                    },
                                    textStyle: {
                                        color: 'white'
                                    },
                                },
                                legend: {
                                    textStyle: {
                                        color: 'white'
                                    },
                                }
                            };

                            var chart = new google.visualization.BarChart(document.getElementById('myChart1'));
                            chart.draw(data, options);
                        }
                    </script>
                    ";
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>
<script language="javascript" type="text/javascript" src="{{ asset('/frontend/js/scroll.js') }}"></script>
<script language="javascript" type="text/javascript" src="{{ asset('/frontend/js/main.js') }}"></script>
<script language="javascript" type="text/javascript" src="{{ asset('/frontend/js/ajax.js') }}"></script>
<script language="javascript" type="text/javascript" src="{{ asset('/frontend/js/chart.js') }}"></script>

</html>