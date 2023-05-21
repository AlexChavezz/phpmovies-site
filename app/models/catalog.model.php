<?php
    require_once('../app/models/DB.model.php');
    class Catalog extends DB
    {
        public function get_movies($offset, $records_per_page)
        {
            $db = $this->open();
            $stmt = $db->prepare("SELECT pelicula_id, nombre, duracion, año, pais, clasificacion FROM PELICULAS JOIN PAISES ON id_pais=pais_id JOIN CLASIFICACIONES ON id_clasificacion=clasificacion_id ORDER BY pelicula_id LIMIT :offset, :limit");
            $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
            $stmt->bindParam(':limit', $records_per_page, PDO::PARAM_INT);
            $stmt->execute();
            $movies = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $this->close();
            return $movies;
        }
        public function get_movies_length()
        {
            $db = $this->open();
            $total_records = $db->query("SELECT COUNT(*) FROM PELICULAS")->fetchColumn();
            $this->close();
            return $total_records;
        }
    }
?>