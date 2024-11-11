<?= $this->extend('layout') ?>

<?= $this->section('contenu') ?>

<?php echo 'Page ajout mission';
?>

<script>
    function validateForm() {
        const checkboxes = document.querySelectorAll('input[type="checkbox"]');
        let checkedOne = Array.prototype.slice.call(checkboxes).some(x => x.checked);
        if (!checkedOne) {
            alert("Please select at least one checkbox.");
            return false;
        }
        return url_to('create_mission');
    }
</script>


<form method="post" onsubmit="return validateForm()" >
    <fieldset>
        <legend>Ajout mission</legend>
        <label for="intitule mision">Intitulé de la mission</label>
        <input id="intitule mision" name="INTITULE_MISSION" type="text" required /><br>

        <label for="description">Description</label>
        <input id="description" name="DESCRIPTION" type="text" required /><br>

        <label for="client"> Client </label>
        <select id="client" name="ID_CLIENT">
            <option value="">-- Choisissez une option --</option>

            <?php
            foreach ($listeClient as $client) {
                echo '<option value="' . $client['ID_CLIENT'] . '" " required>' . $client['RAISON_SOCIAL'] . '</option>';
            }
            ?>

        </select><br>

        <label for="date debut">Date de début</label>
        <input id="date debut" name="DATE_DEBUT" type="date" required />

        <label for="date fin">Date de fin</label>
        <input id="date fin" name="DATE_FIN" type="date" required /><br>


        <label for="profil">Profil</label>
        <?php

        foreach ($listeProfil as $profil) {
            echo '<input type="checkbox" name="profils[]" value=' . $profil['ID_PROFIL'] . '>' . $profil['INTITULE_PROFIL'];
            echo '<input type="number" name=' . $profil['ID_PROFIL'] . ' value="1" min="1" max="5"> </br>';
        }
        ?>

        <input type="submit" value="Créer">
        <input type="reset" value="Vider">
    </fieldset>
</form>
<a href=<?= url_to("list_mission") ?>>Retour</a>
<?= $this->endSection() ?>