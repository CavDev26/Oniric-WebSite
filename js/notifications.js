function pushNotifications(notification) {
  let bell = document.getElementById("bell");
  bell.classList.toggle("ring");
  const xhttp = new XMLHttpRequest();
  xhttp.onload = function () {
    document.getElementById("notificationHub").innerHTML += this.responseText;
  };
  xhttp.open("GET", "pushNotification.php?" + notification);
  xhttp.send();
}
