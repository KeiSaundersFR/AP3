<?= $this->extend('layout') ?>
<?= $this->section('contenu') ?>
<html>
<link rel="stylesheet" type="text/css" href="css/main.css" />

<body>
<a href=<?= url_to("ajout_mission") ?>>Ajouter client</a>

<?php
foreach ($listeMissions as $mission) {
?>
    <p>
        <?php

        echo $mission['INTITULE_MISSION'],
        $mission['DESCRIPTION'],
        $mission['DATE_DEBUT'],
        $mission['DATE_FIN'],
        '<a href="' . url_to("modif_mission", $mission['ID_MISSION']) . '" >Modifier</a>';
        ?>
        <form method="post" action=" <?= url_to('list_mission') ?>">
            
            <input type="submit" value="supprimer">
        </form>
        

</p><br>
<?php

}
?>
</body>

</html>

<?= $this->endSection() ?>