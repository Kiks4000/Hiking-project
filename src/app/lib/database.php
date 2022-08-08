<?php

class DatabaseConnection
{
    
    public ?PDO $database = null;

    public function getConnection($file = 'core/setting.ini'): PDO
    {
        $data_config = parse_ini_file($file,TRUE);
        if ($this->database === null) {
            $this->database = new PDO('mysql:host='. $data_config['parametre']['host'] .';dbname='. $data_config['parametre']['dbname'] .';charset=utf8', $data_config['parametre']['user'], $data_config['parametre']['mdp']);
        }

        return $this->database;
    }
}

?>

