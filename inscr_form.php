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
 <br><br>
 <?php var_dump($_POST)?>
<!--formulaire inscription -->
<form name="jarditouessai" action="inscr_form_script.php" method="POST" id="formulaire">
    <fieldset>
            <legend><h3>Formulaire d'inscription</h3></legend>
<!--saisie du nom -->
                <div class="form-group">
                    <label for="nom">Votre nom</label>
                    <!-- php: Si l'utilisateur rempli le champ, les caractères saisis sont insérés dans value et persistent tat que le formulaire n'est pas correct et envoyé. Idem pour les champs suivants -->
                    <input type="text" class="form-control" name="nom" id="nom" placeholder="Veuillez saisir votre nom" value="<?php echo htmlentities($_POST["nom"])?>"><Br>
                    <!-- php =  affichage d'un message d'erreur si le champ est vide ou incorrect (idem pour les champs suivant) -->
                    <?php if(isset($erreur_nom)){?>
                        <?php echo "<span style='color:red;'>$erreur_nom</span>";?>
                        <?php }?>
                </div>
<!--saisie du prénom -->
                <div class="form-group">
                    <label for="prenom">Votre prénom</label>
                    <input type="text" class="form-control" name ="prenom" id="prenom" placeholder="Veuillez saisir votre prénom" value="<?php echo htmlentities($_POST["prenom"])?>"> <br>
                    <!-- Validation php-->
                    <?php if(isset($erreur_prenom)){?>
                        <?php echo "<span style='color:red;'>$erreur_prenom</span>";?>
                        <?php }?>
                </div>
<!--saisie mail-->
                <div class="form-group">
                    <label for="mail">Email</label>
                    <input type="text" class="form-control" name="mail" id="mail" placeholder="dave.loper@afpa.fr" value="<?php echo htmlentities($_POST["mail"])?>"><br>  
                    <!-- validation php --> 
                    <?php if(isset($erreur_mail)){?>
                        <?php echo "<span style='color:red;'>$erreur_mail</span>";?>
                        <?php }?>
                </div>
<!--saisie du login -->
                <div class="form-group">
                    <label for="login">login</label>
                    <input type="text" class="form-control" name ="login" id="login" placeholder="Veuillez saisir votre login" value="<?php echo htmlentities($_POST["login"])?>"> <br>
                    <!-- Validation php-->
                    <?php if(isset($erreur_login)){?>
                        <?php echo "<span style='color:red;'>$erreur_login</span>";?>
                        <?php }?>
                </div>
<!--saisie du mot de passe -->
<div class="form-group">
                    <label for="password">mot de passe</label>
                    <input type="text" class="form-control" name ="password" id="password" placeholder="Veuillez saisir votre mot de passe" value="<?php echo htmlentities($_POST["password"])?>"> <br>
                    <!-- Validation php-->
                    <?php if(isset($erreur_password)){?>
                        <?php echo "<span style='color:red;'>$erreur_password</span>";?>
                        <?php }?>
                </div>
<!--date d'inscription-->
                <div class="form-group">
                    <label for="date">date</label>
                    <input type="text" class="form-control" name ="date" id="date" placeholder="" value="<?php echo date("d/m/Y")?>">
                </div>
                <div class="form-group">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="gridCheck">
                        <label class="form-check-label" for="gridCheck">
                        J'accepte le traitement informatique de ce formulaire
                        </label>
                    </div>
                </div>
                <input type="submit" class="btn btn-dark" value="Envoyer" id="envoyer">
                <input type="submit" class="btn btn-dark" value="Annuler">
            </fieldset>             
        </form>
<!--fin du formulaire-->

<!--javascript boostrap-->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>

