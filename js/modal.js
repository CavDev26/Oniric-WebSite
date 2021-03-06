// Get the modal
var modal = document.querySelectorAll(".modal , .profileModal");
// Get the button that opens the modal
var btn = document.querySelectorAll(
  ".modalButton , .modalModify , .remove-method ,.filterButton"
);

// Get the <span> element that closes the modal
var span = document.querySelectorAll(
  ".close , .profileModalClose, .cancelModal"
);

// When the user clicks on the button, open the modal
for (var i = 0; i < modal.length; i++) {
  btn[i].onclick = function () {
    console.log(this.nextElementSibling);
    this.nextElementSibling.style.display = "block";
    document.body.style.overflow = "hidden";
    document.getElementsByClassName("navbar-bot")[0].style.display = "none";
  };

  // When the user clicks on <span> (x), close the modal
  span[i].onclick = function () {
    this.parentElement.parentElement.style.display = "none";
    document.body.style.overflow = "auto";
    document.getElementsByClassName("navbar-bot")[0].style.display = "flex";
  };
}
function closeModal(button) {
  button.parentElement.parentElement.parentElement.parentElement.style.display =
    "none";
  document.getElementsByClassName("navbar-bot")[0].style.display = "flex";
}
// When the user clicks anywhere outside of the modal, close it/*
window.onclick = function (event) {
  if (
    event.target.className == "modal" ||
    event.target.className == "profileModal"
  ) {
    event.target.style.display = "none";
  }
};
