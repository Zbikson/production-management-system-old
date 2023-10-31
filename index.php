<?php
    session_start();

    if((isset($_SESSION['logged'])) && ($_SESSION['logged']==true) && ($_SESSION['role'] = "admin")){
        header('Location: admin_panel.php');
        exit();
    }else if ((isset($_SESSION['logged'])) && ($_SESSION['logged']==true) && ($_SESSION['role'] = "employee")){
        header('Location: main_panel.php');
        exit();
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/indexStyle.css">
    <script src="https://kit.fontawesome.com/167081539d.js" crossorigin="anonymous"></script>
    <title>PMS - Production Management System</title>
</head>

<body>
    <header>
        <form action="login.php" method="post">
            <h2>PMS - Login</h2>
            <input type="text" name="login" placeholder="Login">
            <input type="password" name="password" placeholder="Hasło">
            <button type="submit">Zaloguj</button>

            <?php
                if(isset($_SESSION['login_error'])) echo $_SESSION['login_error'];
            ?>
        </form>
    </header>

    <!-- <footer>PMS &copy Jakub Żbikowski</footer> -->
</body>

</html>