<?php

/**
 * @package jqcrud... delete process
 * @sub-package: This file depended on "db.con.php" file
 * @ADMIN: ===Devjoo===
 * Email: jsjunu@gmail.com
 */

require_once "include/db.con.php";
$data = stripslashes(file_get_contents("php://input"));
$inpData = json_decode($data, true);
$id = $inpData['uid'];

$sql = "DELETE FROM users WHERE id = {$id}";
if($conn->query($sql)){
    echo 1;
}else{
    echo 0;
}