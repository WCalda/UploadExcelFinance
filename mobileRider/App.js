var container = document.querySelector(".clckbl");
var modal = document.getElementById("exampleModal");
var modalDialog = document.querySelector('.modal-dialog');
var exitModal = document.getElementById('exitmodal');

container.addEventListener("click", function(event) {
  if (event.target.classList.contains("f-col") || event.target.classList.contains("s-col")) {
    var previouslySelected = document.querySelector(".selected");
    if (previouslySelected) {
      previouslySelected.classList.remove("selected");
      modal.classList.add("show");
      modal.classList.add("d-block");
      setTimeout(function(){
          modal.classList.remove("show");
          modal.classList.remove("d-block");
      }, 30000);


    }
      var row = event.target.parentNode;
      row.classList.add("selected");
      var n1row = row.querySelector(".f-col");
      var n2row = row.querySelector(".s-col");
      var sn1row = n1row.textContent;
      var sn2row = n2row.textContent;
      var commi = document.getElementById("commission");
      var credi = document.getElementById("creditdate");
      credi.textContent = sn1row;
      commi.textContent = sn2row;
  }
});

exitModal.addEventListener("click", ()=> {
  modal.classList.remove("show");
  modal.classList.remove("d-block");
})






