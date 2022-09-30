@include('head')

<body>
    <header style="background-image: url('/storage/images/nation/{{ $nation->nation_img }}'); height: 70vh;">
        @include('header')
    </header>
    <div class="container-fluid bg-white pb-5">
        <div class="col-12 pt-5 pb-2 text-center ">
            <img class="" src="/storage/images/nation/{{ $nation->nation_icon }}" alt="" style="height: 40px; filter: invert(100%);">
        </div>
        <div class="col-6 text-dark m-auto text-center" style="font-size: 35px;">
            <p>Chào mừng bạn đến với {{ $nation->nation_name }}</p>
        </div>
        <div class="col-2 m-auto bg-secondary pt-1 mb-5">
        </div>
        <div class="col-8 text-dark m-auto text-center pb-5" style="font-size: 22px;">
            <p>{{ $nation->nation_describe }}</p>
        </div>
        <div class="row col-10 text-dark m-auto text-center" style="font-size: 24px;">
            <div class="col">
                <i class="fa-solid fa-users"></i>
                <p>Dân số</p>
                <p>{{ $nation->population }}</p>
            </div>
            <div class="col">
                <i class="fa-solid fa-chart-area"></i>
                <p>Diện tích</p>
                <p>{{ $nation->area }}</p>
            </div>
            <div class="col">
                <i class="fa-solid fa-language"></i>
                <p>Ngôn ngữ</p>
                <p>{{ $nation->language }}</p>
            </div>
            <div class="col">
                <i class="fa-solid fa-coins"></i>
                <p>Tiền tệ</p>
                <p>{{ $nation->currency }}</p>
            </div>
            <div class="col">
                <i class="fa-solid fa-cloud"></i>
                <p>Kiểu thời tiết</p>
                <p>{{ $nation->weather }}</p>
            </div>
            <div class="col">
                <i class="fa-regular fa-clock"></i>
                <p>Múi giờ</p>
                <p>{{ $nation->timezone }}</p>
            </div>
        </div>
        <div class="col-8 m-auto py-5">
            <img src="/storage/images/nation/{{ $nation->nation_map }}" alt="" width="100%">
        </div>
    </div>
    <div class="container_2 container-fluid text-dark ctn2">
        <div class="icon_next">
            <img src="/storage/images/i3.jpg" alt="" class="rounded-circle">
        </div>
        <div class="col-6 text-dark display-6 m-auto text-center pt-5 pb-2">
            <p>{{ $nation->nation_name }} Tours</p>
        </div>
        <div class="col-1 m-auto bg-white pt-1">
        </div>
        <div class="col-12 pt-5">
            <div class="col-10 m-auto mb-3 pb-5">
                <?php
                $numTours = count($tours);
                $count = 0;
                foreach ($tours as $tour) {
                    $route_tour=route('tour',['tour_id'=>$tour->id]);
                    if ($count % 3 == 0) {
                        echo ("<div class='row' id='tour_item'>");
                    }
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
                    if ($count % 3 == 2 || $count == $numTours - 1) {
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
    <div class="container-fluid bg-white pb-5">
        <div class="col-12 pt-5 pb-2 text-center ">
            <img class="" src="/storage/images/i5.jpg" alt="" class="rounded-circle">
        </div>
        <div class="col-6 text-dark m-auto text-center" style="font-size: 35px;">
            <p>Thời tiết trong năm</p>
        </div>
        <div class="col-2 m-auto bg-secondary pt-1 mb-5">
        </div>
        <div class="col-6 text-secondary m-auto text-center pb-5" style="font-size: 22px;">
            <p>Thời tiết Việt Nam trải dài từ hệ thống bốn mùa quen thuộc ở miền Bắc đến mùa hè vĩnh cửu ở miền Nam. Vì sự khác biệt giữa các vùng miền, có những địa điểm thú vị để đến thăm ở Việt Nam quanh năm.</p>
        </div>
        <div class="col-10 m-auto pb-5">
            <img src="/storage/images/nation/vietnam_weather.png" alt="" width="100%">
        </div>
    </div>
</body>

@include('footer')

<script language="javascript" type="text/javascript" src="{{ asset('/frontend/js/scroll.js') }}"></script>
<script language="javascript" type="text/javascript" src="{{ asset('/frontend/js/main.js') }}"></script>
<script language="javascript" type="text/javascript" src="{{ asset('/frontend/js/ajax.js') }}"></script>

</html>