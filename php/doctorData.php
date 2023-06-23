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
                  <a href='editData.php?doctorId=$individual_data[0]&fullName=$individual_data[1]&phoneNumber=$individual_data[2]&speciality=$individual_data[3]'>Edit |</a></td>
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
<button onclick="goBack();" style="padding: 8px 16px; background-color: #4CAF50; color: white; border: none; border-radius: 10px; cursor: pointer; margin-left: 2%;">Go Back</button>
  <script>
          function goBack() {
              window.location.href = "adminPanel.php";
          }

    </script>
