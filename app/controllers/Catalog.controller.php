<?php
    require_once('../app/models/catalog.model.php');
    $catalog = new Catalog();
    $movies = $catalog->get_movies();
    require_once('../app/views/catalog.view.php');
?>