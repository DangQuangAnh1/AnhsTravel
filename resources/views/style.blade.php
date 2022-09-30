@include('head')

<body>
    <header style="background-image: url('/storage/images/style/{{ $style->style_img }}'); height: 70vh;">
        @include('header')
    </header>
    <div class="container-fluid bg-white pb-5">
        <div class="col-12 pt-5 pb-2 text-center ">
            <img class="" src="/storage/images/icon-search-catalogue.png" alt="">
        </div>
        <div class="col-6 text-dark m-auto text-center" style="font-size: 35px;">
            <p>Du lịch {{ $style->style_name }}</p>
        </div>
        <div class="col-2 m-auto bg-secondary pt-1 mb-5">
        </div>
        <div class="col-8 text-dark m-auto text-center pb-5" style="font-size: 22px;">
            <p>{{ $style->style_describe }}</p>
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
</body>

@include('footer')

<script language="javascript" type="text/javascript" src="{{ asset('/frontend/js/scroll.js') }}"></script>
<script language="javascript" type="text/javascript" src="{{ asset('/frontend/js/main.js') }}"></script>
<script language="javascript" type="text/javascript" src="{{ asset('/frontend/js/ajax.js') }}"></script>

</html>