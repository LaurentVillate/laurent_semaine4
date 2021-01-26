<?php

var_dump($_POST);

// Configuration du fuseau horaire //
date_default_timezone_set("Europe/Paris");

// Récupération des informations passées en POST, nécessaires à la modification

$cat_pro=$_POST['cat'];
$ref_pro=$_POST['ref'];
$libel_pro=$_POST['libel'];
$desc_pro=$_POST['desc'];
$prix_pro=$_POST['prix'];
$stock_pro=$_POST['stock'];
$coul_pro=$_POST['coul'];
$photo_pro=$_POST['photo'];
$dateajout_pro=$_POST['dateajout'];
$bloque_pro=$_POST['bloque'];
// Connexion à la base de données
var_dump($cat_pro); echo "<br>";
var_dump($ref_pro); echo "<br>";
var_dump($libel_pro); echo "<br>";
var_dump($desc_pro); echo "<br>";
var_dump($prix_pro); echo "<br>";
var_dump($stock_pro); echo "<br>";
var_dump($photo_pro); echo "<br>";
var_dump($dateajout_pro);echo "<br>";
var_dump($bloque_pro); echo "<br>";
require "connexion_bdd.php";
var_dump($cat_pro); echo "<br>";
var_dump($ref_pro); echo "<br>";
var_dump($libel_pro); echo "<br>";
var_dump($desc_pro); echo "<br>";
var_dump($prix_pro); echo "<br>";
var_dump($stock_pro); echo "<br>";
var_dump($photo_pro); echo "<br>";
var_dump($dateajout_pro); echo "<br>";
var_dump($bloque_pro); echo "<br>";


//try { 
// Construction de la requête INSERT sans injection SQL
        
echo "début du try <br>";      
        var_dump($_POST); echo "<br>";
        
        $requete = $db->prepare("INSERT INTO produits (pro_cat_id, pro_ref, pro_libelle, pro_description, pro_prix, pro_stock, pro_couleur, pro_photo, pro_d_ajout, pro_d_modif, pro_bloque) 
        VALUES (:pro_cat_id, :pro_ref, :pro_libelle, :pro_description, :pro_prix, :pro_stock, :pro_couleur, :pro_photo, :pro_d_ajout, :pro_d_modif, :pro_bloque)");
       if (!$requete) {
        echo "\nPDO::errorInfo():\n";
        var_dump($db->errorInfo());
     }
       echo "préparation requete <br>";      
        var_dump($_POST); echo "<br>";
        var_dump($requete); echo "<br>";
        
        $requete->bindValue(':pro_cat_id', $cat_pro, PDO::PARAM_INT);
        $requete->bindValue(':pro_ref', $ref_pro, PDO::PARAM_STR);
        $requete->bindValue(':pro_libelle', $libel_pro, PDO::PARAM_STR);
        $requete->bindValue(':pro_description', $desc_pro, PDO::PARAM_STR);
        $requete->bindValue(':pro_prix', $prix_pro, PDO::PARAM_STR);
        $requete->bindValue(':pro_stock', $stock_pro, PDO::PARAM_INT);
        $requete->bindValue(':pro_couleur', $coul_pro, PDO::PARAM_STR);
        $requete->bindValue(':pro_photo', $photo_pro, PDO::PARAM_STR);
        $requete->bindValue(':pro_d_ajout', $dateajout_pro, PDO::PARAM_STR);
        $requete->bindValue(':pro_d_modif', $prix_pro, PDO::PARAM_STR);
        $requete->bindValue(':pro_bloque', $bloque_pro, PDO::PARAM_STR);
        
        echo "requete <br>"; 
        var_dump($requete); echo "<br>";
        $requete->execute();

// Libération de la connexion au serveur de BDD
        $requete->closeCursor();
        
        echo "fin du try <br>"; 
        var_dump($_POST); echo "<br>";
//}

// Gestion des erreurs
/*catch (Exception $e) {
        var_dump($_POST);
        var_dump($e);
        echo "La connexion à la base de données a échoué ! <br>";
        echo "Merci de bien vérifier vos paramètres de connexion ...<br>";
        echo "Erreur : " . $e->getMessage() . "<br>";
        echo "N° : " . $e->getCode();
        die("Fin du script");
}*/

// Redirection vers la page liste.php
header("Location:liste.php");
exit;
?>