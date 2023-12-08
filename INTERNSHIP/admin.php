<!DOCTYPE html>
<html>

<head>
    <title>Admin Dashboard</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
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
    font-size: 20px; /* Adjust the font size */
    font-weight: bold;
}

.nav-link {
    color: #fff; /* Text color for links */
    font-weight: 50;
    transition: color 0.5s; /* Smooth color transition on hover */
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
    transition: background-color 0.6s; /* Smooth background color transition on hover */
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
</head>

<body>
<nav class="navbar navbar-expand-lg">
    <a class="navbar-brand" href="admin.php">Admin Dashboard</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <form action="logout.php" method="POST">
        <button type="submit" name="logout" class="btn btn-danger">Logout</button>
</form>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link" href="home.php">Home</a>
                <a class="nav-link" href="ad.php">Add New User</a>
                <a class="nav-link" href="chan.php">Change Password</a>
                <a class="nav-link" href="search.php">Search</a>
            </li>
        </ul>
    </div>
</nav>
  
    <?php

// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "school_registration";

// Create a new database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to get the total number of students
$sql = "SELECT COUNT(*) as total_students FROM students";
$result = $conn->query($sql);

if ($result !== false && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $totalStudents = $row['total_students'];
} else {
    $totalStudents = 0;
}
$sql = "SELECT COUNT(*) as total_students FROM students";
$result = $conn->query($sql);

// Check if the query was successful
if ($result !== false && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $totalStudents = $row['total_students'];
} else {
    $totalStudents = 0;
}


?>


<div class="navbar-collapse" id="navbarNav">
    <!-- Other menu items go here -->

    <!-- Display the total number of students with a pulsating animation on the right side of the navbar -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <span class="navbar-text">
                Total Students:
                <span class="badge badge-secondary pulse"><?php echo $totalStudents; ?></span>
            </span>
        </li>
    </ul>
</div>


    <div class="container">
        <h1>Student Registration Details</h1>
        <div id="search-results"></div>
       
            <form action="search.php", method="GET">
            <div class="input-group mb-3">
                <input type="text" name="search" class="form-control" placeholder="Search by Full Name">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
            </div>
        </form>
        <div class="table-responsive">
<div class="table-container">
    
        <table class="table table-striped table-bordered table-fluid">
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
                        <th>Passport Picture</th>
                        <th>Date of Admission</th>
                    </tr>
                </thead>
                </div class="table-container">

                <tbody>
                    <?php
                    // Include your database connection code here
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "school_registration";

                    $conn = new mysqli($servername, $username, $password, $dbname);

                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    // SQL query to select data
                    $sql = "SELECT * FROM students";
                    $result = $conn->query($sql);

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
                            echo "<td>" . $row['passport_picture'] . "</td>";
                            echo "<td>" . $row['date_of_admission'] . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='6'>No results found.</td></tr>";
                    }
                  
                    ?>
                </tbody>
                <?php
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
        </div>

     </div class="container">


        <h2>Highest Enrolled Class</h2>
        
        <div class="table-container">
        <div class="table-responsive">
        <table class="table table-striped table-bordered table-fluid">
            <thead class="thead-dark">
           
                <tr>
                    <th>Class</th>
                    <th>Student Count</th>
                </tr>
            </thead>
      
            <tbody>
                <?php
                $class_query = "SELECT grade_level, COUNT(*) as student_count FROM students GROUP BY grade_level ORDER BY student_count DESC LIMIT 1";
                $class_result = $conn->query($class_query);

                if ($class_result->num_rows > 0) {
                    while ($row = $class_result->fetch_assoc()) {
                        echo "<tr>
                            <td>" . $row["grade_level"] . "</td>
                            <td>" . $row["student_count"] . "</td>
                        </tr>";
                    }
                }
                ?>
            </tbody>
        </table>
            </div class="table-container" > 
  
<form>
        <h2>Gender Distribution</h2>
        
        <div class="table-container">
        <table class="table table-striped table-bordered table-fluid">
            <thead class="thead-dark">
                <tr>
                    <th>Gender</th>
                    <th>Student Count</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $gender_query = "SELECT gender, COUNT(*) as gender_count FROM students GROUP BY gender";
                $gender_result = $conn->query($gender_query);

                if ($gender_result->num_rows > 0) {
                    $male_count = 0;
                    $female_count = 0;

                    while ($row = $gender_result->fetch_assoc()) {
                        if (isset($row["gender"]) && isset($row["gender_count"])) {
                            if ($row["gender"] == "male") {
                                $male_count = $row["gender_count"];
                            } elseif ($row["gender"] == "female") {
                                $female_count = $row["gender_count"];
                            }
                        }
                    }

                    echo "<tr>
                        <td>Male</td>
                        <td>$male_count</td>
                    </tr>";
                    echo "<tr>
                        <td>Female</td>
                        <td>$female_count</td>
                    </tr>";
                }
                ?>
            </tbody>
        </table>
            </div class="table-container">
        </form>      
</div>

    <div class="footer">
        <div class="footer-links">
            <a href="#">Privacy Policy</a>
            <a href="#">Terms of Service</a>
        </div>
        <p class="footer-copyright">Copyright &copy; 2023 BayTech</p>
    </div>
    <script>
    // Function to update the total number of students
    function updateTotalStudents() {
        // Simulate fetching the total number of students (replace with your actual logic)
        const totalStudents = 123;

        // Update the placeholder text with the total number of students
        const totalStudentsElement = document.getElementById("total-students");
        totalStudentsElement.textContent = totalStudents;
        totalStudentsElement.classList.remove("pulse"); // Remove animation class

        // Apply animation to the badge
        setTimeout(() => {
            totalStudentsElement.classList.add("pulse"); // Add animation class
        }, 1000); // Reapply animation after 1 second
    }

    // Call the function to update the total number of students
    updateTotalStudents(); // You can call this function whenever you need to update the count
</script>

    <!-- Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>
