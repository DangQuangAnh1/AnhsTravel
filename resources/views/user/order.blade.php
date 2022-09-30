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
                <p>Danh sách tour đã đặt</p>
            </div>
            <div class="col-3 bg-bg-secondary">
                <a href="/user/notification" class="m_item col-12 btn btn-link text-dark px-3" style="text-decoration: none; text-align: left;">
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
                <a href="/user/order" class="m_item col-12 btn btn-link text-dark px-3" style="text-decoration: none; background-color: #dcdcdc; text-align: left;">
                    <i class="fa-solid fa-scroll-torah"></i>
                    <span class="px-2">Tours đã đặt</span>
                </a>
                <a href="{{ route('logout') }}" class="m_item col-12 btn btn-link text-dark px-3" style="text-decoration: none; text-align: left;">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    <span class="px-2">Đăng xuất</span>
                </a>
            </div>
            <div class="main_container col-9 bg-white p-4 mb-5" style="height: 72vh; overflow-y: scroll;">
                <style>
                    img:hover {
                        opacity: 0.7;
                    }
                </style>
                <?php
                foreach ($tours as $tour) {
                    $sum = ((int)$tour->adults+(int)$tour->childrens*0.5)*(int)$tour->tour_price;
                    $route_tour = route('tour', ['tour_id' => $tour->tour_id]);
                    $route_order_delete = route('order.destroy', $tour->id);
                    echo "
                    <div class='row col-12 m-auto border-bottom border-secondary pb-2 mb-2'>
                        <a href='$route_tour' class='col-2 text-center d-flex' style='align-items: center;'>
                            <img src='/storage/images/tours/$tour->tour_img' alt='' width='100%'>
                        </a>
                        <div class='col-1 text-center d-flex' style='align-items: center;'>
                        </div>
                        <div class='col-5 py-4'>
                            <div style='font-weight: bolder;'>$tour->tour_name</div>
                            <div>Ngày khởi hành (dự kiến): $tour->travel_date</div>
                            <div>Số người lớn: $tour->adults - Số trẻ em: $tour->childrens</div>
                            <div>Trạng tháii: $tour->status</div>
                        </div>
                        <div class='col-4 text-center d-flex flex-wrap' style='align-items: center;'>
                            <div class='col-12'>Tổn tiền: $sum đ</div>
                            <div class='col-6'>
                                <button data-url='$route_order_delete' class='delete_order col-10 btn btn-danger' style='text-decoration: none;'>Hủy tour</button>
                            </div>
                            <div class='col-6'>
                                <button data-url='' value='$tour->id' class='order_show_edit_btn col-10 btn btn-primary' style='text-decoration: none;'>Đặt lại</button>
                            </div>
                        </div>
                    </div>
                ";
                }
                ?>
                <?php foreach($tours as $tour){ ?>
                @include('order.edit')
                <?php } ?>
            </div>
        </div>
    </div>
</body>
@include('footer')
<script language="javascript" type="text/javascript" src="{{ asset('/frontend/js/main.js') }}"></script>
<script language="javascript" type="text/javascript" src="{{ asset('/frontend/js/ajax.js') }}"></script>

</html>