<?php ob_start() ?>
<?php include 'conx.php';?>
<html>
<head>



<link href="css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">


<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.min.js"></script>

<!------ Include the above in your HEAD tag ---------->
</head>
<body>
<center><h2>Ajouter un Produit</h2>
    <a href="stock.php?user=<?php echo $_GET['user']?>" type="button" class="btn btn-success" class="btn btn-info" >Retour</a>
  
</center>

		
<?php 
if(isset($_POST['submit'])){
$nom =$_POST['Produit'];
$Prix =$_POST['Prix'];

$Quantite =$_POST['Quantite'];
$Vstock =$Quantite*$Prix;

$quary="insert into stock(
`produit`, `qte`, `prixu`, `vstock`,bon
)  values('$nom','$Quantite',$Prix,$Vstock,' ')";

$result = mysqli_query($conn, $quary);
//header("location:stock.php");
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
		<form action="" method="POST"><center>
<table>
<tr>
<td>Nom Produit : </td>
<td><input class="form-control " type="text" placeholder="Nom Produit " name="Produit" required></td>
</tr>
<tr>
<td>Quantite : </td>
<td><input class="form-control " type="number" placeholder="Quantite" name="Quantite" min="0" required></td>
</tr>
<tr>
<td>Prix achat moyenne : </td>
<td><input class="form-control " type="text" placeholder="Prix achat moyenne"  name="Prix" required></td>
</tr>
<tr>
<!-- <tr> -->
<!-- <td>Valeur de stock : </td> -->
<!-- <td><input class="form-control " type="text" placeholder="Valeur de stock"  name="Vstock"></td> -->
<!-- </tr> -->

<tr>
<td></td>
<td><input type="submit" value="Enregister" name="submit" class="btn btn-success" style="float: right;"> </td>
</tr>

</form>


</table>

</center>

  
 
</body>
</html>