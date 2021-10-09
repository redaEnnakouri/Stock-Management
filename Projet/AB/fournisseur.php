<?php 
session_start();
if($_SESSION['user']){
include 'conx.php';?>
<html>
<head>



<link href="css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">


<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.min.js"></script>



<link href="css/client.css" rel="stylesheet" >
<script type="text/javascript" src="js/client.js"></script>
<!------ Include the above in your HEAD tag ---------->
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">إدارة المخازن</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  
       <div style="width: 100%">
  <div style="float: right;">
    <a href="Accueil.php?user=<?php echo $_GET['user']?>" type="button" class="btn btn-success" class="btn btn-info" >رجوع</a>
 <a type="button" class="btn btn-info" href="fournisseur.php?user=<?php echo $_GET['user']?>">تحديث</a>
 
  <a href="logout.php" type="button" class="btn btn-danger" class="btn btn-info" >تسجيل الخروج</a>
  </div>
  </div>
</nav>

<center><h2>قائمة الموردين</h2></center>

<div class="container-fluid">
		<div class="row">
			
			
<input class="form-control col-md-2" id="myInput" type="text" placeholder="البحث عن مورد">
<a href="AjouterFournisseur.php?user=<?php echo $_GET['user']?>"  type="button" class="btn"  style="float: right;">إضافة مورد</a>
</div></div>

<br><br>
 <?php
$quary = "SELECT * FROM fournisseur";
$result = mysqli_query($conn, $quary);
if (! $result) {
    die("error");
}
?>
<table class="table table-bordered">
  <thead>
    <tr>
      <th>اسم المورد </th>
      <th>هاتف</th>
      <th>عنوان</th>
      <th>سجل المعاملات</th> 
 
       <th>تعديل / إزالة</th>
    </tr>
  </thead>
  <tbody id="myTable">
  <?php
        while ($row = mysqli_fetch_assoc($result)) {
            ?>
    <tr>
        
      <td><?php  echo $row['nom']?></td>
      <td><?php  echo $row['tele']?></td>
      <td><?php  echo $row['adrs']?></td>
      
      <form method="POST" action="HistoriqueFournisseur.php?user=<?php echo $_GET['user']?>">
  <input type="hidden" value="<?php  echo $row['nom']?>" name="nom">
       <td><input type="submit" value="عام " class="btn btn-secondary"></td>
       </form>
     
      <td><a href="updf.php?id=<?php echo $row['id']?>&user=<?php echo $_GET['user']?>" class="btn btn-success">تعديل</a>
      
      
            <a href="supp/suppf.php?id=<?php echo $row['id']?>&user=<?php echo $_GET['user']?>" class="btn btn-danger">إزالة</a>
      </td>
    </tr>
   
     <?php

}
        ?>
   
 
  </tbody>
</table>

</body>
</html>

<?php }else{  header('location:../index.php');
exit();
}
?>
