/* ------------------------------------------------------------------------------------------------ Click menu mobile */
function openNav() {
    var x = document.getElementById("navMobile");
    if (x.className.indexOf("w3-show") === -1) {
        x.className += " w3-show";
    } else {
        x.className = x.className.replace(" w3-show", "");
    }
}

/* --------------------------------------------------------------------------------------------------------- Carousel */

var slideIndex = 1;
showDivs(slideIndex);
//autoRoll();

function autoRoll() {
    plusDivs(1);
    setTimeout(autoRoll, 4000);
}
function plusDivs(n) {
    if(n === undefined)
        n = 1;
    showDivs(slideIndex += n);
}
function showDivs(n) {
    var i;
    var x = document.getElementsByClassName("mySlides");
    if (n > x.length) {slideIndex = 1}
    if (n < 1) {slideIndex = x.length}
    for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
    }
    x[slideIndex-1].style.display = "block";
}
