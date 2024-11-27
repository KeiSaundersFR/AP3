<?= $this->extend('layout') ?>
<?= $this->section('contenu') ?>
<html>
<link rel="stylesheet" type="text/css" href="css/main.css" />

<!-- <body> -->
<a href=<?= url_to("ajout_mission") ?>><button>Ajouter mission</button></a>

<div class="content">
    <?php
    foreach ($listeMissions as $mission) {
    ?>
        <div class="container">
            <a href=<?= url_to("gestion_mission", $mission['ID_MISSION']) ?>>
                <div class="product">
                    <h2><?= $mission['INTITULE_MISSION'] ?></h2>
                    <!-- <p><?= $mission['DESCRIPTION'] ?></p> -->
                    <p><?= $mission['RAISON_SOCIAL'] ?></p>
                    <p><?= $mission['DATE_DEBUT'], " ", $mission['DATE_FIN'] ?></p>
                </div>
            </a>
        </div>
    <?php

    }
    ?>
</div>
<!-- </body> -->

<?= $this->endSection() ?>