var Input = document.getElementById("Psw");
var Valid = document.getElementById("Psw-Validation");
var IconValid = document.getElementById("Psw-Icon-Valid");
var IconInvalid = document.getElementById("Psw-Icon-Invalid");

var InputConfirmation = document.getElementById("PswConfirmation");
var ValidConfirmation = document.getElementById("PswConfirmation-Validation");
var IconValidConfirmation = document.getElementById(
  "PswConfirmation-Icon-Valid"
);
var IconInvalidConfirmation = document.getElementById(
  "PswConfirmation-Icon-Invalid"
);

// Validate lowercase letters
var lowerCaseLetters = /[a-z]/g;
// Validate capital letters
var upperCaseLetters = /[A-Z]/g;
// Validate numbers
var numbers = /[0-9]/g;

//Password check
function pswCheck() {
  var validation1 =
    (Input.value.match(lowerCaseLetters) ||
      Input.value.match(upperCaseLetters)) &&
    Input.value.match(numbers) &&
    Input.value.length >= 6;
  var validation2 = InputConfirmation.value == Input.value;
  if (validation1) {
    Valid.style.display = "none";
    IconValid.style.display = "block";
    IconInvalid.style.display = "none";
  } else {
    Valid.style.display = "block";
    IconValid.style.display = "none";
    IconInvalid.style.display = "block";
  }
}
Input.onfocus = () => {
  pswCheck();
};
Input.onkeyup = () => {
  pswCheck();
};

//Confirmation check
function pswConfirmationCheck() {
  var validation1 =
    (Input.value.match(lowerCaseLetters) ||
      Input.value.match(upperCaseLetters)) &&
    Input.value.match(numbers) &&
    Input.value.length >= 6;
  var validation2 = InputConfirmation.value == Input.value;
  if (validation2 && validation1) {
    ValidConfirmation.style.display = "none";
    IconValidConfirmation.style.display = "block";
    IconInvalidConfirmation.style.display = "none";
  } else if (validation2) {
    ValidConfirmation.style.display = "block";
    ValidConfirmation.innerHTML = "*Password masih tidak valid";
    IconValidConfirmation.style.display = "none";
    IconInvalidConfirmation.style.display = "block";
  } else {
    ValidConfirmation.style.display = "block";
    ValidConfirmation.innerHTML = "*Password tidak cocok";
    IconValidConfirmation.style.display = "none";
    IconInvalidConfirmation.style.display = "block";
  }
}
InputConfirmation.onfocus = function () {
  pswConfirmationCheck();
};
InputConfirmation.onkeyup = function () {
  pswConfirmationCheck();
};

function validateForm(form) {
  var Input = document.getElementById("Psw");
  var InputConfirmation = document.getElementById("PswConfirmation");
  var validation1 =
    (Input.value.match(lowerCaseLetters) ||
      Input.value.match(upperCaseLetters)) &&
    Input.value.match(numbers) &&
    Input.value.length >= 6;
  var validation2 = InputConfirmation.value == Input.value;
  if (validation2 && validation1) {
    console.log("true cond");
    return true;
  } else if (validation1) {
    console.log("false cond1");
    InputConfirmation.focus();
    return false;
  } else {
    console.log("false cond2");
    Input.focus();
    return false;
  }
}
