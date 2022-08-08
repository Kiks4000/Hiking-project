<?php

require_once('app/lib/database.php');

class Hike
{
    public string $id;
    public string $name;
    public string $creationDate;
    public string $distance;
    public string $duration;
    public string $elevation;
    public string $description;
    public string $nickname;
    public string $iduser;
    public $image;
}

class HikeRepository
{
    public DatabaseConnection $connection;

    // ------------------------------------------
    public function deleteHikeAdmin(): void
    {
        $statement = $this->connection->getConnection()->prepare(
            "DELETE FROM HIKES WHERE id_hikes = " . $_GET["idHike"] 
        );
        $statement->execute();
        header("location: index.php?action=allUsers");
    }

    public function getHikes(): array
    {
        $statement = $this->connection->getConnection()->query(
            "SELECT * FROM HIKES INNER JOIN HIKESUSERS ON id_hikes = id_hike ORDER BY id_hikes desc "
        );
        $hikes = [];
        while (($row = $statement->fetch())) {
            $hike = new Hike();
            $hike->id = $row['id_hikes'];
            $hike->name = $row['name_hikes'];
            $hike->creationDate = $row['date_creation'];
            $hike->distance = $row['distance'];
            $hike->duration = $row['duration'];
            $hike->elevation = $row['elevation_gain'];
            $hike->description = $row['description'];
            $hike->iduser = $row['id_user'];
            $hike->image = $row['img_hikes'];

            $hikes[] = $hike;
        }
        return $hikes;
    }

    // ------------------------------------------

    public function getSingleHike(): Hike
    {
        $statement = $this->connection->getConnection()->prepare(
            "SELECT * FROM HIKES WHERE id_hikes = " . $_GET['id']
            // "SELECT * FROM HIKES INNER JOIN HIKESUSERS ON id_hikes = id_hike WHERE id_hikes = " . $_GET['id']
        );

        $statement->execute();
        $row = $statement->fetch();
        $hike = new Hike();
        $hike->id = $row['id_hikes'];
        $hike->name = $row['name_hikes'];
        $hike->creationDate = $row['date_creation'];
        $hike->distance = $row['distance'];
        $hike->duration = $row['duration'];
        $hike->elevation = $row['elevation_gain'];
        $hike->description = $row['description'];
        $hike->image = $row['img_hikes'];

        return $hike;
    }
    public function getHikesForProfil() : array
    {
        $statement = $this->connection->getConnection()->query(
            "SELECT * FROM HIKES inner join HIKESUSERS on id_hikes = id_hike join USERS as U on HIKESUSERS.id_user = U.id_user WHERE U.id_user = " . $_GET['iduser']
        );
        $hikes = [];
        while (($row = $statement->fetch())) {
            $hike = new Hike();
            $hike->id = $row['id_hikes'];
            $hike->name = $row['name_hikes'];
            $hike->creationDate = $row['date_creation'];
            $hike->distance = $row['distance'];
            $hike->duration = $row['duration'];
            $hike->elevation = $row['elevation_gain'];
            $hike->description = $row['description'];
            $hike->iduser = $row['id_user'];
            $hike->image = $row['img_hikes'];

            $hikes[] = $hike;
        }
        return $hikes;

    }
    public function getHikesForAdmin() : array
    {
        $statement = $this->connection->getConnection()->query(
            "SELECT * FROM HIKES "
        );
        $hikes = [];
        while (($row = $statement->fetch())) {
            $hike = new Hike();
            $hike->id = $row['id_hikes'];
            $hike->name = $row['name_hikes'];
            $hike->creationDate = $row['date_creation'];
            $hike->distance = $row['distance'];
            $hike->duration = $row['duration'];
            $hike->elevation = $row['elevation_gain'];
            $hike->description = $row['description'];
            $hike->image = $row['img_hikes'];

            $hikes[] = $hike;
        }
        return $hikes;

    }

    // ------------------------------------------

    public function getHikeTag(): array
    {
        $statement = $this->connection->getConnection()->query(
            "SELECT * FROM HIKES INNER JOIN HIKESTAGS ON id_hikes = id_hike WHERE id_tags =" . $_GET["id"]
        );

        $hikes = [];
        while (($row = $statement->fetch())) {
            $hike = new Hike();
            $hike->id = $row['id_hikes'];
            $hike->name = $row['name_hikes'];
            $hike->creationDate = $row['date_creation'];
            $hike->distance = $row['distance'];
            $hike->duration = $row['duration'];
            $hike->elevation = $row['elevation_gain'];
            $hike->description = $row['description'];
            $hike->image = $row['img_hikes'];

            $hikes[] = $hike;
        }
        return $hikes;
    }

    // ------------------------------------------

    public function deleteHike(): void
    {
        $statement = $this->connection->getConnection()->prepare(
            "DELETE FROM HIKES WHERE id_hikes = " . $_GET['id']
        );
        $statement->execute();
        header("location: index.php?action=home");
    }

    public function updateHike()
    {
        $statement = $this->connection->getConnection()->prepare(
            "UPDATE HIKES SET name_hikes = ?, distance = ?, duration = ?, elevation_gain = ?, description = ?, img_hikes = ? WHERE id_hikes = ?"
        );
        $statement1 =  $this->connection->getConnection()->prepare(
            "DELETE FROM HIKESTAGS WHERE id_hike = " . $_GET['id']
        );
        // if (!empty($input['name_hikes']) && !empty($input['distance']) && !empty($input['duration']) && !empty($input['elevation_gain']) && !empty($input['description']) && !empty($input['img_hikes'])){
        $nameHikesVerif = htmlspecialchars($_POST["name_hikes"]);
        $distanceUpdVerif = htmlspecialchars($_POST["distance"]);
        $durationUpdVerif = htmlspecialchars($_POST["duration"]);
        $elevationGainUpdVerif = htmlspecialchars($_POST["elevation_gain"]);
        $descriptionUpdVerif = htmlspecialchars($_POST["description"]);
        $imageVerif= htmlspecialchars($_POST['img_hikes']);

        $statement->execute(array($nameHikesVerif, $distanceUpdVerif, $durationUpdVerif,$elevationGainUpdVerif , $descriptionUpdVerif, $imageVerif, $_GET["id"]));
    // }
        $statement1->execute();

        $statement3 = $this->connection->getConnection()->prepare(
            'INSERT INTO HIKESTAGS(id_tags,id_hike) VALUES(?,?)'
        );
        $statement3->execute(array($_POST["tagDifficulty"][0], $_GET["id"]));

        for ($i = 0; $i < count($_POST["tag"]); $i++) {
            $statement4 = $this->connection->getConnection()->prepare(
                'INSERT INTO HIKESTAGS(id_tags,id_hike) VALUES(?,?)'
            );
            $statement4->execute(array($_POST["tag"][$i], $_GET['id']));

        }
        // return ($affectedIDTAG > 0) ?? 'default value';
        // return ($affectedID > 0) ?? 'default value';
        return true;
    }
}

class createHikes
{
    public string $name_hikes;
    public string $distance;
    public string $duration;
    public string $elevation_gain;
    public string $description;
    public $img_hikes;
}

class idHikes
{
    public int $id_user;
    public int $id_hikes;
}

class CreateHikesRepository
{
    public DatabaseConnection $connection;

    public function createHikes(string $name_hikes, string $distance, string $duration, string $elevation_gain, string $description,string $img_hikes)
    {

        $statement = $this->connection->getConnection()->prepare(
            'INSERT INTO HIKES(name_hikes,date_creation,distance,duration,elevation_gain,description, img_hikes) VALUES(?,NOW(),?,?,?,?, ?)'
        );
        function valid_data($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        $name_hikesVerif = valid_data($name_hikes);
        $distanceVerif = valid_data($distance);
        $durationVerif = valid_data($duration);
        $elevation_gainVerif = valid_data($elevation_gain);
        $descriptionVerif = valid_data($description);
        $img_hikesVerif = valid_data($img_hikes);

        $affectedLines = $statement->execute([$name_hikesVerif, $distanceVerif, $durationVerif, $elevation_gainVerif, $descriptionVerif, $img_hikesVerif]);

        return ($affectedLines > 0);
        
    }

    public function getIdHikes()
    {
        $satement1 = $this->connection->getConnection()->query(
            "SELECT MAX(id_hikes) FROM HIKES;"
        );

        $satement2 = $this->connection->getConnection()->query(
            "SELECT id_user FROM USERS WHERE nickname = '" . $_SESSION["nickname"] . "'"
        );

        $idHike = $satement1->fetch();
        $idUser = $satement2->fetch();

        $statement3 = $this->connection->getConnection()->prepare(
            'INSERT INTO HIKESUSERS(id_user,id_hike) VALUES(?,?)'
        );

        $affectedID = $statement3->execute([$idUser[0], $idHike[0]]);

        return ($affectedID > 0);
    }

    public function getIdTagForInsertIntoHikesTags()
    {
        for ($i = 0; $i < count($_POST["tag"]); $i++) {
            $statement = $this->connection->getConnection()->query(
                "SELECT id_tag FROM TAGS WHERE name_tag = '" . $_POST["tag"][$i] . "'"
            );

            $statement2 = $this->connection->getConnection()->query(
                "SELECT MAX(id_hikes) FROM HIKES;"
            );

            $idHike = $statement2->fetch();
            $idTag = $statement->fetch();

            $statement3 = $this->connection->getConnection()->prepare(
                'INSERT INTO HIKESTAGS(id_tags,id_hike) VALUES(?,?)'
            );
            $affectedID = $statement3->execute([$idTag[0], $idHike[0]]);
        }

        return ($affectedID > 0);
    }

    public function getIdTagDifficultyForInsertIntoHikesTags()
    {
        $statement = $this->connection->getConnection()->query(
            "SELECT id_tag FROM TAGS WHERE name_tag = '" . $_POST["tagDifficulty"] . "'"
        );

        $statement2 = $this->connection->getConnection()->query(
            "SELECT MAX(id_hikes) FROM HIKES;"
        );

        $idHike = $statement2->fetch();
        $idTag = $statement->fetch();

        $statement3 = $this->connection->getConnection()->prepare(
            'INSERT INTO HIKESTAGS(id_tags,id_hike) VALUES(?,?)'
        );

        $affectedID = $statement3->execute([$idTag[0], $idHike[0]]);

        return ($affectedID > 0);
        
    }
}