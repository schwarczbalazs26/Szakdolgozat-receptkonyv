<?php

session_start();

require_once "../helpers/mysql.php";
$db = new DataBase();
$nev = $_POST['username_field'];
$password = $_POST['password_field'];

$sql = "SELECT * FROM `felhasznalok` WHERE `nev` = '$nev'";

$result = $db::$conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if (password_verify($password, $row['jelszo'])) {
        $_SESSION['username_field'] = $nev;
        header("Location: ../view/mainpage.php");
        exit;
    } else {
        $_SESSION['error'] = "Hibás jelszó!";
    }
} else {
    $_SESSION['error'] = "Nincs ilyen felhasználó!";
}

header("Location: login.php");
exit;
?>