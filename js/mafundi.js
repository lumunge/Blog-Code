//modals
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

//modals2
var moddy2 = document.getElementById("simplemodal2");
var bty2 = document.getElementById("modalBtn2");
var clse2 = document.getElementsByClassName("closeBtn2")[0];

bty2.addEventListener("click", openModal2);
clse2.addEventListener("click", closeModal2);
window.addEventListener("click", outsideClick2);

function openModal2() {
  moddy2.style.display = "block";
}
function closeModal2() {
  moddy2.style.display = "none";
}
function outsideClick2(e) {
  if (e.target == moddy2) {
    moddy2.style.display = "none";
  }
}

//modals3
var moddy3 = document.getElementById("simplemodal3");
var bty3 = document.getElementById("modalBtn3");
var clse3 = document.getElementsByClassName("closeBtn3")[0];

bty3.addEventListener("click", openModal3);
clse3.addEventListener("click", closeModal3);
window.addEventListener("click", outsideClick3);

function openModal3() {
  moddy3.style.display = "block";
}
function closeModal3() {
  moddy3.style.display = "none";
}
function outsideClick3(e) {
  if (e.target == moddy3) {
    moddy3.style.display = "none";
  }
}

$(function() {
  $("form").submit(function() {
    alert(
      "Thank you for choosing Mafundi Services Your Form Will Be Processed Shortly"
    );
  });
});
