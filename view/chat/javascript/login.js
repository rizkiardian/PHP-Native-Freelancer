const form = document.querySelector(".login form"),
continueBtn = form.querySelector(".button input"),
errorText = form.querySelector(".error-text");

form.onsubmit = (e) => {
  e.preventDefault();
}

continueBtn.onclick = () => {
  // Let's start an Ajax request
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "php/login.php", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response;
        console.log(data);
        if (data === "success") {
          location.href = "users.php"; // Corrected path without backticks

        } else {
          errorText.textContent = data;
          errorText.style.display = "block";
        }
      }
    }
  }
  // Send the form data via Ajax to the PHP script
  let formData = new FormData(form);
  xhr.send(formData);
}
