<?php
include("connectionM.php");
session_start();
if(isset($_SESSION['codecli']))
{
if(isset($_GET['codecli'])){
$req="SELECT codecli,prenomcli,nomcli,telephonecli,adressecli,typecli FROM client WHERE codecli='".$_GET['codecli']."'";
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
  <th>CODE CLIENT</th>
  <td> <?php echo $recup['codecli'];?> </td>
</tr>
<tr>
  <th>PRENOM</th>
  <td> <?php echo $recup['prenomcli'];?> </td>
</tr>
<tr>
  <th>NOM</th>
  <td> <?php echo $recup['nomcli'];?> </td>
</tr>
<tr>
  <th>TELEPHONE</th>
  <td> <?php echo $recup['telephonecli'];?> </td>
</tr>
<tr>
  <th>ADRESSE</th>
  <td> <?php echo $recup['adressecli'];?> </td>
</tr>
<tr>
  <th>TYPE CLIENT</th>
  <td> <?php echo $recup['typecli'];?> </td>
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