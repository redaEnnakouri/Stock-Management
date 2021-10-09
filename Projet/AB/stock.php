<?php 
session_start();
if($_SESSION['user']){
include 'conx.php';?>
<html>
<head>



<link href="css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">


<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.min.js"></script><link href="css/client.css" rel="stylesheet" >

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
 <a type="button" class="btn btn-info" href="stock.php?user=<?php echo $_GET['user']?>">تحديث</a>
 
  <a href="logout.php" type="button" class="btn btn-danger" class="btn btn-info" >تسجيل الخروج</a>
  </div>
  </div>
</nav>

<center><h2>قائمة</h2></center>

<div class="container-fluid">
		<div class="row">
			
			
<input class="form-control col-md-2" id="myInput" type="text" placeholder="المنتج المطلوب">
<a href="AjouterProduit.php?user=<?php echo $_GET['user']?>"  type="button" class="btn"  style="float: right;">أضف منتج</a>
</div></div>

<br><br>
 <?php
$quary = "SELECT `produit`,SUM(qte)as qte,sum(vstock)as tt,sum(prixu) as p,id FROM `stock` GROUP by `produit`  ";
$result = mysqli_query($conn, $quary);
if (! $result) {
    die("error");
}
?>

<table class="table table-bordered">
  <thead>
    <tr>
      <th>اسم المنتج </th>
      <th>الكمية</th>
      <th>الثمن في المخزن</th>
      <th>قيمة </th> 
 
       <th>تعديل / إزالة</th>
    </tr>
  </thead>
  <tbody id="myTable">
  <?php
        while ($row = mysqli_fetch_assoc($result)) {
            ?>
    <tr>
    
      <td><?php  echo $row['produit']?></td>
      <td><?php  echo $row['qte']?></td>
      
      <td><?php  if($row['qte']!=0){echo round($row['tt']/$row['qte'],2);}else echo "0";?></td>
       <td><?php if($row['qte']!=0){echo round(($row['tt']/$row['qte'])*$row['qte'],2);}else echo "0";
      
       
       ?></td>
     
       <td><a href="upds.php?id=<?php echo $row['produit']?>&user=<?php echo $_GET['user']?>" class="btn btn-success">تعديل</a>
      
            <a href="supp/supps.php?id=<?php echo $row['produit']?>&user=<?php echo $_GET['user']?>" class="btn btn-danger">إزالة</a>
   
      
      </td>
    </tr>
   <?php }?>

    <tr>
      <th> </th>
      <th></th>
      <th>المجموع</th>
       
      <th id="sum"></th> 

    </tr>
 
  </tbody>
</table>

<script>

    	  let rows = document.querySelectorAll("table tr td:nth-child(4)");
    	  
          let sum = 0;
         
         
          for (let i = 0; i < rows.length; i++) {
              sum += Number(rows[i].textContent);
          }
   
          document.getElementById("sum").textContent = sum;
         
   
</script>

</body>
</html>
<?php }else{  header('location:../index.php');
exit();
}
?>