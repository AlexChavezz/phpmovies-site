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
                <a href="#">
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
        <section>
            <h3>
                TOTAL DE PELICULAS: <?php echo $movies_length; ?>
            </h3>
        </section>
        <section class="movies-container">
            <table>
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Duracion</th>
                        <th>Año</th>
                        <th>Pais</th>
                        <th>Clasificacion</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($movies as $movie): ?>
                        <tr>
                            <td><?php echo $movie['pelicula_id']; ?></td>
                            <td><?php echo $movie['nombre']; ?></td>
                            <td><?php echo $movie['duracion']; ?></td>
                            <td><?php echo $movie['año']; ?></td>
                            <td><?php echo $movie['pais']; ?></td>
                            <td><?php echo $movie['clasificacion']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </section>
        <section class="arrow-control">
            <?php if ($current_page > 1): ?>
                <a href="?page=<?php echo $current_page-1; ?>" class="arrow"> &lt; </a>
            <?php endif; ?>
            <?php if (count($movies) == $records_per_page): ?>
                <a href="?page=<?php echo $current_page+1; ?>" class="arrow"> &gt; </a>
            <?php endif; ?>
        </section>
    </main>
</body>
</html>
