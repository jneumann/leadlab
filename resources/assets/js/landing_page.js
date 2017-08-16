function ready(fn) {
  if (document.attachEvent ? document.readyState === "complete" : document.readyState !== "loading"){
    fn();
  } else {
    document.addEventListener('DOMContentLoaded', fn);
  }
}

function val_by_class(el) {
	return document.getElementsByClassName(el)[0].value;
}

function calculate_principal() {
	const down_payment = val_by_class("down_payment");

	var i = parseFloat(val_by_class("interest_rate"));
	if (i >= 1.0) {
			i = i / 100.0;
	}
	i /= 12;
	var noMonths = 360,
			pow = 1,
			Vpayment = parseFloat(val_by_class("monthly_payment"));
	for (var j = 0; j < noMonths; j++) {
			pow = pow * (1 + i);
	}
	var Rprincipal = ((pow - 1) * Vpayment) / (pow * i);
	Rprincipal -= down_payment;

	Rprincipal = parseFloat(Rprincipal)
		.toFixed(2)
		.toString()
		.replace(/\B(?=(\d{3})+(?!\d))/g, ",")

	document.getElementsByClassName('total')[0].innerHTML = "$" +  Rprincipal;
}

document.querySelectorAll(".calculator input").forEach(function (el) {
	el.addEventListener("change", function () {
		calculate_principal();
	});
});

ready(calculate_principal());
