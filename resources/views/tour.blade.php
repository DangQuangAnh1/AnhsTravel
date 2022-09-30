@include('head')
<?php
$user = session()->get('user', '');
?>

<body>
    <header style="background-image: url('/storage/images/tours/{{ $tour->tour_img }}'); height: 70vh;">
        @include('header')
    </header>
    <div class="container-fluid bg-white pb-5">
        <div class="col-12 pt-5 pb-2 text-center ">
            <img class="" src="/storage/images/icon-overview.png" alt="">
        </div>
        <div class="col-6 text-dark m-auto text-center" style="font-size: 35px;">
            <p>Tổng quan về chuyến đi</p>
        </div>
        <div class="col-2 m-auto bg-secondary pt-1 mb-4">
        </div>
        <div class="col-8 m-auto text-center pb-4">
            <p>{{ $tour->tour_city }}</p>
        </div>
        <div class="row col-6 m-auto text-center pb-5">
            <div class="col">
                <img class="" src="/storage/images/tours/{{ $tour->tour_img_1 }}" alt="" width="100%">
            </div>
            <div class="col">
                <img class="" src="/storage/images/tours/{{ $tour->tour_img_2 }}" alt="" width="100%">
            </div>
            <div class="col">
                <img class="" src="/storage/images/tours/{{ $tour->tour_img_3 }}" alt="" width="100%">
            </div>
        </div>
        <div class="col-8 m-auto text-center" style="font-size: 22px;">
            <p>{{ $tour->tour_overview }}</p>
        </div>
    </div>
    <div class="container_2 container-fluid text-dark ctn2">
        <div class="icon_next">
            <img src="/storage/images/icon-trip-highlights.png" alt="" class="rounded-circle">
        </div>
        <div class="col-6 text-dark display-6 m-auto text-center pt-5 pb-2">
            <p>Điểm nổi bật của chuyến đi</p>
        </div>
        <div class="col-1 m-auto bg-white pt-1 mb-5">
        </div>
        <div class="row col-12 pb-5">
            <div class="col text-center">
                <img class="" src="/storage/images/tours/{{ $tour->tour_img }}" alt="" width="80%">
            </div>
            <div class="col" style="line-height: 2;">
                <?php
                echo "<i class='fa-solid fa-check'></i>  " . str_replace(". ", ".<br><i class='fa-solid fa-check'></i>  ", $tour->tour_trip);
                ?>
            </div>
        </div>
    </div>
    <div class="container-fluid bg-white pb-5">
        <div class="col-12 pt-5 pb-2 text-center ">
            <img class="" src="/storage/images/icon-itinerary.png" alt="">
        </div>
        <div class="col-6 text-dark m-auto text-center" style="font-size: 35px;">
            <p>Lộ trình</p>
        </div>
        <div class="col-2 m-auto bg-secondary pt-1 mb-4">
        </div>
        <div class="col-8 m-auto text-center pb-4" style="font-size: 22px;">
            <p>
                <?php
                $night = (int)$tour->tour_day - 1;
                echo $tour->tour_name . " - " . "$tour->tour_day ngày/ $night đêm";
                ?>
            </p>
        </div>
    </div>
    <div class="col-10 m-auto pb-5">
        <div id="map" style="width:100%; height:80vh;">
            <input type="hidden" value="{{ $tour->tour_city }}" id="tour_city">
        </div>
    </div>
    <div class="col-10 m-auto pb-5">
        <?php
        foreach ($itineraries as $itinerary) {
            echo "
            <a href='#itinerary$itinerary->day' class='col-12 btn btn-success my-2' style='text-align: left;' data-bs-toggle='collapse'>Ngày $itinerary->day - $itinerary->activate_name</a>
            <div id='itinerary$itinerary->day' class='collapse mx-3'>
                $itinerary->activate
            </div>
            ";
        }
        ?>
    </div>
    <div class="container_2 container-fluid text-dark ctn2 pb-5">
        <div class="icon_next">
            <img src="/storage/images/icon-search-catalogue.png" alt="" class="rounded-circle">
        </div>
        <div class="col-6 text-dark display-6 m-auto text-center pt-5 pb-2">
            <p>Thông tin quan trọng</p>
        </div>
        <div class="col-1 m-auto bg-white pt-1 mb-5">
        </div>
        <div id="myGroup" class="row col-6 m-auto">
            <a href='#include' class='col btn btn-success m-2 tex-center' data-bs-toggle='collapse' data-parent="#myGroup">Dịch vụ bao gồm</a>
            <a href='#notinclude' class='col btn btn-success m-2 tex-center' data-bs-toggle='collapse' data-parent="#myGroup">Dịch vụ không bao gồm</a>
            <a href='#importantnode' class='col btn btn-success m-2 tex-center' data-bs-toggle='collapse' data-parent="#myGroup">Ghi chú quan trọng</a>
            <div class="accordion-group p-3">
                <div class="collapse" id="include">
                    <p>
                        <i class='fa-solid fa-check' style="color:green"></i>
                        03 người ở trọ trong phòng đôi / 2 giường đơn chung.
                    </p>
                    <p>
                        <i class='fa-solid fa-check' style="color:green"></i>
                        Các bữa ăn như đã đề cập (B = Bữa sáng, L = Bữa trưa, D = Bữa tối).
                    </p>
                    <p>
                        <i class='fa-solid fa-check' style="color:green"></i>
                        Đưa đón bằng xe máy lạnh riêng có tài xế chuyên nghiệp
                    </p>
                </div>
                <div class="collapse" id="notinclude">
                    <p>
                        <i class="fa-solid fa-x" style="color:red"></i>
                        Hướng dẫn viên Escosted.
                    </p>
                    <p>
                        <i class="fa-solid fa-x" style="color:red"></i>
                        Các bữa ăn và dịch vụ khác ngoài đã đề cập.
                    </p>
                    <p>
                        <i class="fa-solid fa-x" style="color:red"></i>
                        Các chuyến bay quốc tế và nội địa.
                    </p>
                    <p>
                        <i class="fa-solid fa-x" style="color:red"></i>
                        Giặt giũ, gọi điện thoại và chi tiêu mang tính chất cá nhân.
                    </p>
                    <p>
                        <i class="fa-solid fa-x" style="color:red"></i>
                        Tiền bo và bảo hiểm du lịch.
                    </p>
                </div>
                <div class="collapse" id="importantnode">
                    <p>- Chúng tôi đặc biệt khuyên bạn nên mua bảo hiểm du lịch (bao gồm việc sơ tán y tế khẩn cấp) cho các chuyến đi đến Việt Nam.</p>
                    <p>- Giá có hiệu lực trong 30 ngày kể từ ngày cung cấp. Quá ngày này giá và các điều kiện có thể được điều chỉnh lại.</p>
                    <p>- Giá vé máy bay có thể thay đổi mà không được hãng hàng không thông báo trước.</p>
                    <p>- Các đặt phòng trong thời gian cao điểm (Giáng sinh, Tết Dương lịch, Tết Nguyên đán, các ngày lễ Quốc gia) có thể bị tính phụ phí.</p>
                    <p>- Phòng tại các khách sạn chỉ được cung cấp từ 1400 ngày đến cho đến 1200 vào ngày khởi hành. Phụ phí sẽ được thêm vào nếu muốn nhận phòng sớm hoặc trả phòng trễ.</p>
                    <p>- Xin lưu ý rằng tất cả các dịch vụ & tour du lịch trên vẫn chưa được đặt trước, chúng chỉ được đề xuất để cung cấp thông tin của bạn và chúng tôi sẽ không thực hiện bất kỳ đặt chỗ nào trước khi chúng tôi nhận được xác nhận của bạn để thực hiện.</p>
                    <p>- Nếu một hoặc một số (các) dịch vụ được đề xuất không có sẵn tại thời điểm đặt phòng, chúng tôi sẽ cố gắng tìm các khả năng / tùy chọn khác hoặc (các) dịch vụ tương tự khác để tránh thay đổi chương trình.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid bg-white pb-5">
        <div class="col-12 pt-5 pb-2 text-center ">
            <img class="" src="/storage/images/icon-itinerary.png" alt="">
        </div>
        <div class="col-6 text-dark m-auto text-center" style="font-size: 35px;">
            <p>Đặt Tour</p>
        </div>
        <div class="col-2 m-auto bg-secondary pt-1 mb-4">
        </div>
        <div class="row col-6 m-auto p-3">
            <div class='col text-center' id="like_div">
                <?php
                if ($like) {
                    $route_like_delete = route('like.destroy', $like->id);
                    echo "
                    <button data-url='$route_like_delete' class='col-10 btn bg-danger text-white' id='delete_like'>Xóa khỏi danh sách yêu thích</button>
                ";
                } else {
                    $route_like = route('like.store');
                    echo "
                    <form data-url='$route_like' id='like_form' method='POST'>
                    <input type='hidden' id='user_id' name='user_id' value='$user->id'>
                    <input type='hidden' id='tour_id' name='tour_id' value='$tour->id'>
                    <button type='submit' class='col-10 btn btn-primary' id='add_like'>Thêm vào danh sách yêu thích</button>
                    </form>
                ";
                }
                ?>
            </div>

            <div class="col text-center">
                <button class="col-10 btn btn-success" id="btn-add-order">Đặt Tour ngay</button>
            </div>
            @include('order.add')
        </div>
    </div>
    <div class="container_2 container-fluid text-dark ctn2">
        <div class="icon_next">
            <img src="/storage/images/i3.jpg" alt="" class="rounded-circle">
        </div>
        <div class="col-6 text-dark display-6 m-auto text-center pt-5 pb-2">
            <p>Chuyến đi tương tự bạn có thể thích</p>
        </div>
        <div class="col-1 m-auto bg-white pt-1 mb-4">
        </div>
        <div class="col-6 m-auto text-center mb-5" style="font-size: 22px;">
            <p>
                Không hoàn toàn đúng hoặc vẫn cần thêm một số cảm hứng? Hãy xem các hành trình bên dưới và khám phá xem những người khác thích chuyến tham quan này cũng đã xem xét điều gì!
            </p>
        </div>
        <div class="row col-10 m-auto pb-5">
            <?php
            foreach ($tour_similar as $tour) {
                $route_tour = route('tour', ['tour_id' => $tour->id]);
                $night = (int)$tour->tour_day - 1;
                echo ("
                    <a class='col m-2 nation_box' href='$route_tour'>
                        <img class='tour_img' src='/storage/images/tours/$tour->tour_img' alt=''>
                        <div class='col title_tour tt1 m-0 text-center text-white'>
                            <div class='col-10 m-auto pt-2' style='font-size: 22px;'>
                                $tour->tour_name
                            </div>
                            <div class='col-8 m-auto pt-1' style='font-size: 20px;'>
                                $tour->nation_name
                            </div>
                            <div class='col-8 m-auto px-1' style='font-size: 20px;'>
                                <img src='/storage/images/icon-vietnam.png' alt='' style='height: 20px;'>
                            </div>
                        </div>
                        <div class='col title_tour tt2 m-0 text-center text-white'>
                            <div class='col-10 m-auto pb-2' style='font-size: 22px;'>
                                $tour->tour_day ngày/ $night đêm
                            </div>
                        </div>
                    </a>
                ");
            }
            ?>
        </div>
    </div>
    <div class="container-fluid bg-white pb-5">
        <div class="col-12 pt-5 pb-2 text-center ">
            <img class="" src="/storage/images/icon-getIntouch.png" alt="">
        </div>
        <div class="col-6 text-dark m-auto text-center" style="font-size: 35px;">
            <p>Liên lạc với chúng tôi</p>
        </div>
        <div class="col-2 m-auto bg-secondary pt-1 mb-4">
        </div>
        <div class="col-8 m-auto text-center mb-4" style="font-size: 22px;">
            <p>
                Chúng tôi thích nói chuyện về du lịch. Nếu bạn có bất kỳ câu hỏi nào, vui lòng liên hệ với chúng tôi. Chúng tôi ở đây để giúp đỡ!
            </p>
        </div>
        <div class="col-2 m-auto text-center mb-4">
            <button type="button" class="btn btn-outline-success px-4" id="btn-add" style="font-size: 18px;">
                <i class="fa-regular fa-message"></i>
                <span>Liên hệ ngay</span>
            </button>
        </div>
        @include('talk.add')
    </div>
</body>
@include('footer')

<script language="javascript" type="text/javascript" src="{{ asset('/frontend/js/map.js') }}"></script>
<script language="javascript" type="text/javascript" src="{{ asset('/frontend/js/scroll.js') }}"></script>
<script language="javascript" type="text/javascript" src="{{ asset('/frontend/js/main.js') }}"></script>
<script language="javascript" type="text/javascript" src="{{ asset('/frontend/js/ajax.js') }}"></script>

</html>