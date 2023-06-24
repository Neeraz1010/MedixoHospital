<style>
          table {
      width: 100%;
      border-collapse: collapse;
    }
    a {
      text-decoration: none;
      color: #019BA9;
      transition: color 0.2s ease;
    }
    a:hover {
      color: blue;
    }
    th, td {
      padding: 8px;
      text-align: center;
      border-bottom: 1px solid #ddd;
    }
    <style>
    table {
      width: 100%;
      border-collapse: collapse;
    }
    a {
      text-decoration: none;
      color: #019BA9;
      transition: color 0.2s ease;
    }s
    form {
      margin-bottom: 16px;
    }
    input[type=text] {
      text-align: center;
      padding: 8px;
      width: 250px;
      border-color: blue;
      border-radius: 20px;
    }
    input[type=submit] {
      padding: 8px 16px;
      background-color: #4CAF50;
      color: white;
      border: none;
      cursor: pointer;
    }
    input[type=submit]:hover {
      background-color: #45a049;
    }
    .addForm button:hover {
      color: #019BA9;
      cursor: pointer;
    }
    form button {
      transition: transform ease 0.3s;
    }

    form button:hover {
      transform: scale(1.1);
    }
    </style>
</style>
<?php
include "connectToDatabase.php";

$selectQuery = "SELECT * FROM doctor";
$result = $connection->query($selectQuery);
$data = mysqli_fetch_all($result);

echo "<table>
  <tr>
      <th>Doctor ID</th>
      <th>Full Name</th>
      <th>Phone Number</th>
      <th>Speciality</th>
      <th>Actions</th>
  </tr>";
if ($result->num_rows > 0) {
  foreach ($data as $individual_data) {
    echo "
                      <tr>
                                <td>{$individual_data[0]}</td>
                                <td>{$individual_data[1]}</td>
                                <td>{$individual_data[2]}</td>
                                <td>{$individual_data[3]}</td>
                <td><a href='deleteDoctorData.php?doctorId=$individual_data[0]&fullName=$individual_data[1]&phoneNumber=$individual_data[2]&speciality=$individual_data[3]'>| Delete |
                  <a href='editDoctorData.php?doctorId=$individual_data[0]&fullName=$individual_data[1]&phoneNumber=$individual_data[2]&speciality=$individual_data[3]'>Edit |</a></td>
              </tr>";
  }

  echo "</table>";
} else {
  echo "<tr><td colspan='5'>
          No doctors found.
          </td></tr>";
}

$result->free_result();
$connection->close();
?>
<br>
<button onclick="goBack();" style="padding: 8px 16px; background-color: #4CAF50; color: white; border: none; border-radius: 10px; cursor: pointer; margin-left: 2%;">Go Back</button>
    <script>
          function goBack() {
              window.location.href = "adminPanel.php";
          }

    </script>
    <br><br>
    <hr>
    <h1 align="center">Add New Doctor</h1>
<form method="POST" action="addDoctorData.php" class="addForm">
    <label for="doctorId">Doctor ID:</label>
    <input type="text" name="doctorId" id="doctorId" required autocomplete="off">

    <label for="fullName">Full Name:</label>
    <input type="text" name="fullName" id="fullName" required autocomplete="off">

    <label for="phoneNumber">Phone Number:</label>
    <input type="text" name="phoneNumber" id="phoneNumber" required autocomplete="off">

    <label for="speciality">Speciality:</label>
    <input type="text" name="speciality" id="speciality" required autocomplete="off">

    <button type="submit" style="width: 75px; height: 34px; border-radius: 20px">Add</button>
</form>
