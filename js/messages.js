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
