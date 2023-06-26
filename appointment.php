
<head>
  <title>Add Appointment</title>
  <style>
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
      transtion: transform ease 0.3s;
    }
    input[type=submit]:hover,
    input[type=button]:hover {
      background-color: #45a050;
      transform: scale(1.1);
    }
    .error {
      color: red;
    }
     input[type="date"] {
       padding: 8px;
       border: 1px solid #ccc;
       border-radius: 4px;
       font-size: 14px;
       color: #333;
       transition: border-color 0.3s;
     }
     input[type="date"]:hover {
       border-color: #999;
     }
     input[type="date"]:focus {
       border-color: #66afe9;
       box-shadow: 0 0 5px rgba(102, 175, 233, 0.5);
       outline: none;
     }
     form select {
      padding: 8px 16px;
      background-color: #4CAF50;
      color: white;
      border: none;
      cursor: pointer;
      border-radius: 20px;
      transtion: transform ease 0.3s;
     }
     .container {
          display: flex;
          justify-content: center;
          align-items: center;
          height: 100vh;
     }
  </style>
</head>
<h2>Schedule an Appointment</h2>
<div class="container" align='center' style="">

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
    <input type="time" name="time" placeholder="HH:MM" required>
    
    <label for="doctorId">Doctor ID:</label>
    <input type="text" name="doctorId" required>
    
    <label for="fullName">Full Name:</label>
    <input type="text" name="fullName" required><br> <br>
    
    <input type="submit" value="Submit">
  </form>
</div>
  
  