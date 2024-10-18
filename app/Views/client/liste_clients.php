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
            $client['CONTACT'],
            $client['NUM_TELEPHONE_CLIENT'],
            $client['ADRESSE_CLIENT'],
            '<a href="' . url_to("modif_client", $client['ID_CLIENT']) . '" >Modifier</a>';
            ?>
            <form method="post" action=" <?= url_to('page_client') ?>">
                <input type="submit" value="supprimer">
            </form>
            

    </p><br>
<?php


    }
    ?>
</body>

</html>

<?= $this->endSection() ?>