<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["username"])) {
        $username = $_POST["username"]; // Retrieve username from the form

        // Include your database connection code here
        $servername = "localhost";
        $db_username = "root"; // Replace with your database username
        $db_password = ""; // Replace with your database password
        $dbname = "school_registration";

        $conn = new mysqli($servername, $db_username, $db_password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Query to get the password from the database using the username
        $sql = "SELECT password FROM admin_users WHERE username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $stored_password = $row["password"];

            // Continue with password validation and update as needed
            $current_password = $_POST["current_password"];
            $new_password = $_POST["new_password"];
            $confirm_password = $_POST["confirm_password"];

            if ($current_password === $stored_password) {
                if ($new_password === $confirm_password) {
                    // Update the user's password in the database
                    $update_sql = "UPDATE admin_users SET password = ? WHERE username = ?";
                    $update_stmt = $conn->prepare($update_sql);
                    $update_stmt->bind_param("ss", $new_password, $username);

                    if ($update_stmt->execute()) {
                        echo "Password changed successfully.";
                        if ($update_stmt->execute()) {
                            echo "Password changed successfully.";
                            
                            // Redirect to the login page
                            header("Location: index1.php");
                            exit(); // Make sure to exit to prevent further code execution
                        } else {
                            echo "Error updating password: " . $update_stmt->error;
                        }
                        
                    } else {
                        echo "Error updating password: " . $update_stmt->error;
                    }
                } else {
                    echo "New password and confirm password do not match.";
                }
            } else {
                echo "Current password is incorrect.";
            }
        } else {
            echo "Username not found in the database.";
        }

        $conn->close();
    } else {
        echo "Username not provided in the form.";
    }
}
?>
