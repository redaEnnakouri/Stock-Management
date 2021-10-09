<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
<style>
table{
    width:100%;
}
#example_filter{
    float:right;
}
#example_paginate{
    float:right;
}
label {
    display: inline-flex;
    margin-bottom: .5rem;
    margin-top: .5rem;
   
}

</style>
<script>$(document).ready(function() {
    $('#example').DataTable(
            
            {     

         "aLengthMenu": [[5, 10, 25, -1], [5, 10, 25, "All"]],
           "iDisplayLength": 5
          } 
           );
   } );


   function checkAll(bx) {
     var cbs = document.getElementsByTagName('input');
     for(var i=0; i < cbs.length; i++) {
       if(cbs[i].type == 'checkbox') {
         cbs[i].checked = bx.checked;
       }
     }
   }</script>
</head>


<?php
include '../conx.php';
$date = $_POST['date1'];
$date1 = $_POST['date2'];

$quary = "SELECT prix,date,nom,prixm,prixv,produit,qt as qte,prixv as v,total as t FROM rapport WHERE date BETWEEN '$date' AND '$date1' ";
$result = mysqli_query($conn, $quary);
if (! $result) {
    die("error");
}
?>



<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<a class="navbar-brand" href="#">إدارة المخازن</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse"
			data-target="#navbarNav" aria-controls="navbarNav"
			aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<a href="../Rapport.php?user=<?php echo $_GET['user']?>" type="button"
			class="btn btn-success" class="btn btn-info">رجوع</a>

	</nav>

	<center>
		<h1>تقرير المبيعات</h1>
		
		 <?php echo $date ?> و<?php echo $date1?> التاريخ بين
	</center>

	<br>
	<br>
	<br>
	<br>
	<div class="container">
	<div class="row">
	<table id="example" class="table table-striped table-bordered" style="width:100%">
	  <thead>
	   <tr>
			<th>تاريخ</th>
			<th>المنتجات</th>
			<th>اسم العميل</th>
		
			<th>سعر البيع</th>
			<th>الثمن في المخزن</th>
				<th>كمية المبيعات</th>
			<th>ربح </th>
			<th>المجموع</th>
			</tr>
		  </thead>

<?php
while ($row = mysqli_fetch_assoc($result)) {
    ?>
    <tr>
			<td><?php echo $row['date'] ?></td>
			<td><?php echo $row['produit'] ?></td>
			<td><?php echo $row['nom'] ?></td>
			
				<td><?php echo $row['prixm'] ?></td>
			<td><?php echo $row['prix'] ?></td>
			<td><?php echo $row['qte'] ?></td>
		
			<td> 
        <?php  if($row['qte']!=0){echo round($row['t']/$row['qte'],2);}else echo "0";?></td>
			<td><?php if($row['qte']!=0){echo round(($row['t']/$row['qte'])*$row['qte'],2);}else echo "0";?></td>
		</tr>
   <?php }?>

    
    <tbody>
   <tr>

			<th></th>
			<th></th>
			<th></th>
			<th></th>
			<th></th>
			<th></th>
			<th>المجموع</th	>
			<th id="sum3"></th>
		</tr></tbody>




	</table>
		</div>
</div>
	<script>

    	  let rows1 = document.querySelectorAll("table tr td:nth-child(2)");
    	  let rows2 = document.querySelectorAll("table tr td:nth-child(3)");
    	  let rows3 = document.querySelectorAll("table tr td:nth-child(8)");
          let sum1 = 0;
          let sum2 = 0;
          let sum3 = 0;
          for (let i = 0; i < rows1.length; i++) {
              sum1 += Number(rows1[i].textContent);
          }
          for (let i = 0; i < rows2.length; i++) {
              sum2 += Number(rows2[i].textContent);
          }
          for (let i = 0; i < rows3.length; i++) {
              sum3 += Number(rows3[i].textContent);
          }
   
          document.getElementById("sum3").textContent = sum3;
          document.getElementById("sum2").textContent = sum2;
          document.getElementById("sum1").textContent = sum1;
          
   
</script>