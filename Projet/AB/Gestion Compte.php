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
<center><h2>حسابي</h2>
    <a href="Accueil.php?user=<?php echo $_GET['user']?>" type="button" class="btn btn-success" class="btn btn-info" >رجوع</a>
  
</center>

		
<?php 
if(isset($_POST['submit'])){
$nom =$_POST['nom'];
$tel =$_POST['tel'];


$quary="UPDATE `compte` SET `user`='".$nom."', `passe`='".$tel."'
where user='".$_GET['user']."'";

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

		<?php
$quary = "SELECT * FROM compte where user='".$_GET['user']."'";
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

<td><input class="form-control " type="text" name="nom" value="<?php  echo $row['user']?>" placeholder="إسم المستخدم" required></td>
<td>: إسم المستخدم   </td></tr>
<tr>

<td><input class="form-control " type="password" name="tel" value="<?php  echo $row['passe']?>" placeholder="كلمة السر"></td>
<td>: كلمة السر      </td></tr>


<td><input type="submit" value="تسجيل" name="submit" value="" class="btn btn-success" style="float: right;"> </td>
<td></td></tr>




</table>
     <?php

}
        ?>
 </form>
 </center>
 

</body>
</html>