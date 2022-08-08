<?php include "app/views/includes/header.php" ?>


<section class="createHike-container">
    <form class="formCreateHike" name="create" action="index.php?action=createhikes" method="post">
        <div class="formCreateHike--name">
            <label class="formCreateHike--label" for="name_hikes">Hike name :</label>
            <input class="formCreateHike--input" autocomplete="off" type="text" name="name_hikes" required>
        </div>
        <div class="formCreateHike--distance">
            <label class="formCreateHike--label" for="distance">Distance:</label>
            <input class="formCreateHike--input" autocomplete="off" type="number" name="distance">
        </div>
        <div class="formCreateHike--duration">
            <label class="formCreateHike--label" for="duration">Duration </label>
            <input class="formCreateHike--input" autocomplete="off" type="number" name="duration">
        </div>
        <div class="formCreateHike--elevation">
            <label class="formCreateHike--label" for="elevation_gain">Elevation gain :</label>
            <input class="formCreateHike--input" autocomplete="off" type="number" name="elevation_gain">
        </div>
        <div class="formCreateHike--description">
            <label class="formCreateHike--label" for="description">Description :</label>
            <textarea class="formCreateHike--input" autocomplete="off" type="text" name="description"></textarea>
        </div>
        <section class="formCreateHike--tagsContainer">
        <div class="formCreateHike--tags">

            <?php
            for ($i = 0; $i <= 4; $i++) {
                echo '<div class=input-container>';
                echo '<label class="formCreateHike--label" for="' . $tags[$i]->name . '">' . $tags[$i]->name . '  </label>';
                echo '<input class="formCreateHike--input formCreateHike--input-checkbox" id="' . $tags[$i]->name . '" type="radio" name="tagDifficulty" value="' . $tags[$i]->name . '">';
                echo '</div>';
            }
            ?>
            </div>
            
            <div class="formCreateHike--typeTags">
            <?php
            for ($i = 5; $i < count($tags); $i++) {
                echo '<div class=input-container>';
                echo '<label class="formCreateHike--label" for="' . $tags[$i]->name . '">' . $tags[$i]->name . '  </label>';
                echo '<input class="formCreateHike--input formCreateHike--input-checkbox" id="' . $tags[$i]->name . '" type="checkbox" name="tag[]" value="' . $tags[$i]->name . '">';
                echo '</div>';
            }
            ?>
            </div>
            
        </section>
        <div class="formCreateHike--image">
            <label class="formCreateHike--label" for="image">Image :</label>
            <div class="explication-img">
                <em>Please first upload your image on <a target="_blank" href="https://postimages.org">PostImages</a>.</em>
                <br>
                <em>Use the image resizer and select the size "for website & emails"</em>
                <br>
                <em>Then copy the direct link of your image on the input below.</em>
                <br>
            </div>
            <input pattern="^(http(s?):)([/|.|\w|\s|-])*.(?:jpg|gif|png|webp)$" autocomplete="off" class="formCreateHike--input" type="text" name="image"/>
        </div>
        <button class="formCreateHike--subBtn" type="submit">Post</button>
    </form>
</section>


<?php include 'app/views/includes/footer.php' ?>