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
<center><h2>Modifier un Client</h2>
  <a href="Cllient.php?user=<?php echo $_GET['user']?>" type="button" class="btn btn-success" class="btn btn-info" >Retour</a>

</center>

		
<?php 
if(isset($_POST['submit'])){
$nom =$_POST['nom'];
$tel =$_POST['tel'];

$adrs =$_POST['adrs'];

$quary="UPDATE `client` SET `nom`='".$nom."', `tele`='".$tel."', `adrs`='".$adrs."'
where id=".$_GET['id'];

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

		<?php
$quary = "SELECT * FROM client where id=".$_GET['id'];
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
<td>Nom Client : </td>
<td><input class="form-control " type="text" name="nom" value="<?php  echo $row['nom']?>" placeholder="Nom Client" required></td>
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