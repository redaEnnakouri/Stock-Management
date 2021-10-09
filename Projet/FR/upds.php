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

if($_POST['cont']==1){
    
$quary="UPDATE `stock` SET
`produit`='".$nom."', `qte`=".$Quantite.", `prixu`=".$Prix.", `vstock`=".$Vstock."
where produit='".$_GET['id']."'";

}else {
    
    $quz = "DELETE FROM stock WHERE `produit`='".$_GET['id']."'";
    $rez = mysqli_query($conn, $quz);
    
    $quary="INSERT INTO `stock`(`produit`, `qte`, `prixu`, `vstock`,bon)
                VALUES ('$nom',$Quantite,$Prix,$Vstock,'".$_POST['bon']."') ";
}

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
				<?php
$quary = "SELECT bon,count(produit) as u,`produit`,SUM(qte)as qte,sum(vstock)as tt,sum(prixu) as p,id FROM stock where `produit`='".$_GET['id']."' group by produit";
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
<td>Nom Produit : </td>
<td><input class="form-control " type="text" placeholder="Nom Produit " value="<?php  echo $row['produit']?>" name="Produit" required></td>
</tr>
<tr>
<td>Quantite : </td>
<td><input class="form-control " type="number" placeholder="Quantite" value="<?php  echo $row['qte']?>" name="Quantite" min="0" required></td>
</tr>
<tr>
<td>Prix achat moyenne : </td>
<td><input class="form-control " type="text" placeholder="Prix achat moyenne" value="<?php echo round($row['p'],2)?>"  name="Prix" required></td>
</tr>
<tr>

<!-- <tr> -->
<!-- <td>Valeur de stock : </td> -->
<!-- <td><input class="form-control " type="text" placeholder="Valeur de stock"  name="Vstock"></td> -->
<!-- </tr> -->
<input type="hidden" value="<?php echo $row['u']?>" name="cont">
<input type="hidden" value="<?php echo $row['bon']?>" name="bon">

<tr>
<td></td>
<td><input type="submit" value="Enregister" name="submit" class="btn btn-success" style="float: right;"> </td>
</tr>

</form>


</table>

    <?php

}
        ?>

  
 
</body>
</html>