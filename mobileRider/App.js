const hiddenText = document.getElementById("hidden-text");

function hiddenerrorcode() {
    hiddenText.classList.remove("d-none");
    setTimeout(function(){
      hiddenText.classList.add("d-none");
    }, 5000);
}

// function redirectToPage() {
//     window.location.replace('./ApplicationMobile.php');
// }