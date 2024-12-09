<?php
    // Include the database connection
    include("database.php");

    if (isset($_POST['sub_btn'])) {
        // Collect and sanitize input data
        $cName = mysqli_real_escape_string($conn, trim($_POST['fullname']));
        $cEmail = mysqli_real_escape_string($conn, trim($_POST['email']));
        $cMessage = mysqli_real_escape_string($conn, trim($_POST['message']));

        // Check if inputs are not empty
        if (empty($cName) || empty($cEmail) || empty($cMessage)) {
            echo "<script>alert('All fields are required!');</script>";
          
        } elseif (!filter_var($cEmail, FILTER_VALIDATE_EMAIL)) {
            echo "<script>alert('Invalid email address!');</script>";
            
        } else {
            // Insert data into the database
            $sql_insert = "INSERT INTO contacttable (name, email, Message)
                           VALUES ('$cName', '$cEmail', '$cMessage')";

            if (mysqli_query($conn, $sql_insert)) {
                $mess= "Data inserted successfully!";
                header("Location:index.html");
                exit();
                echo "<script>alert('$mess');</script>";
               
            } else {
                echo "<script>alert('Error: ');</script>". mysqli_error($conn);
            }
        }
    } else {
        echo "<script>alert('Please submit the form.');</script>";
    
    }

    // Close the database connection
    mysqli_close($conn);
?>
