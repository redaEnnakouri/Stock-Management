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
<center><h2>Ajouter un Compte</h2>
<a href="superviseur.php" type="button" class="btn btn-danger" class="btn btn-info" >Retour</a>



</center>

		
<?php 
if(isset($_POST['submit'])){
$user =$_POST['user'];
$passe =$_POST['passe'];


if(!empty($_POST['vente'])){
    $_POST['vente'] = 0;
}else{
    $_POST['vente']= 1;
}
if(!empty($_POST['article'])){
    $_POST['article'] = 0;
}else{
    $_POST['article']= 1;
}
if(!empty($_POST['client'])){
    $_POST['client'] = 0;
}else{
    $_POST['client']= 1;
}
if(!empty($_POST['fournisseur'])){
    $_POST['fournisseur'] = 0;
}else{
    $_POST['fournisseur']= 1;
}
if(!empty($_POST['stock'])){
    $_POST['stock'] = 0;
}else{
    $_POST['stock']= 1;
}
if(!empty($_POST['etatClient'])){
    $_POST['etatClient'] = 0;
}else{
    $_POST['etatClient']= 1;
}
if(!empty($_POST['etatFournisseur'])){
    $_POST['etatFournisseur'] = 0;
}else{
    $_POST['etatFournisseur']= 1;
}
if(!empty($_POST['ra'])){
    $_POST['ra'] = 0;
}else{
    $_POST['ra']= 1;
}
if(!empty($_POST['articleg'])){
    $_POST['articleg'] = 0;
}else{
    $_POST['articleg']= 1;
}
if(!empty($_POST['venteg'])){
    $_POST['venteg'] = 0;
}else{
    $_POST['venteg']= 1;
}
if(!empty($_POST['remarqueg'])){
    $_POST['remarqueg'] = 0;
}else{
    $_POST['remarqueg']= 1;
}

$quary="insert into `compte`(`user`, `passe`, `vente`, `Article`, `Client`, `fournisseur`,
 `stock`, `etatClient`, `etatFournisseur`,rapport,articleg,venteg,remarqueg)
  values('$user','$passe',".$_POST['vente'].",".$_POST['article'].",
".$_POST['client'].",".$_POST['fournisseur'].",".$_POST['stock'].",".$_POST['etatClient'].",
".$_POST['etatFournisseur'].",".$_POST['ra'].",".$_POST['articleg'].",".$_POST['venteg'].",".$_POST['remarqueg'].")";

$result = mysqli_query($conn, $quary);

//header("location:AjouterCompte.php");
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
<td>User : </td>
<td><input class="form-control " type="text" name="user" placeholder="User" required></td>
</tr>
<tr>
<td>Passowrd</td>
<td><input class="form-control " type="password" name="passe" placeholder="Password" required ></td>
</tr>
<tr>
<td>Vente : </td>
<td><input class="checkbox " type="checkbox" name="vente" ></td>
</tr>
<tr>
<td>Article : </td>
<td><input class="checkbox " type="checkbox" name="article" ></td>
</tr>
<tr>
<td>Client : </td>
<td><input class="checkbox " type="checkbox" name="client" ></td>
</tr>
<tr>
<td>Fournisseur : </td>
<td><input class="checkbox " type="checkbox" name="fournisseur" ></td>
</tr>
<tr>
<td>Stock : </td>
<td><input class="checkbox " type="checkbox" name="stock" ></td>
</tr>
<tr>
<td>Etat Fournisseur : </td>
<td><input class="checkbox " type="checkbox" name="etatFournisseur" ></td>
</tr>
<tr>
<td>Etat Client : </td>
<td><input class="checkbox " type="checkbox" name="etatClient" ></td>
</tr>
<tr>
<td>Rapport : </td>
<td><input class="checkbox " type="checkbox" name="ra" ></td>
</tr>
<tr>
<td>Gestion Ventes : </td>
<td><input class="checkbox " type="checkbox" name="venteg" ></td>
</tr>
<tr>
<td>Gestion Article : </td>
<td><input class="checkbox " type="checkbox" name="articleg" ></td>
</tr>
<tr>
<td>Remarque : </td>
<td><input class="checkbox " type="checkbox" name="remarqueg" ></td>
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