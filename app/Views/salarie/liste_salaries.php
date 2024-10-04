<?= $this->extend('layout') ?>
<?= $this->section('contenu') ?>

<a class=button href="<?= url_to('ajout_salarie') ?>">Ajouter un salarié </a>

<?php

foreach ($listSalarie as $salarie) {
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
        '<a class = button href="' . url_to('modif_salarie', $salarie['ID_SALARIE']) . '">Modifier</button>',
        '<a class = button href="' . url_to('suppr_salarie', $salarie['ID_SALARIE']) . '">Supprimer</button>';

        ?>
    </p>
<?php
}

?>
<?= $this->endSection() ?>