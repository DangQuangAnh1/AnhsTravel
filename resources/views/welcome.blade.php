@include('head')
<?php
    $user = session()->get('user', '');
?>
<body>
    <header class="main_header">
        @include('header')
        <div class="col-12 text-white slogan">
            <h1 style="font-size: 64px;">EXPERIENCE OUR WONDERS</h1>
            <div class="row p-10">
                <div class="col-6">
                    <form action="{{ route('search') }}" method="POST">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="input-group" style="justify-content: flex-end;">
                            <div class="form-outline" id="haha">
                                <input type="text" id="form1" name="search_input" class="form-control" placeholder="Tìm kiếm..." />
                            </div>
                            <button class="btn btn-success" style="z-index: 1;">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </form>
                </div>
                <div class="col-6 text-white" style="text-align: left;">
                    <button type="button" class="btn btn-secondary" id="btn-add">
                        <i class="fa-regular fa-message"></i>
                        <span>LIÊN LẠC</span>
                    </button>
                </div>
            </div>
        </div>
    </header>
    @include('talk.add')
    <div class="container-fluid bg-white pb-5">
        <div class="col-12 pt-5 pb-1 text-center ">
            <img class="" src="/storage/images/logo.png" alt="" style="height: 150px;">
        </div>
        <div class="col-6 text-dark display-5 m-auto text-center">
            <p>WHY ANHS TRAVEL</p>
        </div>
        <div class="col-2 m-auto bg-secondary pt-1 mb-3">
        </div>
        <div id="demo" class="carousel slide col-8 m-auto pb-5" data-bs-ride="carousel" style="position: relative;">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="row pt-4">
                        <div class="col">
                            <div class="col-3 m-auto border border-success rounded-circle p-4">
                                <img src="/storage/images/price.png" class="rounded-circle" style="width:100%">
                            </div>
                            <div class="col-12 my-3 mx-auto">
                                <h3 class="text-center text-success text-uppercase">Giá tốt nhất</h3>
                            </div>
                            <div class="col-8 m-auto">
                                <p class="text-center" style="font-size: 22px;">Không có chi phí phát sinh & giá tốt nhất thị trường</p>
                            </div>
                        </div>
                        <div class="col">
                            <div class="col-3 m-auto border border-success rounded-circle p-4">
                                <img src="/storage/images/service.png" class="rounded-circle" style="width:100%">
                            </div>
                            <div class="col-12 my-3 mx-auto">
                                <h3 class="text-center text-success text-uppercase">Nhiều dịch vụ</h3>
                            </div>
                            <div class="col-8 m-auto">
                                <p class="text-center" style="font-size: 22px;">Bạn luôn an toàn và được hỗ trợ khi đi du lịch</p>
                            </div>
                        </div>
                        <div class="col">
                            <div class="col-3 m-auto border border-success rounded-circle p-4">
                                <img src="/storage/images/trust.jpg" class="rounded-circle" style="width:100%">
                            </div>
                            <div class="col-12 my-3 mx-auto">
                                <h3 class="text-center text-success text-uppercase">Uy tín</h3>
                            </div>
                            <div class="col-8 m-auto">
                                <p class="text-center" style="font-size: 22px;">Bạn luôn nhận được sự tư vấn cởi mở và trung thực</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="row">
                        <div class="col">
                            <div class="col-3 m-auto border border-success rounded-circle p-4">
                                <img src="/storage/images/expertise.png" class="rounded-circle" style="width:100%">
                            </div>
                            <div class="col-12 my-3 mx-auto">
                                <h3 class="text-center text-success text-uppercase">Nhiều trải nghiệm</h3>
                            </div>
                            <div class="col-8 m-auto">
                                <p class="text-center" style="font-size: 22px;">Vượt qua giới hạn của bạn và trải nghiệm một cuộc phiêu lưu</p>
                            </div>
                        </div>
                        <div class="col">
                            <div class="col-3 m-auto border border-success rounded-circle p-4">
                                <img src="/storage/images/safety.jpg" class="rounded-circle" style="width:100%">
                            </div>
                            <div class="col-12 my-3 mx-auto">
                                <h3 class="text-center text-success text-uppercase">An toàn</h3>
                            </div>
                            <div class="col-8 m-auto">
                                <p class="text-center" style="font-size: 22px;">An toàn của khách hàng là ưu tiên hàng đầu của chúng tôi</p>
                            </div>
                        </div>
                        <div class="col">
                            <div class="col-3 m-auto border border-success rounded-circle p-4">
                                <img src="/storage/images/customization.png" class="rounded-circle" style="width:100%">
                            </div>
                            <div class="col-12 my-3 mx-auto">
                                <h3 class="text-center text-success text-uppercase">Nhiều tùy chỉnh</h3>
                            </div>
                            <div class="col-8 m-auto">
                                <p class="text-center" style="font-size: 22px;">Điều chỉnh phù hợp với nhu cầu du lịch của bạn</p>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </button>
            </div>
        </div>
    </div>
    <div class="container_2 container-fluid text-dark ctn2 mt-5 pb-5">
        <div class="icon_next">
            <img src="/storage/images/icon-our-asia.svg" alt="icon-our-asia.svg">
        </div>
        <div class="col-6 text-dark display-6 m-auto text-center pt-5 pb-2">
            <p>QUỐC GIA</p>
        </div>
        <div class="col-1 m-auto bg-white pt-1 mb-3">
        </div>
        <div class="col-6 text-secondary m-auto text-center pb-5" style="font-size: 22px;">
            <p>Mỗi quốc gia là quê hương của một số nền văn hóa đầy màu sắc nhất thế giới và những điểm đến kỳ lạ, mỗi chuyến đi là một bữa tiệc thực sự cho các giác quan. Đi sâu vào lựa chọn quốc gia của chúng tôi để khám phá một loạt các hành trình thú vị, đầy cảm hứng.</p>
        </div>
        <div class="col-10 m-auto">
            <div class="row">
                <a class="col m-2 nation_box" href="{{ route('nation',['nation_name' => 'Việt Nam']) }}">
                    <img class="nation_img" src="/storage/images/vietnam.jpeg" alt="">
                    <div class="title_country row text-white text-center m-0">
                        <div class="row p-2">
                            <div class="col" style="text-align: right;">VIỆT NAM</div>
                            <div class="col" style="text-align: left;">
                                <img src="/storage/images/icon-vietnam.png" alt="" style="height: 80%;">
                            </div>
                        </div>
                    </div>
                    <div class="detail_country row text-white text-center m-0">
                        <p>Với sự lựa chọn ấn tượng về các khu nghỉ dưỡng, ẩn náu, nhà nghỉ và khách sạn tại Việt Nam, đất nước này thực sự là một thiên đường lựa chọn cho những du khách sành điệu. Chúng tôi đã lựa chọn cẩn thận những khách sạn tốt nhất ở Việt Nam để đảm bảo khách hàng của chúng tôi nhận được dịch vụ hoàn hảo chỉ trong môi trường tốt nhất.</p>
                    </div>
                </a>
                <a class="col m-2 nation_box" href="{{ route('nation',['nation_name' => 'Lào']) }}">
                    <img class="nation_img" src="/storage/images/lao.jpg" alt="">
                    <div class="title_country row text-white text-center m-0">
                        <div class="row p-2">
                            <div class="col" style="text-align: right;">LÀO</div>
                            <div class="col" style="text-align: left;">
                                <img src="/storage/images/icon-laos.png" alt="" style="height: 80%;">
                            </div>
                        </div>
                    </div>
                    <div class="detail_country row text-white text-center m-0">
                        Dân làng Katang của miền Trung Lào ngủ với thần rừng. Thiên nhiên sống động, cảnh quan vùng đất gợi cảm và nền văn hóa sôi động cùng với quá khứ vui vẻ và tương lai lạc quan khiến Lào trở thành một trải nghiệm bí ẩn cho những người ưa mạo hiểm.
                    </div>
                </a>
            </div>
            <div class="row">
                <a class="col m-2 nation_box" href="{{ route('nation',['nation_name' => 'Campuchia']) }}">
                    <img class="nation_img" src="/storage/images/campuchia.jpg" alt="">
                    <div class="title_country row text-white text-center m-0">
                        <div class="row p-2">
                            <div class="col" style="text-align: right;">CAMPUCHIA</div>
                            <div class="col" style="text-align: left;">
                                <img src="/storage/images/icon-cambodia.png" alt="" style="height: 80%;">
                            </div>
                        </div>
                    </div>
                    <div class="detail_country row text-white text-center m-0">
                        Sở hữu những ngôi đền 1000 năm tuổi từ ấn tượng nhất trong lịch sử thế giới. Campuchia chắc chắn là vị vua của kỳ quan.
                    </div>
                </a>
                <a class="col m-2 nation_box" href="{{ route('nation',['nation_name' => 'Thái Lan']) }}">
                    <img class="nation_img" src="/storage/images/thailan.jpg" alt="">
                    <div class="title_country row text-white text-center m-0">
                        <div class="row p-2">
                            <div class="col" style="text-align: right;">THÁI LAN</div>
                            <div class="col" style="text-align: left;">
                                <img src="/storage/images/icon-thailand.png" alt="" style="height: 80%;">
                            </div>
                        </div>
                    </div>
                    <div class="detail_country row text-white text-center m-0">
                        Thủ đô Bangkok, thành phố thiên thần, cũng là trung tâm du lịch của Thái Lan, thật thiếu sót nếu bạn dành ít thời gian trong chuyến đi của mình cho nó.
                    </div>
                </a>
                <a class="col m-2 nation_box" href="{{ route('nation',['nation_name' => 'Multi']) }}">
                    <img class="nation_img" src="/storage/images/multi.jpg" alt="">
                    <div class="title_country row text-white text-center m-0">
                        <div class="row p-2">
                            <div class="col-8" style="text-align: right;">MULTI COUNTRI</div>
                        </div>
                    </div>
                    <div class="detail_country row text-white text-center m-0">
                        Du lịch xuyên quốc gia là một hành trình dài. Nếu bạn thấy điều gì đó hấp dẫn, hãy dừng lại và khám phá. Cuộc phiêu lưu sẽ có giá trị hơn dù có thể bạn mất thêm một vài giờ trong quỹ thời gian của mình.
                    </div>
                </a>
            </div>
        </div>
    </div>
    <div class="container-fluid bg-white">
        <div class="col-12 text-center pt-5">
            <img src="/storage/images/icon-all-social.svg" alt="icon-our-asia.svg" style="width:70px;">
        </div>
        <div class="col-6 text-dark display-5 m-auto text-center">
            <p>Tìm cảm hứng cho chuyến đi tiếp theo của bạn</p>
        </div>
        <div class="col-2 m-auto bg-secondary pt-1 mb-3">
        </div>
        <div class="col-10 m-auto mb-3 pb-5">
            <div class="row">
                <a href="{{ route('style',['style_name' => 'Núi']) }}" class="col bg-success p-3 m-2 text-white text-center rounded text-decoration-none">
                    <i class="fa-solid fa-mountain-sun mt-3" style="font-size: 50px;"></i>
                    <div class="title_tour_style col-12 mt-5">
                        <p>Du lịch núi</p>
                    </div>
                    <div class="col -12 mb-3">10 tour +</div>
                </a>
                <a href="{{ route('style',['style_name' => 'Biển']) }}" class="col bg-success p-3 m-2 rounded text-white text-center text-decoration-none">
                    <i class="fa-solid fa-umbrella-beach mt-3" style="font-size: 50px;"></i>
                    <div class="title_tour_style col-12 mt-5">
                        <p>Du lịch biển</p>
                    </div>
                    <div class="col -12 mb-3">10 tour +</div>
                </a>
                <a href="{{ route('style',['style_name' => 'Tự nhiên']) }}" class="col bg-success p-3 m-2 rounded text-white text-center text-decoration-none">
                    <i class="fa-solid fa-seedling mt-3" style="font-size: 50px;"></i>
                    <div class="title_tour_style col-12 mt-5">
                        <p>Thiên nhiên hoang dã</p>
                    </div>
                    <div class="col -12 mb-3">10 tour +</div>
                </a>
                <a href="{{ route('style',['style_name' => 'Thành phố']) }}" class="col bg-success p-3 m-2 rounded text-white text-center text-decoration-none">
                    <i class="fa-solid fa-tree-city mt-3" style="font-size: 50px;"></i>
                    <div class="title_tour_style col-12 mt-5">
                        <p>Du lịch thành phố</p>
                    </div>
                    <div class="col -12 mb-3">10 tour +</div>
                </a>
                <a href="{{ route('style',['style_name' => 'Bảo tàng']) }}" class="col bg-success p-3 m-2 rounded text-white text-center text-decoration-none">
                    <i class="fa-solid fa-building-columns mt-3" style="font-size: 50px;"></i>
                    <div class="title_tour_style col-12 mt-5">
                        <p>Tham quan bảo tàng</p>
                    </div>
                    <div class="col -12 mb-3">10 tour +</div>
                </a>
                <a href="{{ route('style',['style_name' => 'Nghỉ dưỡng']) }}" class="col bg-success p-3 m-2 rounded text-white text-center text-decoration-none">
                    <i class="fa-solid fa-bed mt-3" style="font-size: 50px;"></i>
                    <div class="title_tour_style col-12 mt-5">
                        <p>Chuyến đi nghỉ đưỡng</p>
                    </div>
                    <div class="col -12 mb-3">10 tour +</div>
                </a>
            </div>
        </div>
    </div>
    <div class="container_2 container-fluid text-dark ctn2 mt-5">
        <div class="icon_next">
            <img src="/storage/images/icon-our-asia.svg" alt="icon-our-asia.svg">
        </div>
        <div class="col-6 text-dark display-6 m-auto text-center pt-5 pb-2">
            <p>Chuyến tham quan mới và phổ biến nhất</p>
        </div>
        <div class="col-1 m-auto bg-white pt-1 mb-3">
        </div>
        <div class="col-6 text-secondary m-auto text-center pb-5" style="font-size: 22px;">
            <p>Ở ANHS TRAVEL, chúng tôi cung cấp những dịch vụ tốt nhất cho du khách. Điều này được phản ánh trong một loạt các chuyến tham quan thú vị và phong phú trên khắp thế giới mà chúng tôi đã xây dựng một cách tỉ mỉ. DƯới đây là danh sách rút gọn các chuyến tham quan mà chúng tôi cho rằng bạn sẽ thích nó.</p>
        </div>
        <div class="col-12 pt-5">
            <div class="col-10 m-auto mb-3 pb-5">
                <?php
                    $numTours = count($tours);
                    $count=0;
                    foreach($tours as $tour){
                        $route_tour=route('tour',['tour_id'=>$tour->id]);
                        if($count % 3 == 0){
                            echo ("<div class='row' id='tour_item'>");
                        }
                        $night=(int)$tour->tour_day -1;
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
                        if($count % 3 == 2 || $count==$numTours-1){
                            echo ("</div>");
                        }
                        $count++;
                    }
                ?>
                <div class="col-10 m-auto text-center pt-4">
                    <ul class="pagination m-auto" style="width:fit-content;">
                        <li class="page-item"><button class="page-link text-white bg-success" onclick="nextpage(-1)">Previous</button></li>
                        <div id="page" class="d-flex">
                        </div>
                        <li class="page-item"><button class="page-link text-white bg-success" onclick="nextpage(+1)">Next</button></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="container_3 col-12 bg-white pb-5">
        <div class="col-12 text-center pt-3">
            <img src="/storage/images/icon-getIntouch.png" alt="icon-getIntouch.png" style="width:70px;">
        </div>
        <div class="container-fluid ph_container">
            <div class="col-4 text-dark display-6 m-auto text-center p-3">
                <h2>Khách du lịch của chúng tôi nói gì về chuyến đi</h2>
            </div>
            <div class="col-1 m-auto bg-dark pt-1 mb-3">
            </div>
            <div class="col-8 m-auto">
                <div id="demo_2" class="carousel slide" data-bs-ride="carousel" style="font-size:22px;">

                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="col-8 m-auto text-center p-5">
                                Dịch vụ chăm sóc khách hàng chuyên nghiệp. Hoàn toàn tuyệt vời! Tôi cùng với gia đình đã có chuyến đi đến một trong những bãi biển đẹp nhất mà tôi từng thấy.
                            </div>
                            <div class="col-4 m-auto text-warning text-center" style="font-size: 15px;">
                                <i class="fa-regular fa-star"></i>
                                <i class="fa-regular fa-star"></i>
                                <i class="fa-regular fa-star"></i>
                                <i class="fa-regular fa-star"></i>
                                <i class="fa-regular fa-star"></i>
                            </div>
                            <div class="col-4 m-auto text-dark text-center p-3">
                                <div>Đặng Quang Ánh</div>
                                <div class="text-secondary" style="font-size:15px;">
                                    Hà Nội, Việt Nam
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="col-8 m-auto text-center p-5">
                                Đi du lịch với AnhsTravel làm tôi rất hài lòng vì sự nhiệt tình của Hướng dẫn viên.
                            </div>
                            <div class="col-4 m-auto text-warning text-center" style="font-size: 15px;">
                                <i class="fa-regular fa-star"></i>
                                <i class="fa-regular fa-star"></i>
                                <i class="fa-regular fa-star"></i>
                                <i class="fa-regular fa-star"></i>
                                <i class="fa-regular fa-star"></i>
                            </div>
                            <div class="col-4 m-auto text-dark text-center p-3">
                                <div>Chanatip</div>
                                <div class="text-secondary" style="font-size:15px;">
                                    Bangkok, Thái Lan
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="col-8 m-auto text-center p-5">
                                Tour Cambodia romance dành cho gia đình tôi thật Perfect. Bao giờ về lại Việt Nam sẽ giới thiệu cho bạn bè về AnhsTravel.
                            </div>
                            <div class="col-4 m-auto text-warning text-center" style="font-size: 15px;">
                                <i class="fa-regular fa-star"></i>
                                <i class="fa-regular fa-star"></i>
                                <i class="fa-regular fa-star"></i>
                                <i class="fa-regular fa-star"></i>
                                <i class="fa-regular fa-star"></i>
                            </div>
                            <div class="col-4 m-auto text-dark text-center p-3">
                                <div>Đặng Mạnh Long</div>
                                <div class="text-secondary" style="font-size:15px;">
                                    Hồ Chí Minh, Việt Nam
                                </div>
                            </div>
                        </div>
                    </div>

                    <button class="carousel-control-prev" type="button" data-bs-target="#demo_2" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#demo_2" data-bs-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</body>

@include('footer')

<script language="javascript" type="text/javascript" src="{{ asset('/frontend/js/scroll.js') }}"></script>
<script language="javascript" type="text/javascript" src="{{ asset('/frontend/js/main.js') }}"></script>
<script language="javascript" type="text/javascript" src="{{ asset('/frontend/js/ajax.js') }}"></script>

</html>