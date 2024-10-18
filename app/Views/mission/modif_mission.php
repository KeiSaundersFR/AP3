<?= $this->extend('layout') ?>

<?= $this->section('contenu') ?>

<?php echo 'Page modification mission';

?>

<form method="post" action=" <?= url_to('update_mission') ?>">
    <fieldset>
        <legend>Modification mission</legend>
        <input id="ID_MISSION" name="ID_MISSION" type="hidden" value="<?= $mission['ID_MISSION'] ?>">
        <label for="intitule mision">Intitulé de la mission</label>
        <input id="intitule mision" name="INTITULE_MISSION" type="text" value="<?= $mission['INTITULE_MISSION'] ?>" required /><br>
        <label for="description">Description</label>
        <input id="description" name="DESCRIPTION" type="text" value="<?= $mission['DESCRIPTION'] ?>" required /><br>
        <label for="date debut">Date de début</label>
        <input id="date debut" name="DATE_DEBUT" type="date" value="<?= $mission['DATE_DEBUT'] ?>" required /><br>
        <label for="date fin">Date de fin</label>
        <input id="date debut" name="DATE_FIN" type="date" value="<?= $mission['DATE_FIN'] ?>" required /><br>
        <input type="submit" value="Modifier">
        <input type="reset" value="Vider">
    </fieldset>
</form>
<a href=<?= url_to("list_mission") ?>>Retour</a>
<?= $this->endSection() ?>