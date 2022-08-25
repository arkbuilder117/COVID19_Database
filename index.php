<!--
    Jose Ibarra
    1001351561

    Noah Walker
    1001614668

    CSE-3330-001 Project Phase 3
    05/01/2021

    Reference: https://www.w3schools.com/
-->

<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">

  <title>Phase 3 Wepbage</title>
  
  <style>
    h1 {text-align: center;}
    p {text-align: center;}
  </style>
  
  <?php 
        $conn = mysqli_connect("127.0.0.1","root","","covid19");

        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            exit();
        }
    ?>

  <h1>Phase 3 Webpage</h1>
  <p>Select an operation below.</p>
  <br>
</head>

<body>
    Q1. Display the officials record details based on Designation<br>
    <form method="POST" action="">
        <input type="text" placeholder="Designation" name="designation"/>

        <br>
        <input type="submit" name="q1"/>
    </form>
    <?php
        if(isset($_POST['q1'])){
            $sql = "SELECT * FROM officials WHERE Designation = ?";
            $stmt = $conn->prepare($sql); 

            $stmt->bind_param("s", $_POST['designation']);
            $stmt->execute();

            $result = $stmt->get_result();

            echo "<table>";

            while($row = $result->fetch_assoc())
            {
                echo "<tr><td>" . $row['ID'] . "</td><td>" . $row['State_Ab'] . 
                    "</td><td>" . $row['Elected_Officials'] . "</td><td>" . $row['Designation'] . 
                    "</td><td>" . $row['Email'] . "</td><td>" . $row['Phone_No'] . "</td></tr>";
            }

            echo "</table>";

            mysqli_free_result($result);
        }
    ?>
    <br><br>

    Q2. Insert a newly elected official “Jamess Bond”, a “Representative” in the OFFICIALS table in the database. <br>
    You should insert values for all the attributes in the OFFICIALS table. Link the new official with the state of Texas in the states table.<br>
    <form method="POST" action="">
        <input type="text" placeholder="ID" name="id"/>
        <input type="text" placeholder="State Abbr." name="state"/>
        <input type="text" placeholder="Name" name="name"/>
        <input type="text" placeholder="Designation" name="designation"/>
        <input type="text" placeholder="Email" name="email"/>
        <input type="text" placeholder="Phone Number" name="phone"/>

        <br>
        <input type="submit" name="q2"/>
    </form>
    <?php
        if(isset($_POST['q2'])){
            $sql = "INSERT INTO officials ( ID, State_Ab, Elected_Officials, Designation, Email, Phone_No) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            
            $stmt->bind_param("isssss", $_POST['id'], $_POST['state'], $_POST['name'], $_POST['designation'], $_POST['email'], $_POST['phone']);
            $rc = $stmt->execute();

            if ( false===$rc ) {
                die('Error: ' . htmlspecialchars($stmt->error));
            }
            
            $name = $_POST['name'];
            $id = $_POST['id'];

            echo "Inserted \"$name\" into 'officials' with ID $id";
        }
    ?>
    <br><br>

    Q3. Update the elected official name ‘Jamess Bond’ to ‘James Bond Jr.’ in the OFFICIALS record that you just added.<br>
    <form method="POST" action="">
        <input type="text" placeholder="ID" name="id"/>
        <input type="text" placeholder="New Name" name="new_name"/>

        <br>
        <input type="submit" name="q3"/>
    </form>
    <?php
        if(isset($_POST['q3'])){
            $sql = "UPDATE officials SET Elected_Officials = ? WHERE ID = ?";
            $stmt = $conn->prepare($sql);

            $stmt->bind_param("si", $_POST['new_name'], $_POST['id']);
            $stmt->execute();

            $new_name = $_POST['new_name'];
            $id = $_POST['id'];

            echo "Renamed ID $id to \"$new_name\"";
        }
    ?>
    <br><br>

    Q4. Delete the official that you just added to the database.<br>
    <form method="POST" action="">
        <input type="text" placeholder="ID" name="id"/>

        <br>
        <input type="submit" name="q4"/>
    </form>
    <?php
        if(isset($_POST['q4'])){
            $sql = "DELETE FROM officials WHERE ID = ?";
            $stmt = $conn->prepare($sql);

            $stmt->bind_param("i", $_POST['id']);
            $stmt->execute();

            $id = $_POST['id'];

            echo "Deleted official ID $id from the database";
        }
    ?>
    <br><br>
</body>
</html>