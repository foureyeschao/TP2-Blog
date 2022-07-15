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

<!-- Page d'accueil ,la template d'articles de blog -->
<div class="container-fluid">
    <div class="blog__header mb-4">
        <div class="blog__logo-wrapper text-center mt-5">
            <img class="blog__logo-img" src="./images/logo-blue.svg" alt="" />
        </div>

        <ul class="blog__nav mt-5">
            <li><a href="{{path}}">Accueil</a></li>
            <li><a href="{{path}}post/create">Nouvel Article</a></li>
        </ul>
        <div class="blog__list">
            {% for post in posts %}

             <div class='card mb-4' style='width: 60vw;'>
                <div class='card-body'>
                    <h5 class='card-title'>{{ post.title }}</h5>
                    {% for user in users %}
                      {% if user['id'] == post['creatorId']   %}
                    <h6 class='card-subtitle mb-4 text-muted'>Auteur: {{ user.username }}</h6>
                      {% endif %}
                    {% endfor %}
                    <p class='card-text'>{{ post.content }}
                    </p>

                    <p><a href='./post/show/{{ post.id }}'>Lire plus...</a></p>
                </div>
            </div>
            {% endfor %}

        </div>

    </div>



</div>
</body>
</html>