<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./main.css" />
    <!-- GOOGLE FONT -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;500&display=swap" rel="stylesheet" />
    <title>Mefix</title>
</head>

<body>
    <main>
        <header>
            <nav>
                <a href="./">
                    Home
                </a>
                <a href="./catalog">
                    Catalogo
                </a>
                <a href="/filter">
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
        <section class="content-presetation-container">
            <article class="content-presetation">

            </article>
            <article>
                <h2>El lugar donde encontraras tus peliculas favoritas</h2>
                <form action="./app/views/search?search=toy?page=1" method='get'>
                    <div class="form-container">
                        <input type="text" class="movie-input" placeholder="Buscar.." name="search"/>
                        <img src="./assets/search.svg" alt="search-icon" class="search-icon" />
                    </div>
                </form>
            </article>
        </section>
        <section class="tiers">
            <article>
                <h3>Nuestros planes</h3>
            </article>
            <article class="tiers-container">
                <img src="./assets/basic.jpg" alt="basic" class="tier" />
                <img src="./assets/gold.jpg" alt="golden" class="tier" />
                <img src="./assets/premium.jpg" alt="premium" class="tier" />
            </article>
            <article class="tiers-container">
                <div class="tier tier-button-container">
                    <h4>Basico</h4>
                    <a href="">
                        <button class="tier-button">Comprar</button>
                    </a>
                </div>
                <div class="tier tier-button-container">
                    <h4>Gold</h4>
                    <a href="">
                        <button class="tier-button">Comprar</button>
                    </a>
                </div>
                <div class="tier tier-button-container">
                    <h4>Premium</h4>
                    <a href="">
                        <button class="tier-button">Comprar</button>
                    </a>
                </div>
            </article>
        </section>
    </main>
</body>

</html>
