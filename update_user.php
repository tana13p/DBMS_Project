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

// Check if role and ID are set
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Retrieve role and ID from POST data
    $role = $_POST['role'];
    $id = $_POST['id'];
    

    if ($role == "student") {
        echo "<!DOCTYPE html>";
echo "<html lang='en'>";
echo "<head>";
echo "<meta charset='UTF-8'>";
echo "<title>User Modification</title>";
echo "<style>";
echo "body { font-family: Arial, sans-serif; background-color: #f7f7f7; padding: 20px; }";
echo "form { max-width: 600px; margin: 0 auto; background-color: #fff; padding: 30px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); }";
echo "label { display: block; font-weight: bold; margin-bottom: 10px; }";
echo "input[type='text'], input[type='email'], select { width: 100%; padding: 10px; margin-bottom: 20px; border: 1px solid #ccc; border-radius: 4px; }";
echo "input[type='submit'] { width: 100%; padding: 10px; background-color: #007bff; color: #fff; border: none; border-radius: 4px; cursor: pointer; }";
echo "</style>";

echo "</head>";
echo "<body>";
echo "<h2 style='text-align: center;'> User Modification</h2>";
echo "<form method='post' action='modification.php'>";
echo"<input type='hidden' name='registration_type' value='new'>";
echo "<input type='hidden' name='role' value='student'>";
echo "<input type='hidden' name='id' value='$id'>";

echo "<label>Full Name:  </label>";
echo "<input type='text' name='Full_Name' >";
echo "<br><br>";
echo "<label>Registration ID :</label>";
echo " $id\n";
echo "<br><br>";
echo "<label>College Email Address:  </label>";
echo "<input type='email' name='Email_Address' >";
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
echo "<title>User Modification</title>";
echo "<style>";
echo "body { font-family: Arial, sans-serif; background-color: #f7f7f7; padding: 20px; }";
echo "form { max-width: 600px; margin: 0 auto; background-color: #fff; padding: 30px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); }";
echo "label { display: block; font-weight: bold; margin-bottom: 10px; }";
echo "input[type='text'], input[type='email'], select { width: 100%; padding: 10px; margin-bottom: 20px; border: 1px solid #ccc; border-radius: 4px; }";
echo "input[type='submit'] { width: 100%; padding: 10px; background-color: #007bff; color: #fff; border: none; border-radius: 4px; cursor: pointer; }";
echo "</style>";

echo "</head>";
echo "<body>";
echo "<h2 style='text-align: center;'> User Modification</h2>";
echo "<form method='post' action='modification.php'>";

echo"<input type='hidden' name='registration_type' value='new'>";
echo "<input type='hidden' name='role' value='Professor'>";
echo "<input type='hidden' name='id' value='$id'>";

echo "<label>Full Name:  </label>";
echo "<input type='text' name='Name' >";
echo "<br><br>";

echo "<label>Professor ID :</label>";
echo " $id\n";
echo "<br><br>";

echo "<label>Department </label>";
echo "<input type='text' name='Department' >";
echo "<br><br>";                

echo "<label>Designation :</label>";
echo "<input type='text' name='Designation' >";
echo "<br><br>";                

echo "<label>Email :</label>";
echo "<input type='email' name='Email1' >";
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
