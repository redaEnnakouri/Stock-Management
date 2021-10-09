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
<center><h2>إضافة عميل</h2>
  <a href="Cllient.php?user=<?php echo $_GET['user']?>" type="button" class="btn btn-success" class="btn btn-info" >رجوع</a>
  
</center>

		
<?php 
if(isset($_POST['submit'])){
$nom =$_POST['nom'];
$tel =$_POST['tel'];

$adrs =$_POST['adrs'];

$quary="insert into `client`(`nom`, `tele`, `adrs`
)  values('$nom','$tel','$adrs')";

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

		
<table>
<tr>
<td><input class="form-control " type="text" name="nom" placeholder="اسم العميل" required></td>
<td>: اسم العميل  </td>
</tr>
<tr>

<td><input class="form-control " type="text" name="tel" placeholder="هاتف"></td>
<td>: هاتف   </td>
</tr>
<tr>
<td><input class="form-control " type="text" name="adrs" placeholder="عنوان"></td>
<td>: عنوان  </td>
</tr>
<tr>
<td><input type="submit" value="تسجيل" name="submit" class="btn btn-success" style="float: right;"> </td>
<td></td></tr>




</table>

 </form>
 </center>
</body>
</html>