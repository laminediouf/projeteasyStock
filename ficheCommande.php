<?php
include("connectionM.php");
session_start();
if(isset($_SESSION['codecli']))
{
if(isset($_POST['numcom'])){
$req="SELECT numcom,intitulecom,datecom,datelivr,codecli,etatcmd FROM commande WHERE numcom='".$_POST['numcom']."'";
$resultat=mysql_query($req);
$recupFI=mysql_fetch_array($resultat);
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
<caption><h3> FICHE D'ENREGISTREMENT </h3></caption>
<tr>
  <th>Num Commande</th>
  <td> <?php echo $recupFI['numcom'];?> </td>
</tr>
<tr>
  <th>Intitule</th>
  <td> <?php echo $recupFI['intitulecom'];?> </td>
</tr>
<tr>
  <th>Date Commande</th>
  <td> <?php echo $recupFI['datecom'];?> </td>
</tr>
<tr>
  <th>Date de Livraison</th>
  <td> <?php echo $recupFI['datelivr'];?> </td>
</tr>
<tr>
  <th>Code Client</th>
  <td> <?php echo $recupFI['codecli'];?> </td>
</tr>
<tr>
  <th>Etat du Commande</th>
  <td> <?php echo $recupFI['etatcmd'];?> </td>
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