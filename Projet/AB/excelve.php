<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
   "http://www.w3.org/TR/html4/strict.dtd">
<HTML lang="ar" dir="rtl">
<HEAD>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<?php
if (isset($_POST["export"])) {

    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "gestionstock1";

    $con = mysqli_connect($host, $user, $pass, $db);
    $query = "select * from venbon where bon='".$_GET['bon']."'   ";
    $result = mysqli_query($con, $query);

   // header('Content-type:application/vnd-ms-excel');

    //header("Content-Disposition: attachment; filename=Bon".$_GET['bon'].".xls");
    header('Content-type:application/vnd.msword');
//header('Expires: 0');
    
   // header('Cache-Controle: must-revalidate, post-check=0, pre-check=0');
   // header("Content-Disposition: attachment; filename=Bon".$_GET['bon'].".doc");
    

    
    header("Pragma: public");
    header("Expires: 0");
    header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
    header("Content-Type: application/force-download");
    header("Content-Type: application/octet-stream");
    header("Content-Type: application/download");;
    header("Content-Disposition: attachment; filename=Bon".$_GET['bon'].".doc");
    header("Content-Transfer-Encoding: binary ");
    ?>
<meta charset="utf-8">
</HEAD>
<!-- Content Header (Page header) -->
<section class="content-header">
<center><h3>بيع</h3></center>
<br><br><br>
	<table>
		<tr>
		
		<?php
    $que = "select * from vente where bon='".$_GET['bon']."'  group by bon   ";
    $resu = mysqli_query($con, $que);
    while ($roww = mysqli_fetch_assoc($resu)) {

        ?>
    	<td><h4> <?php echo $roww['date']?>: تاريخ الفاتورة</h4></td>



			<td  style="margin-right: 14%">
				<h4>
					<center><?php echo $roww['bon'] ?> رقم الفاتورة  </center>
				</h4>
				</td>
				
			<td  style="margin-right: 12%">
				<h4><?php echo $roww['nom'] ?>: زبون </h4>
			</td>

    <?php
    }
    ?>
		
	
	
	</table>
	<br>
</section>
<br><br><br>
<table id="example1" border="1" style="width: 100%">
	<thead>
		<tr >
			<th>كود المنتج</th>
				<th>الكمية</th>
				<th>ثمن الوحدة</th>
				<th>المجموع</th>

		</tr>
	</thead>
	<tbody>
    
    
    <?php
    while ($row = mysqli_fetch_assoc($result)) {
        ?>
<tr>
			<td> <?php  echo $row['produit'] ?></td>
			<td><?php  echo $row['qt'] ?></td>
			<td><?php  echo $row['prixv'] ?></td>
			<td><?php  echo $row['qt']*$row['prixv'] ?></td>
		</tr>
<?php
    }
    ?>
                </tbody>
                <?php
    $conn = mysqli_connect($host, $user, $pass, $db);
    $quer = "select total,avance,reste from vente where bon='".$_GET['bon']."'   group by bon   ";
    $resul = mysqli_query($conn, $quer);
    while ($ro = mysqli_fetch_assoc($resul)) {

        ?>
                <tr>
		<td></td>
		<td></td>
		<td>المجموع</td>
		<td><?php  echo $ro['total'] ?></td>
	</tr>
	<tr>
		<td></td>
		
		<td></td>
		<td>التسبيق</td>
		<td><?php  echo $ro['avance'] ?></td>
	</tr>
	<tr>
		<td></td>
		<td></td>
		<td>الباقي</td>
		<td><?php  echo $ro['total']-$ro['avance'] ?></td>
	</tr>
      
      <?php
    }
    ?>          
                <tbody>

	</tbody>

</table>


<?php
}
?>
</HTML>
