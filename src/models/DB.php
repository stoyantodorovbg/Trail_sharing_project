<?php


class DB
{
    private static $instance = null;

    private function __construct() {
    }

    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new DB();
            self::$instance = new PDO("mysql:dbname=trail_sharing_project;host=localhost", 'root', '');
            self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return self::$instance;
    }
}