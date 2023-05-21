<?php
    require_once('../app/models/catalog.model.php');
    $current_page = (isset($_GET['page']) ? $_GET['page'] : 1);
    $records_per_page = 15;
    $offset = ($current_page - 1) * $records_per_page;
    $catalog = new Catalog();
    $movies_length = $catalog->get_movies_length();
    $movies = $catalog->get_movies($offset, $records_per_page);
    
    require_once('../app/views/catalog.view.php');
?>