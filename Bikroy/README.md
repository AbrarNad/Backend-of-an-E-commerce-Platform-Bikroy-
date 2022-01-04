# How to run
Make sure that u can run php. Then from xampp, in the row starting with 'apache' click on config->browse php->php.ini->find (ctrl+f) extension_dir without ; in front (if all of them semicolon in front, delete semicolon from one of them and make: extension_dir="C:\xampp\php\ext" assuming that xampp is installed in C:\xampp. Also find pdo_pgsql and delete the semicolon from front.
<br> Modify helper/database.ini of this folder according to ur database connection.
<br> Then create a table users with email, password, name, location, sublocation.
<br> Then run the index.php file.
<br>

# links
U don't need to worry about helper and vendor folder, u can use them blindly like I used in index.php & showBook.php.
Learn if-else, variables/array, foreach loop, string concatenation, echo, var_dump, var_export, session in php nd visit the below links (specially the 2nd one).
<br> http://www.postgresqltutorial.com/postgresql-php/
<br> https://www.guru99.com/php-forms-handling.html