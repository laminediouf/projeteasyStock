<?php
include("connectionM.php");
session_start();
if(isset($_SESSION['codecli']))
{
$somme=0;
//$req="SELECT DISTINCT codecli,numcom FROM commande";

$reqx="SELECT cd.numcom,c.codecli,p.designation,p.prixUnitaire,pc.quantite,prixUnitaire*quantite as 'Montant'
       from commande cd,client c,produit p,panier pc
       where c.codecli=cd.codecli and cd.numcom=pc.numcom and p.numproduit=pc.numproduit";
$result=mysql_query($reqx);

if(isset($_GET['num'])){
  $tmp=0;
  $reql="SELECT * FROM commande where numcom ='".$_GET['num']."'";
  $resultl=mysql_query($reql);

}
?>
<!DOCTYPE html>
<html>
<head>
  <title>facturation</title>
    <link rel="stylesheet" href="design.css"  />
      <link rel="stylesheet" type="text/css" href="tableunik.css">
</head>
<body>
  <?php include("navigationE.php");?>
  <center><img src="lamino.jpg" height="200px"></center><br>
   <form method="get" action="<?php echo $_SERVER['PHP_SELF']?>"><center>
      <label>Numero-Commande</label>
        <select name="num">
          <?php while($recup=mysqli_fetch_array($result)){?>
            <option><?php echo $recup['numcom'];?></option>
            <?php }?>
        </select><br><br>
      <input type="submit" class="but" name="rech" value="rechercher">
   </form>
   <?php if (isset($tmp)){?>
        <h1>Facture</h1></center>
        <table align="center" width="70%" cellpadding="10px" >
          <tr bgcolor="#cococo">
            <td>Designation</td>
            <td>Quantite</td>
            <td>P.U</td>
            <td>Total</td>
          </tr>
          <?php while($recupl=mysqli_fetch_array($resultl)){?>
          <tr bgcolor="WHITE">
            <td><?php echo $recupl['designation'];?></td>
            <td><?php echo $recupl['quantite'];?></td>
            <td><?php echo $recupl['prixUnitaire'];?></td>
            <td><?php echo $recupl['prixUnitaire']*$recupl['quantite'];?></td>
                <?php $somme=$somme+$recupl['prixUnitaire']*$recupl['quantite'];?>
          </tr>
          <?php }?>
        </table>
         <br><br>
        <table width="50%" align="center" cellpadding="8px">
          <tr bgcolor="#cococo">
            <td>Net a payer(F CFA)</td><td><?php echo $somme;?></td>
          </tr>
        </table>
        <?php }?>
</body>
</html>
<?php
}
else{
  header("Location:index.php");
}
?>