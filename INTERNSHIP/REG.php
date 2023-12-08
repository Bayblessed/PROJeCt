<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
    <style>
        /* Add your CSS styles here */
        body {
            font-family: 'Times New Roman', Times, serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: auto;
            margin:auto;
            padding-top: 60px; /* Adjust padding-top to accommodate navbar */
        }
        .container {
            background-color: #ffffff;
            padding: auto;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            max-width: 700px;
            margin: 5px;
        }
        h2 {
            text-align: center;
            color: black;
        }
        form {
            margin-top: 20px;
            padding: 10px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"],
        input[type="date"],
        input[type="number"],
        input[type="tel"],
        input[type="file"] {
            width: 100%;
            padding: 15px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .error {
            color: red;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .navbar {
            background-color: #007bff;
        }
        .navbar-brand, .navbar-nav .nav-link {
            color: #fff;
        }
    </style>
<body>
<div class="container">
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <a class="navbar-brand" href="#">Student Registration</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="home.php">Home</a>
                </li>
            </ul>
        </div>
    </nav>
        <h2>Student Registration Form</h2>
        <form action="process_registration.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
                <label for="date_of_admission">Date of Admission:</label>
                <input type="date" class="form-control" id="date_of_admission" name="date_of_admission" required>
            </div>
            <!-- Personal Information -->
            <div class="form-group">
                <label for="full_name">Full Name:</label>
                <input type="text" class="form-control" name="full_name" required>
            </div>
            <div class="form-group">
                <label for="date_of_birth">Date of Birth:</label>
                <input type="date" class="form-control" name="date_of_birth" required>
            </div>
            <div class="form-group">
                <label for="father_name">Father's Name:</label>
                <input type="text" class="form-control" name="father_name" required>
            </div>
            <div class="form-group">
                <label for="father_phone_number">Father's Phone Number:</label>
                <input type="tel" class="form-control" name="father_phone_number" placeholder="father_phone_number" required>
            </div>
            <div class="form-group">
                <label for="mother_name">Mother's Name:</label>
                <input type="text" class="form-control" name="mother_name" required>
            </div>
            <div class="form-group">
                <label for="mother_phone_number">Mother's Phone Number:</label>
                <input type="tel" class="form-control" name="mother_phone_number">
            </div>
            <div class="form-group">
                <label for="emergency_contact_name">Emergency Contact Name:</label>
                <input type="text" class="form-control" name="emergency_contact_name" required>
            </div>
            <div class="form-group">
                <label for="emergency_contact_relationship">Emergency Contact Relationship:</label>
                <input type="text" class="form-control" name="emergency_contact_relationship" required>
            </div>
            <div class="form-group">
                <label for="emergency_contact_phone_number">Emergency Contact Phone Number:</label>
                <input type="tel" class="form-control" name="emergency_contact_phone_number" required>
            </div>
            <div class="form-group">
                <label for="address1">Address:</label>
                <input type="text" class="form-control" name="address1" required>
            </div>
            <div class="form-group">
                <label for="town">Town:</label>
                <input type="text" class="form-control" name="town" placeholder="town" required>
            </div>
            <div class="form-group">
                <label for="place_of_birth">Place of Birth:</label>
                <input type="text" class="form-control" name="place_of_birth" placeholder="place_of_birth" required>
            </div>
            <div class="form-group">
                <label for="ethnicity">Ethnicity:</label>
                <input type="text" class="form-control" name="ethnicity" placeholder="ethnicity" required>
            </div>
            <div class="form-group">
                <label for="grade_level">Grade Level:</label>
                <input type="number" class="form-control" name="grade_level" placeholder="grade_level" required>
            </div>
            <div class="form-group">
                <label for="gender">Select Male/Female:</label>
                <select class="form-control" name="gender" required>
                    <option value="male">Male</option>
                    <option value="female">Female</option> <!-- Fixed the option value for Female -->
                </select>
            </div>
            <div>
                <label for="health">Medical Problem:</label>
                <textarea class="form-control" name="health" placeholder="Describe any medical problems..." rows="4" required></textarea>
            </div>
            <div class="form-group">
                <label for="passport_picture">Passport Picture:</label>
                <input type="file" class="form-control-file" name="passport_picture" accept="image/*" required>
            </div>
            <input type="submit" class="btn btn-primary" value="Register">
        </form>
    </div>
</body>
</html>