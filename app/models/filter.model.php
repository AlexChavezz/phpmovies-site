<?php
    require_once('../app/models/DB.model.php');
    class FilterModel extends DB
    {
        public function filter_by_country($country, $offset, $limit)
        {
            $db = $this->open();
            $stmt = $db->prepare("SELECT pelicula_id, nombre, duracion, año, pais, clasificacion FROM PELICULAS JOIN PAISES ON id_pais=pais_id JOIN CLASIFICACIONES ON id_clasificacion=clasificacion_id WHERE pais_id=:country LIMIT :offset, :limit");
            $stmt->bindParam(':country', $country, PDO::PARAM_INT);
            $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
            $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
            $stmt->execute();
            $movies = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $this->close();
            return $movies;
        }
        public function filter_by_year($year, $offset, $limit)
        {
            $db = $this->open();
            $stmt = $db->prepare("SELECT pelicula_id, nombre, duracion, año, pais, clasificacion FROM PELICULAS JOIN PAISES ON id_pais=pais_id JOIN CLASIFICACIONES ON id_clasificacion=clasificacion_id WHERE año=:year LIMIT :offset, :limit");
            $stmt->bindParam(':year', $year, PDO::PARAM_INT);
            $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
            $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
            $stmt->execute();
            $movies = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $this->close();
            return $movies;
        }
        public function filter_by_country_and_year($year, $country, $offset, $limit)
        {
            $db = $this->open();
            $stmt = $db->prepare("SELECT pelicula_id, nombre, duracion, año, pais, clasificacion FROM PELICULAS JOIN PAISES ON id_pais=pais_id JOIN CLASIFICACIONES ON id_clasificacion=clasificacion_id WHERE año=:year AND pais_id=:country LIMIT :offset, :limit");
            $stmt->bindParam(':year', $year, PDO::PARAM_INT);
            $stmt->bindParam(':country', $country, PDO::PARAM_INT);
            $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
            $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
            $stmt->execute();
            $movies = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $this->close();
            return $movies;
        }
        public function get_countries()
        {
            $db = $this->open();
            $stmt = $db->prepare("SELECT * FROM PAISES");
            $stmt->execute();
            $countries = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $this->close();
            return $countries;
        }
    }
?>