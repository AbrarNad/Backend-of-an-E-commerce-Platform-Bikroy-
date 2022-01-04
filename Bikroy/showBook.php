<!DOCTYPE html>
<html>
<head>
    <title>Show ad Demo</title>
    <link rel="stylesheet" href="https://cdn.rawgit.com/twbs/bootstrap/v4-dev/dist/css/bootstrap.css">
</head>
<body>

<?php

require 'vendor/autoload.php';

use PostgresqlPhpDemo\Connection as Connection;
use PostgresqlPhpDemo\Epdo as Epdo;

try {
    $pdo = Connection::get()->connect();
    $epdo = new Epdo($pdo);

    $str = 'books where id = '.$_GET['bookid'];
    $book = $epdo->getFromWhere($str)[0];
} catch (\PDOException $e) {
    echo $e->getMessage();
}

?>

    <center><h1><font color="blue">Your queried book in khat form 🙂</font></h1></center>
    <br><br>

<?php
foreach ($book as $key => $value) {
    echo "{$key} => ";
    if (is_bool($value)) var_export($value);    // otherwise boolean false is shown as empty string.
    else echo "{$value}";
    echo nl2br("\n");
}
?>
    <center><h1><font color="blue">in more khat form 🙂</font></h1></center>
<?php var_dump($book); ?>

</body>
</html>