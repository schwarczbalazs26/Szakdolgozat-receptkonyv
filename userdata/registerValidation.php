<?php

require_once "../helpers/mysql.php";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email_field"];
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: "); //popup
        exit;
    }

    $username = $_POST["username_field"];

    if (strlen($username) < 4 || strlen($username) > 20) {
        header("Location:"); //popup
        exit;
    }

    $password = $_POST["password_field"];
    if (strlen($password) < 7 || strlen($password) > 16) {
        header("Location:"); //popup
        exit;
    }

    if (!preg_match('/[A-Z]/', $password) || !preg_match('/[0-9]/', $password)) {
        header("Location:"); //popup
        exit;
    }

    if (userAlreadyExists($email)) {
        header("Location: "); //popup
        exit;
    }

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $db = new DataBase();
    $sql = "INSERT INTO `felhasznalok` (`nev`,`email`, `jelszo`) VALUES ('$username', '$email', '$hashedPassword')";
    $db::$conn->query($sql);
    header("Location: login.php");
    exit;
}

function userAlreadyExists($email)
{
    $db = new DataBase();
    $email = $_POST['email_field'];
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);

    $sql = "SELECT * FROM felhasznalok WHERE email = '$email'";

    $result = $db::$conn->query($sql);

    if ($result->num_rows > 0) {
        return true;
    } else {
        return false;
    }
}
