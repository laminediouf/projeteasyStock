<?php
include("connectionM.php");
session_start();
if(isset($_SESSION['codecli']))
{
//requete de recupere
$req="SELECT designation,prixUnitaire,quantiteproduit,prixUnitaire*quantiteproduit as Montant FROM produit order by designation";
$resultat=mysql_query($req);
//requete de Calcule du prix total
$reqT="SELECT SUM(prixUnitaire*quantiteproduit) as MontantTotal FROM produit";
$resultatT=mysql_query($reqT);

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
<?php include("enteteE.php") ?>
<?php include("navigationE.php") ?>
<table class="bordered">
   <h3> INVENTAIRE DES ProduitS </h3>
   <thead>
<tr>
  <th> Designation </th>
  <th> Prix Unitaire </th> 
  <th> Quantite </th> 
  <th> Montant</th>
</tr>
</thead>
<?php while($recup=mysql_fetch_array($resultat)){?>
<tr>
<td> <?php echo $recup['designation'];?> </td> 
<td> <?php echo $recup['prixUnitaire'];?> </td> 
<td> <?php echo $recup['quantiteproduit'];?> </td> 
<td> <?php echo $recup['Montant'];?> </td>
</tr>
<?php } ?>

<?php while($recup=mysql_fetch_array($resultatT)){?>
<tr>
   <th> Montant Total </th>
  <th><?php echo $recup['MontantTotal'];?>   </th>
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