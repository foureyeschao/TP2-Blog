<?php
RequirePage::requireModel('CRUD');
RequirePage::requireModel('Post');
RequirePage::requireModel('User');

//classe de ControllerHome, Lire les données du modèle de données, afficher le contenu de la page d'accueil

class ControllerHome{

    public function index(){
        $post = new ModelPost();
        $select = $post->select('id','DESC');

        $user = new ModelUser;
        $users = $user->select();


        return Twig::render('home-index.php', ['posts' => $select,'users' => $users]);
    }



    public function error(){
        return Twig::render('error.php');
    }
}