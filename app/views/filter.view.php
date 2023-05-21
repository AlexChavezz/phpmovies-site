
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="./filter.css"/>
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
                <a href="/">
                    Home
                </a>
                <a href="/catalog">
                    Catalogo
                </a>
                <a href="#">
                    Busqueda
                </a>
            </nav>
            <button class="header-sesion">
                Inicia Sesion
            </button>
        </header> 
        <section class="form-container">
            <form action="../controllers/filter.controller.php">
                <label for="country">Select a country:</label>
                <select name="country" id="country-select">
                    <option value="">-- Select a country --</option>
                    <option value="any">Any</option>
                    <?php 
                        foreach ($countries as $country)
                        {
                            echo "<option value='{$country['pais_id']}'>{$country['pais']}</option>";
                        }
                    ?>
                </select>
                <label for="year">Select age: </label>
                <select name="year" id="age">
                    <option value=""> -- Select an age -- </option>
                    <option value="any">Any</option>
                    <?php

                        for ($i=1800; $i <= 2024; $i++) 
                        {
                            echo "<option value='{$i}'>{$i}</option>";
                        }   
                    ?>
                </select>
                <input type="submit" value="Filtrar"/>
            </form>
        </section>    
        <section>
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
    </main>
    <section class="arrow-control">
        <?php if ($current_page > 1): ?>
            <a href="?year=<?php echo $year ?>&country=<?php echo $country ?>&page=<?php echo $current_page-1; ?>" class="arrow"> &lt; </a>
        <?php endif; ?>
        <?php if (count($movies) == $records_per_page): ?>
            <a href="?year=<?php echo $year ?>&country=<?php echo $country ?>&page=<?php echo $current_page+1; ?>" class="arrow"> &gt; </a>
        <?php endif; ?>
    </section>
</body>
</html>

