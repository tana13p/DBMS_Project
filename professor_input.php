<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection parameters
//$servername = "172.18.69.57";
//$username = "syituser70";
//$password = "root";
//$database = "Maithili_70";

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

    if ($registrationType == "new" && $role == "Professor") {
        // Retrieve form data
        $Name = $_POST["Name"];
        $ProfessorID = $_POST["ProfessorID"];
        $Department = $_POST["Department"];
        $Designation = $_POST["Designation"];
        $Email1 = $_POST["Email1"];
        $Email2 = !empty($_POST["Email2"]) ? $_POST["Email2"] : null;
        $Phone1 = !empty($_POST["Phone1"]) ? $_POST["Phone1"] : null;
        $Phone2 = !empty($_POST["Phone2"]) ? $_POST["Phone2"] : null;
        $Qualification = !empty($_POST["Qualification"]) ? $_POST["Qualification"] : null;
        $Experience = !empty($_POST["Experience"]) ? $_POST["Experience"] : null;

        // Insert data into 'students' table
        $sql = "INSERT INTO Professors (ProfessorID, Name, Department, Designation,
                 Email1, Email2, Phone1, Phone2, Qualification, Experience)
                 VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        // Use prepared statement to prevent SQL injection
        $stmt = $conn->prepare($sql);

        if ($stmt) {
            // Bind parameters to the statement
            $stmt->bind_param("ssssssssss", $ProfessorID, $Name, $Department,
                              $Designation, $Email1, $Email2, $Phone1, $Phone2, $Qualification,
                              $Experience);

            // Execute the statement
            $stmt->execute();

            // Check if the insertion was successful
            if ($stmt->affected_rows > 0) {
                echo "<div style='text-align: center;'>";
                echo "New Professor registered successfully!";
                echo "</div>";
            } else {
                echo "<div style='text-align: center;'>";
                echo "Error: Unable to register new Professor.";
                echo "</div>";
            }

            // Close statement
            $stmt->close();
        } else {
            echo "<div style='text-align: center;'>";
            echo "Error: Unable to prepare SQL statement.";
            echo "</div>";
        }
    }
}

// Close connection
$conn->close();
?>
