<?= $this->extend('layout') ?>
<?= $this->section('contenu') ?>
<body>

<header>
        <h1>Bienvenue sur l'application web Amset</h1>
    </header>
    <main>
        <form method="post" action="<?= url_to('error')?>">

            <label for="Identifiant"> Identifiant </label>
            <input id="Identifiant" name='Identifiant' type="text">
            <label for="Mot de passe"> Mot de passe </label>
            <input id="Mot de passe" name='Mot de passe' type="password">
            
            </select>


            <input type="submit" value="Valider">

        </form>
    </main>
<a href=<?= url_to("error_message") ?>>Retourner a la page de connexion</a>

</body>

<?= $this->endSection() ?>