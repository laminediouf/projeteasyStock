<?php
include("connectionM.php");
session_start();
if(isset($_SESSION['codecli']))
{
if (isset($_GET['codefournis'])){
$reqr="SELECT codefournis,nomfournis,prenomfournis,telephonefournis,adressefournis FROM fournisseur WHERE codefournis='".$_GET['codefournis']."'";
$resultatr=mysql_query($reqr);
$recupr=mysql_fetch_array($resultatr);
}
if (isset($_POST['bouton'])){
$reqmodifemprunt="UPDATE fournisseur SET nomfournis='".$_POST['nmfourni']."',prenomfournis='".$_POST['prfourni']."',telephonefournis='".$_POST['telfourni']."',adressefournis='".$_POST['adrfourni']."' WHERE codefournis='".$_POST['codfournis']."'";
$resultatmodifemprunt=mysql_query($reqmodifemprunt);
header("location:fournisseur.php");
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
 <form method="post"  action="modififournisseur.php">
 <fieldset>
 <caption> <h3> MODIFICATION </h3> </caption>
  <label> Code Fournisseur </label> 
  <input type="hidden" name="codfournis" value="<?php echo $recupr['codefournis'];?>"/><?php echo $recupr['codefournis'];?> <br /><br />
   <label> Nom </label> 
   <input type="text" name="nmfourni" value="<?php echo $recupr['nomfournis'];?>" /> <br /><br />
   <label> Prenom </label> 
   <input type="text" name="prfourni" value="<?php echo $recupr['prenomfournis'];?> "/> <br /><br />
   <label>Telephone</label> 
   <input type="text" name="telfourni" value="<?php echo $recupr['telephonefournis'];?> "/> <br /><br />
   <label> Adresse </label>
    <input type="text" name="adrfourni" value="<?php echo $recupr['adressefournis'];?> "/> <br /><br />
  
  <input type="submit" name="bouton" value="MODIFIER" /><br /> <br />
    <input type="button" value="RETOUR" onclick="self.history.back();"/>
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