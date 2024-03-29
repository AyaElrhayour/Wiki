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

document.getElementsByClassName("tagclose-btn")[0].addEventListener("click", function() {
  document.querySelector(".tagpopup").classList.remove("active");
});

const tag_update_btns = document.querySelectorAll(".tagupdate_btn");
const category_update_btns = document.querySelectorAll(".update_category_btn");

tag_update_btns.forEach((btn) => (
  btn.addEventListener("click", function() {
    document.querySelector(".tagmodifypopup").classList.add("active");
  })
  
))
document.getElementsByClassName("tagmodifyclose-btn")[0].addEventListener("click", function() {
  document.querySelector(".tagmodifypopup").classList.remove("active");
});

document.querySelector(".categorymodifyclose-btn").addEventListener("click", () => {
  document.querySelector(".categorymodifypopup").classList.remove("active");
})

category_update_btns.forEach((btn) => (
  btn.addEventListener("click", function() {
    document.querySelector(".categorymodifypopup").classList.add("active");
  })
  
))




document.getElementById("show-category").addEventListener("click", function() {
  document.querySelector(".catpopup").classList.add("active");
});

document.getElementsByClassName("catclose-btn")[0].addEventListener("click", function() {
  document.querySelector(".catpopup").classList.remove("active");
});

//get id and name 

const categoryIdInput = document.getElementById("categoryID");
const categoryNameInput = document.getElementById("categoryName");
const updateBtnCategory = document.querySelectorAll(".update_category_btn");

updateBtnCategory.forEach((btn) => (
  btn.addEventListener("click", ()=>{
    categoryIdInput.value = btn.parentElement.childNodes[1].value
    categoryNameInput.value = btn.parentElement.parentElement.childNodes[1].textContent
   
  })
  
));


const tagIdInput = document.getElementById("tagID");
const tagNameInput = document.getElementById("tagName");
const updateBtnTag = document.querySelectorAll(".tagupdate_btn");

updateBtnTag.forEach((btn) => (
  btn.addEventListener("click", ()=>{
    tagIdInput.value = btn.parentElement.childNodes[1].value
    tagNameInput.value = btn.parentElement.parentElement.childNodes[1].textContent
   
  })
  
));