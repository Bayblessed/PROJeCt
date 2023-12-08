<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Successful</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #333; /* Dark background color */
            color: #fff; /* Light text color */
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .success-message {
            padding: 20px;
            background-color: #222; /* Slightly darker background */
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.1); /* Light shadow */
        }

        h1 {
            color: #00a8ff; /* Accent color for the title */
        }

        p {
            margin: 10px 0;
        }
    </style>
    <script>
        // Automatically redirect to the index page after a delay
        setTimeout(function() {
            window.location.href = "admin.php"; // Replace "admin.php" with your actual index page URL
        }, 3000); // Delay in milliseconds (3 seconds in this example)
    </script>
</head>
<body>
    <div class="success-message">
        <h1>Login Successful</h1>
        <p>Welcome</p>
        <!-- You can add more information or instructions here -->
        <p>You will be redirected to the Admin page shortly...</p>
    </div>
</body>
</html>
