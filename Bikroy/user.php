<!DOCTYPE html>
<html>
<head>
    <title>User page Demo</title>
    <link rel="stylesheet" href="https://cdn.rawgit.com/twbs/bootstrap/v4-dev/dist/css/bootstrap.css">
</head>
<body>

<?php

require 'vendor/autoload.php';

use PostgresqlPhpDemo\Connection as Connection;
use PostgresqlPhpDemo\Epdo as Epdo;

session_start();

if (empty($_SESSION['email'])) {
    header('location: signin.php');
} else {
    echo nl2br("Email: ".$_SESSION['email']."\n"."Name: ".$_SESSION['name']."\n");
}
try {
    $pdo = Connection::get()->connect();
    $epdo = new Epdo($pdo);
    // var_dump($favorites);
} catch (\PDOException $e) {
    echo $e->getMessage();
}

if (isset($_POST['updateUser'])) {
    $epdo->updateUser($_SESSION['email'], $_POST['name'], $_POST['password'], $_POST['location'], $_POST['sublocation']);
    $_SESSION['password'] = $_POST['password'];
}
?>
    <h4><center>User update form</center></h4>
    <form method="post">

<?php
$cur = $epdo->getFromWhere('users where email=\''.$_SESSION['email'].'\'')[0]; //var_dump($cur);
foreach ($cur as $key => $value) {
    if ($key=='email' or $key=='is_admin') continue;
?>
        <br><?php echo "{$key}"; ?>: <input type="text" name="<?php echo "{$key}"; ?>" value="<?php echo("{$value}"); ?>">
<?php
}
?>

        <br>
        <br><input type="submit" name="updateUser" value="Update ur info">
    </form>

</body>
</html>