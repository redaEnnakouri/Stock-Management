<?php
if (isset($_POST["export"])) {

    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "gestionstock1";

    $con = mysqli_connect($host, $user, $pass, $db);
    $query = "select * from remarque where id=".$_GET['id'];
    $result = mysqli_query($con, $query);

    
     header('Content-type:application/vnd.msword');
     header('Expires: 0');
    
     header('Cache-Controle: must-revalidate, post-check=0, pre-check=0');

     header("Content-Disposition: attachment; filename=Remarque_".date('d-m-Y').".doc");
    ?>
<meta charset="utf-8">
<!-- Content Header (Page header) -->
<section class="content-header">


	<table>
		<tr>
		
		<?php
    $que = "select * from remarque where id=".$_GET['id'];
    $resu = mysqli_query($con, $que);
    while ($roww = mysqli_fetch_assoc($resu)) {

        ?>
    	


			<td style="float: left">
				<h4>
					<center><?php echo $roww['id'] ?>: رقم الملاحظة </center>
				</h4>
			</td>
			
			<td style="float: right;margin-left: 30%"><h4>  <?php echo $roww['date']?>	:تاريخ الملاحظة	</h4></td>
		</tr>
	</table>

<br><br><br>
<br><br><br>


			
			
			<p style="width: 150px"><?php echo $roww['rem'] ?> </p>
		
    <?php
    }
    ?>
		
	
	
	<?php }?>
