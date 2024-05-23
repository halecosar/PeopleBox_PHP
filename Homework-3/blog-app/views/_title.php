<?php
$ozet = count(getData()["categories"]) . ' kategoride ' . getCountActiveFilm() . '  film listelenmiştir';
const baslik = "Popüler Filmler";
?>

<h1 class="mb-4"><?php echo baslik ?></h1>
<p class="text-muted">
    <?php echo $ozet ?>
</p>