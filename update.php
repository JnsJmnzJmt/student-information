<?php 
require('database.php');

if (isset($_POST['edit_button'])) {
    $editId = $_POST['editID'];
    $editStudent_no = $_POST['editSTUDENT_NO'];
    $editFirst_name = $_POST['editFIRST_NAME'];
    $editLast_name = $_POST['editLAST_NAME'];
    $editSex = $_POST['editSEX'];
    $editBirthdate = $_POST['editBIRTHDATE'];
    $editCourse = $_POST['editCOURSE'];
    $editYear_level = $_POST['editYEAR_LEVEL'];
    $editSection = $_POST['editSECTION'];
}

if(isset($_POST['update_button'])) {
    $updateId = $_POST['updateID'];
    $updateStudent_no = $_POST['updateSTUDENT_NO'];
    $updateFirst_name = $_POST['updateFIRST_NAME'];
    $updateLast_name = $_POST['updateLAST_NAME'];
    $updateSex = $_POST['updateSEX'];
    $updateBirthdate = $_POST['updateBIRTHDATE'];
    $updateCourse = $_POST['updateCOURSE'];
    $updateYear_level = $_POST['updateYEAR_LEVEL'];
    $updateSection = $_POST['updateSECTION'];

    $queryUpdate = "UPDATE students SET 
    student_no = '$updateStudent_no',
    first_name = '$updateFirst_name',
    last_name= '$updateLast_name',
    sex = '$updateSex',
    birthdate = '$updateBirthdate',
    course = '$updateCourse',
    year_level = '$updateYear_level',
    section = '$updateSection'
    WHERE id = '$updateId'";

    $sqlUpdate = mysqli_query($connection, $queryUpdate);
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Student Information</title>
    </head>
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .main {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding-top: 20px;
        }

        .create-main {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 6px;
            margin-bottom: 30px;
        }

        .create-main h3 {
            margin-bottom: 8px;
        }

        .create-main input[type="text"],
        .create-main input[type="password"],
        .create-main input[type="submit"]
        .create-main input[type="reset"] {
            width: 145px;
            height: 20px;
            padding: 2px 6px;
            border: 1px solid;
        }


    </style>

    <body>

        <div class="main">

            <form class="update_main" action="update.php" method="POST">
                
                <h3>UPDATE STUDENT INFORMATION</h3>

                <label for="student_number">Student No.:</label>
                <input type="text" name="updateSTUDENT_NO" id="student_number" pattern="[0-9]{4}-[0-9]{4}" placeholder="2023-0001" required value="<?php echo $editStudent_no ?>"> <br>

                <label for="first_name">First Name:</label>
                <input type="text" name="updateFIRST_NAME" id="first_name" placeholder="Juan" required value="<?php echo $editFirst_name ?>"> <br>

                <label for="last_name">Last Name:</label>
                <input type="text" name="updateLAST_NAME" id="last_name" placeholder="Dela Cruz" required value="<?php echo $editLast_name?>"> <br>

                <label for="sex">Sex:</label>
                <select name="updateSEX" id="sex" required>
                    <option value="">Select Sex</option>
                    <option value="Male" <?php if($editSex == 'Male') echo 'selected' ?>>Male</option>
                    <option value="Female" <?php if($editSex == 'Female') echo 'selected'?>>Female</option>                
                </select> <br>

                <label for="birthdate">Birthdate:</label>
                <input type="date" name="updateBIRTHDATE" id="birthdate" required value="<?php echo $editBirthdate?>"> <br>
                
                <label for="course">Course:</label>
                <input type="text" name="updateCOURSE" id="course" placeholder="BSIT" required value="<?php echo $editCourse ?>"> <br>

                <label for="year_level">Year Level:</label>
                <select name="updateYEAR_LEVEL" id="year_level" required>
                    <option value="">Select Year Level</option>
                    <option value="1" <?php if($editYear_level == '1') echo 'selected';?>>1st Year</option>
                    <option value="2" <?php if($editYear_level == '2') echo 'selected';?>>2nd Year</option>
                    <option value="3" <?php if($editYear_level == '3') echo 'selected';?>>3rd Year</option>
                    <option value="4" <?php if($editYear_level == '4') echo 'selected';?>>4th Year</option>          
                </select> <br>

                <label for="section">Section:</label>
                <input type="text" name="updateSECTION" id="section" placeholder="A" required value="<?php echo $editSection?>"> <br>

                <input type="submit" name="update_button" value="UPDATE">
                <input type="hidden" name="updateID" value="<?php echo $editId ?>"> 

                <br><br>
            </form>


        </div>

    </body>

</html>