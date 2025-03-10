#db.php (Database Connection File)
#This will connect all pages to MySQL.
<?php
$servername = "localhost";
$username = "admin";
$password = "P@ssw0rd";
$dbname = "salonAngelicaDB";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
