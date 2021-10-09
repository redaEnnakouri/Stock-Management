function h(){
	
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
			}
	}
	
	XMLhttp.open("POST","ex/exphp.php",true);
	XMLhttp.setRequestHeader("content-type","application/x-www-form-urlencoded");
	XMLhttp.send("code="+ code );
	return false;
};
///////////////////////end///////////////////


function h1(){
	
	var code1=document.getElementById("code1").value;
	var XMLhttp;
	if(window.XMLHttpRequest){
		XMLhttp= new XMLHttpRequest();
	}else {
		XMLhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}

	XMLhttp.onreadystatechange=function(){
		var ins=document.getElementById("su1"); 
		if(this.readyState==4 && this.status==200){
			ins.innerHTML=XMLhttp.responseText; 
			}
	}
	
	XMLhttp.open("POST","ex/exphp1.php",true);
	XMLhttp.setRequestHeader("content-type","application/x-www-form-urlencoded");
	XMLhttp.send("code1="+ code1 );
	console.log(code1)
	
	return false;
};

function h2(){
	
	var code2=document.getElementById("code2").value;
	var XMLhttp;
	if(window.XMLHttpRequest){
		XMLhttp= new XMLHttpRequest();
	}else {
		XMLhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}

	XMLhttp.onreadystatechange=function(){
		var ins=document.getElementById("su2"); 
		if(this.readyState==4 && this.status==200){
			ins.innerHTML=XMLhttp.responseText; 
			}
	}
	
	XMLhttp.open("POST","ex/exphp2.php",true);
	XMLhttp.setRequestHeader("content-type","application/x-www-form-urlencoded");
	XMLhttp.send("code2="+ code2 );
	
	return false;
};

///////////////////////end///////////////////


function h3(){
	
	var code3=document.getElementById("code3").value;
	var XMLhttp;
	if(window.XMLHttpRequest){
		XMLhttp= new XMLHttpRequest();
	}else {
		XMLhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}

	XMLhttp.onreadystatechange=function(){
		var ins=document.getElementById("su3"); 
		if(this.readyState==4 && this.status==200){
			ins.innerHTML=XMLhttp.responseText; 
			}
	}
	
	XMLhttp.open("POST","ex/exphp3.php",true);
	XMLhttp.setRequestHeader("content-type","application/x-www-form-urlencoded");
	XMLhttp.send("code3="+ code3 );
	
	return false;
};


///////////////////////end///////////////////


function h4(){
	
	var code4=document.getElementById("code4").value;
	var XMLhttp;
	if(window.XMLHttpRequest){
		XMLhttp= new XMLHttpRequest();
	}else {
		XMLhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}

	XMLhttp.onreadystatechange=function(){
		var ins=document.getElementById("su4"); 
		if(this.readyState==4 && this.status==200){
			ins.innerHTML=XMLhttp.responseText; 
			}
	}
	
	XMLhttp.open("POST","ex/exphp4.php",true);
	XMLhttp.setRequestHeader("content-type","application/x-www-form-urlencoded");
	XMLhttp.send("code4="+ code4 );
	
	return false;
};




///////////////////////end///////////////////


function h5(){
	
	var code5=document.getElementById("code5").value;
	var XMLhttp;
	if(window.XMLHttpRequest){
		XMLhttp= new XMLHttpRequest();
	}else {
		XMLhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}

	XMLhttp.onreadystatechange=function(){
		var ins=document.getElementById("su5"); 
		if(this.readyState==4 && this.status==200){
			ins.innerHTML=XMLhttp.responseText; 
			}
	}
	
	XMLhttp.open("POST","ex/exphp5.php",true);
	XMLhttp.setRequestHeader("content-type","application/x-www-form-urlencoded");
	XMLhttp.send("code5="+ code5 );
	
	return false;
};


///////////////////////end///////////////////


function h6(){
	
	var code6=document.getElementById("code6").value;
	var XMLhttp;
	if(window.XMLHttpRequest){
		XMLhttp= new XMLHttpRequest();
	}else {
		XMLhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}

	XMLhttp.onreadystatechange=function(){
		var ins=document.getElementById("su6"); 
		if(this.readyState==4 && this.status==200){
			ins.innerHTML=XMLhttp.responseText; 
			}
	}
	
	XMLhttp.open("POST","ex/exphp6.php",true);
	XMLhttp.setRequestHeader("content-type","application/x-www-form-urlencoded");
	XMLhttp.send("code6="+ code6 );
	
	return false;
};
///////////////////////end///////////////////


function h7(){
	
	var code7=document.getElementById("code7").value;
	var XMLhttp;
	if(window.XMLHttpRequest){
		XMLhttp= new XMLHttpRequest();
	}else {
		XMLhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}

	XMLhttp.onreadystatechange=function(){
		var ins=document.getElementById("su7"); 
		if(this.readyState==4 && this.status==200){
			ins.innerHTML=XMLhttp.responseText; 
			}
	}
	
	XMLhttp.open("POST","ex/exphp7.php",true);
	XMLhttp.setRequestHeader("content-type","application/x-www-form-urlencoded");
	XMLhttp.send("code7="+ code7 );
	
	return false;
};
///////////////////////end///////////////////


function h8(){
	
	var code8=document.getElementById("code8").value;
	var XMLhttp;
	if(window.XMLHttpRequest){
		XMLhttp= new XMLHttpRequest();
	}else {
		XMLhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}

	XMLhttp.onreadystatechange=function(){
		var ins=document.getElementById("su8"); 
		if(this.readyState==4 && this.status==200){
			ins.innerHTML=XMLhttp.responseText; 
			}
	}
	
	XMLhttp.open("POST","ex/exphp8.php",true);
	XMLhttp.setRequestHeader("content-type","application/x-www-form-urlencoded");
	XMLhttp.send("code8="+ code8 );
	
	return false;
};
///////////////////////end///////////////////


function h9(){
	
	var code9=document.getElementById("code9").value;
	var XMLhttp;
	if(window.XMLHttpRequest){
		XMLhttp= new XMLHttpRequest();
	}else {
		XMLhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}

	XMLhttp.onreadystatechange=function(){
		var ins=document.getElementById("su9"); 
		if(this.readyState==4 && this.status==200){
			ins.innerHTML=XMLhttp.responseText; 
			}
	}
	
	XMLhttp.open("POST","ex/exphp9.php",true);
	XMLhttp.setRequestHeader("content-type","application/x-www-form-urlencoded");
	XMLhttp.send("code9="+ code9 );
	
	return false;
};
///////////////////////end///////////////////

