var click = document.getElementById("clicked")
var imgclick = document.getElementsByClassName("img-resp")
var unclick = document.getElementById("clicked")
var navclick = document.getElementById("nav-click")
function para(){
        click.style.display="block";
        click.style.overflow = "scroll";
        imgclick.style.width ="150px";
}
function para2(){
         unclick.style.display ='none'
}
function shownav(){
        navclick.style.display='block'
        
}
function hidenav(){
              navclick.style.display ='none'
}