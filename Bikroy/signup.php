<!DOCTYPE html>
<html>
<head>
    <title>Sign up Demo</title>
    <link rel="stylesheet" href="https://cdn.rawgit.com/twbs/bootstrap/v4-dev/dist/css/bootstrap.css">
</head>
<body>

<?php

require_once 'vendor/autoload.php';

use PostgresqlPhpDemo\Connection as Connection;
use PostgresqlPhpDemo\Epdo as Epdo;

try {
    // connect to the PostgreSQL database
    $pdo = Connection::get()->connect();
    // echo 'A connection to the PostgreSQL database server has been established successfully.';
    $epdo = new Epdo($pdo);

    if (isset($_POST['signup']) and isset($_POST['agree']) and !empty($_POST['mail']) and isset($_POST['name']) and strlen($_POST['pswrd'])>=8) {
        $epdo->insertUser($_POST['mail'], $_POST['name'], $_POST['pswrd']);
        header('location: signin.php');
        exit();
    }
} catch (\PDOException $e) {
    echo $e->getMessage();
}

?>



<h4><center>User registration form</center></h4>
<br>Enter user email, name and password<br>
<br><br>
<form method="post">
    <table>
        <tr><td>EMAIL</td>
            <td><input type="text" name="mail"></td></tr>
        <tr><td>NAME</td>
            <td><input type="text" name="name" value="anonymous"></td></tr>
        <tr><td>PASSWORD</td>
            <td><input type="text" name="pswrd"></td></tr>
        <tr><td>AGE</td>
            <td><input type="text" name="age"></td></tr>
        <tr><td>GENDER</td>
            <td><select><option value="female">Female</option> <option value="Male">Male</option></select></tr>
        <tr><td>PHONE</td>
            <td><input type="text" name="phone"></td></tr>
        <tr><td>&nbsp;</td><td></td></tr>
        <tr><td>Agree to Terms of Service: </td>
            <td><input type="checkbox" name="agree"></td></tr>
        <?php
        if (isset($_POST['signup'])) {
            // insert a user into the users table
            if (!isset($_POST['agree'])) {
        ?>
                <tr><td></td><td><font color="red">You must agree to terms of service</font></td></tr>
        <?php
            }
            if (empty($_POST['mail']) or !filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
        ?>
                <tr><td></td><td><font color="red">You must enter a valid email id</font></td></tr>
        <?php
            }
            if (strlen($_POST['pswrd'])<8) {
        ?>
                <tr><td></td><td><font color="red">You must enter password with at least 8 character</font></td></tr>
        <?php
            }
            if (empty($_POST['name'])) {
        ?>
                <tr><td></td><td><font color="red">You must enter name with at least 1 character</font></td></tr>
        <?php
            }
        if(empty($_POST['age']) or !(is_numeric($_POST['age']))){
        ?>
                <tr><td></td><td><font color="red">You must add a valid age</font></td></tr>
            <?php
        }
        if(empty($_POST['phone']) or !(is_numeric($_POST['phone']))){
        ?>
                <tr><td></td><td><font color="red">You must add a valid phone No</font></td></tr>
            <?php
        }
    }
    ?>

        <tr><td></td>
            <td><input type="submit" name="signup" value="Sign up"></td></tr>
    </table>
</form>
</body>
</html>