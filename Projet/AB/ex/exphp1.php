<?php
include ("conx.php");



$t=$_POST['code1'];
$test = preg_split ("/\./", $t);
$quar = "SELECT sum(qte) as quantite,sum(vstock)as tt,qte,prixu,vstock FROM `stock` WHERE `produit`='".$test[0]."'  group by `produit`  ";
$resul = mysqli_query($conn, $quar);
while ($ro = mysqli_fetch_assoc($resul)) {
    ?>
 
   <table>


    <tr>
 <td>
    <input class="form-control " type="number" id="qte1" name="qte1" max="<?php echo $ro['quantite'];?>"
					 required value="<?php echo $ro['quantite'];?>">
  
  </td>
  
  <td><input class="form-control " type="text" id="prixu1" name="prixu1"
					onchange="fu1()" required 
					value="<?php if($ro['quantite']!=0){ echo round($ro['tt']/$ro['quantite'],2) ;}else{ echo "0";};?>"></td>
					</tr>	</table>
					<input type="hidden"  name="qr1" value="<?php  echo $ro['qte']?>">
					<input type="hidden"  name="pr1"	value="<?php  echo $ro['prixu']?>">
					<input type="hidden"  name="m1"	value="<?php  if($ro['quantite']!=2){ echo round($ro['tt']/$ro['quantite'],2) ;}else{ echo "0";};?>">
 					<input type="hidden"  name="w1"	value="<?php echo $ro['quantite'];?>">
 
  <?php 
  
	}?>
	
   
            
            