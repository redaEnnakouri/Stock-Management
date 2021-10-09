<?php ob_start() ?>
<?php include 'conx.php';?>
<html>
<head>


<link href="css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">


<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.min.js"></script>

<!------ Include the above in your HEAD tag ---------->
<style type="text/css">


</style>
</head>
<body>
<center><h2>Ajouter un Date</h2>
<a href="superviseur.php" type="button" class="btn btn-danger" class="btn btn-info" >Retour</a>

</center>

		
<?php 
if(isset($_POST['submit'])){
$tel =$_POST['tel'];
$date=date("d-m-Y ");

$quary="UPDATE `temp` SET `date`='$tel' WHERE id=1";

$result = mysqli_query($conn, $quary);
//header("location:superviseur.php");
if ( !$result) {
    die("<div class='alert alert-danger' role='alert'>
  <strong>Remarque : </strong>Erreur de l'insertion les informations ! <strong>
Réessaye En Coure</strong>
</div>");
}else echo"<div class='alert alert-success ' role='alert'>
  <strong> Les Informations est Enregistre
</strong>
</div>";

}
?>
<br><br>
<form method="POST"><center>

		
<table>

<td>Date : </td>
<td><input class="form-control " type="date" name="tel"  required></td>
</tr>
<tr>
<td></td>
<td><input type="submit" value="Enregister" name="submit" class="btn btn-success" style="float: right;"> </td>
</tr>




</table>

 </form>
 </center>
</body>
</html>