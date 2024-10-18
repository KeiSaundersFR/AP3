<?= $this->extend('layout') ?>
<?= $this->section('contenu') ?>

<link rel="stylesheet" type="text/css" href="css/main.css" />

<a class=button href="<?= url_to('ajout_salarie') ?>">Ajouter un salarié </a>

<?php

foreach ($listeSalaries as $salarie) {
?>
    <p>
        <?php

        echo $salarie['NOM'],
        $salarie['PRENOM'],
        $salarie['CIVILITE'],
        $salarie['EMAIL_SALARIE'],
        $salarie['NUM_TELEPHONE_SALARIE'],
        $salarie['ADRESSE_SALARIE'],
        $salarie['CODE_POSTAL_SALARIE'],
        $salarie['VILLE_SALARIE'],
        $salarie['PHOTO_SALARIE'],
        // '<a href="' . url_to("modif_salarie", $salarie['ID_SALARIE']) . '" >Modifier</a>',
        // '<a href="' . url_to("suppr_salarie", $salarie['ID_SALARIE']) . '" >Supprimer</a>';
        '<a href="' . url_to("modif_salarie", $salarie['ID_SALARIE']) . '" >Modifier</a>';
        ?>

    <form method="post" action=" <?= url_to('suppr_salarie') ?>">
        <input id="ID_SALARIE" name="ID_SALARIE" type="hidden" value="<?= $salarie['ID_SALARIE'] ?>">
        <input type="submit" value="supprimer">
    </form>
    </p>
<?php
}

?>
<?= $this->endSection() ?>