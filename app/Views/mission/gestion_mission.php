<?= $this->extend('layout') ?>
<?= $this->section('contenu') ?>
<body>

<?= $admin ? '<a href="...">Modifier</a>' : '' ?>

</body>

<?= $this->endSection() ?>