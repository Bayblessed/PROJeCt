<!DOCTYPE html>
<html>
<head>
    <title>Search Records</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<style>
        body {
            font-family: 'Times New Roman', Times, serif, sans-serif;
            background-color: #f5f5f5;
            margin: auto;
            padding: auto;
        }
       /* Header styles */
/* Style for the navigation bar */
.navbar {
    background-color: #333; /* Dark background color */
    color: #fff; /* Text color */
}

.navbar-brand {
    font-size: 24px; /* Adjust the font size */
    font-weight: bold;
}

.nav-link {
    color: #fff; /* Text color for links */
    font-weight: 500;
    transition: color 0.3s; /* Smooth color transition on hover */
}

.nav-link:hover {
    color: #4CAF50; /* Change color on hover */
}

/* Style for the "Logout" button */
.navbar-form form button {
    background-color: #4CAF50; /* Green background color */
    color: #fff; /* Text color */
    border: none;
    border-radius: 5px;
    padding: 8px 16px;
    cursor: pointer;
    transition: background-color 0.3s; /* Smooth background color transition on hover */
}

.navbar-form form button:hover {
    background-color: #45A049; /* Darker green on hover */
}

/* Add margin to the "Logout" button for better spacing */
.navbar-form form button {
    margin-left: 10px;
}

/* Remove underlines from links */
.navbar a {
    text-decoration: none;
}



        .container {
            margin: auto;
            padding: auto;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .btn-primary {
            background-color: #4CAF50;
            color: #fff;
            padding: 12px 24px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-primary:hover {
            background-color: #45A049;
        }

        .footer {
            background-color: #333;
            color: #fff;
            padding: 10px 0;
            text-align: center;
        }

        .footer p {
            margin: 0;
        }

        .table-container {
            max-height: 400px;
            overflow-y: auto;
        }
        @keyframes pulse {
    0% {
        transform: scale(1);
    }
    45% {
        transform: scale(1.1);
    }
    100% {
        transform: scale(2);
    }
}

.pulse {
    animation: pulse 1.8s infinite;
    background-color: #4CAF50; /* Background color for the pulsating badge */
    color: #fff; /* Text color for the pulsating badge */
    padding: 4px 12px; /* Adjust the padding for better visibility */
    border-radius: 10px; /* Rounded corners for the badge */
}


    </style>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-primary">
        <a class="navbar-brand" href="admin.php">Admin Dashboard</a>
        <a class="nav-link" href="admin.php">Main Page</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
           
        </button>
        <form action="logout.php" method="POST">
            <button type="submit" name="logout" class="btn btn-danger">Logout</button>
        </form>
    </nav>

    <div class="container">
        <h1 class="my-4">Search Records , search by full_name</h1>
        <!-- Search Form -->
        <form method="GET">
            <div class="input-group mb-3">
                <input type="text" name="search" class="form-control" placeholder="Search by Full Name">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
            </div>
        </form>
<form >
    <div>
    <div class="table-container"> 
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                  
                        <th>Full Name</th>
                        <th>Date of Birth</th>
                        <th>Place of Birth</th>
                        <th>Town</th>
                        <th>Grade Level</th>
                        <th>Address</th>
                        <th>Ethnicity</th>
                        <th>Mother's Name</th>
                        <th>Father's Name</th>
                        <th>Mother's Phone Number</th>
                        <th>Father's Phone Number</th>
                        <th>Emergency Contact Name</th>
                        <th>Emergency Contact Phone Number</th>
                        <th>Emergency Contact Relationship</th>
                        <th>Gender</th>
                        <th>Health</th>
                        <th>Date of Admission</th>
                    </tr>
                </tr>
            </thead>
            <tbody>
                <?php
                // Your PHP code for searching and displaying results here
                if (isset($_GET['search']) && !empty($_GET['search'])) {
                    $search = $_GET['search'];

                    // Replace with your database connection code
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "school_registration";

                    $conn = new mysqli($servername, $username, $password, $dbname);

                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    $sql = "SELECT * FROM students WHERE full_name LIKE ?";
                    $stmt = $conn->prepare($sql);
                    $searchParam = "%" . $search . "%"; // Add wildcards for partial matching
                    $stmt->bind_param("s", $searchParam);
                    $stmt->execute();
                    $result = $stmt->get_result();

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row['id'] . "</td>";
                            echo "<td>" . $row['full_name'] . "</td>";
                            echo "<td>" . $row['date_of_birth'] . "</td>";
                            echo "<td>" . $row['place_of_birth'] . "</td>";
                            echo "<td>" . $row['town'] . "</td>";
                            echo "<td>" . $row['grade_level'] . "</td>";
                            echo "<td>" . $row['address1'] . "</td>";
                            echo "<td>" . $row['ethnicity'] . "</td>";
                            echo "<td>" . $row['mother_name'] . "</td>";
                            echo "<td>" . $row['father_name'] . "</td>";
                            echo "<td>" . $row['mother_phone_number'] . "</td>";
                            echo "<td>" . $row['father_phone_number'] . "</td>";
                            echo "<td>" . $row['emergency_contact_name'] . "</td>";
                            echo "<td>" . $row['emergency_contact_phone_number'] . "</td>";
                            echo "<td>" . $row['emergency_contact_relationship'] . "</td>";
                            echo "<td>" . $row['gender'] . "</td>";
                            echo "<td>" . $row['health'] . "</td>";
                            echo "<td>" . $row['date_of_admission'] . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='2'>No results found.</td></tr>";
                    }

                    $conn->close();
                }
                ?>
            </tbody>
        </table>
</form>
    </div>
    </div>
</body>
</html>
