<?php
// Check if form data is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve role and ID from POST data
    $role = $_POST["role"];
    $id = $_POST["id"];

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

    // Define table names based on role
    $userTable = ($role == "student") ? "students" : "Professors";
    $userID = ($role == "student") ? "Registration_ID" : "ProfessorID";
    $courseTable = "student_courses"; // Assuming this table links students to courses
    $profCourseTable = "professor_courses"; // Assuming this table links professors to courses

    // Start a transaction for atomic operations
    $conn->begin_transaction();

    try {
        // Delete user from the main user table
        $deleteUserSql = "DELETE FROM $userTable WHERE  $userID= '$id'";
        $conn->query($deleteUserSql);

        // Delete user's related records in course linking tables
        if ($role == "student") {
            $deleteCoursesSql = "DELETE FROM $courseTable WHERE registration_id = '$id'";
        } else {
            $deleteCoursesSql = "DELETE FROM $profCourseTable WHERE professor_id = '$id'";
        }
        $conn->query($deleteCoursesSql);

        // Commit transaction if all queries succeed
        $conn->commit();

        // Provide success message
        echo "<div style='text-align: center;'>";
        echo "<p>User and related records deleted successfully.</p>";
        echo "</div>";
    } catch (Exception $e) {
        // Rollback transaction on error
        $conn->rollback();
        echo "Error: " . $e->getMessage();
    }

    // Close database connection
    $conn->close();
} else {
    // Redirect if accessed directly without POST data (optional)
    header("Location: index.php"); // Redirect to appropriate page
    exit;
}
?>
