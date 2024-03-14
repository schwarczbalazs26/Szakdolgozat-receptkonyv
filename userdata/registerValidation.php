<?php

require_once "../helpers/mysql.php";

$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST["email_field"];
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Hibás email formátum.";
    }

    $username = $_POST["username_field"];

    if (strlen($username) < 4 || strlen($username) > 20) {
        $errors[] = "A felhasználónévnek 4 és 20 karakter között kell lennie.";
    }

    $password = $_POST["password_field"];
    if (strlen($password) < 7 || strlen($password) > 16) {
        $errors[] = "A jelszónak 7 és 16 karakter között kell lennie.";
    }

    if (!preg_match('/[A-Z]/', $password) || !preg_match('/[0-9]/', $password)) {
        $errors[] = "A jelszónak tartalmaznia kell legalább egy nagybetűt és számot.";
    }

    if (userAlreadyExists($email)) {
        $errors[] = "Ilyen email címmel már van felhasználó regisztrálva.";
    }

    if (empty($errors)) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $db = new DataBase();
        $sql = "INSERT INTO `felhasznalok` (`nev`,`email`, `jelszo`) VALUES ('$username', '$email', '$hashedPassword')";
        $db::$conn->query($sql);
        header("Location: login.php");
        exit;
    }
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
?>