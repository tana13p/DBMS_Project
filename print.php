<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include TCPDF library
require_once('TCPDF-main/tcpdf.php');

// Create new PDF instance
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// Set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Tanayaa');
$pdf->SetTitle('Dynamic PDF Report');
$pdf->SetSubject('Query Results');
$pdf->SetKeywords('PDF, Report, Query');

// Set default font subsetting mode
$pdf->setFontSubsetting(true);

// Add a page
$pdf->AddPage();

// Set font
$pdf->SetFont('helvetica', '', 12);

// Database connection parameters
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
    $role = $_POST["role"];
    $id = $_POST["id"];

        // User is already registered, fetch data based on role and ID

        if ($role == "student") {
            // Fetch student information
            $sql = "SELECT * FROM students WHERE Registration_ID = '$id'";
            $result = mysqli_query($conn, $sql);

            if ($result && $result->num_rows > 0) {
                // Iterate over student data and add to PDF
                while ($row = $result->fetch_assoc()) {
                    foreach ($row as $key => $value) {
                        // Output data to PDF
                        $pdf->Cell(60, 10, $key, 1, 0, 'L'); // Output column name
                        $pdf->Cell(0, 10, $value, 1, 1, 'L'); // Output column value
                    }
                }
            } else {
                $pdf->Cell(0, 10, "No student found with ID: $id", 1, 1, 'C');
            }

            // Output PDF as a download
            $pdf->Output('dynamic_report.pdf', 'D');
            exit;
        } elseif ($role == "Professor") {
            // Fetch professor information
            $sql = "SELECT * FROM Professors WHERE ProfessorID = '$id'";
            $result = $conn->query($sql);

            if ($result && $result->num_rows > 0) {
                // Iterate over professor data and add to PDF
                while ($row = $result->fetch_assoc()) {
                    foreach ($row as $key => $value) {
                        // Output data to PDF
                        $pdf->Cell(60, 10, $key, 1, 0, 'L'); // Output column name
                        $pdf->Cell(0, 10, $value, 1, 1, 'L'); // Output column value
                    }
                }
            } else {
                $pdf->Cell(0, 10, "No professor found with ID: $id", 1, 1, 'C');
            }

            // Output PDF as a download
            $pdf->Output('dynamic_report.pdf', 'D');
            exit;
        }

}

// Close connection
$conn->close();
?>