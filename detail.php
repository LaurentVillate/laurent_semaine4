

<!Doctype html>
<html lang="fr">      
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--intégration Boostrap-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Jarditou</title>
    <!-- PHP Connexion à la base de données -->
    <?php   
     require "connexion_bdd.php"; // Inclusion de notre bibliothèque de fonctions

     $db = connexionBase (); // Appel de la fonction de connexion
     $pro_id = $_GET["pro_id"];
     $pro_id = (int)$pro_id;
   $requete = "SELECT * FROM produits WHERE pro_id=" .$pro_id;

    $result = $db->query($requete);

    // Renvoi de l'enregistrement sous forme d'un objet
    $produit = $result->fetch(PDO::FETCH_OBJ);
    var_dump($_GET); echo "<br>";
    var_dump($pro_id);echo "<br>";
    var_dump($result);echo "<br>";
    var_dump($requete);echo "<br>";
    var_dump($produit);echo "<br>";
   ?>
</head>
<body>
<!--Container boostrap-->
    <div class="container">
<!--menu: liste non ordonnée 3 liens-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <!--<a class="navbar-brand" href="#">jarditou.com</a>-->
<!--toggler... bascule vers bouton hamburger -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
        </button>   
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
<!--Menu de navigation formulaire de recherche à droite-->
            <ul class= "navbar-nav mr-auto">
                <li class="nav-item active"><a  class="nav-link" href="index.html">Accueil</a></li>
                <li class="nav-item"><a  class="nav-link" href="">Mon compte</a></li><!-- lien vers Mon compte à ajouter-->
                <li class="nav-item"><a  class="nav-link" href="contact.html">Contact</a></li>
            </ul>
        </div>
        </nav>
<!--formulaire -->
        <form name="formliste" action="liste.php" method="post" id="formulaire">
            <fieldset>
<!--Récupération de l'id-->
                <div class="form-group">
                    <label for="ID">ID</label>
                    <input type="number" class="form-control" name="ID" id="ID" value="<?php echo $pro_id; ?>" >  
                </div>
<!--Récupération de la référence-->
                <div class="form-group">
                    <label for="ref">Référence</label>
                    <input type="text" class="form-control" name ="ref" id="ref" value="<?php echo $produit->pro_ref; ?>">
                    <span style ="color: red" id="noPrenom"></span>      
                </div>
<!--Récupération de la catégorie-->
                <div class="form-group">
                    <label for="cat">Catégorie</label>
                    <input type="number" class="form-control" name="cat" id="cat" value="<?php echo $produit->pro_cat_id; ?>" >  
                </div>
<!--Récupération du libellé; lien vers détail-->
                <div class="form-group">
                    <label for="libel">libellé</label>
                    <input type="text" class="form-control" name ="libel" id="libel" value="<?php echo $produit->pro_libelle; ?>">  
                </div>
<!--Récupération de la description-->
                <div class="form-group">
                    <label for="desc">Description</label>
                    <textarea class="form-control" name="desc" id="desc" rows="3"><?php echo $produit->pro_description; ?></textarea>
<!--Récupération du prix-->
                </div>
                <div class="form-group">
                    <label for="prix">Prix</label>
                    <input type="text" class="form-control" name ="prix" id="prix" value="<?php echo $produit->pro_prix; ?>">
<!--Récupération du stock-->    
                </div>
                <div class="form-group">
                    <label for="stock">Stock</label>
                    <input type="number" class="form-control" name="stock" id="stock" value="<?php echo $produit->pro_stock; ?>" >  
<!--Récupération de la couleur-->
                </div>
                <div class="form-group">
                    <label for="coul">Couleur</label>
                    <input type="text" class="form-control" name ="coul" id="coul" value="<?php echo $produit->pro_couleur; ?>">
<!--checked du bouton oui ou non pour produit bloqué-->  
                </div>
                <div class="form-group">
                    Produit bloqué: 
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="bloque" id="" value="oui" checked = "<?php $produit->pro_couleur != NULL; ?>">
                    <label class="form-check-label" for="inlineRadio1">Oui</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="bloque" id="" value="non" checked = "<?php $produit->pro_couleur != NULL; ?>">
                    <label class="form-check-label" for="inlineRadio1">Non</label>
                    </div>
                </div>
                <div class="form-group">
                    Date d'ajout : <?php echo $produit->pro_d_ajout; ?>
                </div>  
                <div class="form-group">
                    Date de modification : <?php echo $produit->pro_d_modif; ?>
                </div>
<!-- liens vers modification ou retour à la liste des produits-->
                <a href="update_form.php" class="btn btn-outline-primary">Modifier</a><br><br>
                <a href="delete_form.php" class="btn btn-outline-primary">Supprimer</a><br><br>
                <input type="submit" class="btn btn-outline-primary" value="Retour à la liste" id="">
            </fieldset>             
        </form>
        <br><br><br>
<!--fin du formulaire--><!-- CRÉER UN LIEN: retour à la liste et un lien modifier (renvoyant au formulaire)-->
        
<!--javascript boostrap-->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>

