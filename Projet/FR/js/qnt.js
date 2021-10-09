
function xa(){
	
	 var code=document.getElementById("code").value;
					
	
	
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
			}else if(this.readyState<4 && this.readyState>0){
				ins.innerHTML="<h1>attendez s'il vous plais  </h1>";
			}else {ins.innerHTML="<h1 style='color:red;'>il y a une error dans insertion dans la base de donne </h1>";}
	}
	
	
	
	XMLhttp.open("POST","php/ajoutera.php",true);
	XMLhttp.setRequestHeader("content-type", "application/x-www-form-urlencoded");
	XMLhttp.send("code="+ code );
	
	console.log(code);
	
	
	
	return false;
	
};