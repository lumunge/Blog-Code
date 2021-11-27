var moddy = document.getElementById("simplemodal");
var bty = document.getElementById("modalBtn");
var clse = document.getElementsByClassName("closeBtn")[0];

bty.addEventListener("click", openModal);
clse.addEventListener("click", closeModal);
window.addEventListener("click", outsideClick);

function openModal() {
  moddy.style.display = "block";
}
function closeModal() {
  moddy.style.display = "none";
}
function outsideClick(e) {
  if (e.target == moddy) {
    moddy.style.display = "none";
  }
}

var simple = document.getElementById("simplemodal2");
var btty = document.getElementById("modalButton");
var cllsse = document.getElementsByClassName("closeButton")[0];

btty.addEventListener("click", modalOpen);
cllsse.addEventListener("click", modalClose);
window.addEventListener("click", clickOutside);

function modalOpen() {
  simple.style.display = "block";
}
function modalClose() {
  simple.style.display = "none";
}
function clickOutside(e) {
  if (e.target == simple) {
    simple.style.display = "none";
  }
}
