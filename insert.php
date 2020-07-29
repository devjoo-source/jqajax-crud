<?php
/**
 * @package jqcrud... Insert data into mySQL database
 * @ADMIN: ===Devjoo===
 * Email: jsjunu@gmail.com
 * This file depended on "db.con.php" file and all processing by the help ajax.... All inputs are insequre, Here is no validity.

 */

require_once "include/db.con.php";
$data = stripslashes(file_get_contents("php://input"));
$inpData = json_decode($data, true);

$id = $inpData['id'];
$name = $inpData['name'];
$email = $inpData['email'];
$pass = $inpData['pass'];

if (!empty($name) || !empty($email) || !empty($pass)) {
    $sql = "INSERT INTO users(id,name,email,pass) VALUES('$id','$name','$email','$pass') ON DUPLICATE KEY UPDATE name = '$name',email = '$email',pass = '$pass'";
    if ($conn->query($sql)) {
        echo "Data inserted Successfully";
    }
}
