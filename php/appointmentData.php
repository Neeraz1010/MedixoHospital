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
include 'connectToDatabase.php';

$query = "SELECT appointmentId, date, time, doctorId, fullName FROM appointments";
$result = mysqli_query($connection, $query);
$data = mysqli_fetch_all($result);

echo "<h2 align='center'>Available Appointments:</h2><br>";
echo "<table>";
echo "<tr>
          <th>Appointment Id</th>
          <th>Date</th>
          <th>Time</th>
          <th>Doctor Id</th>
          <th>Full Name</th>
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
                                <td>{$individual_data[4]}</td>
                <td><a href='deleteAppointmentData.php?appointmentId=$individual_data[0]&date=$individual_data[1]&time=$individual_data[2]&Doctor Id=$individual_data[3]&fullName=$individual_data[4]'>| Delete |
                  <a href='editAppointmentData.php?appointmentId=$individual_data[0]&date=$individual_data[1]&time=$individual_data[2]&Doctor Id=$individual_data[3]&fullName=$individual_data[4]'>Edit |</a></td>
              </tr>";
  }

  echo "</table>";
} else {
  echo "<tr><td colspan='5'>
          No appointments available.
          </td></tr>";
}

mysqli_close($connection);
?>
