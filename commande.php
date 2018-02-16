<?php
include("connectionM.php");
session_start();
if(isset($_SESSION['codecli']))
{
$reqc="SELECT numcom,datecom,etatcmd FROM commande";
$resultatc=mysql_query($reqc);
//requete de suppression
if (isset($_GET['supp'])){
$reqs="DELETE FROM commande WHERE numcom='".$_GET['numcom']."'";
$resultats=mysql_query($reqs);
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
  <h1> LISTE DES Commande </h1>
  <thead>
<tr>
  <th>Numero Commande</th>
  <th>Date commande</th>
  <th>Etat du Commande</th>
  <th>VOIR la Commannde</th> 
  <th>SUPRIMER</th>
  <th>MODIFIER</th>
</tr>
</thead>
<?php while($recupc=mysql_fetch_array($resultatc)){?>
<tr>
<td> <?php echo $recupc['numcom'];?> </td> 
<td> <?php echo $recupc['datecom'];?> </td> 
<td> <?php echo $recupc['etatcmd'];?> </td> 
<td> <a href="fichecommande.php?numcom=<?php echo $recupc['numcom'];?>">Voir la commande</a></td>
<td> <a href="commande.php?numcom=<?php echo $recupc['numcom'];?>&supp=ok">Supprimer</a></td>
<td> <a href="modifieCom.php?numcom=<?php echo $recupc['numcom'];?>"> modifier </a></td>
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