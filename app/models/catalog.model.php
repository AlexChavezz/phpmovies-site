<?php
    require_once('../app/models/DB.model.php');
    class Catalog extends DB
    {
        public function get_movies()
        {
            $db = $this->open();
            $stmt = $db->prepare("SELECT pelicula_id, nombre, duracion, año, pais, clasificacion FROM PELICULAS JOIN PAISES ON id_pais=pais_id JOIN CLASIFICACIONES ON id_clasificacion=clasificacion_id ORDER BY pelicula_id LIMIT 10");
            $stmt->execute();
            $movies = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $this->close();
            return $movies;
        }
    }
?>