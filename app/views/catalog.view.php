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

        <table>
        <thead>
            <tr>
                <th>id</th>
                <th>nombre</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($movies as $movie): ?>
                <tr>
                    <td><?php echo $movie['pelicula_id']; ?></td>
                    <td><?php echo $movie['nombre']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    </main>
</body>
</html>
