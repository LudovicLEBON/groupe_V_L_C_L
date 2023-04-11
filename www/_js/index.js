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

services.addEventListener("click", (e) => {
  location.replace("__index.html");
  hlien(
    "donneracces",
    "save",
    "id",
    $don_id,
    "res",
    $don_res,
    "services",
    $don_service,
    "qtt",
    don_quantite
  );
});

//supresssion d'un service lié à une réservation
let supServices = document.body.getElementsByClassName("deleteServices");
supServices.addEventListener("click", () => {
  hlien("donneracces", "delete", "id", $don_id);
});

function filtrer_element() {
  const btnsearch = document.body.getElementsByClassName("btsearch");
  btnsearch.addEventListener("click", (e) => {});
}
