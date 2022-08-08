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
    <p class="hikeCard-description" >distance : <?= $hike->distance; ?></p>
    <p class="hikeCard-description" >temps : <?= $hike->duration; ?></p>
    <div class="hikeCard-btn" ><a href="index.php?action=hike&id=<?=$hike->id;?>">VIEW MORE</a></div>
</div>

<?php } ?>


</section>

<?php include 'app/views/includes/footer.php' ?>