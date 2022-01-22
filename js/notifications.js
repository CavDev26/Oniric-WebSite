function pushNotifications(notification) {
  let bell = document.getElementById("bell");
  bell.classList.toggle("ring");
  const xhttp = new XMLHttpRequest();
  xhttp.onload = function () {
    var notifications = document.getElementById("notificationHub");
    var notification = createElementFromHTML(this.responseText);
    var separator = createElementFromHTML(
      '<hr class="span-notifications-div">'
    );
    notifications.insertBefore(separator, notifications.firstChild);
    notifications.insertBefore(notification, notifications.firstChild);
  };
  xhttp.open("GET", "pushNotification.php?" + notification);
  xhttp.send();
}

function createElementFromHTML(htmlString) {
  var div = document.createElement("div");
  div.innerHTML = htmlString.trim();

  // Change this to div.childNodes to support multiple top-level nodes.
  return div.firstChild;
}
