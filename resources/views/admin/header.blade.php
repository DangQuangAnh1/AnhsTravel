<div class="col-12 d-flex" id="admin_header">
    <div class="col-1 d-flex">
        <button class="btn btn-link m-auto text-white" id="hide_menu">
            <i class="fa-solid fa-bars"></i>
        </button>
    </div>
    <div class="col-8"></div>
    <div class="col-3 m-auto item_header">
        <?php
        $user = session()->get('user', '');
        ?>
        <div class="header_item_title">
            Quản trị viên: {{ $user->name }}
        </div>
        <div class="header_item_box hib2 bg-dark text-white p-3">
            <div class="arrow-up2">
            </div>
            <div class="col-12">
                <?php
                $route_logout = route('logout');
                echo "
                    <a href='/' class='col m-2 btn btn-link text-decoration-none d-flex' style='position: relative;'>
                        <i class='fa-solid fa-music text-secondary pt-1' style='min-width:25px;'></i>
                        <div class='mx-1' style='text-align:left; min-width:100px;'>Trang người dùng</div>
                    </a>
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
                ?>
            </div>
        </div>
    </div>
</div>