<?php session_start();
require "dbconnect.php";

function test_input($data)
{
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
return $data;
}
$_SESSION["first_name"] = $_SESSION["last_name"] = $_SESSION["email"] = $_SESSION["phone_number"] = $_SESSION["sin"] = $_SESSION["password"] = "";

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
$_SESSION["first_name"] = $first_name = test_input($_POST["first_name"]);
$_SESSION["last_name"] = $last_name = test_input($_POST["last_name"]);
$_SESSION["email"] = $email = test_input($_POST["email"]);
$_SESSION["phone_number"] = $phone_number = test_input($_POST["phone_number"]);
$_SESSION["password"] = $session_password = test_input($_POST["password"]);
$_SESSION["sin"] = $sin = test_input($_POST["sin"]);

$conn = mysqli_connect($host, $username, $password, $database);
if ($conn == FALSE)
{
die("Connection Failed: " . mysqli_connect_error());
}

mysqli_select_db($conn, $database);

$sqlQuery = "INSERT INTO employee (FirstName,LastName,EmailAddress,TelephoneNumber,SocialInsuranceNumber,Password) VALUES('$first_name','$last_name' ,'$email', '$phone_number' ,'$sin','$session_password')";
$retval = mysqli_query($conn, $sqlQuery);

  if ($retval == FALSE)
  {
    die("Error: " . $sqlQuery . "<br>" . mysqli_error($conn));
  }
  
  mysqli_close($conn);
  $_SESSION["valid_login"];
  header('Location: ./ViewAllEmployees.php');
}

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    </head>
    <body>
        <?php include 'Header.php'; ?>
        <?php
        echo "<div class = \"container\">";
        echo "<div class=\"row\" >";
        echo "<div class=\"col-sm-4\">";
        include 'Menu.php';
        echo "</div>";
        echo "<div class=\"col-sm-8\" style=\"margin-top:10px;margin-bottom:10px;background-color: #becbcf\">";

        echo "<form action=\"index.php\" method=\"post\">";
        echo "Please fill all information.";
        echo "<p>";
        echo "First Name &nbsp";
        echo "<input type=\"text\" name=\"first_name\" >";
        echo "</p>";
        echo "<p>";
        echo "Last Name &nbsp";
        echo "<input type=\"text\" name=\"last_name\">";
        echo "</p>";
        echo "<p>";
        echo "Email Address &nbsp";
        echo "<input type=\"text\" name=\"email\">";
        echo "</p>";
        echo "<p>";
        echo "Phone Number &nbsp";
        echo "<input type=\"number\" name=\"phone_number\">";
        echo "</p>";
        echo "<p>";
        echo "SIN &nbsp";
        echo "<input type=\"text\" name=\"sin\">";
        echo "</p>";
        echo "<p>";
        echo "Password &nbsp";
        echo "<input type=\"text\" name=\"password\" >";
        echo "</p>";
        echo "<input type=\"submit\" value=\"Submit to database\">";
        echo "</form>";
        echo "<br>";

        echo "</div>";
        echo "</div>";
        echo "</div>";
        ?>
        <?php include 'Footer.php'; ?>;
    </body>
</html>
