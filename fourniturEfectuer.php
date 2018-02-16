<?php
include("connectionM.php");
session_start();
if(isset($_SESSION['codecli']))
{
$reqfo="SELECT p.numproduit,f.idfournitur,f.datefournitur,p.designation,p.quantiteproduit,f.qteprodfournitur,p.prixUnitaire
       from Fourniture f,produit p
       where p.numproduit=f.numproduit";
$resultatfour=mysql_query($reqfo);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Document sans titre</title>
<link rel="stylesheet" href="design.css"  />
<link rel="stylesheet" type="text/css" href="decor.css">
</head>
<body>
<?php include("navigationE.php") ?>

<table class="bordered">
   <h3> Affichage des fourniture effectuer </h3>
   <thead>
<tr>
  <th>Numero de la Fourniture</th>
  <th>Date de la Fournniture</th>
  <th>Designation</th>
  <th>Quantite Avant Fourniture</th> 
  <th> Quantite Fournit </th> 
  <th>Prix Unitaire </th>
  <th>Montant Quantite Fournit</th>
  <th> Quantite Actuelle </th> 
 </tr>
 </thead>
<?php while($recupa=mysql_fetch_array($resultatfour)){?>
<tr>
<td> <?php echo $recupa['idfournitur'];?> </td> 
<td> <?php echo $recupa['datefournitur'];?> </td> 
<td> <?php echo $recupa['designation'];?> </td> 
<td> <?php echo $recupa['quantiteproduit']-$recupa['qteprodfournitur'];?></td>
<td> <?php echo $recupa['qteprodfournitur'];?> </td> 
<td> <?php echo $recupa['prixUnitaire'];?> </td>
<td> <?php echo $recupa['qteprodfournitur']*$recupa['prixUnitaire'];?> FCFA</td>
<td> <?php echo $recupa['quantiteproduit'];?></td>

</tr>
<?php } ?>
</table>	

</body>
</html>
<?php
}
else{
  header("Location:index.php");
}
?>