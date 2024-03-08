<?php

require_once "../helpers/mysql.php";
$db = new DataBase();
$nev = $_POST['username_field'];
$password = $_POST['password_field'];

$sql = "SELECT * FROM `felhasznalok` WHERE `nev` = '$nev'";

$result = $db::$conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if (password_verify($password, $row['jelszo'])) {
        session_start();
        $_SESSION['username_field'] = $username;
        header("Location: "); //popup
        exit;
    } else {
        header("Location: "); //popup kell
        exit;
    }
} else {
    header("Location: ");
    exit;
}
