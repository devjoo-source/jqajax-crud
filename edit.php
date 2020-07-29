<?php
/**
 * @package jqcrud... Edit process
 * @ADMIN: ===Devjoo===
 * Email: jsjunu@gmail.com
 * This file depended on "db.con.php" file
 */


require_once "include/db.con.php";
$data = stripslashes(file_get_contents("php://input"));
$inpData = json_decode($data, true);

$uid = $inpData['uid'];
$sql = "SELECT * FROM users WHERE id = {$uid}";
$result = $conn->query($sql);

$output = array();
if ($row = $result->fetch_assoc()) {
    $output[] = $row;
}
echo json_encode($output);
