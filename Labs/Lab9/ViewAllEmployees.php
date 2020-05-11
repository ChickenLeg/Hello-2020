<?php session_start();
require "dbconnect.php";


function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SESSION["valid_login"] == False) {
    header('Location: ./Login.php');
}
$conn = mysqli_connect($host, $username, $password);
if ($conn == FALSE) {
    die("Connection Failed: " . mysqli_connect_error());
}



if ($conn == FALSE) {
    die("Error: " . $sql . "<br>" . mysqli_error($conn));
}
mysqli_select_db($conn, $database);
$sql = "SELECT * FROM employee";

$result = mysqli_query($conn, $sql);
$rowCount = mysqli_num_rows($result);
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
        <?php include 'Header.php'; ?>
    </head>
    <body>
        <?php
        echo "<div class = \"container\">";
        echo "<div class=\"row\" >";
        echo "<div class=\"col-sm-4\">";
        include 'Menu.php';
        echo "</div>";
        echo "<div class=\"col-sm-8\" style=\"margin-top:10px;margin-bottom:10px;background-color: #becbcf\">";

        echo "<h3 style=\"color:#826a5f;\">SAVED SESSION</h3>";
//if (isset($_SESSION["first_name"])) {
        echo "First Name: " . $_SESSION["first_name"] . "<br>";
//}
//if (isset($_SESSION["last_name"])) {
        echo "Last Name: " . $_SESSION["last_name"] . "<br>";
//}
//if (isset($_SESSION["email"])) {
        echo "Email: " . $_SESSION["email"] . "<br>";
//}
//if (isset($_SESSION["phone_number"])) {
        echo "Phone Number: " . $_SESSION["phone_number"] . "<br>";
//}
//if (isset($_SESSION["sin"])) {
        echo "SIN: " . $_SESSION["sin"] . "<br>";
//}
//if (isset($_SESSION["password"])) {
        echo "Password: " . $_SESSION["password"] . "<br>";
//}

        echo "<hr>";
        echo '<br>';

        echo '<h3 style=\"color:#826a5f;\">HTML TABLE OF DATABASE</h3>';
        echo '<table border="1" width=100% method=\"post\">';
        echo '<tr>';
        echo '<th>FIRST NAME</th>';
        echo '<th>LAST NAME</th>';
        echo '<th>EMAIL</th>';
        echo '<th>TELEPHONE</th>';
        echo '<th>SIN</th>';
        echo '<th>PASSWORD</th>';
        echo '</tr>';

        if ($rowCount == 0) {
            echo "There are no rows to display from the Employee table";
        } else {
            for ($i = 0; $i < $rowCount; ++$i) {
                $row = mysqli_fetch_assoc($result);
  //              var_dump($row);
                echo '<tr>';
                echo '<td>' . $row["FirstName"] . '</td>';
                echo '<td>' . $row["LastName"] . '</td>';
                echo '<td>' . $row["EmailAddress"] . '</td>';
                echo '<td>' . $row["TelephoneNumber"] . '</td>';
                echo '<td>' . $row["SocialInsuranceNumber"] . '</td>';
                echo '<td>' . $row["Password"] . '</td>';
                echo '</tr>';
            }
//            for ($i = 0; $i < $rowCount; $i++) {
//                $row = mysqli_fetch_row($result);
//                echo "<table><tr><td>";
//                echo "<br />";
//                echo "<form action=\"index.php\" method=\"post\">";
//                echo "<input type=\"hidden\" name=\"employeeId\"" . $row[0] . "\" />";
//                echo "</form>";
//
//                echo "<form action=\"index.php\" method=\"post\">";
//                echo "<input type=\"hidden\" name=\"employeeId\"" . $row[0] . "\" />";
//                echo "<input type=\"hidden\" name=\"first_name\"" . $row[1] . "\" />";
//                echo "<input type=\"hidden\" name=\"last_name\"" . $row[2] . "\" />";
//                echo "<input type=\"hidden\" name=\"email\"" . $row[3] . "\" />";
//                echo "<input type=\"hidden\" name=\"phone_number\" " . $row[4] . "\" />";
//                echo "<input type=\"hidden\" name=\"sin\"" . $row[5] . "\" />";
//                echo "<input type=\"hidden\" name=\"password\"" . $row[6] . "\" />";
//                echo "</form>";
//                echo "</td>";
//
//                echo "<td>";
//                echo "First Name: " . $row[1] . $_SESSION["first_name"] . "<br />";
//                echo "Last Name: " . $row[2] . $_SESSION["last_name"] . "<br />";
//                echo "Email Address: " . $row[3] . $_SESSION["email"] . "<br />";
//                echo "Phone Number: " . $row[4] . $_SESSION["phone_number"] . "<br />";
//                echo "SIN: " . $row[5] . $_SESSION["sin"] . "<br />";
//                echo "Password: " . $row[6] . $_SESSION["password"] . "<br />";
//                echo "</td></tr></table>";
//
//                echo "<br />";
//           }
        }
        echo '</table>';

        mysqli_close($conn);
        echo '</div></div></div>';
        ?>
        <?php include 'Footer.php'; ?>;
    </body>
</html>
