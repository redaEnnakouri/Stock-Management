<?php
session_start();
if($_SESSION['user']){include 'conx.php';?>
<html>
<head>

<title>Ventes</title>

<link href="css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">


<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link
	href="css/select2.min.css"
	rel="stylesheet" />
<script
	src="js/select2.min.js"></script>
<style type="text/css">

.select2{
width: 312.033px
}
.table {
    width: 70%;
    max-width: 70%;
    margin-left: auto;
margin-right: auto;
    }
    .table td{
    vertical-align: inherit !important;
}

</style>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Gestion de stock</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
        <div style="width: 100%">
  <div style="float: right;">
    <a href="Accueil.php?user=<?php echo $_GET['user']?>" type="button" class="btn btn-success" class="btn btn-info" >Retour</a>
 <a type="button" class="btn btn-info" href="ventes.php?user=<?php echo $_GET['user']?>">Actualis&eacute;</a>
 
  <a href="logout.php" type="button" class="btn btn-danger" class="btn btn-info" >Deconnexion</a>
  </div>
  </div>
</nav>


	<center>
		<h1>Ventes</h1>
	</center>
	<br>
	<br>
	<form  method="POST" >


		<div style="width: 100%">

			<div style="float: left;">
				<div class="col-md-12">
					<input class="form-control " type="text" name="date" id="date"
						value="<?php echo date("d-m-Y ")?>"
						placeholder="<?php echo date("d-m-Y")?>">
				</div>
			</div>


 <?php
$quar = "SELECT * FROM client";
$resul = mysqli_query($conn, $quar);
if (! $resul) {
    die("error");
}
?>

		<div style="float: right;">
				<div class="col-md-12">
					<label>Nom Client:</label> <select class="form-control select2"
						name="nomf" id="nomf" required>

						<option></option> 

        <?php
        while ($ro = mysqli_fetch_assoc($resul)) {
            ?>
         <option value="<?php  echo $ro['nom']?>"><?php  echo $ro['nom']?></option>
        <?php
        }
        ?>

	        </select>
				</div>
			</div>
		</div>
			
<?php
$quary = "SELECT max(bon) as max FROM vente ";
$result = mysqli_query($conn, $quary);
while ($row = mysqli_fetch_assoc($result)) {
  
    $c = $row['max'] + 1;
    ?>
       <center> BON N&#176;<?php echo $c?></center>
		<input value="<?php echo $c?>" type="hidden" name="c">
        <?php
}

?>
<br>
		<p><?php include('ventesphp.php');?> </p>
		<br>



<div class="text-center">
		<table id="a" class="table table-bordered text-center">

			<tr>
				<td >produit</td>
				<td>Quantite</td>

				<td>Prix Unitaire</td>
				<td>total</td>

			</tr>
			 <?php
    $quar = "SELECT * FROM stock group by `produit`  ";
    $resul = mysqli_query($conn, $quar);
    if (! $resul) {
        die("error");
    }
    ?>
			<tr>
				<!-- 			start 1 -->

				<td>
				<select class="form-control select2" id="code" name="code"
					onchange="h()" required>

						<option></option> 

        <?php
        while ($ro = mysqli_fetch_assoc($resul)) {
            ?>
         <option  value="<?php  echo $ro['produit']?>.<?php  echo $ro['id']?> "><?php  echo $ro['produit']?></option>
        <?php
        }
        ?>
	        </select></td>
	      
				<td id="su" colspan="2">
					
					</td>
					
					
				<td id="sum"></td>

			</tr>

			<tr>
				<!-- 			start 2-->

	 <?php
$quar1 = "SELECT * FROM stock group by `produit`";
$resul1 = mysqli_query($conn, $quar1);
if (! $resul1) {
    die("error");
}
?>
				<td><select class="form-control  select2" id="code1" name="code1"
					onchange="h1()"  >

						<option></option> 

        <?php
        while ($ro1 = mysqli_fetch_assoc($resul1)) {
            ?>
         <option value="<?php  echo $ro1['produit']?>.<?php  echo $ro1['id']?>"><?php  echo $ro1['produit']?></option>
        <?php
        }
        ?>
	        </select></td>
					<td id="su1" colspan="2">
					
					</td>
				<td id="sum1"></td>

			</tr>
			<tr>

				<!-- 			start 3-->

	 <?php
$quar2 = "SELECT * FROM stock group by `produit`";
$resul2 = mysqli_query($conn, $quar2);
if (! $resul2) {
    die("error");
}
?>
				<td><select class="form-control select2" id="code2" name="code2"
					onchange="h2()"  >

						<option></option> 

        <?php
        while ($ro2 = mysqli_fetch_assoc($resul2)) {
            ?>
         <option value="<?php  echo $ro2['produit']?>.<?php  echo $ro2['id']?>"><?php  echo $ro2['produit']?></option>
        <?php
        }
        ?>
	        </select></td>
				
						<td id="su2" colspan="2">
					
					</td>
				<td id="sum2"></td>

			</tr>
			<tr>
								<!-- 			start 2-->

	 <?php
$quar3 = "SELECT * FROM stock group by `produit`";
$resul3 = mysqli_query($conn, $quar3);
if (! $resul3) {
    die("error");
}
?>
				<td><select class="form-control select2" id="code3" name="code3"
					onchange="h3()"  >

						<option></option> 

        <?php
        while ($ro3 = mysqli_fetch_assoc($resul3)) {
            ?>
         <option value="<?php  echo $ro3['produit']?>.<?php  echo $ro3['id']?>"><?php  echo $ro3['produit']?></option>
        <?php
        }
        ?>
	        </select></td>
					<td id="su3" colspan="2">
					
					</td>
				<td id="sum3"></td>
			</tr>
			<tr>
								<!-- 			start 2-->

	 <?php
$quar4 = "SELECT * FROM stock group by `produit`";
$resul4 = mysqli_query($conn, $quar4);
if (! $resul4) {
    die("error");
}
?>
				<td><select class="form-control select2" id="code4" name="code4"
					onchange="h4()"  >

						<option></option> 

        <?php
        while ($ro4 = mysqli_fetch_assoc($resul4)) {
            ?>
         <option value="<?php  echo $ro4['produit']?>.<?php  echo $ro4['id']?>"><?php  echo $ro4['produit']?></option>
        <?php
        }
        ?>
	        </select></td>
					<td id="su4" colspan="2">
					
					</td>
				<td id="sum4"></td>
			</tr>
			<tr>
								<!-- 			start 2-->

	 <?php
$quar5 = "SELECT * FROM stock group by `produit`";
$resul5 = mysqli_query($conn, $quar5);
if (! $resul5) {
    die("error");
}
?>
				<td><select class="form-control select2" id="code5" name="code5"
					onchange="h5()"  >

						<option></option> 

        <?php
        while ($ro5 = mysqli_fetch_assoc($resul5)) {
            ?>
         <option value="<?php  echo $ro5['produit']?>.<?php  echo $ro5['id']?>"><?php  echo $ro5['produit']?></option>
        <?php
        }
        ?>
	        </select></td>
					<td id="su5" colspan="2">
					
					</td>
				<td id="sum5"></td>
			</tr>
			<tr>
								<!-- 			start 2-->

	 <?php
$quar6 = "SELECT * FROM stock group by `produit`";
$resul6 = mysqli_query($conn, $quar6);
if (! $resul6) {
    die("error");
}
?>
				<td><select class="form-control select2" id="code6" name="code6"
					onchange="h6()"  >

						<option></option> 

        <?php
        while ($ro6 = mysqli_fetch_assoc($resul6)) {
            ?>
         <option value="<?php  echo $ro6['produit']?>.<?php  echo $ro6['id']?>"><?php  echo $ro6['produit']?></option>
        <?php
        }
        ?>
	        </select></td>
					<td id="su6" colspan="2">
					
					</td>
				<td id="sum6"></td>
			</tr>
			<tr>
								<!-- 			start 2-->

	 <?php
$quar7 = "SELECT * FROM stock group by `produit`";
$resul7 = mysqli_query($conn, $quar7);
if (! $resul7) {
    die("error");
}
?>
				<td><select class="form-control select2" id="code7" name="code7"
					onchange="h7()"  >

						<option></option> 

        <?php
        while ($ro7 = mysqli_fetch_assoc($resul7)) {
            ?>
         <option value="<?php  echo $ro7['produit']?>.<?php  echo $ro7['id']?>"><?php  echo $ro7['produit']?></option>
        <?php
        }
        ?>
	        </select></td>
					<td id="su7" colspan="2">
					
					</td>
				<td id="sum7"></td>
			</tr>
			<tr>
								<!-- 			start 2-->

	 <?php
$quar8 = "SELECT * FROM stock group by `produit`";
$resul8 = mysqli_query($conn, $quar8);
if (! $resul8) {
    die("error");
}
?>
				<td><select class="form-control select2" id="code8" name="code8"
					onchange="h8()"  >

						<option></option> 

        <?php
        while ($ro8 = mysqli_fetch_assoc($resul8)) {
            ?>
         <option value="<?php  echo $ro8['produit']?>.<?php  echo $ro8['id']?>"><?php  echo $ro8['produit']?></option>
        <?php
        }
        ?>
	        </select></td>
					<td id="su8" colspan="2">
					
					</td>
				<td id="sum8"></td>
			</tr>
			<tr>
								<!-- 			start 2-->

	 <?php
$quar9 = "SELECT * FROM stock group by `produit` ";
$resul9 = mysqli_query($conn, $quar9);
if (! $resul9) {
    die("error");
}
?>
				<td><select class="form-control select2" id="code9" name="code9"
					onchange="h9()"  >

						<option></option> 

        <?php
        while ($ro9 = mysqli_fetch_assoc($resul9)) {
            ?>
         <option value="<?php  echo $ro9['produit']?>.<?php  echo $ro9['id']?>" id="p"><?php  echo $ro9['produit']?></option>
        <?php
        }
        ?>
	        </select></td>
					<td id="su9" colspan="2">
					
					</td>
				<td id="sum9"></td>
			</tr>
			<tr style="display: none;">
				<td><input class="form-control " type="text" name="code10"></td>
				<td><input class="form-control " type="number" id="qte10"
					name="qte10"></td>
				<td><input class="form-control " type="text" id="prixu10"
					name="prixu10"></td>
				<td id="sum9"></td>
			</tr>
			<tr>
				<td style="border-bottom-color: snow; border-right-color: snow;"></td>
				<td style="border-bottom-color: snow;"></td>
				<td>Total</td>
				<td id="total"></td>

			</tr>
			<tr>
				<td style="border-bottom-color: snow; border-right-color: snow;"></td>
				<td style="border-bottom-color: snow;"></td>
				<td>Avance</td>
				<td><input class="form-control " type="text" id="avance"
					name="avance" onchange="totalR()" required></td>

			</tr>
			<tr>
				<td style="border-bottom-color: snow; border-right-color: snow;"></td>

				<td style="border-bottom-color: snow;"></td>
				<td>Reste</td>
				<td id="Reste"></td>

			</tr>



		</table>
		</div>
		<div style="width: 100%">
			<div style="float: right;">
				<input type="submit" value="Enregister" class="btn" name="submit">
			</div>
		</div>
	</form>



	<script type="text/javascript" src="js/articleC.js"></script>
	<script type="text/javascript" src="js/articlea.js"></script>
	<script>
    $('.select2').select2();
</script>





</body>
</html>
<?php }else{  header('location:../index.php');
exit();
}
?>
