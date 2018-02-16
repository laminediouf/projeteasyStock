<?php
include("connectionM.php");
session_start();
if(isset($_SESSION['codecli']))
{
$maxi="select MAX(numcom)+1 from commande";
$max=mysql_query($maxi);

$req="SELECT numproduit,designation,quantiteproduit FROM produit";
$resultat=mysql_query($req);

//passer une commande
$reqf="SELECT * FROM panier";
$resultatf=mysql_query($reqf);
if(isset($_POST['buton']))
{
 if(isset($_POST['choixp']))
   {
     $reqic=mysql_query("insert into produitablcmd set  numcom='".$_POST['numcomm']."',quantite='".$_POST['qtepro']."',numproduit='".$_POST['choixp']."'");
    
     $reqg=mysql_query("insert into panier set numproduit='".$_POST['choixp']."',quantite='".$_POST['qtepro']."', numcom='".$_POST['numcomm']."'");

 //Insertion au niveau de Produit pour la Modification du Stock
      $reqin=mysql_query("update produit set quantitecom='".$_POST['qtepro']."'
                        where numproduit='".$_POST['choixp']."'");
      $modif=mysql_query("Update produit set quantiteproduit=quantiteproduit-quantitecom
                        where numproduit='".$_POST['choixp']."'");
      $delk=mysql_query("Update produit set quantitecom=0 where numproduit='".$_POST['choixp']."'"); 
      $re="select * from produit where numproduit='".$_POST['choixp']."'";
     $resu=mysql_query($re);

    }
}
// Affichage sur la table Temporaire

  $reqh="SELECT pf.idprocmd,pf.numproduit,p.designation,p.prixUnitaire,pf.quantite,pf.numcom
               from produitablcmd pf,produit p 
         where p.numproduit=pf.numproduit ";
  $resultath=mysql_query($reqh);

$rec="select numproduit,quantite from produitablcmd";
$prodc=mysql_query($rec);

//REQUETTE DE SUPPRESSION
if(isset($_GET['sup']))
{
$reqs="DELETE FROM produitablcmd WHERE idprocmd='".$_GET['idprocmd']."'";
$results=mysql_query($reqs);
/*$modif=mysql_query("Update produit set quantiteproduit=quantiteproduit+quantitecom
                    where numproduit='".$_POST['choixp']."'");
$delk=mysql_query("Update produit set quantitecom=0 where numproduit='".$_POST['choixp']."'");*/
header("location:PassernouvelCommande.php");
}

/*if(isset($_GET['annul']))
{
$reqa=mysql_query("DELETE FROM produitablcmd WHERE idprocmd='".$_GET['idprocmd']."'");
$reqia=mysql_query("update produit set quantitecom='".$_POST['qtepro']."'
                    where numproduit='".$_POST['choixp']."'");
$modifa=mysql_query("Update produit set quantiteproduit=quantiteproduit+quantitecom
                    where numproduit='".$_POST['choixp']."'");
$dela=mysql_query("Update produit set quantitecom=0 where numproduit='".$_POST['choixp']."'");
header("location:PassernouvelCommande.php");
}
*/

//recuperation des donner de client pour le formulaire
$reqc="SELECT codecli,prenomcli,nomcli FROM client";
$resultatc=mysql_query($reqc);
//passer une Commande
$reqcm="SELECT * FROM commande";
$resultatcm=mysql_query($reqcm);
if (isset($_POST['button']))
{
  $reqA=mysql_query("INSERT into commande set numcom='".$_POST['numcomm']."',datecom=CURDATE(),codecli='".$_POST['choixcli']."',datelivr='".$_POST['datliv']."'");

      while($rec=mysql_fetch_array($prodc))
       {
        $reqB=mysql_query("INSERT into produitcommande set numcom='".$_POST['numcomm']."',quantite='".$_POST['qtepro']."',numproduit='".$_POST['choixp']."'");
       }
      $supn=mysql_query("DELETE from produitablcmd");
      header("Location:PassernouvelCommande.php");
    
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Document sans titre</title>
<link rel="stylesheet" type="text/css" href="tableunik2PasCom.css">
<link rel="stylesheet" href="design.css"  />

</head>

<body>
<?php include("navigationE.php") ?>

<div class="form1"> 

<form method="post" enctype="multipart/form-data" action="PassernouvelCommande.php">
 <fieldset>
  <h1> Panier De La Commande en cour</h1>
  <br /> <br />
   <?php while($recupl=mysql_fetch_array($max)){?>
   <input type="hidden" name="numcomm" value="<?php echo $recupl['MAX(numcom)+1'];?>"/><?php echo $recupl['MAX(numcom)+1'];?><br/>
  <?php } ?>

   <label>choisiir un produit </label>
    <select name="choixp"  >
	  <?php while($recupm=mysql_fetch_array($resultat)){?>
	  <option value=" <?php echo $recupm['numproduit'];?>">
	     <?php echo $recupm['numproduit']; ?>-
		 <?php echo $recupm['designation']; ?>::quantite dispo=<?php echo $recupm['quantiteproduit']; ?>
	  </option> 
	     <?php } ?>
	  </select>  </br> </br>
   
   <label>Quantite </label> <input type="text" name="qtepro" required="true" /><br /> <br />
   
     <input type="submit" name="buton" value="Ajout Panier" />
   </fieldset>
</form>
 
</div>

<table border="=1">
<tr>
  <th>Numero du Produit</th>
  <th>Numero du Produit</th>
  <th>Designation</th>
  <th>Prix Unitaire </th> 
  <th> Quantite </th> 
  <th>Montant </th>
  <th>Suppression </th>
 </tr>
<?php while($recupR=mysql_fetch_array($resultath)){?>
<tr>
<td> <?php echo $recupR['idprocmd'];?> </td> 
<td> <?php echo $recupR['numproduit'];?> </td> 
<td> <?php echo $recupR['designation'];?> </td> 
<td> <?php echo $recupR['prixUnitaire'];?> </td> 
<td> <?php echo $recupR['quantite'];?> </td> 
<td> <?php echo $recupR['quantite']*$recupR['prixUnitaire'];?> FCFA</td>
<td> <a href="PassernouvelCommande.php?idprocmd=<?php echo $recupR['idprocmd'];?>&amp;sup=OK">sup</a></td>
</tr>
<td> <a href="PassernouvelCommande.php?numproduit=<?php echo $recupR['numproduit'];?>&amp;annul=OK">Annuler</a></td>
<?php } ?>
</table>
</br> 

<div class="form2">
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>"> 
<fieldset>
  <h1> Passer une Commande  </h1>
  <br /> <br />
  
<label>Numero de la commande</label>
  <?php while($recupl=mysql_fetch_array($max)){?>
   <input type="hidden" name="numcomm" value="<?php echo $recupl['numcom'];?>"/><?php echo $recupl['numcom'];?><br/>
  <?php } ?>
   <br /> <br /><br /> <br />
   <label> CHOISIR CLIENT</label> <select name="choixcli" required="true" >
	                                <?php while($recupm=mysql_fetch_array($resultatc)){?>
	                                <option value=" <?php echo $recupm['codecli'];?>">
	                                 code:<?php echo $recupm['codecli']; ?>:
		                             <?php echo $recupm['prenomcli'];?> <?php echo $recupm['nomcli']; ?>
	  </option> 
	     <?php } ?>
	  </select>  </br> </br>
   <label>Date de Livraison </label> <input type="text" name="datliv" required="true" /><br /> <br />
   <input type="submit" name="button" value="COMMANDER" /> <br /> <br />

   </fieldset>
  </form>

</div>
</body>
</html>
<?php
}
else{
  header("Location:index.php");
}
?>