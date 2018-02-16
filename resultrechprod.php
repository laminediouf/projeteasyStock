<?php
include("connectionM.php");
session_start();
if(isset($_SESSION['codecli']))
{
//resultat recherche
if (isset($_GET['choixpp'])){
$reqp="SELECT  numproduit,designation,prixUnitaire FROM produit WHERE  numproduit='".$_GET['choixpp']."' ";
$resultatp=mysql_query($reqp);

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
<?php include("navigationE.php") ?>
<table class="bordered">
 <h3> LISTE DES Produit </h3>
 <thead>
<tr>
  <th>Numero du Produit</th>
  <th>Designation</th>
  <th>Prix </th> 
  <th> VOIR </th> 
</tr>
</thead>
<?php while($recup=mysql_fetch_array($resultatp)){?>
<tr>
<td> <?php echo $recup['numproduit'];?> </td> 
<td> <?php echo $recup['designation'];?> </td> 
<td> <?php echo $recup['prixUnitaire'];?> </td> 
<td> <a href="ficheproduit.php?numproduit=<?php echo $recup['numproduit'];?>">Voir</a></td>
</tr>
<?php } ?>
</table><br/><br/>
           <input type="button" value="RETOUR" onclick="self.history.back();"/>

</body>
</html>
<?php
}
else{
	header("Location:index.php");
}
?>