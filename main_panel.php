<?php
    session_start();

    if(!isset($_SESSION['logged'])){
        header('Location: index.php');
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
        if($_SESSION['role'] != "admin"){
            echo "<p class='userData'><b>Login:</b> ".$_SESSION['user'];
            echo " • <b>Imię:</b> ".$_SESSION['name'];
            echo " • <b>Nazwisko:</b> ".$_SESSION['lname']."</br></p>";
            echo "<a class='logoutBtn' href='logout.php'>Wyloguj się!</a>";
        }else{
            echo "<p class='userData'><b>Login:</b> ".$_SESSION['user'];
            echo " • <b>Imię:</b> ".$_SESSION['name'];
            echo " • <b>Nazwisko:</b> ".$_SESSION['lname']."</br></p>";
            echo "<a class='adminPanelBtn' href='admin_panel.php'>Panel admina</a>";
            echo "<a class='logoutBtn' href='logout.php'>Wyloguj się!</a>";
        }
    ?>
    </header>

    <div class="container">
        <div id="title">
            <h1 id="panelTitleMain">Panel zleceń</h1>
            <input type="text" id="searchBar" placeholder="Wyszukaj">
            <button type="button" id="searchBtn">Szukaj</button>
        </div>
        
        <div id="orders">
            <ul>
                <li>ID</li>
                <li>Kontrahent</li>
                <li>Data</li>
                <li>Operacja</li>
            </ul>
        </div>
    </div>


    <footer>&copy Jakub Żbikowski</footer>
</body>

</html>