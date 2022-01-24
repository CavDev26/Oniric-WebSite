function addToCart(button, id, imgpath) {
  const xhttp = new XMLHttpRequest();
  xhttp.onload = function () {
    document.getElementById(id).innerHTML = this.responseText;
  };
  xhttp.open("GET", "addToCart.php?cartId=" + id);
  xhttp.send();
  if (button.classList.contains("wideLiteButton")) {
    button.classList.add("disabledWideLite");
    button.classList.remove("wideLiteButton");
  } else if (button.classList.contains("addToCart")) {
    button.classList.add("disabledCartResult");
    button.classList.remove("addToCart");
  }

  button.disabled = "true";
  pushNotifications(
    `articleId=${id}&title=Aggiunto al Carrello&imgpath=${imgpath}`
  );
}
