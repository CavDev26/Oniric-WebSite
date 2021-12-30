function togglePassword(element) {
  var input = element.previousElementSibling;
  if (input.type == "password") {
    input.type = "text";
    element.innerHTML = "visibility_off";
  } else {
    input.type = "password";
    element.innerHTML = "visibility";
  }
}
