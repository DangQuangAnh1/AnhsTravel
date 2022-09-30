const myslide = document.querySelectorAll('.myitem');
const myitem = document.querySelectorAll('.box_movie');
const mymenu = document.getElementById("menu");
const boxadd = document.getElementsByClassName("box_add");
const boxedit = document.getElementsByClassName("box_edit");
const data = document.querySelectorAll('.ptmyitem');
let small=0;
let counter = 1;
slidefun(counter);
let timer = setInterval(autoslide, 8000);

function autoslide() {
    counter += 1;
    slidefun(counter);
}

function plusSlide(n) {
    counter += n;
    slidefun(counter);
    resetTimer();
}

function resetTimer() {
    clearInterval(timer);
    timer = setInterval(autoslide, 8000);
}

function slidefun(n) {
    let i;
    for (i = 0; i < myslide.length; i++) {
        myslide[i].style.display = "none";
    }
    if (n > myslide.length) {
        counter = 1;
    }
    if (n < 1) {
        counter = myslide.length;
    }
    myslide[counter - 1].style.display = "flex";
}

function show(){
    if(small==0){
        mymenu.style.width = "20%";
        small=1;
    }
    else{
        mymenu.style.width = "5%";
        small=0;
    }
}

function showBoxAdd(){
    boxadd[0].style.display="block";
}

function showBoxEdit(id){
    boxedit[0].style.display="block";
    document.getElementById("id").value= id;
}

function closeBoxAdd(){
    boxadd[0].style.display="none";
}

function closeBoxEdit(){
    boxedit[0].style.display="none";
}

let stt=1;
let trang=4;
let sotrang=Math.ceil(data.length/trang);
let item=[];
for(let i=1;i<=sotrang;i++){
    document.getElementById("page").innerHTML+='<button onclick="handlepage('+i+')" style="margin-left:5px;background-color:#fff;border: 1px solid rgba(0, 0, 0, 0.3);padding:5px 10px;">'+i+'</button>';
}
function handlepage(key){
    let bd=(key-1)*trang;
    let kt=bd+ trang;
    for(let i=0;i<data.length;i++){
        if(i>=bd && i<kt){
            data[i].style.display="";
        }
        else{
            data[i].style.display="none";
        }
    }
}
for(let i=4;i<data.length;i++){
    data[i].style.display="none";
}
