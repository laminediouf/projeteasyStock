<?php
include("connectionM.php");
session_start();
if(isset($_SESSION['codecli']))
{

if (isset($_GET['codecli'])){
$reqr="SELECT codecli,prenomcli,nomcli,telephonecli,adressecli,typecli FROM client WHERE codecli='".$_GET['codecli']."'";
$resultatr=mysql_query($reqr);
$recupr=mysql_fetch_array($resultatr);
}
//REQUETE MENU DEROULANT
$reqm="SELECT * FROM client";
$resultatm=mysql_query($reqm);
//REQUETTE DE MODIFICATION
if (isset($_POST['bouton'])){
$reqmodif="UPDATE client SET prenomcli='".$_POST['prnoc']."',nomcli='".$_POST['nmc']."',telephonecli='".$_POST['telc']."',adressecli='".$_POST['adresc']."',typecli='".$_POST['typc']."' WHERE codecli='".$_POST['codcli']."'";
$resultatmodif=mysql_query($reqmodif);
header("location:client.php");
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
 
 <form method="post"  action="modifieCli.php">
 <fieldset>
 <caption> <h3> MODIFICATION </h3> </caption>
 <label> code client </label><input type="hidden" name="codcli" value="<?php echo $recupr['codecli'];?>"/><?php echo $recupr['codecli'];?> <br /><br />
 <label> PRENOM </label>  <input type="text" name="prnoc" value="<?php echo $recupr['prenomcli'];?>" /> <br /><br />
 <label> NOM </label> <input type="text" name="nmc" value="<?php echo $recupr['nomcli'];?> "/> <br /><br /><br />
 <label> TELEPHONE </label> <input type="text" name="telc" value="<?php echo $recupr['telephonecli'];?> "/> <br /><br />
 <label> ADRESSE </label> <input type="text" name="adresc" value="<?php echo $recupr['adressecli'];?> "/> <br /><br />
 <label> TYPE DE CLIENT  </label> <input type="text" name="typc" value="<?php echo $recupr['typecli'];?> "/> <br /><br />
  
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