<?php
include 'connectToDatabase.php';
require_once 'autoload.php';

use Twilio\Rest\Client;

// Function to send SMS using Twilio API
function sendSMS($to, $message)
{
          $accountSid = 'ACa8784d71448ba199a111e11d23e65834';
          $authToken = 'c89de0c695be4c8d6ab332dabe488f5b';
          $twilioNumber = '+14849898591';

          // Create a Twilio client
          $client = new Client($accountSid, $authToken);

          // Send the SMS
          $client->messages->create(
                    $to,
                    [
                              'from' => $twilioNumber,
                              'body' => $message
                    ]
          );
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

          $id = mysqli_real_escape_string($connection, $_POST['id']);
          $userId = mysqli_real_escape_string($connection, $_POST['userId']);
          $fullName = mysqli_real_escape_string($connection, $_POST['fullName']);
          $phoneNumber = mysqli_real_escape_string($connection, $_POST['phoneNumber']);
          $role = mysqli_real_escape_string($connection, $_POST['role']);

          // Update the data in the "userLogin" table
          $editQuery = "UPDATE userLogin SET userId='$userId', fullName='$fullName', phoneNumber='$phoneNumber', role='$role' WHERE id='$id'";

          // Send SMS notification
          $message = "Your UserID has been updated to: " . $userId;
          sendSMS($phoneNumber, $message);

          if (!mysqli_query($connection, $editQuery)) {
                    echo "Error: " . mysqli_error($connection);
          } else {
                    // Redirect back to the admin panel or a success page
                    header("Location: adminPanel.php");
                    exit();
          }
}

$connection->close();
?>
