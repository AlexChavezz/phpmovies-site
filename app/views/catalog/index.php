
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="./catalog.css"/>
    <!-- GOOGLE FONT -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;500&display=swap" rel="stylesheet" />
    <title>Meflix | catalogo</title>
</head>
<body>
    <main>
    <header>
            <nav>
                <a href="../../">
                    Home
                </a>
                <a href="./catalog">
                    Catalogo
                </a>
                <a href="./filter">
                    Busqueda
                </a>
                <a href="#">
                    Suscripciones
                </a>
            </nav>
            <button class="header-sesion">
                Inicia Sesion
            </button>
        </header>
        <?php

            include '../../models/Db.php';

            $db = new Db();
            $db = $db->connect();
            $total_records = $db->query("SELECT COUNT(*) FROM PELICULAS")->fetchColumn();

            // Get-movies based on the current page number
            $current_page  = (isset($_GET['page']) ? $_GET['page'] : 1);
            if ($current_page < 1) {
                $current_page = 1;
            }
            $records_per_page = 20;
            // Get the records for the current page
            $offset = ($current_page - 1) * $records_per_page;
            $stmt = $db->prepare("SELECT pelicula_id, nombre, duracion, año, pais, clasificacion FROM PELICULAS JOIN PAISES ON id_pais=pais_id JOIN CLASIFICACIONES ON id_clasificacion=clasificacion_id ORDER BY pelicula_id LIMIT :offset, :limit");
            $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
            $stmt->bindParam(':limit', $records_per_page, PDO::PARAM_INT);
            $stmt->execute();
            $movies = $stmt->fetchAll(PDO::FETCH_ASSOC);
        ?>
        <section>
            <h3>
                TOTAL DE PELICULAS: <?php echo $total_records; ?>
            </h3>
        </section>
        <section class="movies-container">
            <table>
            <thead>
            <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Año</th>
            <th>Clasificacion</th>
            <th>Pais</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($movies as $movie) {
                ?>
                <tr>
                    <td><?php echo $movie['pelicula_id']; ?></td>
                    <td><?php echo $movie['nombre']; ?></td>
                    <td><?php echo $movie['año']; ?></td>
                    <td><?php echo $movie['clasificacion']; ?></td>
                    <td><?php echo $movie['pais']; ?></td>
                </tr>
                <?php
            }
            ?>
        </section>
        <section class="arrow-control">
            <?php if ($current_page > 1): ?>
                <a href="?page=<?php echo $current_page-1; ?>" class="arrow"> &lt; </a>
            <?php endif; ?>
            <?php if (count($movies) == $records_per_page): ?>
                <a href="?page=<?php echo $current_page+1; ?>" class="arrow arrow-right"> &gt; </a>
            <?php endif; ?>
        </section>
    </main>
</body>
</html>

