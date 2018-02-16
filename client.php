	<?php
include("connectionM.php");
session_start();
if(isset($_SESSION['codecli']))
{

$req="SELECT codecli,prenomcli,nomcli FROM client";
$resultat=mysql_query($req);
//requete de suppression
if (isset($_GET['supp'])){
$reqs="DELETE FROM client WHERE codecli='".$_GET['codecli']."'";
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
  <h1> LISTE DES CLIENTS </h1>
<thead>
<tr>
  <th>code client</th>
  <th>PRENOM</th>
  <th>NOM</th>
  <th>VOIR FICHE</th> 
  <th>SUPRIMER</th>
  <th>MODIFIER</th>
</tr>
</thead>
<?php while($recup=mysql_fetch_array($resultat)){?>
<tr>
<td> <?php echo $recup['codecli'];?> </td> 
<td> <?php echo $recup['prenomcli'];?> </td> 
<td> <?php echo $recup['nomcli'];?> </td> 
<td> <a href="ficheclient.php?codecli=<?php echo $recup['codecli'];?>"><img src="icone_bon_commande.png" width="40" height="20" ;/> </a></td>
<td> <a href="client.php?codecli=<?php echo $recup['codecli'];?>&supp=ok"><img src="icone_supprimer.png" width="40" height="20"/> </a></td>
<td> <a href="modifieCli.php?codecli=<?php echo $recup['codecli'];?>"><img src="icone_modifier.png" width="40" height="20"/>  </a></td>
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