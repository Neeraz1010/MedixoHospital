<!DOCTYPE html>
<html lang="en">

<head>
  <title>Add Appointment</title>
  <link rel="shortcut icon" href="./favicon.svg" type="image/svg+xml">
  <style>
    *,
    *::before,
    *::after {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }
    
    label {
      display: block;
      margin-top: 10px;
    }
    
    form {
      margin-bottom: 16px;
    }
    
    input[type=text] {
      padding: 8px;
      width: 200px;
      text-align: center;
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
      border-radius: 20px;
      transition: transform solid ease-in-out 0.3s;
      font-size: 20px;
    }
    
    input[type=submit]:hover,
    input[type=button]:hover {
      background-color: #45a050;
      transform: scale(1.3);
    }
    
    .error {
      color: red;
    }
    
    form {
      font-size: 20px;
    }
    
    form select {
      padding: 8px 16px;
      font-size: 20px;
      background-color: #4CAF50;
      color: white;
      border: none;
      cursor: pointer;
      border-radius: 20px;
      transition: transform ease 0.3s;
    }
    
    .container {
      position: absolute;
      top: 25%;
      right: 15%;
      padding: 1px;
      border-radius: 10px;
      --section-padding: 200px;
    }
    
    .section {
      padding-block: 120px;
    }
    .hero {
      background-color: hsl(186, 100%, 19%);
      --section-padding: 200px;
      background-repeat: no-repeat;
      background-size: cover;
    }
  </style>
</head>

<body>

<section class="section hero" style="background-image: url('images/hero-bg.png')">
    <div class="container" align='center'>
      <h2>Schedule an Appointment</h2>
      <form method="POST" action="php/addAppointmentData.php">
        <label for="date">Date:</label>
        <select name="date" required>
          <?php
          // Get the current date
          $currentDate = date('Y-m-d');

          // Generate options for the next five days
          for ($i = 1; $i <= 5; $i++) {
            $futureDate = strtotime("+$i day");
            $formattedDate = date('jS F Y', $futureDate);
            echo "<option value='$formattedDate'>$formattedDate</option>";
          }
          ?>
        </select>

        <label for="time">Time:</label>
        <select name="time" required>
          <?php
          $startTime = strtotime("10:00 AM");
          $endTime = strtotime("04:00 PM");

          while ($startTime <= $endTime) {
            $formattedTime = date("h:i A", $startTime);
            echo "<option value='$formattedTime'>$formattedTime</option>";
            $startTime += 60 * 60;
          }
          ?>
        </select>


        <label for="doctorId">Doctor:</label>
        <select name="doctorId" required onchange="showDoctorInfo(this)">
          <?php
          // Connect to the database and retrieve the doctor data
          include 'php/connectToDatabase.php';
          $query = "SELECT doctorId, fullName, speciality, flag FROM doctor";
          $result = mysqli_query($connection, $query);
          echo "<option>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Select a Doctor</option>";

          // Loop through the query result and generate the options
          while ($row = mysqli_fetch_assoc($result)) {
            $doctorId = $row['doctorId'];
            $doctorName = $row['fullName'];
            $speciality = $row['speciality'];
            $flag = $row['flag'];

            // Display the option with flag status
            if ($flag == 1) {
              echo "<option value='$doctorId' data-fullname='$doctorName' data-speciality='$speciality'>$doctorName ($speciality)</option>";
            } else {
              echo "<option value='$doctorId' disabled>$doctorName ($speciality)</option>";
            }
          }
          // Close the database connection
          mysqli_close($connection);
          ?>
        </select>
        <label for="fullName">Patient Name:</label>
        <input type="text" name="fullName" placeholder="Patient Full Name" required autocomplete="off"><br><br>

        <input type="submit" value="Submit">
      </form>
  </div>

          <figure class="hero-banner" id="doctorInfoContainer">
            <img src="images/hero-banner.png" width="590" height="517" alt="hero banner">
          </figure>

        </div>
      </section>
</body>

</html>
