<?php

require('database.php');

$queryStudents = "SELECT * FROM students";
$sqlStudents = mysqli_query($connection, $queryStudents);

?>