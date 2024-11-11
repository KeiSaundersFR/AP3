<?= $this->extend('layout') ?>
<?= $this->section('contenu') ?>

<body>

    <div class="containerMission">
        <div class="headerMission">
            <div class="header-itemMission">
                <p>Intitulé de la mission : <?= $mission['INTITULE_MISSION'] ?></p>
                <p>Client concerné: <?= $client['RAISON_SOCIAL'] ?></p>
                <p>Profil(s):
                    <?php
                    foreach ($profilsMission as $profil) {
                        echo $profil['INTITULE_PROFIL'] . " x". $profil['NOMBRE_SALARIE'] ."/ ";
                    }
                    ?>
                </p>
            </div>
            <div class="header-itemMission">
                <p>Date Début: <?= $mission['DATE_DEBUT'] ?></p>
                <p>Date fin: <?= $mission['DATE_FIN'] ?></p>
            </div>
        </div>
        <div class="descriptionMission">
            <p>Description</p>
            <p><?= $mission['DESCRIPTION'] ?></p>
        </div>
        <div class="buttonsMission">
            <button>Affecter le(s) salarié(s)</button>
            <a href=<?= url_to("modif_mission", $mission['ID_MISSION'])?>><button>Modifier</button></a>
            <form method="post" action=" <?= url_to('suppr_mission') ?>">
                <input id="ID_MISSION" name="ID_MISSION" type="hidden" value="<?= $mission['ID_MISSION'] ?>">
                <button><input type="submit" value="supprimer"></button>
            </form>
            <a href=<?= url_to("list_mission") ?>><button>Retour</button></a>
        </div>
    </div>

</body>

<?= $this->endSection() ?>