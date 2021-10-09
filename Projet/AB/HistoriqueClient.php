<?php include 'conx.php';?>
<html>
<head>

<title>Ventes</title>

<link href="css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">


<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link
	href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css"
	rel="stylesheet" />
<script
	src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">إدارة المخازن</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  
      <a href="Cllient.php?user=<?php echo $_GET['user']?>" type="button" class="btn btn-success" class="btn btn-info" >رجوع</a>
  
</nav>

	<center>
		<h1>سجل المعاملات</h1>
	</center>
	<center>
		<h2><?php echo $_POST['nom']?>: زبون </h2>
		<a type="button"  href="AjouterAvance.php?user=<?php echo $_GET['user']?>&id=<?php echo $_POST['nom']?>"> التسبيق أضف   </a>
	</center>
	<br>
	<br>
	<div class="container">
		<div class="row">

			<table class="table table-bordered" id="table">

				<tr>
					<td>تاريخ</td>
					<td>فاتورة</td>
					<td>ائتمان</td>
					<td>التسبيق</td>
					<td>الباقي</td>
				</tr>
 <?php
$quary = "SELECT date,bon,`total`,avance,reste FROM `vente` WHERE `nom`='".$_POST['nom']."'";
$result = mysqli_query($conn, $quary);
if (! $result) {
    die("error");
}
while ($row = mysqli_fetch_assoc($result)) {
?>
				<tr>
					<td><?php echo $row['date'] ?></td>
					<td><?php echo $row['bon'] ?></td>
					<td id="amtlbl" >
					<?php echo $row['total'] ?></td>
					<td><?php echo $row['avance'] ?></td>
					<td><?php echo $row['reste'] ?></td>
				</tr>


   <?php

}
     ?>

				<tr>
					<td></td>
					<td>المجموع</td>
					 <td id="sum1"></td>
					 <td id="sum2"></td>
					 <td id="sum3"></td>
				</tr>

			</table>


		</div>
	</div>
	<script>

    	  let rows1 = document.querySelectorAll("table tr td:nth-child(3)");
    	  let rows2 = document.querySelectorAll("table tr td:nth-child(4)");
    	  let rows3 = rows1-rows2;
          let sum1 = 0;
          let sum2 = 0;
          let sum3 = 0;
          for (let i = 1; i < rows1.length-1; i++) {
              sum1 += Number(rows1[i].textContent);
          }
          for (let i = 1; i < rows2.length-1; i++) {
              sum2 += Number(rows2[i].textContent);
          }
          for (let i = 1; i < rows3.length-1; i++) {
              sum3 += Number(rows3[i].textContent);
          }
   
          document.getElementById("sum3").textContent = sum1-sum2;
          document.getElementById("sum2").textContent = sum2;
          document.getElementById("sum1").textContent = sum1;
   
</script>
</body>
</html>