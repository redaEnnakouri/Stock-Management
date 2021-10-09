<?php ob_start() ?>
<?php
include "conx.php";

$quaryy = "DELETE FROM  stock WHERE `produit`='".$_GET['id']."'";
$resultt = mysqli_query($conn, $quaryy);
if (! $resultt) {
    die("error");
}


?> 
<html><body>

<?php 
$x=$_GET['user'];
header("location:../stock.php?user=$x");?>
</body>
</html>