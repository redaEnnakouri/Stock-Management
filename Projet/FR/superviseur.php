<?php session_start();
if($_SESSION['user']){
    include 'conx.php';?>
<html>
<head>



<link href="css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">


<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.min.js"></script><link href="css/client.css" rel="stylesheet" >

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
	<link href="css/flag.css" rel="stylesheet">
<script type="text/javascript" src="js/client.js"></script>
<!------ Include the above in your HEAD tag ---------->
</head>
<body>


<center><h2>List des comptes</h2>
<div style="float: right;">
<nav class="navbar navbar-expand-lg navbar-light bg-light rounded">

			<div class="collapse navbar-collapse" id="navbarsExample09">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item dropdown"><a class="nav-link dropdown-toggle"
						id="dropdown09" data-toggle="dropdown" aria-haspopup="true"
						aria-expanded="false"><span class="flag flag-fr"> </span> France</a>
						<div class="dropdown-menu" aria-labelledby="dropdown09">
							<a class="dropdown-item" href="../AB/superviseur.php"><span class="flag flag-ma"> </span>
								Maroc</a>
						</div></li>
				</ul>
			</div>
		</nav>
						</div>
</center>

<div class="container-fluid">
		<div class="row">
			
			
<input class="form-control col-md-2" id="myInput" type="text" placeholder="Recherche compte">
<a href="Ajoutercompte.php"  type="button" class="btn"  style="float: right;">Ajouter un compte</a>
<a href="date.php"  type="button" class="btn"  style="float: right;">Date d'Experation</a>
</div>


</div>
</div></div>

<br><br>
 <?php
$quary = "SELECT * FROM compte";
$result = mysqli_query($conn, $quary);
if (! $result) {
    die("error");
}
?>
<div style="width: 100%;">
<div style="float: right;">
<form action="superviseur.php">
<input type="submit" class="btn btn-info" value="Actualis&eacute;">
<a href="logout.php" type="button" class="btn btn-danger" class="btn btn-info" >Deconnexion</a>
</form>



</div></div>
<table class="table table-bordered">
  <thead>
    <tr>
      <th>User </th>
      <th>Password</th>
      <th>Gestion Vente</th>
      <th> Gestion Article</th>
      <th>Vente</th>
      <th>Article</th> 
       <th>Client</th>
      <th>Fournisseur</th>
      <th>Stock</th> 
       <th>Etat Fournisseur</th> 
        <th>Etat Client</th> 
         <th>Rapport</th> 
 
       <th>Modif/Supp</th>
    </tr>
  </thead>
  <tbody id="myTable">
  <?php
        while ($row = mysqli_fetch_assoc($result)) {
            ?>
    <tr>
        
      <td><?php  echo $row['user']?></td>
      <td><?php  echo $row['passe']?></td>
      
       <td><input class="inline checkbox" type="checkbox" value="<?php  echo $row['venteg']?>"  <?php if ($row['venteg'] == 0) { echo "checked='checked'"; } ?> disabled="disabled"></td>
       <td><input  type="checkbox" value="<?php  echo $row['articleg']?>" <?php if ($row['articleg'] == 0) { echo "checked='checked'"; } ?> disabled="disabled" ></td>
         
      
      
      <td><input class="inline checkbox" type="checkbox" value="<?php  echo $row['vente']?>"  <?php if ($row['vente'] == 0) { echo "checked='checked'"; } ?> disabled="disabled"></td>
       <td><input  type="checkbox" value="<?php  echo $row['Article']?>" <?php if ($row['Article'] == 0) { echo "checked='checked'"; } ?> disabled="disabled" ></td>
                  <td><input  type="checkbox" value="<?php  echo $row['Client']?>" <?php if ($row['Client'] == 0) { echo "checked='checked'"; } ?> disabled="disabled" ></td>
           
            <td><input  type="checkbox" value="<?php  echo $row['fournisseur']?>" <?php if ($row['fournisseur'] == 0) { echo "checked='checked'"; } ?> disabled="disabled" ></td>
            <td><input  type="checkbox" value="<?php  echo $row['stock']?>" <?php if ($row['stock'] == 0) { echo "checked='checked'"; } ?> disabled="disabled" ></td>
            <td><input  type="checkbox" value="<?php  echo $row['etatClient']?>" <?php if ($row['etatClient'] == 0) { echo "checked='checked'"; } ?> disabled="disabled" ></td>
                 <td><input  type="checkbox" value="<?php  echo $row['etatFournisseur']?>" <?php if ($row['etatFournisseur'] == 0) { echo "checked='checked'"; } ?> disabled="disabled" ></td>
                      <td><input  type="checkbox" value="<?php  echo $row['rapport']?>" <?php if ($row['rapport'] == 0) { echo "checked='checked'"; } ?> disabled="disabled" ></td>
     
     
      <td><a href="upco.php?id=<?php echo $row['id']?>" class="btn btn-success">Edit</a>
      
      
     <a href="supp/suppcom.php?id=<?php echo $row['id']?>" class="btn btn-danger">Supp</a>
      </td>
    </tr>
   
     <?php

}
        ?>
   
 
  </tbody>
</table>

  <script type="text/javascript" src="supp/suppcompte.js"></script>
</body>
</html>
<?php }else{  header('location:../index.php');
exit();
}
?>
