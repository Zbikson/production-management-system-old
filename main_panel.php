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
    <link rel="stylesheet" type="text/css" href="css/main_panel_style.css">
    <script src="https://kit.fontawesome.com/167081539d.js" crossorigin="anonymous"></script>
    <title>PMS - Production Management System</title>
</head>

<body>
    <header>
        <h1 class="pms-title">PMS - Production Management System</h1>
        <?php
        if($_SESSION['role'] != "admin"){
            echo "<p class='user-data'><b>Login:</b> ".$_SESSION['user'];
            echo " • <b>Imię:</b> ".$_SESSION['name'];
            echo " • <b>Nazwisko:</b> ".$_SESSION['lname']."</br></p>";
            echo "<a class='logoutBtn' href='logout.php'><i id='logout' class='fa-solid fa-right-to-bracket'></i>Wyloguj</a>";
        }else{
            echo "<p class='user-data'><b>Login:</b> ".$_SESSION['user'];
            echo " • <b>Imię:</b> ".$_SESSION['name'];
            echo " • <b>Nazwisko:</b> ".$_SESSION['lname']."</br></p>";
            echo "<a class='adminPanelBtn' href='admin_panel.php'>Panel admina</a>";
            echo "<a class='logoutBtn' href='logout.php'><i id='logout' class='fa-solid fa-right-to-bracket'></i>Wyloguj</a>";
        }
    ?>
    </header>

    <div class="container">
        <div class="header-container">
            <h1 class="title">Panel zleceń</h1>

            <form class="search-form">
                <input type="text" id="search-bar" placeholder="Wyszukaj">
                <button type="submit" id="search-btn"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
            
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


    <!-- <footer>PMS &copy Jakub Żbikowski</footer> -->
</body>

</html>