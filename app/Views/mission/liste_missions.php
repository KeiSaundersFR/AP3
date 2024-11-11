<?= $this->extend('layout') ?>
<?= $this->section('contenu') ?>

<body>
    <a href=<?= url_to("ajout_mission") ?>>Ajouter mission</a>

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

                        <?php

                        // echo $mission['INTITULE_MISSION'],
                        // $mission['DESCRIPTION'],
                        // $mission['RAISON_SOCIAL'],
                        // $mission['DATE_DEBUT'],
                        // $mission['DATE_FIN'],
                        // echo '<a href="' . url_to("modif_mission", $mission['ID_MISSION']) . '" >Modifier</a>';
                        ?>
                        

                    </div>
                </a>
            </div>
        <?php

        }
        ?>
    </div>
</body>

<?= $this->endSection() ?>