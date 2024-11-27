<?= $this->extend('layout') ?>
<?= $this->section('contenu') ?>
<?php
// var_dump($mission);
// var_dump($profilsMission);
// var_dump($listeSalarie);
?>
<div class="fcontent">
    <fieldset>
        <legend>Affectation des salariés</legend>
        <div class="contentp">
            <?php
            foreach ($profilsMission as $profilM) {
                // var_dump($profilM);
                for ($i = 0; $i != $profilM['NOMBRE_SALARIE']; $i++) {
            ?>
                    <div class="containerp">
                        <div class="productp">
                            <p><?= $profilM['INTITULE_PROFIL'] ?></p>
                            <p>ID du profil : <?= $profilM['ID_PROFIL'] ?></p>
                            <form method="post" action="<?= url_to('affect_mission') ?>">
                                <input id="ID_PROFIL" name="ID_PROFIL" type="hidden" value="<?= $profilM['ID_PROFIL'] ?>">
                                <select id="ID_SALARIE" name="ID_SALARIE">
                                <?php
                                foreach ($listeSalarie as $salarie) {
                                    // pour chaque salarie dans listeSalarie

                                    // var_dump($listeSalarie);
                                    // var_dump($salarie);

                                    foreach ($profilsSalarie as $profils) {
                                        foreach ($profils as $profil) {
                                            if ($salarie['ID_SALARIE'] == $profil['ID_SALARIE']) {
                                                if ($profil['ID_PROFIL'] == $profilM['ID_PROFIL']) {
                                                    echo '<option value="' . $salarie['ID_SALARIE'] . '" required>' . $salarie['NOM'] . '</option>';
                                                    // echo 'L id du salarie '. $salarie['ID_SALARIE'] . '<br>';
                                                }
                                            }
                                        }
                                    }
                                }
                                ?>
                                </select>
                                <input type="submit" value="+">
                            </form>
                        </div>

                    </div>
            <?php
                }
            }
            ?>

        </div>
    </fieldset>


    <a href=<?= url_to("gestion_mission", $mission['ID_MISSION']) ?>><button>Retour</button></a>

</div>



<?= $this->endSection() ?>