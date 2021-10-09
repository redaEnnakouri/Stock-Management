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
<center><h2>Modifie le Compte</h2></center>

		
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
$quary="UPDATE `compte` SET `user`='$user',`passe`='$passe',`vente`=".$_POST['vente'].",
`Article`=".$_POST['article'].",`Client`=".$_POST['client'].",`fournisseur`=".$_POST['fournisseur'].",
`stock`=".$_POST['stock'].",`etatClient`=".$_POST['etatClient'].",`etatFournisseur`=".$_POST['etatFournisseur'].",
`rapport`=".$_POST['ra'].",`articleg`=".$_POST['articleg']."
,`venteg`=".$_POST['venteg']."
,`remarqueg`=".$_POST['remarqueg']." WHERE id=".$_GET['id'];
    
    

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

		<?php
		$quar = "SELECT * FROM compte where id=".$_GET['id'];
$resul = mysqli_query($conn, $quar);
if (! $resul) {
    die("error");
}
?>
<table>
 <?php
        while ($ro = mysqli_fetch_assoc($resul)) {
            ?>
<tr>
<td>User : </td>
<td><input class="form-control " value="<?php  echo $ro['user']?>" type="text" name="user" placeholder="User" required></td>
</tr>
<tr>
<td>Passowrd</td>
<td><input class="form-control " value="<?php  echo $ro['passe']?>" type="password" name="passe" placeholder="Password" required ></td>
</tr>
<tr>
<td>Vente : </td>
<td><input class="checkbox " value="<?php  echo $ro['vente']?>"  <?php if ($ro['vente'] == 0) { echo "checked='checked'"; } ?> type="checkbox" name="vente" ></td>
</tr>
<tr>
<td>Article : </td>
<td><input class="checkbox " value="<?php  echo $ro['Article']?>" <?php if ($ro['Article'] == 0) { echo "checked='checked'"; } ?> type="checkbox" name="article" ></td>
</tr>
<tr>
<td>Client : </td>
<td><input class="checkbox " value="<?php  echo $ro['Client']?>" <?php if ($ro['Client'] == 0) { echo "checked='checked'"; } ?> type="checkbox" name="client" ></td>
</tr>
<tr>
<td>Fournisseur : </td>
<td><input class="checkbox " value="<?php  echo $ro['fournisseur']?>" <?php if ($ro['fournisseur'] == 0) { echo "checked='checked'"; } ?> type="checkbox" name="fournisseur" ></td>
</tr>
<tr>
<td>Stock : </td>
<td><input class="checkbox " value="<?php  echo $ro['stock']?>" <?php if ($ro['stock'] == 0) { echo "checked='checked'"; } ?> type="checkbox" name="stock" ></td>
</tr>
<tr>
<td>Etat Fournisseur : </td>
<td><input class="checkbox "value="<?php  echo $ro['etatFournisseur']?>" <?php if ($ro['etatFournisseur'] == 0) { echo "checked='checked'"; } ?>
  type="checkbox" name="etatFournisseur" ></td>
</tr>
<tr>
<td>Etat Client : </td>
<td><input class="checkbox "<?php  echo $ro['etatClient']?>" <?php if ($ro['etatClient'] == 0) { echo "checked='checked'"; } ?>  type="checkbox" name="etatClient" ></td>
</tr>
<tr>
<td>Rapport : </td>
<td><input class="checkbox " value="<?php  echo $ro['rapport']?>" <?php if ($ro['rapport'] == 0) { echo "checked='checked'"; } ?> type="checkbox" name="ra" ></td>
</tr>
<tr>
<td>Gestion Article : </td>
<td><input class="checkbox " value="<?php  echo $ro['articleg']?>" <?php if ($ro['articleg'] == 0) { echo "checked='checked'"; } ?> type="checkbox" name="articleg" ></td>
</tr>
<tr>
<td>Gestion Ventes : </td>
<td><input class="checkbox " value="<?php  echo $ro['venteg']?>" <?php if ($ro['venteg'] == 0) { echo "checked='checked'"; } ?> type="checkbox" name="venteg" ></td>
</tr>
<tr>
<td>Remarque : </td>
<td><input class="checkbox " value="<?php  echo $ro['remarqueg']?>" <?php if ($ro['remarqueg'] == 0) { echo "checked='checked'"; } ?> type="checkbox" name="remarqueg" ></td>
</tr>

<tr>
<td></td>
<td><input type="submit" value="Enregister" name="submit" class="btn btn-success" style="float: right;"> </td>
</tr>




</table>
<?php }?>
 </form>
 </center>
</body>
</html>