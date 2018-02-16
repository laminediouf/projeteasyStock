<?php
include("connectionM.php");
session_unset();
session_start();

//if(isset($_SESSION['codecli']))
//{
/*header("Location:indexe.php");*/

$reqm="select distinct login from client";
$resultm=mysql_query($reqm);
if (isset($_POST['bouton']))
{
 $reqc="select * from client where login='".$_POST['log']."' and passeword='".$_POST['pass']."'";
 $resultc=mysql_query($reqc) or die(mysql_error());
 $recupc=mysql_fetch_array($resultc);
 
 
 if ($recupc)
 {
   $droit=$recupc['login'];
   if($droit =='admin')
   {
     session_start();
	 $_SESSION['codecli']=$recupc['codecli'];
	 header("location:Acceuil.php");
	 exit();
   }
   else
   {
     session_start();
	 $_SESSION['codecli']=$recupc['codecli'];
	 header("location:AccueilUtil.php");
	 exit();
   }
 }
  else
   {
     $erreur="Information: saisie incorrect Veuillez vous reconnecter";
   }    
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Document sans titre</title>
<link rel="stylesheet" href="design.css" />
</head>

<body>
<div class="indx">
<div class="image"> <img src="indexes.jpg" alt="vision"  style="width:1000px;height:280px;max-width:200%;overflow:hidden;border:none;padding:0;margin:0 auto;display:block;" marginheight="0" marginwidth="0"> </div>
<form method='post' action="index.php" >
<fieldset>
<h1>AUTHENTIFICATION</h1>

	<p> <h1>password:</h1>
	<input type="password" name="pass" ></br>
	</p>
	<p>
    <h1> login:</h1>
	<select name="log">
                 <?php while($recup=mysql_fetch_array($resultm)){ ?>
				 <option value="<?php echo $recup['login']; ?>">
				                <?php echo $recup['login']; ?>
				 </option>
				 <?php } ?>
	 </select>
	</p>
	<p>
	  <a href="ajoutClient.php">S'inscrire </a>
	</p>
	<input type="submit" value="Se connecter" name="bouton">
                
</fieldset>
</form>
</div>
</body>
</html>
<?php
//}
//else{
//	header("Location:index.php");
//}
?>