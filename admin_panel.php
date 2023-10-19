<?php
    session_start();

    if(!isset($_SESSION['logged'])){
        header('Location: index.php');
        exit;
    }

    if($_SESSION['role'] != "admin"){
        header('Location: main_panel.php');
        exit;
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/panelStyle.css">
    <title>PMS - Production Management System</title>
</head>

<body>
    <header>
        <h1 class="pmsTitle">PMS - Production Management System</h1>
        <?php
            echo "<p class='userData'><b>Login:</b> ".$_SESSION['user'];
            echo " • <b>Imię:</b> ".$_SESSION['name'];
            echo " • <b>Nazwisko:</b> ".$_SESSION['lname']."</br></p>";
            echo "<a class='adminPanelBtn' href='main_panel.php' id='panelBtn'>Panel zleceń</a>";
            echo "<a class='logoutBtn' href='logout.php'>Wyloguj się!</a>";
        ?>
    </header>

    <div class="container">
        <h1 id="panelTitleAdmin">Panel administratora</h1>

        <div class="items">
            <div id="addItem">+</br>Dodaj zlecenie</div>
            <div id="addItem">+</br>Dodaj pracownika</div>
            <div id="addItem">+</br>Utwórz procesy</div>
        </div>
        
    </div>
    <footer>&copy Jakub Żbikowski</footer>
</body>

</html>