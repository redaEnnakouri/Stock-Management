<?php
session_start();
if ($_SESSION['user']) {

    include 'conx.php';
    ?>
<html>
<head>

<title>Accueil</title>
<link href="css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet"
	href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
	integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
	crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
	integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
	crossorigin="anonymous"></script>
<script
	src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
	integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
	crossorigin="anonymous"></script>
<script
	src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
	integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
	crossorigin="anonymous"></script>
<style type="text/css">
.col-sm btn {
	padding: 13px !important;
}

a {
	color: #fff;
}

.btn {
	padding: 1.5rem 1rem;
	background: #265a9d;
	width: 100%;
}

.row {
	padding: 7px;
}
</style>
<link href="css/flag.css" rel="stylesheet">
</head>

<body>
	<div style="float: right;">
		


		<nav class="navbar navbar-expand-lg navbar-light bg-light rounded">

			<div class="collapse navbar-collapse" id="navbarsExample09">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item dropdown"><a class="nav-link dropdown-toggle"
						id="dropdown09" data-toggle="dropdown" aria-haspopup="true"
						aria-expanded="false"><span class="flag flag-fr"> </span> France</a>
						<div class="dropdown-menu" aria-labelledby="dropdown09">
							<a class="dropdown-item" href="../AB/Accueil.php?user=<?php echo $_GET['user']?>"><span class="flag flag-ma"> </span>
								Maroc</a>
						</div></li>
				</ul>
			</div>
		</nav>
	</div>
	<br>
	<br>
	<br>
	<br>

	<center>
		<h1>Gestoin de stock</h1>

	</center>
	<div id="t">
		<br> <br> <br>

		<div class="container">
			<div class="row">
 <?php
    $quary = "SELECT * FROM compte where user='" . $_GET['user'] . "'";
    $result = mysqli_query($conn, $quary);
    if (! $result) {
        die("error");
    }

    while ($row = mysqli_fetch_assoc($result)) {

        if ($row['vente'] == 0) {
            ?>
          <div class="col-sm " id="m">
					<div class="btn">
						<a href="ventes.php?user=<?php echo $_GET['user']?>">Ventes</a>
					</div>
				</div>
          <div class="col-sm " id="o"  style="display: none;">
					<div class="btn">
						<a href="rapportdustock.php?user=<?php echo $_GET['user']?>">Ventes</a>
					</div>
				</div>
        
        <?php
        }

        if ($row['Article'] == 0) {
            ?>
        <div class="col-sm ">
					<div class="btn">
						<a href="Articles.php?user=<?php echo $_GET['user']?>">Articles/Achats</a>
					</div>
				</div>

        
        <?php
        }
        if ($row['Client'] == 0) {
            ?>
            <div class="col-sm ">
					<div class="btn">
						<a href="Cllient.php?user=<?php echo $_GET['user']?>">Clients</a>
					</div>

				</div>
        <?php
        }
        ?>
    </div>
			<div class="row">
    <?php

        if ($row['fournisseur'] == 0) {
            ?>
        <div class="col-sm ">
					<div class="btn">
						<a href="fournisseur.php?user=<?php echo $_GET['user']?>">Fournisseurs</a>
					</div>

				</div>
        <?php
        }
        if ($row['stock'] == 0) {
            ?>
         <div class="col-sm ">
					<div class="btn">
						<a href="stock.php?user=<?php echo $_GET['user']?>">Stocks</a><br>
					</div>

				</div>
        <?php
        }
        if ($row['etatClient'] == 0) {
            ?>
          <div class="col-sm ">
					<div class="btn">
						<a href="etatClient.php?user=<?php echo $_GET['user']?>">Etat
							Clients</a>
					</div>

				</div>
        <?php
        }
        ?>
    </div>
			<div class="row">
    <?php
        if ($row['etatFournisseur'] == 0) {
            ?>
         <div class="col-sm ">
					<div class="btn">
						<a href="EtatFournisseur.php?user=<?php echo $_GET['user']?>">Etat
							Fournisseurs</a>
					</div>

				</div>
        <?php
        }
        if ($row['rapport'] == 0) {
            ?>
         <div class="col-sm ">
					<div class="btn">
						<a href="Rapport.php?user=<?php echo $_GET['user']?>">Rapport
							Ventes</a>
					</div>

				</div>
        <?php
        }

        if ($row['articleg'] == 0) {
            ?>
  
    <div class="col-sm ">
					<div class="btn">
						<a href="GestionArticles.php?user=<?php echo $_GET['user']?>">Gestion
							Articles </a>
					</div>
				</div>
            <?php
        }

        ?></div>
			<div class="row">
<?php
        if ($row['venteg'] == 0) {
            ?>
        
    
    
        <div class="col-sm ">
					<div class="btn">
						<a href="GestionVente.php?user=<?php echo $_GET['user']?>">Gestion
							Ventes </a>
					</div>
				</div>
  <?php
        }

        if ($row['remarqueg'] == 0) {
            ?>
            <div class="col-sm ">
					<div class="btn">
						<a href="remarque.php?user=<?php echo $_GET['user']?>">Remarques </a>
					</div>
				</div>
<?php }}?>



<div class="col-sm ">
					<div class="btn">
						<a href="Gestion Compte.php?user=<?php echo $_GET['user']?>">Gestion
							Compte</a>
					</div>
				</div>



			</div>

		</div>


	</div>
 <?php
    $quar = "SELECT * FROM temp where id=1";
    $resul = mysqli_query($conn, $quar);
    if (! $resul) {
        die("error");
    }
    while ($ro = mysqli_fetch_assoc($resul)) {
        ?>
    <input type="hidden" value="<?php echo $ro['date']?>" id="date">
    
    <?php
    }
    ?>

<script type="text/javascript">
var d=document.getElementById("date").value ;
var today = new Date();
var tomorrow = new Date(d);
var x = document.getElementById("t");

if(today>tomorrow){

	x.style.display = "none";
}


</script>


	<script>
function myFunction() {
  var x = location.href;
  document.getElementById("demo").innerHTML = x;
}
</script>
	<script type="text/javascript">
	





</script>
<script type="text/javascript" src="js/remarque.js"></script>

</body>
</html>
<?php

}else{  header('location:../index.php');
exit();
}
?>