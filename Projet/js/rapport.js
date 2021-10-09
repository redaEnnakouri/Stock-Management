function reche(){
	
	var date=document.getElementById("date").value;
	var date1=document.getElementById("date1").value;
	var XMLhttp;
	if(window.XMLHttpRequest){
		XMLhttp= new XMLHttpRequest();
	}else {
		XMLhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}

	XMLhttp.onreadystatechange=function(){
		var ins=document.getElementById("su"); 
		if(this.readyState==4 && this.status==200){
			ins.innerHTML=XMLhttp.responseText; 
			}
	}
	
	XMLhttp.open("POST","js/rapport.php",true);
	XMLhttp.setRequestHeader("content-type","application/x-www-form-urlencoded");
	XMLhttp.send("date="+ date+"&date1="+ date1 );
	
	
	return false;
	
};