<?php
    define("DB_HOST", "localhost");
    define("DB_USER", "root");
    define("DB_PASS", "");
    define("DB_NAME", "cit_dev_internship");

    try{
        $db_connect = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    }catch(Exception $e) {
        echo "Database connect failed! " . $e->getMessage();
    }