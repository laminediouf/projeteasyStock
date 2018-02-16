<?php
include("connectionM.php");
session_start();
if(isset($_SESSION['codecli']))
{
  
$req="SELECT numproduit,designation,quantiteproduit FROM produit";
$resultat=mysql_query($req);

if(isset($_POST['buton']))
{
  if(isset($_POST['choixpr']))
   {
     $reqic=mysql_query("insert into fourniture set idfournitur='".$_POST['']."',qteprodfournitur='".$_POST['qteprofou']."',
     datefournitur=CURDATE(),numproduit='".$_POST['choixpr']."'");

     $del=mysql_query("update produit set qteprodfournitur='".$_POST['qteprofou']."' 
                      where numproduit='".$_POST['choixpr']."'");

    $modif=mysql_query("Update produit set quantiteproduit=quantiteproduit+qteprodfournitur 
                       where numproduit='".$_POST['choixpr']."'");
     header("location:miseAjourStock.php");

  }
  $delt=mysql_query("Update produit set qteprodfournitur=0 where numproduit='".$_POST['choixpr']."'");

 /* $reqT="select f.idfournitur,f.numproduit,f.qteprodfournitur,f.datefournitur,p.prixUnitaire
        from fourniture f,produit p 
        where p.numproduit=f.numproduit";
   $resultatT=mysql_query($reqT);
*/
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Document sans titre</title>
<link rel="stylesheet" type="text/css" href="design.css">
<link rel="stylesheet" type="text/css" href="decor.css">
</head>
<body>
<?php include("navigationE.php") ?>
<form method="post" action="miseAjourStock.php"> <?php // echo $_SERVER['PHP_SELF'];?>
 <fieldset>
  <h1> Ajout d'un produit en rupture de Stock </h1>
  <br /> <br />
   <label>choisiir un produit </label>
    <select name="choixpr"  >
	  <?php while($recupm=mysql_fetch_array($resultat)){?>
	  <option value=" <?php echo $recupm['numproduit'];?>">
	     <?php echo $recupm['numproduit']; ?>-
		 <?php echo $recupm['designation']; ?>::quantite dispo=<?php echo $recupm['quantiteproduit']; ?>
	  </option> 
	     <?php } ?>
	  </select>  </br> </br>
   
   <label>Quantite Fournit </label> <input type="text" name="qteprofou" required="true" /><br /> <br />
   
     <input type="submit" name="buton" value="Ajouter" />
   </fieldset>
</form>	
<?php /*
<table border="=1">
 <h3>Fourniture Effectuer</h3>
<tr>
  <th>ID Fourniture </th>
  <th>Numero du Produit</th>
  <th>Quantite Produit</th>
  <th>Date de Fourniture</th> 
  <th>Prix Unitaire </th> 
  <th>Montant </th>
 </tr>
<?php while($recupT=mysql_fetch_array($resultatT)){?>
<tr>
<td> <?php echo $recupT['idfournitur'];?> </td> 
<td> <?php echo $recupT['numproduit'];?> </td> 
<td> <?php echo $recupT['qteprodfournitur'];?> </td> 
<td> <?php echo $recupT['datefournitur'];?> </td> 
<td> <?php echo $recupT['prixUnitaire'];?> </td> 
<td> <?php echo $recupT['qteprodfournitur']*$recupT['prixUnitaire'];?> FCFA</td>
</tr>
<?php } ?>
 <input type="submit" name="button" value="OK" />
 
</table>
*/?>
</body>
</html>
<?php
}
else{
  header("Location:index.php");
}
?>