<?php

//Conditions successives concernant chaque champ du formulaire: le champ ne doit pas être vide; une fois rempli, il doit être correct//
// Validation des nom et prénom : si non vide, la regex impose l'utilisation exclusive de lettres et de tirets. La même regex est utilisé pour le champ ville //
    if (empty($_POST["nom"])){
        $erreur_nom = "Veuillez renseigner votre nom";
    }
    if (!empty($_POST["nom"])){
        $nom = $_POST["nom"];
        if (preg_match("~^[a-zA-Z-éèçëê\s]+$~", $nom)){
        }
        else{
        $erreur_nom = "Saisissez seulement des lettres et des tirets";
        }
    }
    if (empty($_POST["prenom"])){
        $erreur_prenom = "Veuillez renseigner votre prénom";
    }
    if (!empty($_POST["prenom"])){
        $prenom = $_POST["prenom"];
        if (preg_match("~^[a-zA-Z-éèçëê\s]+$~", $prenom)){
        }
        else{
        $erreur_prenom = "Saisissez seulement des lettres et des tirets";
        }
    }    
// Validation de l'adresse mail avec filter_var($, FILTER_VALIDATE_EMAIL)//
    if (empty($_POST["mail"])){
        $erreur_mail = "Veuillez renseigner le mail";
    }
    if (!empty($_POST["mail"])){
        $mail = $_POST["mail"];
        if (filter_var($mail, FILTER_VALIDATE_EMAIL)){
        }
        else{
            $erreur_mail = "Mail non valide";
        }
    }    
//Validation du login; le champs ne doit pas être vide mais l'utilisateur peut utiliser tout type de caractères//
    if (empty($_POST["login"])){
        $erreur_login = "Veuillez renseigner votre login";
    }
//Validation du mot mot de passe; le champs ne doit pas être vide; si le champs est rempli rempli, le mot de passe est crypté.//
    if (empty($_POST["password"])){
        $erreur_password = "Veuillez renseigner votre mot de passe";
    }
    if (!empty($_POST["password"])){
        $_POST["password"] = password_hash($_POST["password"], PASSWORD_DEFAULT);
    }
//Si toutes les variables d'erreur sont vides, le formulaire est envoyé, sinon on reste sur la page du formulaire//
    if (empty($erreur_nom) && empty($erreur_prenom)  && empty($erreur_mail) && empty($erreur_login) && empty($erreur_password)){
        include("inscr_form_script.php");
    }
    else{
        include("inscr_form.php");
    }

    ?>