const data = document.querySelectorAll("#tour_item");
let page = document.getElementById("page");
let stt = 1;
let trang = 2;
let sotrang = Math.ceil(data.length / trang);
let item = [];
let key = 1;

function handlepage(key) {
    let start = (key - 1) * trang;
    let end = start + trang;
    for (let i = 0; i < data.length; i++) {
        if (i >= start && i < end) {
            data[i].style.display = "";
        }
        else {
            data[i].style.display = "none";
        }
    }
}

function nextpage(value) {
    key += value;
    if (key < 1) {
        handlepage(1);
    }
    else if (key > sotrang) {
        handlepage(sotrang);
    }
    else {
        handlepage(key);
    }
}

for (let i = 1; i <= sotrang; i++) {
    document.getElementById("page").innerHTML += '<li class="page-item"><button class="page-link text-white bg-success" onclick="handlepage(' + i + ')">' + i + '</button></li>';
}

for (let i = trang; i < data.length; i++) {
    data[i].style.display = "none";
}

var small=0;

document.getElementById("hide_menu").addEventListener("click", function () {
    mymenu=document.getElementById("menu_left");
    if(small==0){
        mymenu.style.width = "20vw";
        $("#company_name").html("Anhs Travel");
        $("#navigation").html("Liên kết");
        $("#myChart").css("width:50%");
        $("#myChart1").css("width:50%");
        $("#myChart2").css("width:50%");
        small=1;
    }
    else{
        mymenu.style.width = "5vw";
        $("#company_name").html("A");
        $("#navigation").html("");
        $("#myChart").css("width:100%");
        $("#myChart1").css("width:100%");
        $("#myChart2").css("width:100%");
        small=0;
    }
});