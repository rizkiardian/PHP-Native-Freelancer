function ShowPsw() {
  var Psw = document.getElementById("Psw");
  var Icon = document.getElementById("Psw-Icon");
  if (Psw.type === "password") {
    Psw.type = "text";
    Icon.className = "far fa-eye";
  } else {
    Psw.type = "password";
    Icon.className = "far fa-eye-slash";
  }
}

function ShowPswConfirmation() {
  var PswConfirmation = document.getElementById("PswConfirmation");
  var IconConfirmation = document.getElementById("PswConfirmation-Icon");
  if (PswConfirmation.type === "password") {
    PswConfirmation.type = "text";
    IconConfirmation.className = "far fa-eye";
  } else {
    PswConfirmation.type = "password";
    IconConfirmation.className = "far fa-eye-slash";
  }
}
