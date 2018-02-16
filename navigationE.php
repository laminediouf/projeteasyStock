<?php
include ("connectionM.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Document sans titre</title>

</head>

<body>
<div id="menu_deroulant">
<ul id="menu-accordeon">
   <li><a href="#">CLIENT</a>
      <ul>
         <li><a href="ajoutClient.php">Ajout Client</a></li>
         <li><a href="client.php">Liste Client</a></li>
      </ul>
   </li>
    <li><a href="#">COMMANDE</a>
      <ul>
         <li><a href="PassernouvelCommande.php">Passer Commande</a></li>
         <li><a href="commandeEnCour.php"> Commande En cour</a></li>
         <li><a href="bonCommande.php">Les Bons</a></li>
      </ul>
   </li>
   <li><a href="#">FOURNISSEUR</a>
      <ul>
         <li><a href="ajoutfournisseur.php">Ajout Fournisseur</a></li>
         <li><a href="fournisseur.php">Liste des Fournisseurs</a></li>
      </ul>
   </li>
    <li><a href="#">GESTION FOURNITURE</a>
      <ul>
         <li><a href="miseAjourStock.php">Mise A jour Stock</a></li>
         <li><a href="fourniturEfectuer.php">Liste des Fournitures</a></li>
      </ul>
   </li>
   <li><a href="#">STOCK PRODUIT</a>
      <ul>
         <li><a href="ajoutproduit.php">Ajout Produit</a></li>
         <li><a href="produit.php">liste Produit</a></li>
         <li><a href="rechercheDeProduit.php">Recherche Produit</a></li>
         <li><a href="InventaireProduit.php" target="_blank">Inventaire</a></li>
      </ul>
   </li>
    <li><a href="#">GESTION LIVRAISON</a>
      <ul>
         <li><a href="GestionLivraison.php">Commande Livrer</a></li>
      </ul>
   </li>
   <li><a href="#">SESSION</a>
      <ul>
         <li><a href="logout.php">Se Deconnecter </a></li> 
      </ul>
   </li>
   
</ul>
</div>


</body>
</html>
