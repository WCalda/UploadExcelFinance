var container = document.querySelector(".container");

container.addEventListener("click", function(event) {

  if (event.target.classList.contains("f-col") || event.target.classList.contains("s-col")) {
    var row = event.target.parentNode;
    console.log(row);
    row.classList.add("selected");
  }
});

console.log("Hello");