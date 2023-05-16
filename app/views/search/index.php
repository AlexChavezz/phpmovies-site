<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./search.css" />
    <!-- GOOGLE FONT -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;500&display=swap" rel="stylesheet" />
    <title>Mefix | Busqueda</title>
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
        <section class="movies-container"> 
                <?php 
            include '../../models/Db.php';
            
            $current_page  = (isset($_GET['page']) ? $_GET['page'] : 1);
            $value_to_search = $_GET["search"];

            $connection = new Db();
            $db = $connection->connect();
            $records_per_page = 20;
            if (!empty($value_to_search)) {
                
                // $query = "SELECT * FROM PELICULAS WHERE nombre LIKE '%$value_to_search%'";
                $offset = ($current_page - 1) * $records_per_page + 1;
                $stmt = $db->prepare("SELECT pelicula_id, nombre, duracion, año, pais, clasificacion FROM PELICULAS JOIN PAISES ON id_pais=pais_id JOIN CLASIFICACIONES ON id_clasificacion=clasificacion_id WHERE nombre LIKE '%$value_to_search%' ORDER BY pelicula_id LIMIT :offset, :limit");
                $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
                $stmt->bindParam(':limit', $records_per_page, PDO::PARAM_INT);
                $stmt->execute();
                $movies = $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
        ?>
        <h3><?php echo count($movies);?> <?php if (count($movies) >= 20):  ?> + <?php endif; ?> Resultados para busqueda: <?php echo $value_to_search ?></h3>
        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Titulo</th>
                    <th>año</th>
                    <th>duracion</th>
                    <th>pais</th>
                    <th>clasificacion</th>
                </tr>
            </thead>
            <tbody>
                <?php                
                    foreach ($movies as $movie) {
                        echo "<tr>";
                        echo "<td>" . $movie['pelicula_id'] . "</td>";
                        echo "<td>" . $movie['nombre'] . "</td>";
                        echo "<td>" . $movie['año'] . "</td>";
                        echo "<td>" . $movie['duracion'] . "</td>";
                        echo "<td>" . $movie['pais'] . "</td>";
                        echo "<td>" . $movie['clasificacion'] . "</td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
        <section class="arrow-control">
            <?php if ($current_page > 1): ?>
                <a href="?search=<?php echo $value_to_search ?>&page=<?php echo $current_page-1; ?>" class="arrow"> &lt; </a>
            <?php endif; ?>
            <?php if (count($movies) == $records_per_page): ?>
                <a href="?search=<?php echo $value_to_search ?>&page=<?php echo $current_page+1; ?>" class="arrow arrow-right"> &gt; </a>
            <?php endif; ?>
        </section>
    </main>
</body>

</html>
