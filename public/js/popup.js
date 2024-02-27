var popup = document.querySelector(".popup");
var close = document.querySelector(".close");
var dismiss2 = document.querySelector(".popup__dismiss2");

setTimeout(function() {
    popup.classList.add("popup--show");
}, 0.500);

close.addEventListener("click",function(){
    console.log("kill dismiss");
    popup.classList.remove("popup--show");
    popup.classList.add("popup--close");
});


dismiss2.addEventListener("click", function() {
    console.log("kill");
});
