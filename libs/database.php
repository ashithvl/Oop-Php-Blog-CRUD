<?php

class database
{
    private static $dbName = 'phpblog' ;
    private static $dbHost = 'localhost' ;
    private static $dbUsername = 'root';
    private static $dbUserPassword = '';

    private static $cont  = null;

    public function __construct()
    {
        die('Init function is not allowed');
    }

    public static function connect()
    {
        // One connection through whole application
        if (null == self::$cont) {
            try {
                self::$cont =  new PDO("mysql:host=".self::$dbHost.";"."dbname=".self::$dbName, self::$dbUsername, self::$dbUserPassword);
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }
        return self::$cont;
    }

    public static function disconnect()
    {
        self::$cont = null;
    }

    public static function select($query)
    {
        $conn = Database::connect();
        $result = $conn->prepare($query);
        $result->execute();

        if ($result->rowCount() >0) {
            return $result;
        } else {
            return false;
        }
    }

    public function insert($query,$msg)
    {
        $conn = Database::connect();
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $insert = $conn->exec($query);
        if ($insert) {
            header('location:index.php?msg='.$msg.' inserted...');
        } else {
            echo "post did not insert";
        }
    }

    public function update($query,$msg)
    {
        $conn = Database::connect();
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $update = $conn->prepare($query);
        $update->execute();

        if ($update) {
            header('location:index.php?msg='.$msg.' updated...');
        } else {
            echo "post did not update";
        }
    }

    public function delete($query,$msg)
    {
          $conn = Database::connect();
          $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

          $delete = $conn->exec($query);

        if ($delete) {
            header('location:index.php?msg='.$msg.' deleted...');
        } else {
            echo "post did not delete";
        }
    }
}
