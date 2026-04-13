<?php 

require('database.php');

if(isset($_POST['add_button'])){

    $student_number = $_POST['student_number'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $sex = $_POST['sex'];
    $birthdate = $_POST['birthdate'];
    $course = $_POST['course'];
    $year_level = $_POST['year_level'];
    $section = $_POST['section'];

    $queryCreate = "INSERT INTO students VALUES (null, '$student_number', '$first_name', '$last_name', '$sex', '$birthdate', '$course', '$year_level', '$section')";
    $sqlCreate = mysqli_query($connection, $queryCreate);

    echo '<script> alert("Created Successfully"); </script>';
    echo '<script> window.location.href = "index.php";</script>';
}

else {
    echo '<script> window.location.href = "index.php";</script>';
}

?>