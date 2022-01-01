// Get the modal
var modal = document.getElementsByClassName("modal");
// Get the button that opens the modal
var btn = document.querySelectorAll(".modalButton , .filterButton");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close");

// When the user clicks on the button, open the modal
for (var i = 0; i < modal.length; i++) {
  btn[i].onclick = function () {
    console.log(this.nextElementSibling);
    this.nextElementSibling.style.display = "block";
  };

  // When the user clicks on <span> (x), close the modal
  span[i].onclick = function () {
    console.log(modal);
    this.parentElement.parentElement.style.display = "none";
  };
}
// When the user clicks anywhere outside of the modal, close it
window.onclick = function (event) {
  if (event.target.className == "modal") {
    event.target.style.display = "none";
  }
};
