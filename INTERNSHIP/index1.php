<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <!-- Include Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS for Login Page -->
    <style>
        body {
            background-image: url('background.jpg'); /* Replace with your background image URL */
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        
        .login-box {
            background-color: rgba(255, 255, 255, 0.9); /* Background color with transparency */
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        .login-box h2 {
            text-align: center;
        }

        .login-box form {
            margin-top: 20px;
        }

        .form-group label {
            font-weight: bold;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        /* Success Dialog Styles */
        #success-dialog {
            display: none;
            margin-top: 20px;
        }
    </style>
</head>
<body>
<?php
      $username_error = "";
      $password_error = "";
        if(isset($_GET['error']) && $_GET['error'] === '1') {
            echo '<script>alert("Wrong username or password.");</script>';
        }
    ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="login-box">
                    <h2>Admin Login</h2>
                    <form action="login_process.php" method="POST">
                        <div class="form-group">
                            <label for="username">Username:</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                            <span style="color: red;"><?php echo $password_error; ?></span>
        </div>

                        <div class="form-group">
                            <label for "password">Password:</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                            <span style="color: red;"><?php echo $password_error; ?></span>
        </div>
                        </div>
                        <input type="hidden" id="login-success" name="login-success" value="false">
                        <button type="submit" class="btn btn-primary btn-block">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Success Dialog -->
    <div id="success-dialog" class="alert alert-success">
        <strong>Login Successful!</strong> You will be redirected shortly.
    </div>

    <!-- JavaScript for Showing Success Dialog and Redirecting -->
    <script>
        // Check if the login form was submitted successfully
        const loginSuccessInput = document.getElementById('login-success');
        if (loginSuccessInput.value === 'true') {
            // Show the success dialog
            const successDialog = document.getElementById('success-dialog');
            successDialog.style.display = 'block';
        }
    </script>
      
</body>
</html>
