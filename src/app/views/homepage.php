<?php include "app/views/includes/header.php" ?>


<section class="tag-container">

<?php foreach ($tags as $tag){ ?>
    <div class="navTag"><a class="tagLink" href="index.php?action=sort&id=<?= $tag->id?>"><?= $tag->name; ?></a></div>
<?php } ?>

</section>

<section class="card-container">

<?php foreach ($hikes as $hike) { ?>

<div class="hikeCard">
    <img class="hikeCard-img" src="
    <?php 
    if($hike->image == null)
    {
        echo "img/logo.png";
    }
    else
    {
        echo $hike->image;
    }
        ?>
        ">
    <h3 class="hikeCard-title" ><?= htmlspecialchars($hike->name); ?></h3>
    <p class="hikeCard-description" ><i class="fa-solid fa-person-walking-arrow-right"></i> distance : <?= $hike->distance; ?> km</p>
    <p class="hikeCard-description" ><i class="fa-solid fa-clock"></i> temps : <?= $hike->duration; ?> min</p>
    <p class="hikeCard-elevationGain"><i class="fa-solid fa-arrow-trend-up"></i> déniveler : <?= $hike->elevation ?> m</p>
    <div class="hikeCard-btn" ><a href="index.php?action=hike&id=<?=$hike->id;?>&iduser=<?=$hike->iduser;?>">VIEW MORE</a></div>
</div>

<?php } ?>


</section>

<?php include 'app/views/includes/footer.php' ?>