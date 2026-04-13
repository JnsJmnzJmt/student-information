<?php 
require('read.php');
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

        .read-main {
            border-collapse: collapse;
            text-align: center;
        }

        .read-main th {
            padding: 8px 30px;
        }

        .read-main td {
            padding: 6px 30px;
        }

        .read-main td:last-child {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 12px;
            white-space: nowrap;
        }

        .read-main td:last-child form {
            margin: 0;
        }

        .read-main td:last-child input[type="submit"] {
            padding: 4px 10px;
            border: 1px solid;
        }
    </style>

    <body>

        <div class="main">

            <form class="create_main" action="create.php" method="POST">
                
                <h3>ADD STUDENT</h3>

                <label for="student_number">Student No.:</label>
                <input type="text" name="student_number" id="student_number" pattern="[0-9]{4}-[0-9]{4}" placeholder="2023-0001" required> <br>

                <label for="first_name">First Name:</label>
                <input type="text" name="first_name" id="first_name" placeholder="Juan" required> <br>

                <label for="last_name">Last Name:</label>
                <input type="text" name="last_name" id="last_name" placeholder="Dela Cruz" required> <br>

                <label for="sex">Sex:</label>
                <select name="sex" id="sex" required>
                    <option value="">Select Sex</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>                
                </select> <br>

                <label for="birthdate">Birthdate:</label>
                <input type="date" name="birthdate" id="birthdate" required> <br>
                
                <label for="course">Course:</label>
                <input type="text" name="course" id="course" placeholder="BSIT" required> <br>

                <label for="year_level">Year Level:</label>
                <select name="year_level" id="year_level" required>
                    <option value="">Select Year Level</option>
                    <option value="1">1st Year</option>
                    <option value="2">2nd Year</option>
                    <option value="3">3rd Year</option>
                    <option value="4">4th Year</option>          
                </select> <br>

                <label for="section">Section:</label>
                <input type="text" name="section" id="section" placeholder="A" required> <br>

                <input type="submit" name="add_button" value="ADD">
                <input type="reset" name="reset_button" value="RESET">

                <br><br>
            </form>


            <table class="read-main">
                    
                <tr>
                    <th>ID</th>
                    <th>Student Number</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Sex</th>
                    <th>Birthdate</th>
                    <th>Course</th>
                    <th>Year Level</th>
                    <th>Section</th>
                    <th>Actions</th>
                </tr>

                <?php while ($results = mysqli_fetch_array($sqlStudents)) { ?>
                <tr>
                    <td> <?php echo $results['id'] ?> </td>
                    <td> <?php echo $results['student_no'] ?> </td>
                    <td> <?php echo $results['first_name'] ?> </td>
                    <td> <?php echo $results['last_name'] ?> </td>
                    <td> <?php echo $results['sex'] ?> </td>
                    <td> <?php echo $results['birthdate'] ?> </td>
                    <td> <?php echo $results['course'] ?> </td>
                    <td> <?php echo $results['year_level'] ?> </td>
                    <td> <?php echo $results['section'] ?> </td>
                    <td>
                        <form action="update.php" method="POST">
                            <input type="submit" name="edit_button" value="EDIT">
                            <input type="hidden" name="editID" value="<?php echo $results['id'] ?>">
                            <input type="hidden" name="editSTUDENT_NO" value="<?php echo $results['student_no'] ?>">
                            <input type="hidden" name="editFIRST_NAME" value="<?php echo $results['first_name'] ?>">
                            <input type="hidden" name="editLAST_NAME" value="<?php echo $results['last_name'] ?>">
                            <input type="hidden" name="editSEX" value="<?php echo $results['sex']?>">
                            <input type="hidden" name="editBIRTHDATE" value="<?php echo $results['birthdate']?>">
                            <input type="hidden" name="editCOURSE" value="<?php echo $results['course']?>">
                            <input type="hidden" name="editYEAR_LEVEL" value="<?php echo $results['year_level']?>">
                            <input type="hidden" name="editSECTION" value="<?php echo $results['section'] ?>">
                    
                        </form>

                        <form action="delete.php" method="POST">
                            <input type="submit" name="delete_button" value="DELETE">
                            <input type="hidden" name="deleteID" value="<?php echo $results['id'] ?>">
                        </form>
                    </td>
                </tr>
                <?php } ?>

            </table>

        </div>

    </body>

</html>