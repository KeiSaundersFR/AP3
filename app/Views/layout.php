<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Amset</title>
    <link rel="stylesheet" type="text/css" href="css/main.css" />
</head>

<body>

    <!-- HEADER: MENU + HEROE SECTION -->
    <header>

        <nav class="menu">
            <ul>
                <li>Sage</li>
                <li>Marquez</li>
                <li>Perot</li>
                <li><a href="<?= url_to('page_salarie') ?>">liste salarie</a></li>
            </ul>
        </nav>
        

        <div class="heroe">

            <h1>Bienvenue à AMSET </h1>

            <h2>The small framework with powerful features</h2>

        </div>

    </header>

    <!-- CONTENT -->

    <section>

        <?= $this->renderSection('contenu') ?>

    </section>

    </div>

    <!-- FOOTER: DEBUG INFO + COPYRIGHTS -->

    <footer>
        <div class="environment">

            <p>Page rendered in {elapsed_time} seconds</p>

            <p>Environment: <?= ENVIRONMENT ?></p>

        </div>

        <div class="copyrights">

            <p>&copy; <?= date('Y') ?> CodeIgniter Foundation. CodeIgniter is open source project released under the MIT
                open source licence.</p>

        </div>

    </footer>

    <!-- SCRIPTS -->

    <script {csp-script-nonce}>
        document.getElementById("menuToggle").addEventListener('click', toggleMenu);

        function toggleMenu() {
            var menuItems = document.getElementsByClassName('menu-item');
            for (var i = 0; i < menuItems.length; i++) {
                var menuItem = menuItems[i];
                menuItem.classList.toggle("hidden");
            }
        }
    </script>

    <!-- -->

</body>

</html>