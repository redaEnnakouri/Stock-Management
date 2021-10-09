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

$quary="insert into `fournisseur`(`nom`, `tele`, `adrs`
)  values('$nom','$tel','$adrs')";

$result = mysqli_query($conn, $quary);
//header("location:fournisseur.php");
if ( !$result) {
    die("<div class='alert alert-danger' role='alert'>
  <strong>Remarque : </strong>Erreur de l'insertion les informations ! <strong>
Réessaye En Coure</strong>
</div>");


    ;
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

<td><input class="form-control " type="text" name="nom" placeholder="اسم المورد " required></td>
<td>: اسم المورد  </td>
</tr>
<tr>

<td><input class="form-control " type="text" name="tel" placeholder="هاتف"></td>
<td>: هاتف </td>
</tr>
<tr>

<td><input class="form-control " type="text" name="adrs" placeholder="عنوان"></td>
<td>: عنوان</td>
</tr>
<tr>

<td><input type="submit" value="تسجيل" name="submit" class="btn btn-success" style="float: right;"> </td>
<td></td>
</tr>




</table>

 </form>
 </center>
</body>
</html>