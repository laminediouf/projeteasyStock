<?php
include("connectionM.php");
session_start();
if(isset($_SESSION['codecli']))
{
$req="SELECT codecli,prenomcli,nomcli FROM client";
$resultat=mysql_query($req);

$reqx="SELECT cd.numcom,cd.datecom,c.codecli,c.prenomcli,c.nomcli,p.designation,p.prixUnitaire,pc.quantite,prixUnitaire*quantite as 'Montant',cd.datelivr,pc.quantite,quantite-quantite as 'Reste'
       from commande cd,client c,produit p,panier pc
       where c.codecli=cd.codecli and cd.numcom=pc.numcom and p.numproduit=pc.numproduit";
$resultatx=mysql_query($reqx);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Document sans titre</title>
<link rel="stylesheet" href="design.css"  />
<link rel="stylesheet" type="text/css" href="tableunik.css">

</head>

<body>
<?php include("navigationE.php") ?>

<form method="get" action="<?php echo $_SERVER['PHP_SELF'];?>">
 <fieldset>
  <h1> Commande En Cour </h1>
  <br /> <br />
   <label>Code Client - Client dont leur Commande est en Cour </label>
     <select name="desi" required="true" >
	  <?php while($recupm=mysql_fetch_array($resultat)){?>
	  <option value=" <?php echo $recupm['codecli'];?>">
	     code:<?php echo $recupm['codecli']; ?>:
		 <?php echo $recupm['prenomcli']; ?>  <?php echo $recupm['nomcli']; ?>
	  </option> 
	     <?php } ?>
	  </select>  </br> </br>
	    
     <input type="submit" name="buton" value="Rechercher" /> <br /> <br />
   
   </fieldset>
  </form>
  
  <table class="bordered">
   <thead>
<tr>
  <th>Numero Commande</th>
  <th>Date</th>
  <th>Code Client</th> 
  <th> Prenom </th> 
  <th>Nom </th>
  <th>Produit </th>
  <th>Prix Unitaire </th>
  <th>Quantite Commande </th>
  <th>PTTC </th>
  <th>Date Livraison </th>
  <th>Qte Livré </th>
  <th>Reste a Livré </th>
 </tr>
 </thead>
<?php while($recupR=mysql_fetch_array($resultatx)){?>
<tr>
<td> <?php echo $recupR['numcom'];?> </td> 
<td> <?php echo $recupR['datecom'];?> </td> 
<td> <?php echo $recupR['codecli'];?> </td> 
<td> <?php echo $recupR['prenomcli'];?> </td> 
<td> <?php echo $recupR['nomcli'];?> </td> 
<td> <?php echo $recupR['designation'];?> </td> 
<td> <?php echo $recupR['prixUnitaire'];?> </td> 
<td> <?php echo $recupR['quantite'];?> </td> 
<td> <?php echo $recupR['Montant'];?> </td> 
<td> <?php echo $recupR['datelivr'];?> </td> 
<td> <?php echo $recupR['quantite'];?> </td> 
<td> <?php echo $recupR['Reste'];?> </td> 
<?php /*
<td> <a href="facturation.php?codecli=<?php echo $recup['codecli'];?>"><img src="icone_bon_commande.png" width="40" height="20" ;/> </a></td>
*/ ?>
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