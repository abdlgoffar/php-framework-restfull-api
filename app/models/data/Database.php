<?php
class Database
{
    public static function start(): PDO
    {
        try {
            $pdo = new PDO('mysql:host=localhost;dbname=create_api_web_project', "root", "", array(PDO::ATTR_PERSISTENT => true));
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //for option handle exception.
            $pdo->setAttribute(PDO::ATTR_CASE, PDO::CASE_LOWER); //for option column names to lower case.
            $pdo->setAttribute(PDO::ATTR_AUTOCOMMIT, true); // for option database transaction.
            return $pdo;
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage(); // find error message exception.
            die();
        }
    }
}
