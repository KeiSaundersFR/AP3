<?= $this->extend('layout') ?>
<?= $this->section('contenu') ?>
<html>

<form method="post" action="<?= url_to('create_salarie') ?>">

    <label for="nom">Nom</label>
    <input id="nom" name="nom" type="text" />
    <label for="prenom">Prénom</label>
    <input id="prenom" name="prenom" type="text" />
    <label for="mail">Email</label>
    <input id="mail" name="mail" type="text" />
    <label for="telephone">Telephone</label>
    <input id="tel" name="tel" type="tel"min="10" max="10" />


    <label for="genre-select">Genre:</label>
    <select name="genre-select" id="genre-select">
        <option value="genre">Genre</option>
        <option value="homme">Homme</option>
        <option value="femme">Femme</option>
    </select>

    <label for="adresse">Adresse</label>
    <input id="adresse" name="adresse" type="text" />
    <label for="ville">Ville</label>
    <input id="ville" name="ville" type="text" />
    <label for="cp">Code_Postal</label>
    <input id="cp" name="cp" type="text" />
    <label for="profil">Profil</label>
    <input type="file" id="profil" name="profil" accept="image/png, image/jpeg" />

    <input type="submit" value="Créer">
</form>

<?= $this->endSection() ?>