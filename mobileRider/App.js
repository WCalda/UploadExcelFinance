// const hiddenText = document.getElementById("hidden-text");

// function hiddenerrorcode() {
//     hiddenText.classList.remove("d-none");
//     setTimeout(function(){
//       hiddenText.classList.add("d-none");
//     }, 5000);
// }

// // Store user information in cookies
// function setCookie(name, value, days) {
//   var expires = "";
//   if (days) {
//     var date = new Date();
//     date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
//     expires = "; expires=" + date.toUTCString();
//   }
//   document.cookie = name + "=" + (value || "") + expires + "; path=/";
// }

// // Example usage:
// setCookie("partnername", "John Smith", 7);

// function getCookie(name) {
//   var nameEQ = name + "=";
//   var ca = document.cookie.split(';');
//   for(var i = 0; i < ca.length; i++) {
//     var c = ca[i];
//     while (c.charAt(0) == ' ') c = c.substring(1, c.length);
//     if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
//   }
//   return null;
// }

// // Example usage:
// var partnername = getCookie("partnername");
// console.log(partnername); // "John Smith"