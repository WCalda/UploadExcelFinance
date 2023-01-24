var container = document.querySelector(".container");

container.addEventListener("click", function(event) {
  if (event.target.classList.contains("f-col") || event.target.classList.contains("s-col")) {
    var previouslySelected = document.querySelector(".selected");
    console.log(previouslySelected);
    if (previouslySelected) {
      previouslySelected.classList.remove("selected");
    }
      var row = event.target.parentNode;
      row.classList.add("selected");
  }
});
