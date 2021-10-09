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
<center><h2>أضف منتج</h2>
    <a href="stock.php?user=<?php echo $_GET['user']?>" type="button" class="btn btn-success" class="btn btn-info" >رجوع</a>
  
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

<td><input class="form-control " type="text" placeholder="اسم المنتج  " name="Produit" required></td>
<td>: اسم المنتج   </td>
</tr>
<tr>

<td><input class="form-control " type="number" placeholder="الكمية" name="Quantite" min="0" required></td>
<td>: الكمية </td>
</tr>
<tr>

<td><input class="form-control " type="text" placeholder="الثمن في المخزن"  name="Prix" required></td>
<td>: الثمن في المخزن   </td>
</tr>
<tr>
<!-- <tr> -->
<!-- <td>Valeur de stock : </td> -->
<!-- <td><input class="form-control " type="text" placeholder="Valeur de stock"  name="Vstock"></td> -->
<!-- </tr> -->

<tr>

<td><input type="submit" value="تسجيل" name="submit" class="btn btn-success" style="float: right;"> </td><td></td>
</tr>

</form>


</table>

</center>

  
 
</body>
</html>