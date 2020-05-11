<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
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

        interface Employee {

            public function displayEmployeeInfo();
        }

        class Management implements Employee {

            protected $sin;
            protected $age;
            protected $salary;

            function __construct($sin, $age, $salary) {
                $this->sin = $sin;
                $this->age = $age;
                $this->salary = $salary;
            }

            public function getSin() {
                return $this->sin;
            }

            public function getAge() {
                return $this->age;
            }

            public function getSalary() {
                return $this->salary;
            }

            public function displayEmployeeInfo() {
                echo "Sin: " . $this->sin . ", Age: " . $this->age . ", Salary: " . $this->salary ."<br>";
            }

        }

        class Manager extends Management {

            private $adminLevel;

            function __construct($sin, $age, $salary, $adminLevel) {
                $this->sin = $sin;
                $this->age = $age;
                $this->salary = $salary;
                $this->adminLevel = $adminLevel;
            }
            public function getSin() {
                return $this->sin;
            }

            public function getAge() {
                return $this->age;
            }

            public function getSalary() {
                return $this->salary;
            }
            public function getAdminLevel() {
                return $this->adminLevel;
            }
            public function displayEmployeeInfo() {
                echo "Sin: " . $this->sin . ", Age: " . $this->age . ", Salary: " . $this->salary . ", Admin Level: " . $this->adminLevel."<br>";
            }

        }

        class Development implements Employee {

            protected $sin;
            protected $age;
            protected $salary;

            function __construct($sin, $age, $salary) {
                $this->sin = $sin;
                $this->age = $age;
                $this->salary = $salary;
            }
            public function getSin() {
                return $this->sin;
            }

            public function getAge() {
                return $this->age;
            }

            public function getSalary() {
                return $this->salary;
            }
            public function displayEmployeeInfo() {
                echo "Sin: " . $this->sin . ", Age: " . $this->age . ", Salary: " . $this->salary ."<br>";
            }

        } 
        class ITSpecialist extends Development {

            private $projectAssigned;

            function __construct($sin, $age, $salary, $projectAssigned) {
                $this->sin = $sin;
                $this->age = $age;
                $this->salary = $salary;
                $this->projectAssigned = $projectAssigned;
            }
            public function getSin() {
                return $this->sin;
            }

            public function getAge() {
                return $this->age;
            }

            public function getSalary() {
                return $this->salary;
            }
            public function getProjectAssigned() {
                return $this->projectAssigned;
            }
            public function displayEmployeeInfo() {
                echo "Sin: " . $this->sin . ", Age: " . $this->age . ", Salary: " . $this->salary . ", Project Assigned: " . $this->projectAssigned."<br>";
            }
        }
        $manager1 = new Manager(123456789, 45, 110000, "MG - 06");
        $manager2 = new Manager(987654321, 55, 120000, "MG - 07");
        echo "Manager <br>";
        echo $manager1->displayEmployeeInfo();
        echo $manager2->displayEmployeeInfo();
        echo "<br>";
        $itSpecialist1 = new ITSpecialist(567891234,35 ,100000,"T1SR");
        $itSpecialist2 = new ITSpecialist(789123456, 30, 90000, "HIMS");
        echo "IT Specialist <br>";
        echo $itSpecialist1->displayEmployeeInfo();
        echo $itSpecialist2 ->displayEmployeeInfo();
        echo '</div></div></div>';
        ?>
        <?php include 'Footer.php'; ?>;
    </body>
</html>
