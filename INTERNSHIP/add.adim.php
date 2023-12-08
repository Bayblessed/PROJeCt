<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["username"]) && isset($_POST["full_name"]) && isset($_POST["password"])) {
        $username = $_POST["username"];
        $full_name = $_POST["full_name"];
        $password = $_POST["password"];

        // Include your database connection code here
        $servername = "localhost";
        $db_username = "root";
        $db_password = "";
        $dbname = "school_registration";

        $conn = new mysqli($servername, $db_username, $db_password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Check if the username already exists in the database
        $check_sql = "SELECT * FROM admin_users WHERE username = ?";
        $check_stmt = $conn->prepare($check_sql);
        $check_stmt->bind_param("s", $username);
        $check_stmt->execute();
        $check_result = $check_stmt->get_result();

        if ($check_result->num_rows > 0) {
            echo "Username already exists. Please choose a different username.";
        } else {
            // Query to insert data into the table with plain text password
            $insert_sql = "INSERT INTO admin_users (username, password, fullname) VALUES (?, ?, ?)";
            $insert_stmt = $conn->prepare($insert_sql);
            $insert_stmt->bind_param("sss", $username, $password, $full_name);
        
            if ($insert_stmt->execute()) {
                // Redirect to index1.php
                header("Location:index1.php");
                exit();
            }
            else {
                echo "Error adding admin: " . $insert_stmt->error;
            }
        }

        $conn->close();
    } else {
        echo "Username, password, or full name not provided in the form.";
    }
}
?>

?>
