<?php
session_start();
if($_SESSION['user']){
    include 'conx.php';
?>
<html>
<head>

<title>Articles</title>

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

.table {
    width: 70%;
    max-width: 70%;
    margin-left: auto;
margin-right: auto;
    }


</style>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Gestion de Stock</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
         <div style="width: 100%">
  <div style="float: right;">
    <a href="Accueil.php?user=<?php echo $_GET['user']?>" type="button" class="btn btn-success" class="btn btn-info" >Retour</a>
 <a type="button" class="btn btn-info" href="Articles.php?user=<?php echo $_GET['user']?>">Actualis&eacute;</a>
 
  <a href="logout.php" type="button" class="btn btn-danger" class="btn btn-info" >Deconnexion</a>
  </div>
  </div>
</nav>



	<center>
		<h1>Articles</h1>
	</center>
<br><br>
	<form method="POST" >


<div style="width: 100%">
		
<div style="float: left;">
				<div class="col-md-12">
					<input class="form-control " type="text"
						name="date" id="date" value="<?php echo date("d-m-Y ")?>"
						placeholder="<?php echo date("d-m-Y")?>">
				</div></div>


 <?php
$quar = "SELECT * FROM fournisseur";
$resul = mysqli_query($conn, $quar);
if (! $resul) {
    die("error");
}
?>

		<div style="float: right;">
           <div class="col-md-12">
					<label>Nom Fournisseurs:</label> <select
						class="form-control select2" name="nomf" id="nomf" required>

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
				</div></div>
			
<?php
$quary = "SELECT max(bon) as max FROM article ";
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
		<p><?php include('articlephp.php');?> </p>
		<br>




		<table id="a" class="table table-bordered">

			<tr>
				<td>Code Article</td>
				<td>Quantite</td>

				<td>Prix Unitaire</td>
				<td>total</td>

			</tr>

			<tr>
				<td><input class="form-control " type="text" id="code" name="code" required></td>
				<td><input class="form-control " type="number" id="qte" name="qte"
					onchange="fu()" required></td>
				<td><input class="form-control " type="text" id="prixu" name="prixu"
					onchange="fu()" required></td>
				<td id="sum"></td>

			</tr>

			<tr>
				<td><input class="form-control " type="text" name="code1"></td>
				<td><input class="form-control " type="number" id="qte1" name="qte1"
					onchange="fu1()"></td>
				<td><input class="form-control " type="text" id="prixu1"
					onchange="fu1()" name="prixu1"></td>
				<td id="sum1"></td>

			</tr>
			<tr>
				<td><input class="form-control " type="text" name="code2"></td>
				<td><input class="form-control " type="number" id="qte2" name="qte2"
					onchange="fu2()"></td>
				<td><input class="form-control " type="text" id="prixu2"
					name="prixu2" onchange="fu2()"></td>
				<td id="sum2"></td>

			</tr>
			<tr>
				<td><input class="form-control " type="text" name="code3"></td>
				<td><input class="form-control " type="number" id="qte3" name="qte3"
					onchange="fu3()"></td>
				<td><input class="form-control " type="text" id="prixu3"
					name="prixu3" onchange="fu3()"></td>
				<td id="sum3"></td>
			</tr>
			<tr>
				<td><input class="form-control " type="text" name="code4"></td>
				<td><input class="form-control " type="number" id="qte4" name="qte4"
					onchange="fu4()"></td>
				<td><input class="form-control " type="text" id="prixu4"
					name="prixu4" onchange="fu4()"></td>
				<td id="sum4"></td>
			</tr>
			<tr>
				<td><input class="form-control " type="text" name="code5"></td>
				<td><input class="form-control " type="number" id="qte5" name="qte5"
					onchange="fu5()"></td>
				<td><input class="form-control " type="text" id="prixu5"
					name="prixu5" onchange="fu5()"></td>
				<td id="sum5"></td>
			</tr>
			<tr>
				<td><input class="form-control " type="text" name="code6"></td>
				<td><input class="form-control " type="number" id="qte6" name="qte6"
					onchange="fu6()"></td>
				<td><input class="form-control " type="text" id="prixu6"
					name="prixu6" onchange="fu6()"></td>
				<td id="sum6"></td>
			</tr>
			<tr>
				<td><input class="form-control " type="text" name="code7"></td>
				<td><input class="form-control " type="number" id="qte7" name="qte7"
					onchange="fu7()"></td>
				<td><input class="form-control " type="text" id="prixu7"
					name="prixu7" onchange="fu7()"></td>
				<td id="sum7"></td>
			</tr>
			<tr>
				<td><input class="form-control " type="text" name="code8"></td>
				<td><input class="form-control " type="number" id="qte8" name="qte8"
					onchange="fu8()"></td>
				<td><input class="form-control " type="text" id="prixu8"
					name="prixu8" onchange="fu8()"></td>
				<td id="sum8"></td>
			</tr>
			<tr>
				<td><input class="form-control " type="text" name="code9"></td>
				<td><input class="form-control " type="number" id="qte9" name="qte9"
					onchange="fu9()"></td>
				<td><input class="form-control " type="text" id="prixu9"
					name="prixu9" onchange="fu9()"></td>
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
				<td style="border-bottom-color: snow;    border-right-color: snow;"></td>
				<td style="border-bottom-color: snow;"></td>
				<td>Total</td>
				<td id="total"></td>

			</tr>
			<tr>
				<td style="border-bottom-color: snow;    border-right-color: snow;"></td>
				<td style="border-bottom-color: snow;"></td>
				<td>Avance</td>
				<td><input class="form-control " type="text" id="avance"
					name="avance" onchange="totalR()" required></td>

			</tr>
			<tr>
				<td style="border-bottom-color: snow;    border-right-color: snow;"></td>

				<td style="border-bottom-color: snow;"></td>
				<td>Reste</td>
				<td id="Reste"></td>

			</tr>

			


		</table>
		<div style="width: 100%">
		<div style="float: right;"><input type="submit" value="Enregister" class="btn"
					name="submit"></div>
					</div>
	</form>





	<script>
    $('.select2').select2();
</script>

	<script type="text/javascript" src="js/articleC.js"></script>




</body>
</html>
<?php }else{  header('location:../index.php');
exit();
}
?>