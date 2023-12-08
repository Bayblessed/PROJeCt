<!DOCTYPE html>
<html>

<head>
    <title>Landing Page</title>
    <!-- Link to Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <!-- Link to your custom CSS -->
    <link rel="stylesheet" href="styles.css">
    <style>
        /* Additional custom styles for the landing page */
        body {
            background-color: #f7f7f7;
            font-family: Arial, sans-serif;
        }

        .landing-page {
            text-align: center;
            margin-top: 150px;
        }

        h1 {
            font-size: 28px;
            animation: fadeInUp 5s ease both;
        }

        p {
            font-size: 16px;
            animation: fadeInUp 5s step-start;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            
            color: #fff;
            text-decoration: none;
            margin: 10px;
            border-radius: 5px;
            animation: fadeInUp 1s ease both;
        }

        @keyframes fadeInUp {
            0% {
                opacity: 0;
                transform: translateY(20px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>

<body>
    <div class="landing-page">
        <div class="container text-center mt-5">
            <!-- Header with school name -->
            <h1 class="display-4">Cosmopolitan Academy</h1>
            <!-- Additional details -->
        </div>
        <p class="lead">Empowering the future through education</p>
        <div>
            <h1>Welcome to Our School Portal</h1>

            <p>Choose your destination:</p>
            <a href="index1.php" class="btn btn-primary m-2">Admin Page</a>
            <a href="REG.php" class="btn btn-success m-2">Registration Page</a>
        </div>
    </div>
    </body>
</html>
