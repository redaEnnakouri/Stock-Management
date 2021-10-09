<?php
include ("conx.php");



$t=$_POST['code9'];
$test = preg_split ("/\./", $t);
$quar = "SELECT sum(qte) as quantite,sum(vstock)as tt,qte,prixu,vstock FROM `stock` WHERE `produit`='".$test[0]."'  group by `produit`  ";
$resul = mysqli_query($conn, $quar);
while ($ro = mysqli_fetch_assoc($resul)) {
    ?>
 
   <table>


    <tr>
 <td>
    <input class="form-control " type="number" id="qte9" name="qte9" max="<?php echo $ro['quantite'];?>"
					 required value="<?php echo $ro['quantite'];?>">
  
  </td>
  
  <td><input class="form-control " type="text" id="prixu9" name="prixu9"
					onchange="fu9()" required 
					value="<?php if($ro['quantite']!=0){ echo round($ro['tt']/$ro['quantite'],2) ;}else{ echo "0";};?>"></td>
					</tr>	</table>
					<input type="hidden"  name="qr9" value="<?php  echo $ro['qte']?>">
					<input type="hidden"  name="pr9"	value="<?php  echo $ro['prixu']?>">
					<input type="hidden"  name="m9"	value="<?php  if($ro['quantite']!=2){ echo round($ro['tt']/$ro['quantite'],2) ;}else{ echo "0";};?>">
 					<input type="hidden"  name="w9"	value="<?php echo $ro['quantite'];?>">
  <?php 
  
	}?>
	
   
            
            