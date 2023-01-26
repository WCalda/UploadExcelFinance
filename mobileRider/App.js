var container = document.querySelector(".clckbl");
var modal = document.getElementById("exampleModal");
var modalDialog = document.querySelector('.modal-dialog');
var exitModal = document.getElementById('exitmodal');
var ncontainer = document.getElementById('maincontainer');

container.addEventListener("click", function(event) {
  if (event.target.classList.contains("f-col") || event.target.classList.contains("s-col")) {
    var previouslySelected = document.querySelector(".selected");
    if (previouslySelected) {
      previouslySelected.classList.remove("selected");
      modal.classList.add("show");
      modal.classList.add("d-block");
      ncontainer.classList.toggle('blur');
      document.querySelectorAll('.container').classList.add('blur');
      setTimeout(function(){
          modal.classList.remove("show");
          modal.classList.remove("d-block");
          ncontainer.classList.remove('blur');
          
      }, 60000);

    }
        
        var row = event.target.parentNode;
        row.classList.add("selected");
        var n1row = row.querySelector(".f-col");
        var n2row = row.querySelector(".s-col");
        var n3row = row.querySelector(".i-col");
        var n4row = row.querySelector(".g-col");
        var n5row = row.querySelector(".h-col");
        var sn1row = n1row.textContent;
        var sn2row = n2row.textContent;
        var sn3row = n3row.textContent;
        var sn4row = n4row.textContent;
        var sn5row = n5row.textContent;
        const date = sn1row;
        const [year,month,day] = date.split('-');
        const result = [month,day,year].join('/');
        let output = new Date(result);
        var commi = document.getElementById("commission");
        var credi = document.getElementById("creditdate");
        var incen = document.getElementById("incentives");
        var grant = document.getElementById("totalamount");
        var tgc = document.getElementById("totalgc");
        credi.textContent = output.toDateString();
        commi.textContent = sn4row;
        incen.textContent = sn3row;
        grant.textContent = sn2row;
        tgc.textContent = sn5row;
  }
});

exitModal.addEventListener("click", ()=> {
  ncontainer.classList.remove("blur");
  modal.classList.remove("show");
  modal.classList.remove("d-block");
  
})


var scontainer = document.getElementById("conscrol");
scontainer.style.height = "400px";  // set fixed height
scontainer.style.overflowY = "hidden";  // hide overflow initially

  // check for overflow and make scrollable if necessary
if (scontainer.scrollHeight > scontainer.clientHeight) {
  scontainer.style.overflowY = "scroll";
}



