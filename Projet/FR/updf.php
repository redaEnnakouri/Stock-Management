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
<center><h2>Ajouter un Fournisseur</h2>

    <a href="fournisseur.php?user=<?php echo $_GET['user']?>" type="button" class="btn btn-success" class="btn btn-info" >Retour</a>
  
</center>

		
<?php 
if(isset($_POST['submit'])){
$nom =$_POST['nom'];
$tel =$_POST['tel'];

$adrs =$_POST['adrs'];

$quary="UPDATE `fournisseur` SET `nom`='".$nom."', `tele`='".$tel."', `adrs`='".$adrs."'
where id=".$_GET['id'];

$result = mysqli_query($conn, $quary);
//header("location:fournisseur.php");
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

		<?php
$quary = "SELECT * FROM fournisseur where id=".$_GET['id'];
$result = mysqli_query($conn, $quary);
if (! $result) {
    die("error");
}
?>
  <?php
        while ($row = mysqli_fetch_assoc($result)) {
            ?>
<table>
<tr>
<td>Nom Fournisseur : </td>
<td><input class="form-control " type="text" name="nom" value="<?php  echo $row['nom']?>" placeholder="Nom Fournisseur" required></td>
</tr>
<tr>
<td>Telephone : </td>
<td><input class="form-control " type="text" name="tel" value="<?php  echo $row['tele']?>" placeholder="Telephone"></td>
</tr>
<tr>
<td>Adresse : </td>
<td><input class="form-control " type="text" name="adrs" value="<?php  echo $row['adrs']?>" placeholder="Adresse"></td>
</tr>
<tr>
<td></td>
<td><input type="submit" value="Enregister" name="submit" value="" class="btn btn-success" style="float: right;"> </td>
</tr>




</table>
     <?php

}
        ?>
 </form>
 </center>
</body>
</html>