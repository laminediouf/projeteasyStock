<?php
include("connectionM.php");
session_start();
if(isset($_SESSION['codecli']))
{
$req="SELECT codecli,prenomcli,nomcli FROM client";
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
<?php include("commandeEnCour.php") ?>

</body>
</html>
<?php
}
else{
	header("Location:index.php");
}
?>