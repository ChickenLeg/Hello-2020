<?php session_start();
        require "dbconnect.php";
        include 'Header.php';
        

        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        $invalid_login = False;
        $_SESSION["valid_login"] = False;

        $_SESSION["first_name"] = $_SESSION["last_name"] = $_SESSION["email"] = $_SESSION["phone_number"] = $_SESSION["sin"] = $_SESSION["password"] = "";
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $_SESSION["email"] = $email = test_input($_POST["email"]);
            $_SESSION["password"] = $session_password = test_input($_POST["password"]);

            /* DATABASE CHECK */
            $conn = mysqli_connect($host, $username, $password);

            if ($conn == FALSE) {
                die("Connection Failed: " . mysqli_connect_error());
            }
            mysqli_select_db($conn, $database);
            $sql = "SELECT * FROM employee WHERE EmailAddress = '$email'";
            $result = mysqli_query($conn, $sql);
            $rowCount = mysqli_num_rows($result);
            if($rowCount == 1){
                $row = mysqli_fetch_row($result);
            }
           


            if ($rowCount == 0) {
                $invalid_login = True;
            } else if ($row[3] == $email) {
                if ($session_password == $row[6]) {
                    $_SESSION["valid_login"] = True;
                } else {
                    $invalid_login = True;
                }
            }

            mysqli_close($conn);

            if ($_SESSION["valid_login"]) {
                header('Location: ./ViewAllEmployees.php');
            }
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
        
        <?php
        echo "<div class = \"container\">";
        echo "<div class=\"row\" >";
        echo "<div class=\"col-sm-4\">";
        include 'Menu.php';
        echo "</div>";
        echo "<div class=\"col-sm-8\" style=\"margin-top:10px;margin-bottom:10px;background-color: #becbcf\">";
        echo '<br>';
        echo '<form method="post">';
        echo '<div class="input-group">';
        echo '<label for="email">Email &nbsp;</label>';
        echo '<input required maxlength="255" type="email" name="email">';
        echo '</div>';
        echo '<br>';
        echo '<div class="input-group">';
        echo '<label for="password">Password &nbsp;</label>';
        echo '<input required maxlength="60" type="password" name="password">';
        echo '</div>';

        echo '<br>';
        
        echo '<br>';
        echo '<input class="orange accent-4 white-text" type="submit" value="Login">';
        echo '<br>';
        echo '<br>';
        echo '</form>';

        
        if ($invalid_login)
        {
          echo '<br>';
          echo '<span class="red-text">Invalid Email/Password</span>';
        }
        echo '</div>';
//        echo "<form method=\"post\">";
//        echo "<h2>Login</h2>";
//        echo "<br>";
//        echo "<p>";
//        echo "Email Address &nbsp";
//        echo "<input type=\"text\" name=\"email\">";
//        echo "</p>";
//        echo "<p>";
//        echo "Password&nbsp";
//        echo "<input type=\"text\" name=\"password\">";
//        echo "</p>";
//        echo "<input type=\"submit\" value=\"Login\">";
//        echo "</form>";
//        echo "<br>";

        echo "</div>";
        echo "</div>";
        echo "</div>";
        ?>
<?php include 'Footer.php'; ?>;
    </body>
</html>
