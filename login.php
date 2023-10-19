<?php  

    session_start();

    if((!isset($_POST['login'])) || (!isset($_POST['password']))){
        header('Location: index.php');
        exit();
    }

    require_once "db_connect.php";

    //Open connect to db
    $dbconnect = @new mysqli($host, $db_user, $db_password, $db_name);

    //Db error handling
    if($dbconnect->connect_errno){
        echo "Error: ".$dbconnect->connect_errno;
    }else{
        $login = $_POST['login'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM users WHERE user='$login' AND pass='$password'";

        if($result = @$dbconnect->query($sql)){
            $how_much_users = $result->num_rows;
            //Prawidłowe zalogowanie do systemu
            if($how_much_users>0){
                $row = $result->fetch_assoc();
                $_SESSION['user'] = $row['user'];
                $_SESSION['name'] = $row['name'];
                $_SESSION['lname'] = $row['lname'];
                $_SESSION['role'] = $row['role'];

                if($row['role'] != "admin"){
                    $_SESSION['logged'] = true;
                    $_SESSION['id'] = $row['id'];
                    unset($_SESSION['login_error']);
                    $result->free_result();
                    header('Location: main_panel.php');
                }else{
                    $_SESSION['logged'] = true;
                    $_SESSION['id'] = $row['id'];
                    unset($_SESSION['login_error']);
                    $result->free_result();
                    header('Location: admin_panel.php');
                }
            // Nieprawidlowe zalogowanie (bledne dane)
            }else{
                $_SESSION['login_error'] = '<span style="color:red">Nieprawidłowy login lub hasło!</span>';
                header('Location: index.php');
            }
        }

        $dbconnect->close();
    }


?>