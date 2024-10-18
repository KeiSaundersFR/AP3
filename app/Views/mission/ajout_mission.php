<?= $this->extend('layout') ?>

<?= $this->section('contenu') ?>

<?php echo 'Page modification mission';

?>

<form method="post" action=" <?= url_to('create_mission') ?>">
    <fieldset>
        <legend>Modification mission</legend>
        <label for="intitule mision">Intitulé de la mission</label>
        <input id="intitule mision" name="INTITULE_MISSION" type="text" value="" required /><br>

        <label for="description">Description</label>
        <input id="description" name="DESCRIPTION" type="text" required /><br>

        <label for="client"> Client </label>
        <select id="client" name="ID_CLIENT">
            <option value="">-- Choisissez une option --</option>

            <?php
            foreach ($listeClient as $client) {
                echo '<option value="' . $client['ID_CLIENT'] . '">' . $client['RAISON_SOCIAL'] . '</option>';
            }
            ?>

        </select>





        <label for="date debut">Date de début</label>
        <input id="date debut" name="DATE_DEBUT" type="date" required /><br>

        <label for="date fin">Date de fin</label>
        <input id="date fin" name="DATE_FIN" type="date" required /><br>

        <input type="submit" value="Créer">
        <input type="reset" value="Vider">

    </fieldset>
</form>
<?= $this->endSection() ?>