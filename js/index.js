const hamburer = document.querySelector(".hamburger");
const navList = document.querySelector(".nav-list");

if (hamburer) {
  hamburer.addEventListener("click", () => {
    navList.classList.toggle("open");
  });
}

// Popup
const popup = document.querySelector(".popup");
const closePopup = document.querySelector(".popup-close");

if (popup) {
  closePopup.addEventListener("click", () => {
    popup.classList.add("hide-popup");
  });

  window.addEventListener("load", () => {
    setTimeout(() => {
      popup.classList.remove("hide-popup");
    }, 1000);
  });
}

// js quantity

var incrementButton = document.getElementsByClassName('inc');
var decrementButton = document.getElementsByClassName('dec');

// console.log(incrementButton);
// console.log(decrementButton);

//INCREMENT
for(var i = 0; i < incrementButton.length; i++){
  var button = incrementButton[i];
  button.addEventListener('click',function(event){
    var buttonClicked = event.target;
    // console.log(buttonClicked);
    var input = buttonClicked.parentElement.children[1];
    // console.log(input);
    var inputValue = input.value;
    // console.log(inputValue);
    var newValue = parseInt(inputValue) + 1;
    // console.log(newValue);
    input.value = newValue;
  })
}

//DESREMENT
for(var i = 0; i < decrementButton.length; i++){
  var button = decrementButton[i];
  button.addEventListener('click',function(event){
    var buttonClicked = event.target;
    // console.log(buttonClicked);
    var input = buttonClicked.parentElement.children[1];
    // console.log(input);
    var inputValue = input.value;
    // console.log(inputValue);
    var newValue = parseInt(inputValue) - 1;
    // console.log(newValue);
    if(newValue >=1){
      input.value = newValue;
    }else{
      input.value = 1;
    }
    
  })
}

// const inputs = document.querySelectorAll(".input-text-login");


// function addcl(){
// 	let parent = this.parentNode.parentNode;
// 	parent.classList.add("focus");
// }

// function remcl(){
// 	let parent = this.parentNode.parentNode;
// 	if(this.value == ""){
// 		parent.classList.remove("focus");
// 	}
// }


// inputs.forEach(input => {
// 	input.addEventListener("focus", addcl);
// 	input.addEventListener("blur", remcl);
// });

