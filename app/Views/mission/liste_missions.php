<?= $this->extend('layout') ?>
<?= $this->section('contenu') ?>
<html>
<link rel="stylesheet" type="text/css" href="css/main.css" />

<body>
<a href=<?= url_to("ajout_mission") ?>>Ajouter mission</a>

<?php
foreach ($listeMissions as $mission) {
?>
    <p>
        <?php

        echo $mission['INTITULE_MISSION'],
        $mission['DESCRIPTION'],
        $mission['RAISON_SOCIAL'],
        $mission['DATE_DEBUT'],
        $mission['DATE_FIN'],
        '<a href="' . url_to("modif_mission", $mission['ID_MISSION']) . '" >Modifier</a>';
        ?>
        <form method="post" action=" <?= url_to('suppr_mission') ?>">
            <input id="ID_MISSION" name="ID_MISSION" type="hidden" value="<?= $mission['ID_MISSION'] ?>">
            <input type="submit" value="supprimer">
        </form>
        

</p><br>
<?php

}
?>
</body>

</html>

<?= $this->endSection() ?>