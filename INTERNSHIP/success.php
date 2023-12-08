<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Successful</title>
    <!-- Add your CSS styles here for better presentation -->
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #f0f0f0;
        }

        .success-message {
            margin-top: 100px;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
    <script>
        // Automatically redirect to the index page after a delay
        setTimeout(function() {
            window.location.href = "REG.php"; // Replace "index.php" with your actual index page URL
        }, 3000); // Delay in milliseconds (3 seconds in this example)
    </script>
</head>
<body>
    <div class="success-message">
        <h1>Thank You!</h1>
        <p>Your school admission registration has been successfully submitted.</p>
        <p>We appreciate your interest in our school.</p>
        <!-- You can add more information or instructions here -->
        <p>You will be redirected to the homepage shortly...</p>
    </div>
</body>
</html>
