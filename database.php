<?php 

$host = 'localhost';
$user = 'root';
$password = '';
$database = 'school_database';

$connection = mysqli_connect($host, $user, $password, $database);

if(mysqli_connect_error()){
    echo "Message: ".mysqli_connect_error();
}

?>