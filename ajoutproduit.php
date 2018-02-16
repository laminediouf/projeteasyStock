<?php
include("connectionM.php");
session_start();
if(isset($_SESSION['codecli']))
{
$reqf="SELECT * FROM produit";
$resultatf=mysql_query($reqf);
$req="SELECT codefournis,nomfournis,prenomfournis FROM Fournisseur";
$resultat=mysql_query($req);
$maxp="select MAX(numproduit)+1 from produit";
$max=mysql_query($maxp);
if (isset($_POST['numpr']) and isset($_POST['desig']) and isset($_POST['qte']) 
  	 and isset($_POST['pri']) and isset($_POST['typpro']) and isset($_POST['choixpp']))
{
  if (isset($_POST['buton']))
    {
       $reqap="insert into produit set numproduit='".$_POST['numpr']."',designation='".$_POST['desig']."'
       ,quantiteproduit='".$_POST['qte']."',prixUnitaire='".$_POST['pri']."',type='".$_POST['typpro']."'
       ,codefournis='".$_POST['choixpp']."'";
    
      $resultatap=mysql_query($reqap);
      echo ' <script> alert("Nouveau Produit ajouter") </script> ';
    }
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

<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" >
<fieldset>
      
<label> Numero Produit </label>
   <?php while($recupl=mysql_fetch_array($max)){?>
   <input type="hidden" name="numpr" value="<?php echo $recupl['MAX(numproduit)+1'];?>"/><?php echo $recupl['MAX(numproduit)+1'];?><br/>
    <?php } ?></br>	   
        <label> Designation </label> <input type="text" name="desig" placeholder="Designation" required="true"/> </br> </br>
	    <label> Quantite  </label> <input type="text" name="qte" placeholder="Quantite" required="true"/> </br> </br>
	    <label> Prix Unitaire </label> <input type="text" name="pri" placeholder="Prix" required="true"/> </br> </br>
		 <label> Type de Produit </label>
	    <select name="typpro">
	    <option value="espc">Espece </option> 
		<option value="liq">Liquide </option> 
	    </select>  </br> </br>
		 <label> Code du Fournisseur </label> 
		  <select name="choixpp" required="true" >
	  <?php while($recupm=mysql_fetch_array($resultat)){?>
	  <option value="<?php echo $recupm['codefournis'];?>">
	     <?php echo $recupm['codefournis']; ?>-
		 <?php echo $recupm['prenomfournis']; ?>.<?php echo $recupm['nomfournis']; ?>
	  </option> 
	     <?php } ?>
	  </select>  </br> </br>
      
	   
           <input type="submit" name="buton" value="ENVOYER" />
	       <input type="reset" name="annul" value="ANNULER" /> <br /> <br />
           <input type="button" value="RETOUR" onclick="self.history.back();"/>
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