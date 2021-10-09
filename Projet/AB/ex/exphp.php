<?php
include ("conx.php");

$t=$_POST['code'];
$test = preg_split ("/\./", $t); 
$quar = "SELECT sum(qte) as quantite,sum(vstock)as tt,qte,prixu,vstock FROM `stock` WHERE `produit`='".$test[0]."'  group by `produit`  ";
$resul = mysqli_query($conn, $quar);
while ($ro = mysqli_fetch_assoc($resul)) {
    ?>
    <table>


    <tr>
 <td>
    <input class="form-control " type="number" id="qte" name="qte" max="<?php echo $ro['quantite'];?>"
					 required value="<?php echo $ro['quantite'];?>">
  
  </td>
  
  <td><input class="form-control " type="text" id="prixu" name="prixu"
					onchange="fu()" required 
					value="<?php if($ro['quantite']!=0){ echo round($ro['tt']/$ro['quantite'],2) ;}else{ echo "0";};?>"></td>
					</tr>	</table>
					
					<input type="hidden" id="qr" name="qr"	value="<?php  echo $ro['qte']?>">
					<input type="hidden" id="pr" name="pr"	value="<?php  echo $ro['prixu']?>">
					<input type="hidden" id="m" name="m"	value="<?php  if($ro['quantite']!=0){ echo round($ro['tt']/$ro['quantite'],2) ;}else{ echo "0";};?>">
 					<input type="hidden" id="w" name="w"	value="<?php echo $ro['quantite'];?>">
 
  <?php 
  
	}?>
	
   
            
            