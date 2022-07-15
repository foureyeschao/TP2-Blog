<?php
RequirePage::requireModel('CRUD');
RequirePage::requireModel('Post');
RequirePage::requireModel('User');
RequirePage::requireModel('Category');
RequirePage::requireLibrary('Validation');

//classe de ControllerPost, responsable de tous les contrôles sur les articles de blog
class ControllerPost {

    //afficher un article par article id
    public function show($id){
        $post = new ModelPost;
        $selectId = $post->selectId($id);
        $userId = $selectId['creatorId'];

        $users = New ModelUser;
        $user = $users ->selectId($userId);

        return Twig::render('post-show.php', ['post' => $selectId,'user'=> $user]);

    }
    
    //Charger du rendu de la page où l'article de blog est créé et de la transmission des données requises par la page
    public function create(){
        $categories = New ModelCategory;
        $category = $categories->select();
        return Twig::render('post-insert.php', ['category'=> $category]);
    }
    
    //Vérifiez les données entrantes du formulaire frontal et écrivez les données dans la base de données une fois la vérification réussie
    //Si la validation échoue, afficher un message d'erreur sur la page d'ajoute
    public function insert() {
        $validation = new Validation;
        extract($_POST);
        $validation->name('title')->value($title)->pattern('text')->required()->max(30);
        $validation->name('content')->value($content)->pattern('text')->required()->max(5000);
        if($validation->isSuccess()){
            $post = new ModelPost;
            $insert = $post->insert($_POST);
            RequirePage::redirect('post/show/'.$insert);
        }else{

            $errors =  $validation->displayErrors();

            $categories = New ModelCategory;
            $category = $categories->select();


            return Twig::render('post-edit.php', ['errors' => $errors,'post' => $_POST,
                                                  'category'=>$category]);
        }
    }

    //Charger du rendu de la page où l'article de blog est mise à jour et de la transmission des données requises par la page
    public function edit($id) {
        $post = new ModelPost;
        $selectId = $post->selectId($id);

        $categories = New ModelCategory;
        $category = $categories->select();
        $currentCategory = $categories->selectId($selectId['cid']);

        return Twig::render('post-edit.php', ['post' => $selectId,'category' => $category,'current' => $currentCategory]);
    }

    //Vérifiez les données entrantes du formulaire frontal et mettre à jour les données dans la base de données une fois la vérification réussie
    //Si la validation échoue, afficher un message d'erreur sur la page de mise à jour
    public function update($id){
        $validation = new Validation;
        extract($_POST);
        $validation->name('title')->value($title)->pattern('text')->required()->max(30);
        $validation->name('content')->value($content)->pattern('text')->required()->max(5000);
        if($validation->isSuccess()){
            $post = new ModelPost;
            $insert = $post->update($_POST);
            RequirePage::redirect('post/show/'.$id);
        }else{

            $errors =  $validation->displayErrors();

            $categories = New ModelCategory;
            $category = $categories->select();


            return Twig::render('post-edit.php', ['errors' => $errors,'post' => $_POST,
                                                  'category'=>$category]);
        }
    }

    //Effacer un article par article id
    public function delete($id){
        $post= new ModelPost;
        $delete = $post->delete($id);
        RequirePage::redirect('');
    }
}