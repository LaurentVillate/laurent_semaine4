
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
     $pro_id = $Get["pro_id"];
     $pro_id = (int)$pro_id;
   $requete = "SELECT * FROM produits WHERE pro_id=" .$pro_id;

    $result = $db->query($requete);

    // Renvoi de l'enregistrement sous forme d'un objet
    $produit = $result->fetch(PDO::FETCH_OBJ);
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
        <form name="ajout" action="add_script.php" method="post">
            <fieldset>
<!--L'Id s'incrémente dans la base....
                <div class="form-group">
                    <label for="ID">ID</label>
                    <input type="number" class="form-control" name="ID" id="ID" placeholder="Saisissez l'ID" value="<?php echo $pro_id; ?>" >  
                </div>
-->
<!--Ajout d'une référence-->
                <div class="form-group">
                    <label for="ref">Catégorie</label>
                    <input type="number" class="form-control" name ="ref" id="ref" placeholder="Saisissez la catégorie" value="<?php echo $produit->pro_ref; ?>">
                    <span style ="color: red" id="noPrenom"></span>      
                </div>
<!--Ajout d'une catégorie-->
                <div class="form-group">
                    <label for="cat">Référence</label>
                    <input type="text" class="form-control" name="cat" id="cat" placeholder="Saisissez la référence" value="<?php echo $produit->pro_cat_id; ?>" >  
                </div>
<!--Ajout d'un libellé-->
                <div class="form-group">
                    <label for="libel">Libellé</label>
                    <input type="text" class="form-control" name ="libel" id="libel" placeholder="Saisissez le libellé" value="<?php echo $produit->pro_libelle; ?>">    
                </div>
<!--Ajout d'une description-->
                <div class="form-group">
                    <label for="desc">Description</label>
                    <textarea class="form-control" name = "desc" id="desc" rows="3"><?php echo $produit->pro_description; ?></textarea>
<!--Ajout d'un prix-->
                </div>
                <div class="form-group">
                    <label for="prix">Prix</label>
                    <input type="text" class="form-control" name ="prix" id="prix" placeholder="Saisissez le prix" value="<?php echo $produit->pro_prix; ?>">
<!--Ajout d'un stock-->    
                </div>
                <div class="form-group">
                    <label for="stock">Stock</label>
                    <input type="number" class="form-control" name="stock" id="stock" placeholder="Saisissez le stock" value="<?php echo $produit->pro_stock; ?>" >  
<!--Ajout d'une couleur-->
                </div>
                <div class="form-group">
                    <label for="coul">Couleur</label>
                    <input type="text" class="form-control" name ="coul" id="coul" placeholder="Saisissez la couleur" value="<?php echo $produit->pro_couleur; ?>">
                </div>
<!-- Ajout d'une photo-->
                <div class="form-group">
                    <label for="photo">Photo</label>
                    <input type="text" class="form-control" name ="photo" id="photo" placeholder="jpg" value="<?php echo "jpg"?>">
                </div>
<!-- Ajout d'une date d'ajout-->
                <div class="form-group">
                    <label for="dateajout">Date d'ajout</label>
                    <input type="text" class="form-control" name ="dateajout" id="dateajout" placeholder="" value="<?php echo date("d/m/Y")?>">
                </div>
<!-- Ajout d'une date de modif (NULL, à ne pas renseigné)-->
                <div class="form-group">
                    <label for="dateajout">Date d'ajout</label>
                    <input type="text" class="form-control" name ="dateajout" id="dateajout" placeholder="Ne rien saisisir dans ce champ" value="">
                </div>
<!--Ajout d'un produit bloqué-->  
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
<!-- Envoyer-->
                <input type="submit" class="btn btn-outline-primary" value="Envoyer" id="">
            </fieldset>             
        </form>
        <br><br><br>
<!--fin du formulaire-->
<!--javascript boostrap-->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>

