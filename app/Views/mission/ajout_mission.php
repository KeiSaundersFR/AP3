<?= $this->extend('layout') ?>

<?= $this->section('contenu') ?>

<?php echo 'Page modification mission';

?>

<form method="post" action=" <?= url_to('update_client') ?>">
    <fieldset>
        <legend>Modification mission</legend>
        <label for="intitule mision">Intitulé de la mission</label>
        <input id="intitule mision" name="INTITULE_MISSION" type="text" value="" required /><br>
        <label for="description">Description</label>
        <input id="description" name="DESCRIPTION" type="text" required /><br>
        <label for="date debut">Date de début</label>
        <input id="date debut" name="DATE_DEBUT" type="date" required /><br>
        <label for="date fin">Date de fin</label>
        <input id="date fin" name="DATE_FIN" type="date" required /><br><input type="submit" value="Modifier">
        <input type="reset" value="Vider">

    </fieldset>
</form>
<?= $this->endSection() ?>