<?php include "app/views/includes/header.php" ?>

<div class= "profil-container">
    
    <div class="profil-img">
        <div class="profilOverlay">
            <img class="avatar" src="<?= $users[0]->avatar ?>" alt="<?= $users[0]->avatar ?>">
            <a href="index.php?action=updateUser" class="avatarEdit">EDIT YOUR DATAS</a>
        </div>
        <p class="information">"<?= $users[0]->userDescription ?>"</p>
    </div>      

    <div class="profil-information">

        <div class="userFirstname">
            <p class="userFirstname-label">Firstname :</p>
            <p class="userFirstname-data"><?= $users[0]->firstname ?></p>
        </div>

        <div class="userLastname">
            <p class="userLastname-label">Name :</p>
            <p class="userLastname-data"><?= $users[0]->lastname ?></p>
        </div>

        <div class="userNickname">
            <p class="userNickname-label">Nickname :</p>
            <p class="userNickname-data"><?= $users[0]->nickname ?></p>
        </div>

        <div class="userMail">
            <p class="userMail-label">E-Mail :</p>
            <p class="userMail-data"><?= $users[0]->email ?></p>
        </div>

    </div>
</div>
<h3 class="myhikesTitle">MY HIKES : </h3>
<?php 
    if($hikes == []){ ?>
        <div class="my-hikes">
            <h3> You haven't post any hikes yet !</h3>
            <a href="index.php?action=createhikes">Click here to post your very first hike !</a>
        </div>
    <?php } else { 

foreach($hikes as $hike){ ?>
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
?>          ">
        </div>
    <div class="hike">
        <h3 class="title" ><?= htmlspecialchars($hike->name); ?></h3>
        <p class="description" ><i class="fa-solid fa-person-walking-arrow-right"></i><span> Distance :</span>  <?= $hike->distance; ?></p>
        <p class="description" ><i class="fa-solid fa-clock"></i><span> Temps :</span>  <?= $hike->duration; ?></p>
        <p class="description" ><i class="fa-solid fa-arrow-trend-up"></i><span> Dénivelé : </span> <?= $hike->elevation; ?></p>
        <p class="description" ><i class="fa-solid fa-scroll"></i>   <span> Description : </span> <?= $hike->description; ?></p>
        <p class="description" >Creation date : <?= $hike->creationDate; ?></p>
        <div class="btnContainer">
        <?php
        if (isset($_SESSION['id_user'])) {
            if ($_SESSION['id_user'] == $_GET['iduser']) {
                echo '<div class="btn-container">';
                echo '<div class="btn" ><a href="index.php?action=editHike&id=' . $hike->id . '">EDIT</a></div>';
                echo '<div class="btn" onclick=deleteHike() >DELETE</div>';
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
    </div>
</div>

<?php } }?>


<?php include 'app/views/includes/footer.php' ?>