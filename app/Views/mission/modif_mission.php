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
        <input id="date fin" name="DATE_FIN" type="date" value="<?= $mission['DATE_FIN'] ?>" required /><br>
        <select id="client" name="ID_CLIENT">
            <option value="<?= $client['ID_CLIENT'] ?>"> <?= $client['RAISON_SOCIAL'] ?></option>

            <?php
            foreach ($listeClient as $client) {
                echo '<option value="' . $client['ID_CLIENT'] . ' required>' . $client['RAISON_SOCIAL'] . '</option>';
            }
            ?>
        </select><br>
        <label for="profil">Profil</label><br>
        <?php
        
        foreach ($profilsMission as $profil) {

            echo '<label>' . $profil['INTITULE_PROFIL'] . '</label>';
            echo '<input type="hidden" name="ID_PROFIL[]" value="'. $profil['ID_PROFIL'] .'">';
            echo '<input type="number" name=' . $profil['ID_PROFIL'] . ' value="'. $profil['NOMBRE_SALARIE'] . '" " min="1" required > </br>';
        }
        ?>

        <input type="submit" value="Modifier">
        <input type="reset" value="Vider">
    </fieldset>
</form>


<a href=<?= url_to("gestion_mission", $mission['ID_MISSION']) ?>><button>Retour</button></a>
<?= $this->endSection() ?>