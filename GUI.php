<?php

//$servername = "172.18.69.57";
//$username = "syituser70";
//$password = "root";

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
} else {
    echo "<div style='text-align: center;'>";
    echo "Connected successfully";
    echo "</div>";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Data Interaction</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            margin: 0 auto;
        }
        h2 {
            text-align: center;
            color: #333;
        }
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #666;
        }
        input[type="text"],
        input[type="email"],
        input[type="date"],
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>User Information</h2>
        <form method="post" action="process_data.php">
            <label>Select Registration Type:</label>
            <select name="registration_type">
                <option value="existing">Already Registered</option>
                <option value="new">New Registration</option>
            </select>
            <br><br>
            <label>Role:</label>
            <select name="role">
                <option value="student">Student</option>
                <option value="Professor">Professor</option>
            </select>
            <br><br>
            <label>ID:</label>
            <input type="text" name="id">
            <br><br>
            <input type="submit" value="Submit">
        </form>
    </div>
</body>
</html>




