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
                <div class="row text-right mb-4 text-white">
                    Trang thống kê
                </div>
                <table class="table table-dark table-striped">
                    <thead>
                        <tr>
                            <th>Tháng</th>
                            <th>Năm</th>
                            <th>Số tour được đặt</th>
                            <th>Tổng thu</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $month = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12);
                        $num_tours = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
                        $money = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
                        foreach ($orders as $order) {
                            $date = date_create($order->created_at);
                            $datefm = date_format($date, "n");
                            $num_tours[$datefm] += 1;
                            $money[$datefm] += $order->tour_price * ($order->adults + $order->childrens);
                        }
                        foreach ($month as $m) {
                            echo "
                            <tr>
                            <td>$m</td>
                            <td>2022</td>
                            <td>$num_tours[$m]</td>
                            <td>$money[$m]</td>
                            </tr>
                            ";
                        }
                        ?>
                    </tbody>
                </table>
                <div class="row my-4 m-auto">
                    <div id="myChart2" style="width:100%;height:500px;" class="m-auto"></div>
                    <?php
                    echo "
                    <script type='text/javascript'>
                        google.charts.load('current', {
                            packages: ['corechart']
                        });
                        google.charts.setOnLoadCallback(drawChart);

                        function drawChart() {
                            
                            var data = google.visualization.arrayToDataTable([
                                ['Price', 'VND'],
                                [1, $money[1]],
                                [2, $money[2]],
                                [3, $money[3]],
                                [4, $money[4]],
                                [5, $money[5]],
                                [6, $money[6]],
                                [7, $money[7]],
                                [8, $money[8]],
                                [9, $money[9]],
                                [10, $money[10]],
                                [11, $money[11]],
                                [12, $money[12]]
                            ]);
                            
                            var options = {
                                title: 'Doanh thu năm 2022',
                                titleTextStyle: {
                                    color: 'white'
                                },
                                backgroundColor: '#212529',
                                vAxis: {
                                    title: 'Doanh thu',
                                    titleTextStyle: {
                                        color: 'white'
                                    },
                                    textStyle: {
                                        color: 'white'
                                    },
                                },
                                hAxis: {
                                    title: 'Tháng',
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
                            
                            var chart = new google.visualization.LineChart(document.getElementById('myChart2'));
                            chart.draw(data, options);
                        }
                    </script>
                    ";
                    ?>
                </div>
            </div>
        </div>
</body>
<script language="javascript" type="text/javascript" src="{{ asset('/frontend/js/scroll.js') }}"></script>
<script language="javascript" type="text/javascript" src="{{ asset('/frontend/js/main.js') }}"></script>
<script language="javascript" type="text/javascript" src="{{ asset('/frontend/js/ajax.js') }}"></script>
</html>