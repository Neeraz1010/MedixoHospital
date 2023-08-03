<link rel="shortcut icon" href="../favicon.svg" type="image/svg+xml">

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
      width: 170px;
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
      position: absolute;
      margin-left: 10px;
    }

    form button:hover {
      transform: scale(1.1);
    }

    .btnGoBack {
        background-color: hsl(182, 100%, 35%);
        color: hsl(0, 0%, 100%);
        font-weight: 700;
        padding: 12px 36px;
        display: flex;
        align-items: center;
        gap: 8px;
        border-radius: 6px;
        overflow: hidden;
      }

      .has-before,
      .has-after {
        position: relative;
        z-index: 1;
      }

      a {
        color: inherit;
        text-decoration: none;
      }

      .title-md {
        font-size: 16px;
      }

      .btnGoBack:is(:hover, :focus-visible)::before {
        transform: translateX(100%);
      }
      .btnGoBack::before {
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background-color: hsl(0, 0%, 13%);
        border-radius: 6px;
        transition: 0.5s ease;
        z-index: -1;
      }
      .has-before::before,
      .has-after::after {
        content: "";
        position: absolute;
      }
    </style>
</style>
<div style="width: 10%; margin: 10px 10px; font-size: 10px">
      <a
        href="adminPanel.php"
        class="btnGoBack has-before title-md"
        style="height: 15px"
        >Go Back</a
      >
  </div>
  <br>
<?php
include "connectToDatabase.php";

$selectQuery = "SELECT * FROM doctor";
$result = $connection->query($selectQuery);
$data = mysqli_fetch_all($result);

echo "<table>
  <tr>
      <th>S.N</th>
      <th>Doctor ID</th>
      <th>Full Name</th>
      <th>Phone Number</th>
      <th>Speciality</th>
      <th>Flag</th>
      <th>Actions</th>
  </tr>";
if ($result->num_rows > 0) {
  $snumber = 1;
  foreach ($data as $individual_data) {
    echo "
                      <tr>
                                <td>$snumber</td>
                                <td>{$individual_data[0]}</td>
                                <td>{$individual_data[1]}</td>
                                <td>{$individual_data[2]}</td>
                                <td>{$individual_data[3]}</td>
                                <td>{$individual_data[4]}</td>
                <td><a href='deleteDoctorData.php?doctorId=$individual_data[0]&fullName=$individual_data[1]&phoneNumber=$individual_data[2]&speciality=$individual_data[3]&flag=$individual_data[4]'>| Delete |
                  <a href='editDoctorData.php?doctorId=$individual_data[0]&fullName=$individual_data[1]&phoneNumber=$individual_data[2]&speciality=$individual_data[3]&flag=$individual_data[4]'>Edit |</a></td>
              </tr>";
    $snumber++;
  }

  echo "</table>";
} else {
  echo "<tr><td colspan='6'>
          No doctors found.
          </td></tr>";
}

$result->free_result();
$connection->close();
?>
<br>
    <br><br>
    <hr>
    <h1 align="center">Add New Doctor</h1>
<form method="POST" action="addDoctorData.php" class="addForm">
    <label for="doctorId">Doctor ID:</label>
    <input type="text" placeholder="Doctor Id"  name="doctorId" id="doctorId" required autocomplete="off">

    <label for="fullName">Full Name:</label>
    <input type="text" placeholder="Full Name"  name="fullName" id="fullName" required autocomplete="off">

    <label for="phoneNumber">Phone Number:</label>
    <input type="text" placeholder="Phone Number"  name="phoneNumber" id="phoneNumber" required autocomplete="off">

    <label for="speciality">Speciality:</label>
    <input type="text" placeholder="Speciality" name="speciality" id="speciality" required autocomplete="off">

    <label>Flag:</label>
    <input type="text" placeholder="1->True | 0-> False" name="flag" required >

    <button type="submit" style="width: 75px; height: 34px; border-radius: 20px">Add</button>
</form>
