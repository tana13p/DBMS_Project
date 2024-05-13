<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection parameters
//$servername = "172.18.69.57";
//$username = "syituser70";
//$password = "root";
//$database = "Maithili_70";
//when using college db make sure to remove port
$servername = "127.0.0.1";
$username = "tana";
$password = "tana13";
$database = "Maithili_70";
$port = "3307";

// Create connection
$conn = new mysqli($servername, $username, $password, $database, $port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $registrationType = $_POST["registration_type"];
    $role = $_POST["role"];
    $id = $_POST["id"];

    if ($registrationType == "existing") {
        // User is already registered, fetch data based on role and ID
        //STUDENT
        if ($role == "student") {
            $tableName = "students"; // Determine table name based on role (e.g., students)

            $sql = "SELECT * FROM studentinfo WHERE Registration_ID = '$id'";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                if ($result->num_rows > 0) {
                    // Display user information
                    echo "<h2 style='text-align: center;'>Student Information</h2>";
                    echo "<div style='overflow-x: auto;'>";
                    echo "<table style='width: 80%; margin: 0 auto; border-collapse: collapse;'>";
                    
                    $cellsPerRow = 4; // Set the number of cells per row
                    $cellCount = 0;
            
                    while ($row = $result->fetch_assoc()) {
                        if ($cellCount % $cellsPerRow === 0) {
                            // Start a new row before adding new cells
                            echo "<tr>";
                        }
            
                        // Iterate over each column in the current row
                        foreach ($row as $key => $value) {
                            // Skip rendering table cell if value is NULL
                        if ($value !== null) {
                            // Display each column name and value in a separate table cell
                            echo "<td style='padding: 10px; border: 1px solid #ddd;'><b>$key</b></td>";
                    echo "<td style='padding: 10px; border: 1px solid #ddd;'>$value</td>";
                    echo "</tr>";
                            $cellCount++;
            
                            // Check if the maximum cells per row limit is reached
                            if ($cellCount % $cellsPerRow === 0) {
                                // End the current row and start a new one
                                echo "</tr><tr>";
                            }
                        }
                    }
                }
                    // Close any open row tag at the end
                    if ($cellCount % $cellsPerRow !== 0) {
                        echo "</tr>";
                    }
            
                    echo "</table>";
                    echo "</div>";
                    echo "<br>";}

                    $sql = "SELECT * FROM admissiondetails WHERE Registration_ID = '$id'";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                if ($result->num_rows > 0) {
                    // Display user information
                    echo "<h2 style='text-align: center;'>Admission Details</h2>";
                    echo "<div style='overflow-x: auto;'>";
                    echo "<table style='width: 80%; margin: 0 auto; border-collapse: collapse;'>";
                    
                    $cellsPerRow = 4; // Set the number of cells per row
                    $cellCount = 0;
            
                    while ($row = $result->fetch_assoc()) {
                        if ($cellCount % $cellsPerRow === 0) {
                            // Start a new row before adding new cells
                            echo "<tr>";
                        }
            
                        // Iterate over each column in the current row
                        foreach ($row as $key => $value) {
                            // Skip rendering table cell if value is NULL
                        if ($value !== null) {
                            // Display each column name and value in a separate table cell
                            echo "<td style='padding: 10px; border: 1px solid #ddd;'><b>$key</b></td>";
                    echo "<td style='padding: 10px; border: 1px solid #ddd;'>$value</td>";
                    echo "</tr>";
                            $cellCount++;
            
                            // Check if the maximum cells per row limit is reached
                            if ($cellCount % $cellsPerRow === 0) {
                                // End the current row and start a new one
                                echo "</tr><tr>";
                            }
                        }
                    }
                }
                    // Close any open row tag at the end
                    if ($cellCount % $cellsPerRow !== 0) {
                        echo "</tr>";
                    }
            
                    echo "</table>";
                    echo "</div>";
                    echo "<br>";}

                    $sql = "SELECT * FROM personaldetails WHERE Registration_ID = '$id'";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                if ($result->num_rows > 0) {
                    // Display user information
                    echo "<h2 style='text-align: center;'>Personal Details</h2>";
                    echo "<div style='overflow-x: auto;'>";
                    echo "<table style='width: 80%; margin: 0 auto; border-collapse: collapse;'>";
                    
                    $cellsPerRow = 4; // Set the number of cells per row
                    $cellCount = 0;
            
                    while ($row = $result->fetch_assoc()) {
                        if ($cellCount % $cellsPerRow === 0) {
                            // Start a new row before adding new cells
                            echo "<tr>";
                        }
            
                        // Iterate over each column in the current row
                        foreach ($row as $key => $value) {
                            // Skip rendering table cell if value is NULL
                        if ($value !== null) {
                            // Display each column name and value in a separate table cell
                            echo "<td style='padding: 10px; border: 1px solid #ddd;'><b>$key</b></td>";
                    echo "<td style='padding: 10px; border: 1px solid #ddd;'>$value</td>";
                    echo "</tr>";
                            $cellCount++;
            
                            // Check if the maximum cells per row limit is reached
                            if ($cellCount % $cellsPerRow === 0) {
                                // End the current row and start a new one
                                echo "</tr><tr>";
                            }
                        }
                    }
                }
                    // Close any open row tag at the end
                    if ($cellCount % $cellsPerRow !== 0) {
                        echo "</tr>";
                    }
            
                    echo "</table>";
                    echo "</div>";
                    echo "<br>";
                }
            }  
                    $sqlCourses = "SELECT DISTINCT c.Course_ID, c.Academic_Department, c.Programme
                    FROM student_courses pc
                    JOIN course c ON pc.course_id = c.Course_ID
                    WHERE pc.registration_id = '$id'";

     $resultCourses = $conn->query($sqlCourses);

     if ($resultCourses->num_rows > 0) {
         echo "<h2 style='text-align: center;'>Courses for Student ID: $id</h2>";
         echo "<div style='overflow-x: auto;'>";
         echo "<table style='width: 80%; margin: 0 auto; border-collapse: collapse;'>";
         echo "<tr><th style='padding: 10px; border: 1px solid #ddd;'>Course ID</th><th style='padding: 10px; border: 1px solid #ddd;'>Academic Department</th><th style='padding: 10px; border: 1px solid #ddd;'>Programme</th></tr>";

         while ($row = $resultCourses->fetch_assoc()) {
             echo "<tr>";
             echo "<td style='padding: 10px; border: 1px solid #ddd;'>" . $row["Course_ID"] . "</td>";
             echo "<td style='padding: 10px; border: 1px solid #ddd;'>" . $row["Academic_Department"] . "</td>";
             echo "<td style='padding: 10px; border: 1px solid #ddd;'>" . $row["Programme"] . "</td>";
             echo "</tr>";
         }

         echo "</table>";
         echo "</div>";
         echo "<br>";

     } else {
        echo "<div style='text-align: center;'>";
         echo "No courses found for Student ID: $id\n";
         echo "</div>";
         echo "<br>";

     }         

     $sqlgrade = "SELECT * FROM gradelist WHERE registration_number = '$id'";

     $resultGrade = $conn->query($sqlgrade);

     if ($resultGrade->num_rows > 0) {
         echo "<div style='overflow-x: auto;'>";
         echo "<table style='width: 80%; margin: 0 auto; border-collapse: collapse;'>";
         echo "<tr><th style='padding: 10px; border: 1px solid #ddd;'>Grade</th>";

         while ($row = $resultGrade->fetch_assoc()) {
             echo "<td style='padding: 10px; border: 1px solid #ddd;'>" . $row["finalgrade"] . "</td>";
             echo "</tr>";
         }

         echo "</table>";
         echo "</div>";
     } else {
        echo "<div style='text-align: center;'>";
         echo "No grade found for Student ID: $id\n";
         echo "</div>";
         echo "<br>";

     }         

        $sql = "SELECT p.ProfessorID, p.Name AS ProfessorName
        FROM student_courses sc
        JOIN course c ON sc.course_id = c.Course_ID
        JOIN professor_courses pc ON c.Course_ID = pc.Course_ID
        JOIN Professors p ON pc.professor_id = p.ProfessorID
        WHERE sc.registration_id = '$id'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2 style='text-align: center;'>Professors for Student ID: $id</h2>";
    echo "<div style='overflow-x: auto;'>";
    echo "<table style='width: 80%; margin: 0 auto; border-collapse: collapse;'>";
    echo "<tr><th style='padding: 10px; border: 1px solid #ddd;'>Professor ID</th><th style='padding: 10px; border: 1px solid #ddd;'>Professor Name</th></tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td style='padding: 10px; border: 1px solid #ddd;'>" . $row["ProfessorID"] . "</td>";
        echo "<td style='padding: 10px; border: 1px solid #ddd;'>" . $row["ProfessorName"] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
    echo "</div>";

} else {
    echo "<div style='text-align: center;'>";
    echo "<p>No professors found for Student ID: $id\n</p>";
    echo "</div>";
    echo "<br>";

}

// Form for UPDATE button
echo "<div style='overflow-x: auto;'>";
echo "<table style='width: 80%; margin: 0 auto; border-collapse: collapse;'>";
echo "<tr>";
echo "<td style='padding: 10px; border: 0px solid #ddd; text-align: center;'>";

echo "<form style='display: inline-block;' method='post' action='update_user.php'>";
echo "<input type='hidden' name='role' value='$role'>";
echo "<input type='hidden' name='id' value='$id'>";
echo "<input type='submit' name='update' value='UPDATE' style='padding: 8px 16px; background-color: #28a745; color: #fff; border: none; border-radius: 4px; cursor: pointer;'>";
echo "</form>";
echo "</td>";
// Form for PRINT button

echo "<td style='padding: 10px; border: 0px solid #ddd; text-align: center;'>";

echo "<form style='display: inline-block;' method='post' action='print.php'>";
echo "<input type='hidden' name='role' value='$role'>";
echo "<input type='hidden' name='id' value='$id'>";
echo "<input type='submit' name='print' value='PRINT' style='padding: 8px 16px; background-color: #0000FF; color: #fff; border: none; border-radius: 4px; cursor: pointer;'>";
echo "</form>";
echo "</td>";
// Form for DELETE button
echo "<td style='padding: 10px; border: 0px solid #ddd; text-align: center;'>";

echo "<form  style='display: inline-block;' method='post' action='delete_user.php' onsubmit='return confirm(\"Are you sure you want to delete this user?\");'>";
echo "<input type='hidden' name='role' value='$role'>";
echo "<input type='hidden' name='id' value='$id'>";
echo "<input type='submit' name='delete' value='DELETE' style='padding: 8px 16px; background-color: #dc3545; color: #fff; border: none; border-radius: 4px; cursor: pointer;'>";
echo "</form>";
echo "</td>";
        echo "</tr>";
        echo "</table>";

echo "</div>";
                }
                else {
                    echo "<div style='text-align: center;'>";
                    echo "No students found for Student ID: $id";
                    echo "</div>";
                }
            }
            

}


//PROFESSOR
    elseif ($role == "Professor") {
    $tableName = "Professors"; // Determine table name based on role (e.g., Professors)
    $sql = "SELECT * FROM $tableName WHERE ProfessorID = '$id'";
    $result = $conn->query($sql);

    if ($result) {
        if ($result->num_rows > 0) {
            // Display user information
            echo "<h2 style='text-align: center;'>User Information</h2>";
            echo "<div style='overflow-x: auto;'>";
            echo "<table style='width: 80%; margin: 0 auto; border-collapse: collapse;'>";
            
            $cellsPerRow = 6; // Set the number of cells per row
        $cellCount = 0;
        while ($row = $result->fetch_assoc()) {
            if ($cellCount % $cellsPerRow === 0) {
                // Start a new row before adding new cells
                echo "<tr>";
            }
// Iterate over each column in the current row
foreach ($row as $key => $value) {
    // Skip rendering table cell if value is NULL
if ($value !== null) {
    // Display each column name and value in a separate table cell
    echo "<td style='padding: 10px; border: 1px solid #ddd;'><b>$key</b></td>";
echo "<td style='padding: 10px; border: 1px solid #ddd;'>$value</td>";
echo "</tr>";
    $cellCount++;

    // Check if the maximum cells per row limit is reached
    if ($cellCount % $cellsPerRow === 0) {
        // End the current row and start a new one
        echo "</tr><tr>";
    }
}
}
            
    }
        // Close any open row tag at the end
        if ($cellCount % $cellsPerRow !== 0) {
            echo "</tr>";
        }

        echo "</table>";
        echo "</div>";
            // Retrieve courses taught by this professor
            $sqlCourses = "SELECT DISTINCT c.Course_ID, c.Academic_Department, c.Programme
                           FROM professor_courses pc
                           JOIN course c ON pc.Course_ID = c.Course_ID
                           WHERE pc.professor_id = '$id'";

            $resultCourses = $conn->query($sqlCourses);

            if ($resultCourses->num_rows > 0) {
                echo "<h2 style='text-align: center;'>Courses Taught by Professor ID: $id</h2>";
                echo "<div style='overflow-x: auto;'>";
                echo "<table style='width: 80%; margin: 0 auto; border-collapse: collapse;'>";
                
                echo "<tr><th style='padding: 10px; border: 1px solid #ddd;'>Course ID</th><th style='padding: 10px; border: 1px solid #ddd;'>Academic Department</th><th style='padding: 10px; border: 1px solid #ddd;'>Programme</th></tr>";

                while ($row = $resultCourses->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td style='padding: 10px; border: 1px solid #ddd;'>" . $row["Course_ID"] . "</td>";
                    echo "<td style='padding: 10px; border: 1px solid #ddd;'>" . $row["Academic_Department"] . "</td>";
                    echo "<td style='padding: 10px; border: 1px solid #ddd;'>" . $row["Programme"] . "</td>";
                    echo "</tr>";
                }

                echo "</table>";
                echo "</div>";
            } else {
                echo "<div style='text-align: center;'>";
                echo "No courses found for Professor ID: $id";
                echo "</div>";
            }
                // Retrieve students enrolled in courses taught by this professor
                $sqlStudents = "SELECT s.Registration_ID, s.First_Name, s.SURNAME
                                FROM student_courses sc
                                JOIN students s ON sc.Registration_ID = s.Registration_ID
                                JOIN course c ON sc.Course_ID = c.Course_ID
                                JOIN professor_courses pc ON c.Course_ID = pc.Course_ID
                                WHERE pc.professor_id = '$id'";

                $resultStudents = $conn->query($sqlStudents);

                if ($resultStudents->num_rows > 0) {
                    echo "<h2 style='text-align: center;'>Students Enrolled in Courses Taught by Professor ID: $id</h2>";
                    echo "<div style='overflow-x: auto;'>";
                    echo "<table style='width: 80%; margin: 0 auto; border-collapse: collapse;'>";
                                    
                    echo "<tr><th style='padding: 10px; border: 1px solid #ddd;'>Registration ID</th><th style='padding: 10px; border: 1px solid #ddd;'>First Name</th><th style='padding: 10px; border: 1px solid #ddd;'>Last Name</th></tr>";

                    while ($row = $resultStudents->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td style='padding: 10px; border: 1px solid #ddd;'>" . $row["Registration_ID"] . "</td>";
                        echo "<td style='padding: 10px; border: 1px solid #ddd;'>" . $row["First_Name"] . "</td>";
                        echo "<td style='padding: 10px; border: 1px solid #ddd;'>" . $row["SURNAME"] . "</td>";
                        echo "</tr>";
                    }

                    echo "</table>";
                    echo "</div>";
                } else {
                    echo "<div style='text-align: center;'>";
                    echo "No students found for courses taught by Professor ID: $id";
                    echo "</div>";
                }
            
            // Form for UPDATE button
        echo "<div style='overflow-x: auto;'>";
        echo "<table style='width: 80%; margin: 0 auto; border-collapse: collapse;'>";
        echo "<tr>";
        echo "<td style='padding: 10px; border: 0px solid #ddd; text-align: center;'>";

        echo "<form style='display: inline-block;' method='post' action='update_user.php'>";
        echo "<input type='hidden' name='role' value='$role'>";
        echo "<input type='hidden' name='id' value='$id'>";
        echo "<input type='submit' name='update' value='UPDATE' style='padding: 8px 16px; background-color: #28a745; color: #fff; border: none; border-radius: 4px; cursor: pointer;'>";
        echo "</form>";
        echo "</td>";
        // Form for PRINT button

echo "<td style='padding: 10px; border: 0px solid #ddd; text-align: center;'>";
echo "<form style='display: inline-block;' method='post' action='print.php'>";
echo "<input type='hidden' name='role' value='$role'>";
echo "<input type='hidden' name='id' value='$id'>";
echo "<input type='submit' name='print' value='PRINT' style='padding: 8px 16px; background-color: #0000FF; color: #fff; border: none; border-radius: 4px; cursor: pointer;'>";
echo "</form>";
echo "</td>";
        // Form for DELETE button
        echo "<td style='padding: 10px; border: 0px solid #ddd; text-align: center;'>";

        echo "<form  style='display: inline-block;' method='post' action='delete_user.php' onsubmit='return confirm(\"Are you sure you want to delete this user?\");'>";
        echo "<input type='hidden' name='role' value='$role'>";
        echo "<input type='hidden' name='id' value='$id'>";
        echo "<input type='submit' name='delete' value='DELETE' style='padding: 8px 16px; background-color: #dc3545; color: #fff; border: none; border-radius: 4px; cursor: pointer;'>";
        echo "</form>";
        echo "</td>";
                echo "</tr>";
                echo "</table>";

        echo "</div>";
        } else {
            echo "<div style='text-align: center;'>";
            echo "No user found with ID: $id";
            echo "</div>";
        }
        

        }
    }
}
    
     elseif ($registrationType == "new") {
            // Check if the Registration_ID or ProfessorID already exists
            $existingId = $_POST["id"];
            $tableName = ($_POST["role"] == "student") ? "students" : "Professors";
            $idColumnName = ($_POST["role"] == "student") ? "Registration_ID" : "ProfessorID";
            
            $checkQuery = "SELECT * FROM $tableName WHERE $idColumnName = '$existingId'";
            $checkResult = $conn->query($checkQuery);
        
            if ($checkResult && $checkResult->num_rows > 0) {
                // User already registered, display message
                echo "<div style='text-align: center;'>";
                echo "User with ID $existingId is already registered.";
                echo "</div>";
            } else {
                if ($role == "student") {
                    echo "<!DOCTYPE html>";
            echo "<html lang='en'>";
            echo "<head>";
            echo "<meta charset='UTF-8'>";
            echo "<title>User Registration</title>";
            echo "<style>";
            echo "body { font-family: Arial, sans-serif; background-color: #f7f7f7; padding: 20px; }";
            echo "form { max-width: 600px; margin: 0 auto; background-color: #fff; padding: 30px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); }";
            echo "label { display: block; font-weight: bold; margin-bottom: 10px; }";
            echo "input[type='text'], input[type='email'], select { width: 100%; padding: 10px; margin-bottom: 20px; border: 1px solid #ccc; border-radius: 4px; }";
            echo "input[type='submit'] { width: 100%; padding: 10px; background-color: #007bff; color: #fff; border: none; border-radius: 4px; cursor: pointer; }";
            echo "</style>";
            echo "</head>";
            echo "<body>";
            echo "<h2 style='text-align: center;'>New User Registration</h2>";
            echo "<form method='post' action='student_input.php'>";
            echo"<input type='hidden' name='registration_type' value='new'>";
            echo "<input type='hidden' name='role' value='student'>";
            echo "<label>Full Name: (Compulsory) </label>";
            echo "<input type='text' name='Full_Name' required>";
            echo "<br><br>";
            echo "<label>Registration ID (Compulsory):</label>";
            echo "<input type='text' name='Registration_ID' required>";
            echo "<br><br>";
            echo "<label>College Email Address: Compulsory) </label>";
            echo "<input type='email' name='Email_Address' required>";
            echo "<br><br>";                
            echo "<label>Date of Admission:</label>";
            echo "<br>";
            echo"insert in this format 12-01-2020";
            echo "<br>";
            echo "<input type='text' name='Date_of_Admission'>";
            echo "<br><br>";                
            echo "<label>Fees:</label>";
            echo "<input type='text' name='Admission_Fees_Paid'>";
            echo "<br><br>";
            echo "<label>First Name:</label>";
            echo "<input type='text' name='First_Name'>";
                echo "<br><br>";
                
                echo "<label>Middle Name:</label>";
                echo "<input type='text' name='Middle_Name'>";
                echo "<br><br>";
                
                echo "<label>Surname:</label>";
                echo "<input type='text' name='SURNAME'>";
                echo "<br><br>";
                
                echo "<label>Father's Name:</label>";
                echo "<input type='text' name='Father_Name'>";
                echo "<br><br>";
                
                echo "<label>Mother's Name:</label>";
                echo "<input type='text' name='Mother_Name'>";
                echo "<br><br>";
                
                echo "<label>Personal Email:</label>";
                echo "<input type='email' name='Email_ID'>";
                echo "<br><br>";
                
                echo "<label>Contact Number:</label>";
                echo "<input type='text' name='Contact_Number'>";
                echo "<br><br>";
                
                echo "<label>Gender:</label>";
                echo "<select name='Gender'>";
                echo "<option value='Male'>Male</option>";
                echo "<option value='Female'>Female</option>";
                echo "<option value='Other'>Other</option>";
                echo "</select>";
                echo "<br><br>";
                
                echo "<label>Date of Birth:</label>";
                echo "<br>";
                echo"insert in this format 12-01-2020";
                echo "<br>";
                echo "<input type='text' name='Date_of_Birth'>";
                echo "<br><br>";
                
                echo "<label>Category:</label>";
                echo "<input type='text' name='Category'>";
                echo "<br><br>";
                
                echo "<label>Blood Group:</label>";
                echo "<select name='Blood_Group'>";
                echo "<option value='A+'>A+</option>";
                echo "<option value='B+'>B+</option>";
                echo "<option value='AB+'>AB+</option>";
                echo "<option value='O+'>O+</option>";
                echo "<option value='A-'>A-</option>";
                echo "<option value='B-'>B-</option>";
                echo "<option value='AB-'>AB-</option>";
                echo "<option value='O-'>O-</option>";
                echo "</select>";
                echo "<br><br>";
                
                echo "<label>Physically Handicapped:</label>";
                echo "<select name='Physically_Handicap'>";
                echo "<option value='Yes'>Yes</option>";
                echo "<option value='No'>No</option>";
                echo "</select>";
                echo "<br><br>";
                
                echo "<label>If Yes, Handicap Type:</label>";
                echo "<input type='text' name='Handicap_Type'>";
                echo "<br><br>";
                
                echo "<input type='submit' value='Register'>";
                echo "</form>";
                echo "</body>";
                echo "</html>";
                } elseif ($role == "Professor") {
                    echo "<!DOCTYPE html>";
            echo "<html lang='en'>";
            echo "<head>";
            echo "<meta charset='UTF-8'>";
            echo "<title>User Registration</title>";
            echo "<style>";
            echo "body { font-family: Arial, sans-serif; background-color: #f7f7f7; padding: 20px; }";
            echo "form { max-width: 600px; margin: 0 auto; background-color: #fff; padding: 30px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); }";
            echo "label { display: block; font-weight: bold; margin-bottom: 10px; }";
            echo "input[type='text'], input[type='email'], select { width: 100%; padding: 10px; margin-bottom: 20px; border: 1px solid #ccc; border-radius: 4px; }";
            echo "input[type='submit'] { width: 100%; padding: 10px; background-color: #007bff; color: #fff; border: none; border-radius: 4px; cursor: pointer; }";
            echo "</style>";
            echo "</head>";
            echo "<body>";
            echo "<h2 style='text-align: center;'>New User Registration</h2>";
            echo "<form method='post' action='professor_input.php'>";

            echo"<input type='hidden' name='registration_type' value='new'>";
            echo "<input type='hidden' name='role' value='Professor'>";

            echo "<label>Full Name: (Compulsory) </label>";
            echo "<input type='text' name='Name' required>";
            echo "<br><br>";

            echo "<label>Professor ID (Compulsory):</label>";
            echo "<input type='text' name='ProfessorID' required>";
            echo "<br><br>";

            echo "<label>Department (compulsory)</label>";
            echo "<input type='text' name='Department' required>";
            echo "<br><br>";                

            echo "<label>Designation (compulsory) :</label>";
            echo "<input type='text' name='Designation' required>";
            echo "<br><br>";                

            echo "<label>Email (compulsory):</label>";
            echo "<input type='email' name='Email1' required>";
            echo "<br><br>";

            echo "<label>Personal Email:</label>";
            echo "<input type='email' name='Email2'>";
            echo "<br><br>";

                echo "<label>Contact Number:</label>";
                echo "<input type='text' name='Phone1'>";
                echo "<br><br>";
                
                echo "<label>Contact Number (if any other):</label>";
                echo "<input type='text' name='Phone2'>";
                echo "<br><br>";
                
                echo "<label>Qualification:</label>";
                echo "<input type='text' name='Qualification'>";
                echo "<br><br>";
                
                echo "<label>Experience (in years):</label>";
                echo "<input type='text' name='Experience'>";
                echo "<br><br>";
                
                echo "<input type='submit' value='Register'>";
                echo "</form>";
                echo "</body>";
                echo "</html>";
                }
            }
        
    }
}
// Close connection
$conn->close();
?>