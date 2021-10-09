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
<center><h2>التسبيق أضف </h2>
      <a href="Cllient.php?user=<?php echo $_GET['user']?>" type="button" class="btn btn-success" class="btn btn-info" >رجوع</a>

</center>

		
<?php 
if(isset($_POST['submit'])){
$tel =$_POST['tel'];
$date=date("d-m-Y ");

$quary="INSERT INTO `vente`(`bon`, `date`, `nom`,`total`,`avance`, `reste`)
 values(' ','$date','".$_GET['id']."',0,".$tel.",0)";

$result = mysqli_query($conn, $quary);
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

<td><input class="form-control " type="text" name="tel" placeholder="التسبيق" required></td>
<td>التسبيق : </td>
</tr>
<tr>

<td><input type="submit" value="تسجيل" name="submit" class="btn btn-success" style="float: right;"> </td>
<td></td></tr>




</table>

 </form>
 </center>
</body>
</html>