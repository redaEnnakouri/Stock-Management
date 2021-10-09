function suppc(id){
	
	if(confirm("Voules vous supprimer le Fournisseur")){
		var xmlhttp;
		if(window.XMLHttpRequest){
			xmlhttp= new XMLHttpRequest();
			
		}else {
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		
		xmlhttp.onreadystatechange=function(){
			var ins=document.getElementById("su"); 
			if(this.readyState==4 && this.status==200){
				getSelect();
				ins.innerHTML=xmlhttp.responseText; 
				}
		}
		
		xmlhttp.open("POST","supp/suppc.php",true);
		xmlhttp.setRequestHeader("content-type", "application/x-www-form-urlencoded");
		xmlhttp.send("id="+ id);
	}else console.log(id)
	
	

	
	return false;
		
};

