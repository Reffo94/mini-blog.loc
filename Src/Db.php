<?php

namespace Src;

use PDO;

class Db
{
    private $pdo;

    public function __construct() {
        $dataBaseConfig = require_once __DIR__ . '/configs/dbconfig.php';
        $this->pdo = new PDO('mysql:host=' . $dataBaseConfig['host'] . ';dbname=' . $dataBaseConfig['dbname'], $dataBaseConfig['user'],$dataBaseConfig['password']);
    }

    public function queryToReadAll()
    {
        $sql = "SELECT * FROM `posts`;";
        $sth = $this->pdo->prepare($sql);
        $result = $sth->execute();

        if (!$result) {
            return null;
        }

        return $sth->fetchAll(PDO::FETCH_OBJ);
    }

    public function queryToReadOne()
    {
        if (!empty($_GET['id'])) {
            $sqlParams[] = $_GET['id'];
        }
        $sql = "SELECT * FROM `posts` WHERE id = ?;";
        $sth = $this->pdo->prepare($sql);
        $result = $sth->execute($sqlParams);

        if (!$result) {
            return null;
        }

        return $sth->fetch(PDO::FETCH_OBJ);
    }

    public function queryToWrite() : void
    {
        $sql = "INSERT INTO `posts`(`title`, `content`) VALUES (?,?)";
        $sqlParams = [];
        if (!empty($_POST['title'])) {
            $sqlParams[] = $_POST['title'];
            unset($_POST['title']);
        }
        if (!empty($_POST['content'])) {
            $sqlParams[] = $_POST['content'];
            unset($_POST['content']);
        }
        $sth = $this->pdo->prepare($sql);
        if (isset($_POST['submit'])) {
            $sth->execute($sqlParams);
            header("Location: index.php");
        }     
    }
}