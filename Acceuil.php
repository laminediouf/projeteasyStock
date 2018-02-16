<?php
include("connectionM.php");
session_unset();
session_start();
if(isset($_SESSION['codecli']))
{
 //header("location:indexe.php");
	/*
 header('Location:indexe.php');
  }
if(isset($_GET['logout']))
{
 unset($_SESSION);
 session_destroy();
 //header("location:indexe.php");
 header('Location:indexe.php?logout=ok');
 */

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
</body>
</html>
<?php
}
else{
	header("Location:index.php");
}
?>
