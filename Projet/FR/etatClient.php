<?php 
session_start();
if($_SESSION['user']){
include 'conx.php';?>
<html>
<head>

<title>Client</title>

<link href="css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">


<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link
	href="css/select2.min.css"
	rel="stylesheet" />
<script
	src="js/select2.min.js"></script>

</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Gestion de Stock</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
       <div style="width: 100%">
  <div style="float: right;">
    <a href="Accueil.php?user=<?php echo $_GET['user']?>" type="button" class="btn btn-success" class="btn btn-info" >Retour</a>
 <a type="button" class="btn btn-info" href="etatClient.php?user=<?php echo $_GET['user']?>">Actualis&eacute;</a>
 
<a href="logout.php" type="button" class="btn btn-danger" class="btn btn-info" >Deconnexion</a>
  </div>
  </div>
</nav>



	<center >
		<h1>Etat de Client</h1>
	</center>




<br><br><br>

<table  class="table table-bordered">
<tr>
<th>Client</th>
<th>Credit</th>	
<th>Avance</th>	
<th>Reste</th>	

</tr>
 <?php
$quary = "SELECT sum(reste) as res,sum(`total`) as tot,sum(avance) as av,`nom` FROM `vente` GROUP by `nom` ";
$result = mysqli_query($conn, $quary);
if (! $result) {
    die("error");
}
while ($row = mysqli_fetch_assoc($result)) {
?>
<tr>
<td><?php echo $row['nom'] ?></td>
<td><?php echo $row['tot'] ?></td>
<td><?php echo $row['av'] ?></td>
<td><?php echo $row['tot']-$row['av'] ?></td>
 <?php

}
     ?>
</tr>
<tr>
<td></td>
<td></td>
<th>TOTAL</th>
<td id="sum"></td>

</tr>









</table>





	<script>
    $('.select2').select2();
</script>
<script>

    	  let rows = document.querySelectorAll("table tr td:nth-child(4)");
    	  
          let sum = 0;
         
         
          for (let i = 0; i < rows.length-1; i++) {
              sum += Number(rows[i].textContent);
          }
   
          document.getElementById("sum").textContent = sum;
         
   
</script>
</body>
</html>
<?php }else{  header('location:../index.php');
exit();
}
?>