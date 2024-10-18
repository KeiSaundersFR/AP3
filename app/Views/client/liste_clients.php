<?= $this->extend('layout') ?>
<?= $this->section('contenu') ?>
<html>
<!-- <link rel="stylesheet" type="text/css" href="css/main.css" /> -->

<body>
    <a href=<?= url_to("ajout_client") ?>>Ajouter client</a>

    <?php
    foreach ($listeClients as $client) {
    ?>
        <p>
            <?php

            echo $client['RAISON_SOCIAL'],
            "<br/>",
            $client['CONTACT'],
            "<br/>",
            $client['NUM_TELEPHONE_CLIENT'],
            "<br/>",
            $client['ADRESSE_CLIENT'],
            "<br/>",
            '<a href="' . url_to("modif_client", $client['ID_CLIENT']) . '" >Modifier</a>';
            ?>
            <form method="post" action=" <?= url_to('suppr_client') ?>">
                <input id="ID_CLIENT" name="ID_CLIENT" type="hidden" value="<?= $client['ID_CLIENT']?>">
                <input type="submit" value="supprimer">
            </form>
            

    </p><br>
<?php


    }
    ?>
</body>

</html>

<?= $this->endSection() ?>