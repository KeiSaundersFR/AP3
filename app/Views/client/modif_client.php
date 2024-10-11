<?= $this->extend('layout') ?>

<?= $this->section('contenu') ?>

<?php echo 'Page modification client';
?>

<form method="post" action=" <?= url_to('update_client') ?>">
    <fieldset>
        <legend>Modifier client</legend>
        <label for="raison sociale">Raison Social</label>
        <input type="hidden" id="raison sociale" name="raison social" type="text" required /><br>
        <label for="contact (nom prenom)">Contact (nom prenom)</label>
        <input type="hidden" id="contact" name="contact" type="text" required/><br>
        <label for="contact email">Email Client</label>
        <input type="hidden" id="mail" name="email_client" type="text" required/><br>
        <label for="telephone">Telephone Client</label>
        <input type="hidden" id="tel" name="telephone" type="text" required maxlength="10"/><br>
        <label for="adresse_client">Adresse Client</label>
        <input type="hidden" id="adresse" name="adresse" type="text" required/><br>
        <label for="code postal">Code Postal</label>
        <input type="hidden" id="cp" name="code_postal" type="text" required/><br>
        <label for="ville">Ville</label>
        <input type="hidden" id="ville" name="ville" type="text" required/><br>
        <label for="avatar">Photo de profil</label>
        <input type="hidden" type="file" id="photo" name="profil" accept="image/png, image/jpeg" required><br>
        <input type="submit" value="Modifier">
        <input type="reset" value="Vider">

    </fieldset>
</form>

<?= $this->endSection() ?>