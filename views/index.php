{% extends "layouts/app.php" %}

{% block content %}
<div class="container">

    <div class="form-signin">
        <a href="{{auth_url}}?redirect_url={{redirect_uri}}" class="btn btn-lg btn-primary btn-block">Войти</a>
    </div>

    <div class="form-signin">
        <a href="{{fb_auth_url}}?client_id={{client_id}}&redirect_uri={{redirect_uri}}" class="btn btn-lg btn-success btn-block">Вход FB</a>
    </div>

</div> <!-- /container -->
{% endblock %}