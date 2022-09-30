<div class="row" id="user_header">
        <div class="col-1"></div>
        <a href="/" class="col-2 p-10" style="text-align:center;">
            <img src="/storage/images/logo.png" alt="" style="height: 50px;">
        </a>
        <div class="col-1"></div>
        <div class="col-1 m-auto item_header">
            <div class="header_item_title">Quốc gia</div>
            <div class="header_item_box bg-white text-dark p-3">
                <div class="arrow-up">
                </div>
                <div class="col-12 d-flex justify-content-around">
                    <a href="{{ route('nation',['nation_name' => 'Việt Nam']) }}" class="col m-2" style="position: relative;">
                        <img src="/storage/images/vietnam.jpeg" alt="" width="100px" height="70px">
                        <div class="header_item text-white text-center">
                            Việt Nam
                        </div>
                    </a>
                    <a href="{{ route('nation',['nation_name' => 'Lào']) }}" class="col m-2" style="position: relative;">
                        <img src="/storage/images/lao.jpg" alt="" width="100px" height="70px">
                        <div class="header_item text-white text-center">
                            Lào
                        </div>
                    </a>
                </div>
                <div class="col-12 d-flex justify-content-around">
                    <a href="{{ route('nation',['nation_name' => 'Campuchia']) }}" class="col m-2" style="position: relative;">
                        <img src="/storage/images/campuchia.jpg" alt="" width="100px" height="70px">
                        <div class="header_item text-white text-center">
                            Campuchia
                        </div>
                    </a>
                    <a href="{{ route('nation',['nation_name' => 'Thái Lan']) }}" class="col m-2" style="position: relative;">
                        <img src="/storage/images/thailan.jpg" alt="" width="100px" height="70px">
                        <div class="header_item text-white text-center">
                            Thái Lan
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-1 m-auto item_header">
            <div class="header_item_title">Loại hình</div>
            <div class="header_item_box bg-white text-dark p-3">
                <div class="arrow-up">
                </div>
                <div class="col-12 d-flex justify-content-around">
                    <a href="{{ route('style',['style_name' => 'Núi']) }}" class="col m-2 text-decoration-none d-flex" style="position: relative;">
                        <i class="fa-solid fa-mountain-sun mt-3 text-success" style="font-size: 20px;"></i>
                        <div class="mx-2 pt-3" style="min-width: 100px;" qq>Núi</div>
                    </a>
                    <a href="{{ route('style',['style_name' => 'Biển']) }}" class="col m-2 text-decoration-none d-flex" style="position: relative;">
                        <i class="fa-solid fa-umbrella-beach mt-3 text-success" style="font-size: 20px;"></i>
                        <div class="mx-2 pt-3" style="min-width: 100px;">Biển</div>
                    </a>
                    <a href="{{ route('style',['style_name' => 'Tự nhiên']) }}" class="col m-2 text-decoration-none d-flex" style="position: relative;">
                        <i class="fa-solid fa-seedling mt-3 text-success" style="font-size: 20px;"></i>
                        <div class="mx-2 pt-3" style="min-width: 100px;">Tự nhiên</div>
                    </a>
                </div>
                <div class="col-12 d-flex justify-content-around">
                    <a href="{{ route('style',['style_name' => 'Thành phố']) }}" class="col m-2 text-decoration-none d-flex" style="position: relative;">
                        <i class="fa-solid fa-tree-city mt-3 text-success" style="font-size: 20px;"></i>
                        <div class="mx-2 pt-3" style="min-width: 100px;">Thành phố</div>
                    </a>
                    <a href="{{ route('style',['style_name' => 'Bảo tàng']) }}" class="col m-2 text-decoration-none d-flex" style="position: relative;">
                        <i class="fa-solid fa-building-columns mt-3 text-success" style="font-size: 20px;"></i>
                        <div class="mx-2 pt-3" style="min-width: 100px;">Bảo tàng</div>
                    </a>
                    <a href="{{ route('style',['style_name' => 'Nghỉ dưỡng']) }}" class="col m-2 text-decoration-none d-flex" style="position: relative;">
                        <i class="fa-solid fa-bed mt-3 text-success" style="font-size: 20px;"></i>
                        <div class="mx-2 pt-3" style="min-width: 100px;">Nghỉ dưỡng</div>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-1 m-auto item_header">
            <div class="header_item_title">Giới thiệu</div>
        </div>
        <div class="col-1 m-auto item_header">
            <div class="header_item_title">Liên hệ</div>
        </div>
        <div class="col-1"></div>
        <div class="col-3 m-auto item_header">
            <?php
            $user = session()->get('user', '');
            ?>
            <div class="header_item_title">
                Người dùng
                <?php
                if ($user != NULL) {
                    echo ": $user->name";
                }
                ?>
            </div>
            <div class="header_item_box bg-white text-dark p-3">
                <div class="arrow-up">
                </div>
                <div class="col-12">
                    <?php
                    if ($user == NULL) {
                        echo "
                    <a href='/login' class='col m-2 text-decoration-none d-flex' style='position: relative;'>
                        <div class='mx-2' style='min-width: 100px;'>Đăng nhập</div>
                    </a>
                ";
                    } else {
                        $route_logout = route('logout');
                        if($user->role=='admin'){
                            echo"
                            <a href='/admin/home' class='col m-2 btn btn-link text-decoration-none d-flex' style='position: relative;'>
                            <i class='fa-solid fa-music text-secondary pt-1' style='min-width:25px;'></i>
                            <div class='mx-1' style='text-align:left; min-width:100px;'>Trang quản trị</div>
                            </a>
                            ";
                        }
                        echo "
                        <a href='/user/notification' class='col m-2 btn btn-link text-decoration-none d-flex' style='position: relative;'>
                            <i class='fa-solid fa-bell text-secondary pt-1' style='min-width:25px;'></i>
                            <div class='mx-1' style='text-align:left; min-width:100px;'>Thông báo</div>
                        </a>
                        <a href='/user/account' class='col m-2 btn btn-link text-decoration-none d-flex' style='position: relative;'>
                            <i class='fa-solid fa-user text-secondary pt-1' style='min-width:25px;'></i>
                            <div class='mx-1' style='text-align:left; min-width:100px;'>Quản lý tài khoản</div>
                        </a>
                        <a href='/user/like' class='col m-2 btn btn-link text-decoration-none d-flex' style='position: relative;'>
                            <i class='fa-solid fa-heart text-secondary pt-1' style='min-width:25px;'></i>
                            <div class='mx-1' style='text-align:left; min-width:100px;'>Tours yêu thích</div>
                        </a>
                        <a href='/user/order' class='col m-2 btn btn-link text-decoration-none d-flex' style='position: relative;'>
                            <i class='fa-solid fa-scroll-torah text-secondary pt-1' style='min-width:25px;'></i>
                            <div class='mx-1' style='text-align:left; min-width:100px;'>Tours đã đặt</div>
                        </a>
                        <a href='$route_logout' class='col m-2 btn btn-link text-decoration-none d-flex' style='position: relative;'>
                            <i class='fa-solid fa-right-from-bracket text-secondary pt-1' style='min-width:25px;'></i>
                            <div class='mx-1' style='text-align:left; min-width:100px;'>Đăng xuất</div>
                        </a>
                    ";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>