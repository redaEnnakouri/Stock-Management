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
<center><h2>إضافة مورد</h2>

    <a href="fournisseur.php?user=<?php echo $_GET['user']?>" type="button" class="btn btn-success" class="btn btn-info" >رجوع</a>
  
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
<td><input class="form-control " type="text" name="nom" value="<?php  echo $row['nom']?>" placeholder="اسم المورد" required></td>
<td>: اسم المورد  </td></tr>
<tr>
<td><input class="form-control " type="text" name="tel" value="<?php  echo $row['tele']?>" placeholder="هاتف"></td>
<td>: هاتف </td>
</tr>
<tr>
<td><input class="form-control " type="text" name="adrs" value="<?php  echo $row['adrs']?>" placeholder="عنوان"></td>
<td>: عنوان</td>
</tr>
<tr>

<td><input type="submit" value="تسجيل" name="submit" value="" class="btn btn-success" style="float: right;"> </td>
<td></td>
</tr>




</table>
     <?php

}
        ?>
 </form>
 </center>
</body>
</html>