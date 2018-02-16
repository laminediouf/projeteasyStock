<?php
include("connectionM.php");
session_start();
if(isset($_SESSION['codecli']))
{
$req="SELECT codefournis,prenomfournis,nomfournis FROM fournisseur";
$resultat=mysql_query($req);
//requete de suppression
if (isset($_GET['supp'])){
$reqs="DELETE FROM fournisseur WHERE codefournis='".$_GET['codefournis']."'";
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
   <h3> LISTE DES Fournisseurs </h3>
   <thead>
<tr>
  <th>Code Fournisseur</th>
  <th>Prenom</th>
  <th>Nom </th> 
  <th> VOIR </th> 
  <th>SUPRIMER</th>
  <th>MODIFIER</th>
</tr>
</thead>
<?php while($recup=mysql_fetch_array($resultat)){?>
<tr>
<td> <?php echo $recup['codefournis'];?> </td> 
<td> <?php echo $recup['prenomfournis'];?> </td> 
<td> <?php echo $recup['nomfournis'];?> </td> 
<td> <a href="fichefournisseur.php?codefournis=<?php echo $recup['codefournis'];?>">Voir</a></td>
<td> <a href="fournisseur.php?codefournis=<?php echo $recup['codefournis'];?>&amp;supp=ok">Supprimer</a></td>
<td> <a href="modififournisseur.php?codefournis=<?php echo $recup['codefournis'];?>"> modifier </a></td>
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