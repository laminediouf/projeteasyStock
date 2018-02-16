<?php
include("connectionM.php");
session_start();
if(isset($_SESSION['codecli']))
{
if(isset($_GET['codefournis'])){
$req="SELECT codefournis,nomfournis,prenomfournis,telephonefournis,adressefournis FROM fournisseur WHERE(codefournis='".$_GET['codefournis']."')";
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
<caption><h3> LISTE DES Fournisseurs </h3></caption>
<tr>
  <th>Code fournisseur</th>
  <td> <?php echo $recup['codefournis'];?> </td>
</tr>
<tr>
  <th>Nom</th>
  <td> <?php echo $recup['nomfournis'];?> </td>
</tr>
<tr>
  <th>Prenom</th>
  <td> <?php echo $recup['prenomfournis'];?> </td>
</tr>
<tr>
  <th>Telephone</th>
  <td> <?php echo $recup['telephonefournis'];?> </td>
</tr>
<tr>
  <th>Adresse</th>
  <td> <?php echo $recup['adressefournis'];?> </td>
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