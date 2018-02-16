<?php
include("connectionM.php");
session_start();
if(isset($_SESSION['codecli']))
{

if (isset($_GET['numproduit'])){
$reqr="SELECT numproduit,designation,quantiteproduit,prixUnitaire,type,codefournis FROM produit WHERE numproduit='".$_GET['numproduit']."'";
$resultatr=mysql_query($reqr);
$recupr=mysql_fetch_array($resultatr);
}
//REQUETE MENU DEROULANT
$reqm="SELECT * FROM produit";
$resultatm=mysql_query($reqm);
//REQUETTE DE MODIFICATION
if (isset($_POST['bouton'])){
$reqmodif="UPDATE produit SET numproduit='".$_POST['numpro']."',designation='".$_POST['desig']."',quantiteproduit='".$_POST['qtepr']."',prixUnitaire='".$_POST['pri']."',type='".$_POST['typ']."',codefournis='".$_POST['codfour']."' WHERE numproduit='".$_POST['numpro']."'";
$resultatmodif=mysql_query($reqmodif);
header("location:produit.php");
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
 <form method="post"  action="modifieproduit.php">
 <fieldset>
 <caption> <h3> MODIFICATION </h3> </caption>
 <label> Numero du produit </label><input type="hidden" name="numpro" value="<?php echo $recupr['numproduit'];?>"/><?php echo $recupr['numproduit'];?> <br /><br />
 <label> Designation </label>  <input type="text" name="desig" value="<?php echo $recupr['designation'];?>" /> <br /><br />
 <label> Quantite du Produit </label> <input type="text" name="qtepr" value="<?php echo $recupr['quantiteproduit'];?> "/> <br /><br /><br />
 <label> Prix Unitaire </label> <input type="text" name="pri" value="<?php echo $recupr['prixUnitaire'];?> "/> <br /><br />
 <label> Type </label> <input type="text" name="typ" value="<?php echo $recupr['type'];?> "/> <br /><br />
 <label> code du Fournisseur </label> <input type="text" name="codfour" value="<?php echo $recupr['codefournis'];?> "/> <br /><br />
  
  <input type="submit" name="bouton" value="MODIFIER" /><br /> <br />
  <input type="button" value="RETOUR" onclick="self.history.back();"/><br /><br />
  </fieldset>
  </form>
</body>
</html>
<?php
}
else{
	header("Location:index.php");
}
?>
