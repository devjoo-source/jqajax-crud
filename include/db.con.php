<?php

/**
 * @package jqcrud... Make database connection
 * Please Setup your database information correctly..........
 */

$host = "localhost";
$user = "root";
$pass = "";
$db = "jqcrud";

$conn = new mysqli($host, $user, $pass, $db) or die("Something wrong");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//Create table
$table = "CREATE TABLE IF NOT EXISTS `users`(
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `name` varchar(50) NOT NULL,
        `email` varchar(100) NOT NULL,
        `pass` int(11) NOT NULL,
        PRIMARY KEY (`id`)
        ) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1";

if ($conn->query($table) === TRUE) {
    //After table create success then insert some dummy data
    $checkUser = "SELECT * FROM users";
    $chcResult = $conn->query($checkUser);

    if ($chcResult->num_rows < 5) {
        $n = 0;
        for ($i = 0; $i < 5; $i++) {
            $n++;
            $addData = "INSERT INTO users(name,email,pass) VALUES('Mr.Jhon$n','jhon$n@gmail.com',12345)";
            $conn->query($addData);
        }
    }
} else {
    echo "Error creating database: " . $conn->error;
}
