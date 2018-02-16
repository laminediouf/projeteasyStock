<?php
include("connectionM.php");
session_start();
if(isset($_SESSION['codecli']))
{
if(isset($_GET['numproduit'])){
$req="SELECT numproduit,designation,quantiteproduit,prixUnitaire,type,codefournis FROM produit WHERE numproduit='".$_GET['numproduit']."'";
$resultat=mysql_query($req);
$recup=mysql_fetch_array($resultat);
}

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
<caption><h3> FICHE D'ENREGISTREMENT </h3></caption>
<tr>
  <th>Numero du Produit</th>
  <td> <?php echo $recup['numproduit'];?> </td>
</tr>
<tr>
  <th>Designation</th>
  <td> <?php echo $recup['designation'];?> </td>
</tr>
<tr>
  <th>Quantite de Produit</th>
  <td> <?php echo $recup['quantiteproduit'];?> </td>
</tr>
<tr>
  <th>Prix Uniitaire</th>
  <td> <?php echo $recup['prixUnitaire'];?> </td>
</tr>
<tr>
  <th>Type de produit</th>
  <td> <?php echo $recup['type'];?> </td>
</tr>
<tr>
  <th>Code du Fournisseur</th>
  <td> <?php echo $recup['codefournis'];?> </td>
</tr>
</table>
<input type="button" value="RETOUR" onclick="self.history.back();"/>

</body>
</html>
<?php
}
else{
  header("Location:index.php");
}
?>