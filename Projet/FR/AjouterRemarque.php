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
<center><h2>Ajouter un Remarque</h2>
    <a href="remarque.php?user=<?php echo $_GET['user']?>" type="button" class="btn btn-success" class="btn btn-info" >Retour</a>

  
</center>

		
<?php 
if(isset($_POST['submit'])){
    $nom = nl2br($_POST['nom'],false);
$y=date("Y-m-d");


$quary="insert into `remarque`(rem,date
)  values('$nom','$y')";

$result = mysqli_query($conn, $quary);
 //header("location:cllient.php");
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
<tr>
<td>Remarque : </td>
<td>

<textarea  name="nom" placeholder="Ecrivez Votre Remarque :" class="form-control "
          rows="10" cols="35">
</textarea>

</td>
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