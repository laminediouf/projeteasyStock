<?php
include("connexion.php");
session_start();
if(isset($_SESSION['codecli']))
{

$somme=0;
$num=$_GET['numcmd'];
$req="SELECT *FROM commande where numcmd=$num";
$result=mysqli_query($conn,$req);


$code=$_GET['codecli'];
$reqc="SELECT *FROM client where codecli=$code";
$resultc=mysqli_query($conn,$reqc);
$recupc=mysqli_fetch_array($resultc);

if(isset($_POST['retour'])){
  header("location:recherche_commande.php");
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Accueil</title>
	<link rel="stylesheet" type="text/css" href="style.css" >
    <?php include("print.php");?>
</head>
<body> 
<?php include("menu.php");?>
   
   <div id="divp">
   <h1 align="center"><FONT COLOR="#235a81">Facture</FONT></h1>
        <table align="center" width="60%">
         	<tr bgcolor="WHITE">
         		<td align="center"><FONT COLOR="#235a81"><?php echo $recupc['nomcli'];echo" ";echo $recupc['prenomcli'];echo" ";echo $recupc['adressecli'];echo" ";echo" ";echo $recupc['type'];?></FONT></td>
         	</tr>
         </table>
        <table align="center" width="60%" cellpadding="10px" >
         	<tr bgcolor="#cococo">
         		<td>Designation</td>
         		<td>Quantite</td>
         		<td>P.U</td>
         		<td>Total</td>
         	</tr>
            <?php while($recup=mysqli_fetch_array($result)){?>
         	<tr bgcolor="WHITE">
         		<td><?php echo $recup['nomproduitcmd'];?></td>
         		<td><?php echo $recup['quantitecmd'];?></td>
         		<td><?php echo $recup['pu'];?></td>
         		<td><?php echo $recup['pu']*$recup['quantitecmd'];?></td>
                <?php $somme=$somme+$recup['pu']*$recup['quantitecmd'];?>
         	</tr>
            <?php }?>
        </table>
         <br><br>
        <table width="60%" align="center" cellpadding="9px">
         	<tr bgcolor="#cococo">
         		<td>Net a payer(F CFA)</td><td><?php echo $somme;?></td>
         	</tr>
        </table>
        </div>
        <Form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
        <center><a href="#" onclick="printContent('divp')"><img src="images/imp.jpg" width="160" size="160"></a></center>
        </Form>
    
</body>
</html>
<?php
}
else{
    header("Location:index.php");
}
?>