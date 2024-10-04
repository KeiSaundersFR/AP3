<?= $this->extend('layout') ?>
<?= $this->section('contenu') ?>
<html>
<link rel="stylesheet" type="text/css" href="css/main.css" />

<body>
<a href=<?= url_to("ajout") ?>>Ajouter client</a>

<?php
foreach ($listeClients as $client) {
?>
    <p>
        <?php

            $client['prenom'];
            $client['nom'];
            $client['departement_nom'];
            '<a href="' . url_to("modif", $client['id']) . '" >Modifier</a>';
            '<a href="' . url_to("supp", $client['id']) . '" >Supprimer</a>';

        ?>

    </p>
<?php


}
?>
</body>

</html>

<?= $this->endSection() ?>