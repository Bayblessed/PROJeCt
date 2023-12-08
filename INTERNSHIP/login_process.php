<?php
// Include your database connection code here
// Replace "your_servername", "your_username", "your_password", and "your_database" with your actual database credentials

$servername = "localhost";
$username = "root";
$password = "";
$database = "school_registration"; // Replace with your database name

// Create a connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize error message variables
$username_error = "";
$password_error = "";

// Check if the login form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Validate username and password (you can add more complex validation)
    if (empty($username)) {
        $username_error = "Please enter a username.";
    }

    if (empty($password)) {
        $password_error = "Please enter a password.";
    }

    // If there are no validation errors, proceed with authentication
    if (empty($username_error) && empty($password_error)) {
        // Query to check the credentials (replace with your actual table and column names)
        $sql = "SELECT * FROM admin_users WHERE username = '$username' AND password = '$password'";

        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            // Login successful
            session_start(); // Start a session
            $_SESSION['authenticated'] = true; // Set a session variable
            header("Location:suc.php"); // Redirect to the admin page
            exit();
        } else {
            // Login failed
            $username_error = "Wrong username for username.";
            $password_error = "Wrong password for password.";
            header("Location: index1.php?error=1");
          
        if(isset($_GET['error']) && $_GET['error'] === '1') {
            echo '<script>alert("Wrong username or password.");</script>';
        }
    
        }
    }
}

// Close the database connection
$conn->close();
?>
