<?php ob_start() ?>
<?php
include "conx.php";

$quaryy = "DELETE FROM vente WHERE `bon`='".$_GET['id']."'";
$resultt = mysqli_query($conn, $quaryy);
if (! $resultt) {
    die("error");
}
$qua = "DELETE FROM venbon WHERE `bon`='".$_GET['id']."'";
$res = mysqli_query($conn, $qua);

?> 
<html><body>
<?php 
$x=$_GET['user'];
header("location:../GestionVente.php?user=$x");?>
</body>
</html>