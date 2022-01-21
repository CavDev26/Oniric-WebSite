$(document).ready(function () {
  var slider = document.getElementById("myRange");
  var stars = document.getElementById("writereview");
  if (slider != null) {
    displayStars(slider.value);
    // Update the current slider value (each time you drag the slider handle)
    slider.oninput = function () {
      displayStars(this.value);
    };
  }

  function displayStars(value) {
    stars.innerHTML = "";
    let n = Math.floor(value);
    for (let i = 0; i < n; i++) {
      stars.innerHTML +=
        '<img src="./img/star.png" alt="" class="reviewStar" />';
    }
    if (n != 5) {
      if (value - n >= 0.5 && value - n < 1) {
        stars.innerHTML +=
          '<img src="./img/halfStar.png" alt="" class="reviewStar" />';
        n++;
      }
      for (let i = 0; i < 5 - n; i++) {
        stars.innerHTML +=
          '<img src="./img/emptyStar.png" alt="" class="reviewStar" />';
      }
    }
  }
});
