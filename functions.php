<?php

//Global connection to database
require_once("db_connect.php");
$connection = @new mysqli($host, $db_user, $db_password, $db_name);

//Function for add user in admin_panel.php
function addUserFunction(){
    global $connection;
    
    if ($_SERVER["REQUEST_METHOD"] == "POST"){ 

        if (!empty($_POST["username"]) && !empty($_POST["password"]) && !empty($_POST["name"]) && !empty($_POST["lastname"]) && !empty($_POST["role"])){

            if ($connection->connect_error) {
                die("Bląd: ". $connection->connect_error);
            }
            $username = $_POST["username"];
            if($_POST["username"] < 3){
                echo"Nazwa musi miec wiecej niz 3 znaki";
            }
            $password = $_POST["password"];
            $name = $_POST["name"];
            $lastname = $_POST["lastname"];
            $role = $_POST["role"];

            $sql = "INSERT INTO users (user, pass, name, lname, role) VALUES ('$username', '$password', '$name', '$lastname', '$role')";

            if ($connection->query($sql) === TRUE) {
                echo"<p style='color: green;'Pomyślnie dodano pracownika!</p>";
        }else{
            echo "Błąd przy dodawaniu rekordu: " . $sql . $connection->error;
        }

        $connection->close();

        }else{
            echo "<p style='color: red;'>Wypełnij wszystkie pola!</p>";
        }
    }
}

//Function for managment user in admin_panel.php
function manageUserFunction(){
    global $connection;

    if($connection->connect_error) {
        die("". $connection->connect_error);
    }

    $query = "SELECT * FROM users";
    $result = mysqli_query($connection, $query);

    if (!$connection) {
        die("Błąd połączenia z bazą danych: " . mysqli_connect_error());
    }

    if(!$result){
        die("Bład zapytania SQL: " . mysqli_error($connection));
    }

    echo "<table>";
    echo "<tr><th>ID</th><th>Pracownik</th><th>Imię</th><th>Nazwisko</th></tr>";
    
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['user'] . "</td>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['lname'] . "</td>";
        echo "</tr>";
    }
    
    echo "</table>";
}
?>