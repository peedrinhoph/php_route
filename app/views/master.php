<?php $this->insert('partials/head') ?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <?php $this->insert('partials/nav') ?>
</nav>

<section class="py-5">
    <?= $this->section('content') ?>
</section>

<?php $this->insert('partials/footer') ?>