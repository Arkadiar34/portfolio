<?php

namespace App\Controllers;

use App\Core\Validator;

class ContactController extends Controller
{
    //Méthode qui affiche la page contact et traite le formulaire
    public function index()
    {
        $erreur = "";
        $success = "";
        //on contrôle si les champs du formulaire sont remplis
        if (Validator::validatePost($_POST, ['lastname', 'firstname', 'email', 'request'])) {
            //on vérifie que le mail a un format valide
            if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                //message de confirmation avec le prénom nettoyé par le constructeur du Controller
                $success = "Merci " . $this->paramPost['firstname'] . ", votre demande a bien été envoyée";
            } else {
                $erreur = "L'adresse mail n'est pas valide";
            }
        } elseif (!empty($_POST)) {
            //on affiche un message d'erreur si le formulaire a été envoyé incomplet
            $erreur = "Le formulaire n'a pas été correctement rempli";
        }
        //on envoie les messages à la vue contact/index.php
        $this->render('contact/index', ["erreur" => $erreur, "success" => $success]);
    }
}
