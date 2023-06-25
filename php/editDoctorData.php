<?php
include 'connectToDatabase.php';

$doctorId = $_GET['doctorId'];
$query = "SELECT doctorId, fullName, phoneNumber, speciality FROM doctor WHERE doctorId = '$doctorId'";
$result = mysqli_query($connection, $query);

if ($result) {
  $row = mysqli_fetch_assoc($result);
  $doctorId = $row['doctorId'];
  $fullName = $row['fullName'];
  $phoneNumber = $row['phoneNumber'];
  $speciality = $row['speciality'];
}

mysqli_close($connection);
?>

<style>
    table {
      width: 100%;
      border-collapse: collapse;
    }
    th, td {
      padding: 8px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }
    form {
      margin-bottom: 16px;
    }
    input[type=text] {
      padding: 8px;
      width: 200px;
      border-radius: 20px;
      border-color: blue;
    }
    input[type=submit],
    input[type=button] {
      padding: 8px 16px;
      background-color: #4CAF50;
      color: white;
      border: none;
      cursor: pointer;
    }
    input[type=submit]:hover,
    input[type=button]:hover {
      background-color: #45a050;
    }
    .delete-btn {
      background-color: #f44336;
    }
    .update-btn {
      background-color: #ff9800;
    }
  </style>
<h2>Update Doctor</h2>
<form method="POST" action="updateDoctor.php">
    <label>Doctor ID:</label>
    <input type="text" placeholder="ID" value="<?php echo $doctorId; ?>" name="doctorId" required readonly>

    <label>Full Name:</label>
    <input type="text" placeholder="Full Name" value="<?php echo $fullName; ?>" name="fullName" required>

    <label>Phone Number:</label>
    <input type="text" placeholder="Phone Number" value="<?php echo $phoneNumber; ?>" name="phoneNumber" required>

    <label>Speciality:</label>
    <input type="text" placeholder="Speciality" value="<?php echo $speciality; ?>" name="speciality" required readonly>
    <br> <br>

    <input type="button" value="Go Back" onclick="goBack();" style="float: left; margin-left: 2%; border-radius: 10px;">
    <input type="submit" value="Update" style="float: right; margin-right: 2%; border-radius: 10px;">
</form>
    <script>
          function goBack() {
              window.history.back();
          }
    </script>