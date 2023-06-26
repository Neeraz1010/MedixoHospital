<link rel="shortcut icon" href="../favicon.svg" type="image/svg+xml">

<title>Success</title>
  <link rel="shortcut icon" href="../favicon.svg" type="image/svg+xml">

  <style>
    .success-popup {
      position: fixed;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      background-color: #f5f5f5;
      padding: 20px;
      border: 1px solid #ccc;
      border-radius: 5px;
      text-align: center;
      font-size: 20px;
    }
  </style>
  <script>
    // Function to close the popup after 5 seconds and redirect to appointment.php
    function closePopup() {
      setTimeout(function() {
        window.location.href = '../appointment.php';
      }, 5000);
    }
  </script>
</head>
<body onload="closePopup()">
  <div class="success-popup">
    Appointment successfully scheduled!
  </div>
</body>
</html>
