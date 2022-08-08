<?php include "app/views/includes/header.php" ?>

<div class="subContainer">

    <h1 class="subTitle">Subscribe and post your first hike !</h1>

    <form class="subForm" name="register" action="index.php?action=register" method="post">
        
        <div class="subForm_name">
            <label for="firstname">Firstname :</label>
            <input type="text" name="firstname" autocomplete="off" required pattern="^[A-Za-z '-]+$">
        </div>

        <div class="subForm_lastname">
            <label for="lastname">Lastname :</label>
            <input type="text" name="lastname" autocomplete="off" required pattern="^[A-Za-z '-]+$">
        </div>

        <div class="subForm_nickname">
            <label for="nickname">Pseudo :</label>
            <input type="text" autocomplete="off" required name="nickname">
        </div>

        <div class="subForm_email">
            <label for="email">Email :</label>
            <input type="email" name="email" required>
        </div>

        <div class="subForm_password">
            <label for="password">Password : </label>
            <input type="password" required name="password">
        </div>

        <div class="subForm_desc">
            <label for="description">Choose The Way You Are : </label>
            <select name="users_description" id="description">
                <option value="Fiery Adventurer">Fiery Adventurer</option>
                <option value="Peaceful Hiker">Peaceful Hiker</option>
                <option value="Intrepid Explorer">Intrepid Explorer</option>
                <option value="Extreme traveler">Extreme traveler</option>
            </select>
        </div>

        <div class="subForm_avatar">
            
            <p class="avatar_title">Choose Your Avatar :</p>

            <label for="avatar1">
              <input type="radio" name="users_avatar" value="img/avatar_profil/avatar_gon.jpg" id="avatar1">
              <img src="img/avatar_profil/avatar_gon.jpg" alt="avatar1">
            </label>

            <label for="avatar2">
              <input type="radio" name="users_avatar" value="img/avatar_profil/avatar_asuma.jpeg" id="avatar2">
              <img src="img/avatar_profil/avatar_asuma.jpeg" alt="avatar2">
            </label>
            
            <label for="avatar3">
              <input type="radio" name="users_avatar" value="img/avatar_profil/avatar_asuka.jpg" id="avatar3">
              <img src="img/avatar_profil/avatar_asuka.jpg" alt="avatar3">
            </label>

            <label for="avatar4">
              <input type="radio" name="users_avatar" value="img/avatar_profil/avatar_robin.png" id="avatar4">
              <img src="img/avatar_profil/avatar_robin.png" alt="avatar4">
            </label>

            <label for="avatar5">
            <input type="radio" name="users_avatar" value="img/avatar_profil/avatar_luffysrx.jpg" id="avatar5">
            <img src="img/avatar_profil/avatar_luffysrx.jpg" alt="avatar5">
            </label>

            <label for="avatar6">
              <input type="radio" name="users_avatar" value="img/avatar_profil/avatar_meliodas.jpg" id="avatar6">
              <img src="img/avatar_profil/avatar_meliodas.jpg" alt="avatar6">
            </label>

            <label for="avatar7">
              <input type="radio" name="users_avatar" value="img/avatar_profil/avatar_sakura.jpg"  id="avatar7">
              <img src="img/avatar_profil/avatar_sakura.jpg" alt="avatar7">
            </label>

            <label for="avatar8">
              <input type="radio" name="users_avatar" value="img/avatar_profil/avatar_nami.png" id="avatar8">
              <img src="img/avatar_profil/avatar_nami.png" alt="avatar8">
            </label>
        </div>

        <div class="btn_container">
          <button class="subForm_btn" type="submit">Subscribe</button>
        </div>

    </form>

</div>

<?php include 'app/views/includes/footer.php' ?>