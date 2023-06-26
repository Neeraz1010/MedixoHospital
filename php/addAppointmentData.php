<link rel="shortcut icon" href="../favicon.svg" type="image/svg+xml">

<?php
// Include the database connection file
include 'connectToDatabase.php';

// Define the variables
$date = $time = $doctorId = $fullName = '';
$error = '';

// Process the form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
          // Validate and sanitize the input data
          $date = mysqli_real_escape_string($connection, $_POST['date']);
          $time = mysqli_real_escape_string($connection, $_POST['time']);
          $doctorId = mysqli_real_escape_string($connection, $_POST['doctorId']);
          $fullName = mysqli_real_escape_string($connection, $_POST['fullName']);

          // Check if any field is empty
          if (empty($date) || empty($time) || empty($doctorId) || empty($fullName)) {
                    $error = 'All fields are required.';
          } else {
                    // Format the date
                    $formattedDate = date('Y-m-d', strtotime($date));

                    // Insert the data into the appointments table
                    $insertQuery = "INSERT INTO appointments (date, time, doctorId, fullName) VALUES ('$formattedDate', '$time', '$doctorId', '$fullName')";

                    if (!mysqli_query($connection, $insertQuery)) {
                              $error = 'Error: ' . mysqli_error($connection);
                    } else {
                              header('Location: successInAppointment.php');
                              exit();
                    }
          }

}

// Close the database connection
mysqli_close($connection);
?>
