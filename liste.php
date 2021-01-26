<!Doctype html>
<html lang="fr">      
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--intégration Boostrap-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Jarditou</title>
</head>
<body>
<!--Container boostrap-->
    <div class="container">
    <h3 class ="text-center">Liste de produits</h3>
    <p><a class ="btn btn-outline-primary" href="ajout.php">Ajouter un produit</a></p>
    <?php
require "connexion_bdd.php"; // Inclusion de notre bibliothèque de fonctions
$db = connexionBase(); // Appel de la fonction de connexion
$requete = "SELECT * FROM produits WHERE ISNULL(pro_bloque) ORDER BY pro_d_ajout DESC";

$result = $db->query($requete);

if (!$result) 
{
    $tableauErreurs = $db->errorInfo();
    echo $tableauErreur[2]; 
    die("Erreur dans la requête");
}

if ($result->rowCount() == 0) 
{
   // Pas d'enregistrement
   die("La table est vide");
}

echo "<div class='table-responsive'>";
echo "<table class='table table-bordered'>";
echo "<thead>";
echo "<tr>";
    echo "<th><h3>Photo</h3></th>";
    echo "<th><h3>ID</h3></th>";
    echo "<th><h3>Référence</h3></th>";
    echo "<th><h3>Libellé</h3></th>";
    echo "<th><h3>Prix</h3></th>";
    echo "<th><h3>Stock</h3></th>";
    echo "<th><h3>Couleur</h3></th>";
    echo "<th><h3>Ajout</h3></th>";
    echo "<th><h3>Modif</h3></th>";
    echo "<th><h3>Bloqué</h3></th>";
echo "</tr>";
echo "</thead>";
echo "<tbody>";

while ($row = $result->fetch(PDO::FETCH_OBJ))
{
    $photo= $row->pro_id.".".$row->pro_photo;
    echo"<tr class='table-secondary'>";
    echo"<td><img class='img-fluid' src='src\img\\$photo' alt='' title=''width='40%'></td>";
    echo"<td>".$row->pro_id."</td>";
    echo"<td>".$row->pro_ref."</td>";
    echo"<td><a href=\"detail.php?pro_id=".$row->pro_id."\" title=\"".$row->pro_libelle."\">$row->pro_libelle</a></td>";
    echo"<td>".$row->pro_prix."</td>";
    echo"<td>".$row->pro_stock."</td>";
    echo"<td>".$row->pro_couleur."</td>";
    echo"<td>".$row->pro_ajout."</td>";
    echo"<td>".$row->pro_modif."</td>";
    echo"<td>".$row->pro_bloque."</td>";
    echo"</tr>";
}
echo "</tbody>";
echo "</table>"; 
?>
<!--javascript boostrap-->
</body><script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>
</html> 
                   
    <!--echo"<tr>";
    echo"<td>".$row->pro_id."</td>";
    echo"<td>".$row->pro_ref."</td>";
    echo"<td><a href=\"detail.php?id=".$row->pro_id."\" title=\"".$row->pro_libelle."\"></a></td>";
    echo"</tr>";-->
    <!-- echo"<td><img class='img-fluid' src='src\img\\$row->pro_id.$row->pro_photo.' alt='' title=''width='20%'></td>";-->