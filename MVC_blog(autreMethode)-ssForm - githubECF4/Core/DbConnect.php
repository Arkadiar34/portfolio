<?php

namespace App\Core;

use PDO;
use Exception;

class DbConnect
{
    protected $connection;
    protected $request;

    const SERVER = 'localhost';
    const USER = 'root';
    const PASSWORD = '';
    const BASE = 'coursportfolio';

    public function __construct()
    {
        try {
            $this->connection = new PDO('mysql:host=' . self::SERVER . ';dbname=' . self::BASE, self::USER, self::PASSWORD);

            // Activation des erreurs PDO
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Les retours de requête seront en Tableau objet par défaut
            $this->connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

            // Encodage des caractères spéciaux en "utf8"
            $this->connection->setAttribute(\Pdo\Mysql::ATTR_INIT_COMMAND, "SET NAMES utf8");
            //Methode déprécié pour php 7, remplacé par celle actuel
            /* $this->connection->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, "SET NAMES utf8"); */
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }
}
