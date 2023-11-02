<?php
    require_once("db_connect.php");
    $connection = @new mysqli($host, $db_user, $db_password, $db_name);

    if ($_SERVER["REQUEST_METHOD"] == "POST"){ 
        if (!empty($_POST["username"]) && !empty($_POST["password"]) && !empty($_POST["name"]) && !empty($_POST["lastname"]) && !empty($_POST["role"])){

            if ($connection->connect_error) {
                die("Bląd: ". $connection->connect_error);
            }
            $username = $_POST["username"];
            $password = $_POST["password"];
            $name = $_POST["name"];
            $lastname = $_POST["lastname"];
            $role = $_POST["role"];

            $sql = "INSERT INTO users (user, pass, name, lname, role) VALUES ('$username', '$password', '$name', '$lastname', '$role')";

            if ($connection->query($sql) === TRUE) {
                echo"Pomyślnie dodano do bazy";
        }else{
            echo "Błąd przy dodawaniu rekordu: " . $sql . $connection->error;
        }

        $connection->close();

        }else{
            echo "<p style='color: red;'>Wypełnij wszystkie pola</p>";
        }
    }
       
?>