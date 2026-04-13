<?php

require('database.php');

if(isset($_POST['delete_button'])) {

    $deleteID = $_POST['deleteID'];

    $queryDelete = "DELETE FROM students WHERE id = $deleteID";
    $sqlDelete = mysqli_query($connection, $queryDelete);

    echo '<script> alert("Deleted Successfully!") </script>';
    echo '<script> window.location.href="index.php" </script>';
}

else{
    echo '<script> window.location.href="index.php" </script>';
}
?>