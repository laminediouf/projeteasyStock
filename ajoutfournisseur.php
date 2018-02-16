<?php
include("connectionM.php");
session_start();
if(isset($_SESSION['codecli']))
{
$reqf="SELECT * FROM fournisseur";
$resultatf=mysql_query($reqf);
$maxc="select MAX(codefournis)+1 from fournisseur";
$max=mysql_query($maxc);
//AJOUT
if(isset($_POST['envoi'])) {
$reqff="INSERT INTO fournisseur SET codefournis='".$_POST['codfourn']."',nomfournis='".$_POST['nmfourn']."',prenomfournis='".$_POST['prnfourn']."',telephonefournis='".$_POST['telfourn']."',adressefournis='".$_POST['adrfourn']."'";
$resultatff=mysql_query($reqff);
header("location:fournisseur.php");
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

 <form method="post" enctype="multipart/form-data" action="ajoutfournisseur.php">
 <fieldset>
  <h1> AJOUT D'un Fournisseur </h1>
  <br /> <br />
  <label> Code Fournisseur </label>
 <?php while($recupl=mysql_fetch_array($max)){?>
   <input type="hidden" name="codfourn" value="<?php echo $recupl['MAX(codefournis)+1'];?>"/><?php echo $recupl['MAX(codefournis)+1'];?><br/>
    <?php } ?></br>
   <label>Nom  </label> <input type="text" name="nmfourn" required="true" /><br /> <br />
   <label> Prenom  </label> <input type="text" name="prnfourn" required="true" /><br /> <br />
   <label> Telephone </label> <input type="text" name="telfourn" required="true" /><br /> <br />
   <label> Adresse </label> <input type="text" name="adrfourn" required="true" /><br /> <br />

    <input type="submit" name="envoi" value="ENVOYER" /> <br /> <br />
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