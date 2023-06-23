function openNav() {
  document.getElementById("mySidenav").style.width = "100%";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}

// Check if JavaScript is enabled
document.addEventListener("DOMContentLoaded", function() {
  document.getElementById("myBody").classList.add("js-enabled");
});
