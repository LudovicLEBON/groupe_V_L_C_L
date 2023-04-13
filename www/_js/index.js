const sup = document.body.getElementsByClassName("btn-danger");

Array.prototype.forEach.call(sup, function (element) {
  element.addEventListener("click", (e) => confSuppr(e));
});

function confSuppr(e) {
  boolConf = confirm("Etes-vous sur de vouloir suprimer cette élément ?");
  if (boolConf) return false;
  e.proventDefault();
}

//validation des modifications d'un service lié à une réservation
let services = document.body.getElementsByClassName("submitServices");
//console.log(services);
Array.prototype.forEach.call(services, function (element) {
  element.addEventListener("click", (e) => {
    //console.log(e.target);
    //console.log(e.dataset.don_qtt);
    //console.log(e.target.dataset.don_qtt);
    let qtt = document.getElementById(e.target.dataset.don_qtt);
    //console.log(qtt.value);
    location.replace(
      `index.php?m=donneracces&a=saveQtt&id=${e.target.dataset.don_id}&res=${e.target.dataset.don_res}&ser=${e.target.dataset.don_ser}&qtt=${qtt.value}&hotel=${e.target.dataset.hotel}`
    );
  });
});

//supresssion d'un service lié à une réservation
let supServices = document.body.getElementsByClassName("deleteServices");
Array.prototype.forEach.call(supServices, function (element) {
  element.addEventListener("click", (e) => {
    console.log(e.target);
    location.replace(
      `index.php?m=donneracces&a=deleteServRes&id=${e.target.dataset.id}&res=${e.target.dataset.don_res}&hotel=${e.target.dataset.hotel}`
    );
  });
});
/*
function filtrer_element() {
  const btnsearch = document.body.getElementsByClassName("btsearch");
  btnsearch.addEventListener("click", (e) => {});
}
*/
