<?php
session_start();
if($_SESSION['user']){
include 'conx.php';?>
<html>
<head>


<link href="css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">


<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.min.js"></script>



<link href="css/client.css" rel="stylesheet" >
<script type="text/javascript" src="js/client.js"></script>
<!------ Include the above in your HEAD tag ---------->
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
 <a type="button" class="btn btn-info" href="GestionVente.php?user=<?php echo $_GET['user']?>">Actualis&eacute;</a>
 
<a href="logout.php" type="button" class="btn btn-danger" class="btn btn-info" >Deconnexion</a>
  </div>
  </div>
  
</nav>

<center><h2>List des Ventes</h2></center>

<div class="container-fluid">
		<div class="row">
			
			
<input class="form-control col-md-2" id="myInput" type="text" placeholder="Recherche Ventes">
</div></div>

<br><br>
 <?php
$quary = "SELECT * FROM `vente` where total<>0 ";
$result = mysqli_query($conn, $quary);
if (! $result) {
    die("error");
}
?>

<table class="table table-bordered">
  <thead>
    <tr>
      <th>Date </th>
      <th>Bon</th>
        <th>total</th>
 
       <th>Supprimer/consulter</th>
    </tr>
  </thead>
  <tbody id="myTable">
  <?php
        while ($row = mysqli_fetch_assoc($result)) {
            ?>
    <tr>
    
      <td><?php  echo $row['date']?></td>
      <td><?php  echo $row['bon']?></td>
       <td><?php  echo $row['total']?></td>
      
     
       <td>
       <form method="POST" action="excelve.php?bon=<?php echo $row['bon']?>">
            <a href="supp/suppv.php?id=<?php echo $row['bon']?>&user=<?php echo $_GET['user']?>" class="btn btn-danger">Supp</a>
            <input type="submit" value="Word Export file " name ="export" class="btn btn-success">
            </form>
      </td>
    </tr>
   <?php }?>

    
 
  </tbody>
</table>


</body>
</html>
<?php }else{  header('location:../index.php');
exit();
}
?>
