<?php
// establish a connection to the database
$servername = "localhost";
$username = "phpmyadmin";
$password = "1q2w3e4R";
$dbname = "cementeras";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// check if connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
    
}

//echo "<pre>".print_r($_POST)."</pre>";//
//exit();

// check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // retrieve form data
    $idnum = $_POST["idnum"];
    $name = $_POST["name"];
    $address = $_POST["address"];
    $email = $_POST["email"];
    $tel = $_POST["tel"];

    // sanitize form data to prevent SQL injection attacks
    $idnum = mysqli_real_escape_string($conn, $idnum);
    $name = mysqli_real_escape_string($conn, $name);
    $address = mysqli_real_escape_string($conn, $address);
    $email = mysqli_real_escape_string($conn, $email);
    $tel = mysqli_real_escape_string($conn, $tel);

    // insert form data into the database
    $sql = "INSERT INTO main_contacto (idnum, name, address, email, tel) 
            VALUES ('$idnum', '$name', '$address', '$email', '$tel')";

    if (mysqli_query($conn, $sql)) {
        header("Location: Thanks.html");
    exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

// close the database connection
mysqli_close($conn);
?>
