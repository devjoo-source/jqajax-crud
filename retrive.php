<?php

/**
 * @package jqcrud... Retrive data for showing fronted
 * @ADMIN: ===Devjoo===
 * Email: jsjunu@gmail.com
 * This file depended on "db.con.php" file and all processing by the help ajax....
 */

require_once "include/db.con.php";

$sql = "SELECT * FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $output = array();
    while ($row = $result->fetch_assoc()) {
        $output[] = $row;
    }
}
echo json_encode($output);
