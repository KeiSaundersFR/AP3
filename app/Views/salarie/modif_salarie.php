<?= $this->extend('layout') ?>
<?= $this->section('contenu') ?>
<html>

<form method="post" action="<?= url_to('update_salarie') ?>">

    <legend>Modifier salarie</legend>
    <input id="ID_SALARIE" name="ID_SALARIE" type="hidden" value="<?= $salarie['ID_SALARIE'] ?>">
    <label for="nom">Nom</label>
    <input id="nom" name="NOM" type="text" value="<?= $salarie['NOM'] ?>" />
    <label for="prenom">Prénom</label>
    <input id="prenom" name="PRENOM" type="text" value="<?= $salarie['PRENOM'] ?>" />
    <label for="mail">Email</label>
    <input id="mail" name="EMAIL_SALARIE" type="text" value="<?= $salarie['EMAIL_SALARIE'] ?>" />
    <label for="telephone">Telephone</label>
    <input id="telephone" name="NUM_TELEPHONE_SALARIE" type="tel" min="10" max="10" value="<?= $salarie['NUM_TELEPHONE_SALARIE'] ?>"/>


    <label for="genre-select">Genre:</label>
    <select name="CIVILITE" id="genre-select" value="<?= $salarie['CIVILITE'] ?>">
        <option value="">Genre</option>
        <option value="homme">Homme</option>
        <option value="femme">Femme</option>
    </select>

    <label for="adresse">Adresse</label>
    <input id="adresse" name="ADRESSE_SALARIE" type="text" value="<?= $salarie['ADRESSE_SALARIE'] ?>" />
    <label for="ville">Ville</label>
    <input id="ville" name="VILLE_SALARIE" type="text" value="<?= $salarie['VILLE_SALARIE'] ?>" />
    <label for="cp">Code_Postal</label>
    <input id="cp" name="CODE_POSTAL_SALARIE" type="text" value="<?= $salarie['CODE_POSTAL_SALARIE'] ?>" />
    <label for="profil">Profil</label>
    <input type="file" id="profil" name="PHOTO_SALARIE" accept="image/png, image/jpeg" value="<?= $salarie['PHOTO_SALARIE'] ?>" />

    <input type="submit" value="Mettre a jour">
</form>

<?= $this->endSection() ?>