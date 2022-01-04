<!DOCTYPE html>
<html>
<head>
    <title>Show book Demo</title>
    <link rel="stylesheet" href="https://cdn.rawgit.com/twbs/bootstrap/v4-dev/dist/css/bootstrap.css">
</head>
<body>

<?php

require 'vendor/autoload.php';

use PostgresqlPhpDemo\Connection as Connection;
use PostgresqlPhpDemo\Epdo as Epdo;

session_start();
try {
        // connect to the PostgreSQL database
        $pdo = Connection::get()->connect();
        // echo 'A connection to the PostgreSQL database server has been established successfully.';
        $epdo = new Epdo($pdo);
        // delete_everything();
        if (isset($_POST['signin'])) {
            header("location: signin.php");
            exit();
            // delete_everything();
        }
        if (isset($_POST['signup'])) {
        header("location: signup.php");
        exit();
        // delete_everything();
        }
    }
    catch (\PDOException $e) {
    echo $e->getMessage();
}
$catagories = $epdo->getFromWhere('catagory');
$location= $epdo->getFromWhere('location');

?>
<h1><center>Home page</center></h1>
<br><br>
<form method="post">
    <input type="submit" name="signup" value="Sign up">
<?php
    if (isset($_SESSION['email'])) {
        echo "{$_SESSION['email']}";
?>
    <input type="submit" name="signout" value="Sign out">
<?php
} else {
?>
    <input type="submit" name="signin" value="Sign in">
<?php } ?>
</form>
<br><br>
<div class="container">
    <center><h1>Select Catagory</h1></center>
            <br><br>
            <table class="table table-bordered">
                <tbody>
                    <?php foreach ($catagories as $cat) : ?>
                        <tr>
                            <td><input type="submit" name=<?php echo htmlspecialchars($cat['catagory_name']) ?> value=<?php echo htmlspecialchars($cat['catagory_name']) ?>><br><?php echo htmlspecialchars($cat['description']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
</div>
<br><br>
<div class="container">
    <center><h1>Select Area</h1></center>
            <br><br>
            <table class="table table-bordered">
                <tbody>
                    <?php foreach ($location as $loc) : ?>
                        <tr>
                            <td><input type="submit" name=<?php echo htmlspecialchars($loc['location_name']) ?> value=<?php echo htmlspecialchars($loc['location_name']) ?>></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
</div>
</body>
</html>