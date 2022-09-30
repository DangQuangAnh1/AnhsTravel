@include('head')

<body>
    <?php
    $user = session()->get('user', '');
    ?>
    @include('user.header')
    <div class="container_4 row col-12 m-auto">
        <div class="row m-auto col-11 pt-5">
            <div class="row col-3">
                <div class="col-3">
                    <img src="/storage/images/user/{{ $user->avatar }}" alt="" class="rounded-circle" height="50px">
                </div>
                <div class="col-9">
                    <div>Tài khoản của:</div>
                    <p>{{$user->name}}</p>
                </div>
            </div>
            <div class="col-9 px-5" style="font-size: 22px;">
                <p>Thông báo của tôi</p>
            </div>
            <div class="col-3 bg-bg-secondary">
                <a href="/user/notification" class="m_item col-12 btn btn-link text-dark px-3" style="text-decoration: none; background-color: #dcdcdc; text-align: left;">
                    <i class="fa-solid fa-bell text-secondary"></i>
                    <span class="px-2">Thông báo của tôi</span>
                </a>
                <a href="/user/account" class="m_item col-12 btn btn-link text-dark px-3" style="text-decoration: none; text-align: left;">
                    <i class="fa-solid fa-user"></i>
                    <span class="px-2">Thông tin tài khoản</span>
                </a>
                <a href="/user/like" class="m_item col-12 btn btn-link text-dark px-3" style="text-decoration: none; text-align: left;">
                    <i class="fa-solid fa-heart"></i>
                    <span class="px-2">Tours yêu thích</span>
                </a>
                <a href="/user/order" class="m_item col-12 btn btn-link text-dark px-3" style="text-decoration: none; text-align: left;">
                    <i class="fa-solid fa-scroll-torah"></i>
                    <span class="px-2">Tours đã đặt</span>
                </a>
                <a href="{{ route('logout') }}" class="m_item col-12 btn btn-link text-dark px-3" style="text-decoration: none; text-align: left;">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    <span class="px-2">Đăng xuất</span>
                </a>
            </div>
            <div class="main_container col-9 bg-white p-4 mb-5" style="height: 72vh; overflow-y: scroll;">
                <?php 
                    foreach($talks as $talk){
                        $route_talk_delete = route('talk.destroy', $talk->id);
                        echo "
                        <div class='row col-12 m-auto border-bottom border-secondary mb-2'>
                        <div class='col-2 text-center d-flex' style='align-items: center;'>
                            <p>$talk->created_at</p>
                        </div>
                        <div class='col-1 text-center d-flex' style='align-items: center;'>
                            <p>$talk->sender</p>
                        </div>
                        <div class='col-8'>
                            <div style='font-weight: bolder;'>$talk->title</div>
                            <p>$talk->description</p>
                        </div>
                       <div class='col-1 text-center d-flex' style='align-items: center;'>
                            <button data-url='$route_talk_delete' class='delete_talk btn btn-link text-danger' style='text-decoration: none;'>Xóa</button>
                        </div>
                        </div>
                        ";
                    }
                ?>
            </div>
        </div>
    </div>
</body>
@include('footer')
<script language="javascript" type="text/javascript" src="{{ asset('/frontend/js/scroll.js') }}"></script>
<script language="javascript" type="text/javascript" src="{{ asset('/frontend/js/main.js') }}"></script>
<script language="javascript" type="text/javascript" src="{{ asset('/frontend/js/ajax.js') }}"></script>

</html>