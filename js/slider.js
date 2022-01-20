var slider = document.getElementById("myRange");
var output = document.getElementById("demo");
var stars = document.getElementById("writereview");
output.innerHTML = slider.value; // Display the default slider value

// Update the current slider value (each time you drag the slider handle)
slider.oninput = function () {
  output.innerHTML = this.value;
  displayStars(this.value);
};

function displayStars(value) {
  stars.innerHTML = "";
  let n = Math.floor(value);
  for (let i = 0; i < n; i++) {
    stars.innerHTML +=
      '<img src="./img/star.png" alt="" class="smallReviewStar" />';
  }
}
