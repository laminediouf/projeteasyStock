<?php
include("connectionM.php");
session_start();
if(isset($_SESSION['codecli']))
{
//Affichage designation dans la liste deroulante
$req="SELECT  designation,numproduit FROM produit";
$resultat=mysql_query($req);	

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

<form method="get"  action="resultrechprod.php" >
<fieldset>
       <legend>RECHERCHER UN PRODUIT</legend>
	    <label>Choisir la Designation </label>
		 <select name="choixpp" >
	       <?php while($recupm=mysql_fetch_array($resultat)){?>
	    <option value=" <?php echo $recupm['numproduit'];?>">
		<?php echo $recupm['numproduit'];?>::
	     <?php echo $recupm['designation']; ?>
	    </option> 
	     <?php } ?>
	  </select>  </br> </br>
		   <input type="submit" name="buton" value="Rechercher" />
</fieldset>
</form>	  <br/><br/>

</body>
</html>
<?php
}
else{
	header("Location:index.php");
}
?>