<?php include "app/views/includes/header.php" ?>

<div class="container">
    <div class="img-container">
        <img class="img" src="
        <?php 
    if($hike->image == null)
    {
        echo "img/logo.png";
    }
    else
    {
        echo $hike->image;
    }
        ?>">
    </div>
    <div class="hike">
        <h3 class="title" ><?= htmlspecialchars($hike->name); ?></h3>
        <p class="description" ><i class="fa-solid fa-person-walking-arrow-right"></i><span> Distance :</span>  <?= $hike->distance; ?></p>
        <p class="description" ><i class="fa-solid fa-clock"></i><span> Temps :</span>  <?= $hike->duration; ?></p>
        <p class="description" ><i class="fa-solid fa-arrow-trend-up"></i><span> Dénivelé : </span> <?= $hike->elevation; ?></p>
        <p class="description" > <i class="fa-solid fa-scroll"></i>   <span> Description : </span> <?= $hike->description; ?></p>
        <div class="tags"> 
        <?php 
        foreach($tags as $tag)
        {
            echo '<p class="description" ><i class="fa-solid fa-tag"></i> ' . $tag->name . '</p>';
        }
        ?></div>
        <p class="description" >Creation date : <?= $hike->creationDate; ?></p>
    </div>
        
    
</div>
<div class="btnContainer">
        <?php
        if (isset($_SESSION['id_user'])) {
            if ($_SESSION['id_user'] == $_GET['iduser'] || $_SESSION["admin"] == "true") {
                echo '<div class="btn-container">';
                echo '<div class="btn" ><a href="index.php?action=editHike&id=' . $hike->id . '">EDIT</a></div>';
                echo '<div class="btn" onclick=deleteHike()>DELETE</div>';
                echo '</div>';
            }
        }
        ?>
        <script>
            function deleteHike()
            {
                var r = confirm("Are you sure you want to delete this hike?");
                if (r == true) {
                    location.href = "index.php?action=deleteHike&id=<?= $hike->id ?>";
                }
            }
        </script>
        </div>

<?php include 'app/views/includes/footer.php' ?>
