<?php ob_start() ?>
<?php
include ("conx.php");
$code=$_POST['code'];

$quar = "SELECT quantite FROM `articles` WHERE code Article='".$_POST['code']."' ";
	$resul = mysqli_query($conn, $quar);
	while ($ro = mysqli_fetch_assoc($resul)) {
	    
	    echo $ro['quantite'];
?>
<script type="text/javascript">




	 
	 var h ="<?php echo $ro['quantite']; ?>"
	 alert(h);

	
	 document.getElementById("qte").value=h;


	


</script>
<?php
	}
	?>