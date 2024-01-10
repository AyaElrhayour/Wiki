// add hovered class to selected list item
let list = document.querySelectorAll(".navigation li");

function activeLink() {
  list.forEach((item) => {
    item.classList.remove("hovered");
  });
  this.classList.add("hovered");
}

list.forEach((item) => item.addEventListener("mouseover", activeLink));

// Menu Toggle
let toggle = document.querySelector(".toggle");
let navigation = document.querySelector(".navigation");
let main = document.querySelector(".main");

toggle.onclick = function () {
  navigation.classList.toggle("active");
  main.classList.toggle("active");
};



//Popups


document.getElementById("show-tag").addEventListener("click", function() {
  document.querySelector(".tagpopup").classList.add("active");
});

document.querySelector(".popup .close-btn").addEventListener("click", function() {
  document.querySelector(".tagpopup").classList.remove("active");
});

document.getElementById("show-category").addEventListener("click", function() {
  document.querySelector(".catpopup").classList.add("active");
});

document.querySelector(".popup .close-btn").addEventListener("click", function() {
  document.querySelector(".catpopup").classList.remove("active");
});
