<?php ob_start() ?>
<?php
include "conx.php";

$quaryy = "DROP TABLE vente";
$resultt = mysqli_query($conn, $quaryy);
$quary = "DROP TABLE stock";
$result = mysqli_query($conn, $quary);
?> 
<html><body>
<?php
$x=$_GET['user'];
header("location:../vente.php?user=$x");?>
</body>
</html>