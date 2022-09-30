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
                <div class="col-12 text-right text-white" style="text-align: right;">
                    <button class="btn btn-success px-5" id="btn-add">Thêm tour</button>
                    @include('talk.adminadd')
                </div>
                <table class="table table-dark table-striped">
                    <thead>
                        <tr>
                            <th>Tên Tour</th>
                            <th>Quốc gia</th>
                            <th>Loại</th>
                            <th>Thời gian</th>
                            <th>Giá</th>
                            <th>Hành động</th>
                        </tr>
                        <img src="" alt="">
                    </thead>
                    <tbody>
                        <?php
                        foreach ($tours as $tour) {
                            $night = (int)$tour->tour_day - 1;
                            echo "
                            <tr>
                                <td>
                                <img src='/storage/images/tours/$tour->tour_img' alt='' height='30px' width='30px' class='rounded-circle'>
                                <span class='ms-2 py-2'>$tour->tour_name</span>
                                </td>
                                <td>$tour->nation_name</td>
                                <td>$tour->style_name</td>
                                <td>$tour->tour_day ngày/ $night đêm</td>
                                <td>$tour->tour_price/ người</td>
                                <td>
                                <button class='btn btn-danger px-5 me-4'>Xóa</button>
                                <button class='btn btn-warning'>Sửa thông tin</button>
                                </td>
                            </tr>
                            ";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
<script language="javascript" type="text/javascript" src="{{ asset('/frontend/js/scroll.js') }}"></script>
<script language="javascript" type="text/javascript" src="{{ asset('/frontend/js/main.js') }}"></script>
<script language="javascript" type="text/javascript" src="{{ asset('/frontend/js/ajax.js') }}"></script>

</html>