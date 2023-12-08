<?php

// Connect to the database
$db = new PDO('mysql:host=localhost;dbname=school_registration', 'root', '');

// Get the form data
$full_name = $_POST['full_name'];
$date_of_birth = $_POST['date_of_birth'];
$father_name = $_POST['father_name'];
$father_phone_number = $_POST['father_phone_number'];
$mother_name = $_POST['mother_name'];
$mother_phone_number = $_POST['mother_phone_number'];
$emergency_contact_name = $_POST['emergency_contact_name'];
$emergency_contact_relationship = $_POST['emergency_contact_relationship'];
$emergency_contact_phone_number = $_POST['emergency_contact_phone_number'];
$address1 = $_POST['address1'];
$town = $_POST['town'];
$place_of_birth = $_POST['place_of_birth'];
$ethnicity = $_POST['ethnicity'];
$grade_level = $_POST['grade_level'];
$gender = $_POST['gender'];
$health = $_POST['health'];
$date_of_admission = $_POST['date_of_admission']; // Assuming "date_of_admission" is the name in your HTML form

if (!is_numeric($grade_level) || $grade_level < 1 || $grade_level > 12) {
    // Handle the validation error (e.g., display an error message)
    die("Invalid grade_level. Please enter a value between 1 and 12.");
}

// Validate the date_of_birth (1995 or earlier and not today)
$today = new DateTime(); // Current date
$birth_date = new DateTime($date_of_birth);
if ($birth_date > $today || $birth_date->format('Y') < 1995) {
    // Handle the validation error (e.g., display an error message)
    // Instead of die(), handle the validation error more gracefully:
if (!is_numeric($grade_level) || $grade_level < 1 || $grade_level > 12) {
    die("Invalid date_of_birth. Please enter a date earlier than today and after 1995.");
    // For example, you could redirect the user back to the registration form with the error message displayed.
  }
  
    die("Invalid date_of_birth. Please enter a date earlier than today and after 1995.");
}
function generateUniqueFileName($originalName) {
    $timestamp = time();
    $random = mt_rand(1000, 9999); // Add more randomness if needed
    $extension = pathinfo($originalName, PATHINFO_EXTENSION);
    return "student_$timestamp$random.$extension";
}

$upload_dir = 'C:/xampp/htdocs/INTERNSHIP/passport_picture';

$passport_picture = $_FILES['passport_picture'];

if ($passport_picture['error'] === 0) {
    $file_name = generateUniqueFileName($passport_picture['name']);
    $upload_file = $upload_dir . '/' . $file_name;
    
    if (move_uploaded_file($passport_picture['tmp_name'], $upload_file)) {
        // File uploaded successfully
    } else {
        // File upload failed
    }
}
// Save the student data to the database
// Previous code...

// Save the student data to the database
$sql = 'INSERT INTO students (full_name, date_of_birth, father_name, father_phone_number, mother_name, mother_phone_number, emergency_contact_name, emergency_contact_relationship, emergency_contact_phone_number, address1, town, place_of_birth, ethnicity, grade_level, gender, health, passport_picture, date_of_admission) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
$stmt = $db->prepare($sql);

$stmt->bindParam(1, $full_name);
$stmt->bindParam(2, $date_of_birth);
$stmt->bindParam(3, $father_name);
$stmt->bindParam(4, $father_phone_number);
$stmt->bindParam(5, $mother_name);
$stmt->bindParam(6, $mother_phone_number);
$stmt->bindParam(7, $emergency_contact_name);
$stmt->bindParam(8, $emergency_contact_relationship);
$stmt->bindParam(9, $emergency_contact_phone_number);
$stmt->bindParam(10, $address1);
$stmt->bindParam(11, $town);
$stmt->bindParam(12, $place_of_birth);
$stmt->bindParam(13, $ethnicity);
$stmt->bindParam(14, $grade_level);
$stmt->bindParam(15, $gender);
$stmt->bindParam(16, $health);
$stmt->bindParam(17, $file_name);
$stmt->bindParam(18, $date_of_admission); // Add this line



if ($stmt->execute()) {
    // Registration successful
    header('Location: success.php');
    exit; // Exit to prevent further script execution
} else {
    $errorMessage = $stmt->errorInfo()[2];
    // Display an error message or handle the error as needed
    echo "Error: $errorMessage";
    // Optionally, you might want to handle the error and provide a way for the user to go back and correct the submission.
}
?>
