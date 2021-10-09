<?php include 'conx.php';?>
<html>
<head>



<link href="css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">


<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.min.js"></script>

<!------ Include the above in your HEAD tag ---------->
<style type="text/css">


</style>
</head>
<body>
<center><h2>Rapport de vente</h2>
    <a href="Accueil.php?user=<?php echo $_GET['user']?>" type="button" class="btn btn-success" class="btn btn-info" >Retour</a>
  
</center>

	
<br><br>
<center>
<table>
<tr>
<form action="js/rapport.php?user=<?php echo $_GET['user']?>" method="POST">
<td> <input class="form-control " id="date" name="date1" type="date" placeholder="JJ/MM/AAAA"></td>
<td> <input class="form-control " id="date1" name="date2" type="date" placeholder="JJ/MM/AAAA"></td>
<td>
<input type="submit" value="Rechercher"  class="btn ">
</td>
</form>
</tr>

</table>


<div id="su"></div>


		<script type="text/javascript" src="js/rapport.js"></script>

</body>
</html>