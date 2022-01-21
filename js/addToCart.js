function addToCart(button, id) {
  const xhttp = new XMLHttpRequest();
  xhttp.onload = function () {
    document.getElementById("cartButton").innerHTML = this.responseText;
  };
  xhttp.open("GET", "addToCart.php?cartId=" + id);
  xhttp.send();
  button.classList.add("disabledWideLite");
  button.classList.remove("wideLiteButton");
  button.disabled = "true";
}
