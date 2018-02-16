<?php
include("connectionM.php");
session_start();
if(isset($_SESSION['codecli']))
{
$reqf="SELECT * FROM client";
$resultatf=mysql_query($reqf);
$maxc="select MAX(codecli)+1 from client";
$max=mysql_query($maxc);


if (isset($_POST['buton']))
{
  if (isset($_POST['codcli']) and isset($_POST['nmcli']) and isset($_POST['nmcli']) 
  	   and isset($_POST['precli']) and isset($_POST['log']) and isset($_POST['paswd']) 
  	   and isset($_POST['telpcli']) and isset($_POST['adrescli']) and isset($_POST['typcli']))
  {	
     if($_FILES['phoi']['error']==0)
      {
       copy( $_FILES['phoi']['tmp_name'],"images/".$_FILES['phoi']['name'] );
      }

      else if($_FILES['phoi']['error']==0)
	  {
        $reqA="Insert into client set codecli='".$_POST['codcli']."',nomcli='".$_POST['nmcli']."',prenomcli='".$_POST['precli']."',login='".$_POST['log']."',passeword='".$_POST['paswk']."',telephonecli='".$_POST['telpcli']."',adressecli='".$_POST['adrescli']."',typecli='".$_POST['typcli']."',photocli='".$_POST['phoi']."'";
        $resultatA=mysql_query($reqA);
	  }

      else
      {
       $reqA="insert into client set codecli='".$_POST['codcli']."',nomcli='".$_POST['nmcli']."',prenomcli='".$_POST['precli']."',login='".$_POST['log']."',passeword='".$_POST['paswk']."',telephonecli='".$_POST['telpcli']."',adressecli='".$_POST['adrescli']."',typecli='".$_POST['typcli']."'";
        $resultatA=mysql_query($reqA);
      }
  ?>
   <script language="javascript"> alert("Nouveau Client ajouter"); </script> 

  <?php
    }
   $resultati=mysql_query($reqi);
   header("location:client.php");
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

<form method="post" enctype="multipart/form-data" action="ajoutClient.php" >
<fieldset>
      <caption> Ajout de client </caption>  </br></br></br>
   <label> Numero Client </label>
   <?php while($recupl=mysql_fetch_array($max)){?>
   <input type="hidden" name="codcli" value="<?php echo $recupl['MAX(codecli)+1'];?>"/><?php echo $recupl['MAX(codecli)+1'];?><br/>
    <?php } ?></br>
	  <label> Nom </label> <input type="text" name="nmcli" placeholder="Nom"/> </br> </br>
	  <label> Prenom </label> <input type="text" name="precli" placeholder="prenom"/> </br> </br>
	   <label> login </label>
	    <select name="log">
	    <option value="user">User </option> 
	    </select>  </br> </br>
	    <label> passeword </label> <input type="text" name="paswk"/> </br> </br>
	    <label> Telephone </label> <input type="text" name="telpcli"/> </br> </br>
	    <label> Adresse </label> <input type="text" name="adrescli"/> </br> </br>
	    <label> Type </label>
	    <select name="typcli">
	    <option value="pers">Personne </option> 
		<option value="entrp">Entreprise </option> 
	    </select>  </br> </br>
		<label> PHOTO </label> <input type="file" name="phoi"/> </br> </br>
      
	   
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