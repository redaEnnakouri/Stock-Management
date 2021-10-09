
var today = new Date();
	var tomorrow = new Date(2019, 09, 14,09);
	var x = document.getElementById("m")
	var xy = document.getElementById("o")
	if(today>tomorrow){
		alert(today);
	 	alert(tomorrow);
		x.style.display = "none";
		xy.style.display = "block";
	}