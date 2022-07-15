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
<!-- Page de Ajoute,la template d'ajoute d'articles de blog -->
<div class="container-fluid">
    <div class="blog__header mb-4">
        <div class="blog__logo-wrapper text-center mt-5">
            <img class="blog__logo-img" src="{{ path }}images/logo-blue.svg" alt=""/>
        </div>

        <ul class="blog__nav mt-5">
            <li><a href="{{ path }}">Accueil</a></li>
            <li><a href="{{ path }}post/create">Nouvel Article</a></li>
        </ul>
        <div class='blog__list'>
            <form class="blog__list" method="POST" action="{{ path }}post/insert">
                <input type="hidden" name="creatorId" value="1">
                <legend class="mb-2 text-center title">AJOUTER L'ARTICLE</legend>
                {% if errors is defined %}
                <span class="msg--err">{{ errors|raw }}</span>
                {% endif %}
                Titre de l'article : <input type="text" name="title" class="mb-2" value=""/><br>
                Categoire: <select name="cid" id="">
                    {% for item in category %}
                    <option value='{{ item.id }}' >{{ item.name }}
                    </option>
                    {% endfor %}

                </select><br>
                Texte de l'article : <textarea name="content" type="text"></textarea><br>

                <button type="submit" class="btn btn-primary">Ajouter</button>
            </form>
        </div>

    </div>


</div>
</body>
</html>
