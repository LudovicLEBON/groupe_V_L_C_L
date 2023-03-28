const sup = document.getElementsByClassName("btn-danger");

Array.prototype.forEach.call(sup, function (element) {
  element.addEventListener("click", (e) => confSuppr(e));
});

function confSuppr(e) {
  boolConf = confirm("Etes-vous sur de vouloir suprimer cette élément ?");
  if (boolConf) return false;
  e.proventDefault();
}
