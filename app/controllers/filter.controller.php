<?php
    require_once('../app/models/filter.model.php');

    $filter = new FilterModel();
    $countries = $filter->get_countries();

    $current_page = (isset($_GET['page']) ? $_GET['page'] : 1);
    $records_per_page = 15;
    $offset = ($current_page - 1) * $records_per_page;
    
    $country = (isset($_GET['country']) ? $_GET['country'] : '');
    $year = (isset($_GET['age']) ? $_GET['year'] : '');

    $form_prop_country = (isset($_GET['country']) ? $_GET['country'] : null);
    $form_prop_year = (isset($_GET['year']) ? $_GET['year'] : null);

    if ($form_prop_country == "any" && $form_prop_year == "any") {
        // $movies = $filter->get_movies($offset, $records_per_page);
        ECHO "NO HAY NADA";
    } else if ($form_prop_country == "any") {
        $movies = $filter->filter_by_year(intval($form_prop_year),  $offset, $records_per_page);
    } else if ($form_prop_year == "any") {
        $movies = $filter->filter_by_country($form_prop_country,  $offset, $records_per_page);
    } else if ($form_prop_year && $form_prop_country) {
        $movies = $filter->filter_by_country_and_year(intval($form_prop_year), intval($form_prop_country), $offset, $records_per_page);
    }
    else
    {
        $movies = NULL;
    }
    
    require_once('../app/views/filter.view.php');
?>