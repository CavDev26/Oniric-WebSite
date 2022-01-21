function pushNotifications(notification) {
  let bell = document.getElementById("bell");
  bell.classList.toggle("ring");
  const xhttp = new XMLHttpRequest();
  xhttp.onload = function () {
    document.getElementById("notificationHub").innerHTML += this.responseText;
  };
  console.log("pushNotification.php?" + notification);
  xhttp.open("GET", "pushNotification.php?" + notification);
  xhttp.send();
}
