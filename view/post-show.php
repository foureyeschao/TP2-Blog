<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=
    , initial-scale=1.0">
    <title>Accueil</title>
    <link rel="stylesheet" href="{{ path }}css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ path }}css/blog-style.css">
</head>
<body>
<!-- Page de details de l'article ,la template de details d'articles de blog -->
<div class="container-fluid">
    <div class="blog__header mb-4">
        <div class="blog__logo-wrapper text-center mt-5">
            <img class="blog__logo-img" src="{{ path }}images/logo-blue.svg" alt="" />
        </div>

        <ul class="blog__nav mt-5">
            <li><a href="{{ path }}">Accueil</a></li>
            <li><a href="{{path}}post/create">Nouvel Article</a></li>
        </ul>
        <div class='blog__list'>
            <div class='card mb-4' style='width: 60vw;'>
                <div class='card-body'>
                    <h5 class='card-title'>{{post.title}}</h5>
                    <h6 class='card-subtitle mb-4 text-muted'>
                        Auteur: <span class='span--modify'>{{user.username}}</span>
                    </h6>
                    <p class='card-text'>{{post.content}}</p>
                    <p>
                        <span class='span--modify'><a href='{{ path }}post/edit/{{post.id}}'>modifier</a></span>
                        <span class='span--modify'><a href='{{ path }}post/delete/{{post.id}}'>effacer</a></span>
                    </p>
                </div>
            </div>
        </div>

    </div>



</div>
</body>
</html>
























