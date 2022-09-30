window.addEventListener('scroll', () =>{
    var header= document.getElementById("menu_header");
    if(document.documentElement.scrollTop>30 || document.body.scrollTop > 30){
        header.style.position="fixed";
        header.style.top="0px";
        header.style.backgroundColor= "rgba(255, 255, 255, 1)";
        header.style.color= "#777";
    }
    else{
        header.style.position="absolute";
        header.style.top="30px";
        header.style.backgroundColor= "rgba(255, 255, 255, 0.5)";
        header.style.color= "white";
    }
})