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
    <script src="https://kit.fontawesome.com/167081539d.js" crossorigin="anonymous"></script>
    <script defer src="script.js"></script>
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
            echo "<a class='logoutBtn' href='logout.php'><i id='logout' class='fa-solid fa-right-to-bracket'></i>Wyloguj</a>";
        ?>
    </header>

    <div class="container">
        <h1 id="panelTitleAdmin">Panel administratora</h1>

        <div class="items">
            <button data-modal-target="#modal" id="addItemBtn">
                <i class="fa-solid fa-plus"></i></br>
                <p>Dodaj zlecenie</p>
            </button>

            <button data-modal-target="#modal2" id="addItemBtn">
                <i class="fa-solid fa-user-plus"></i></br>
                <p>Dodaj pracownika</p>
            </button>

            <button data-modal-target="#modal3" id="addItemBtn">
                <i class="fa-solid fa-gears"></i></br>
                <p>Utwórz procesy</p>
            </button>

            <button data-modal-target="#modal4" id="addItemBtn">
                <i class="fa-solid fa-users-gear"></i></br>
                <p>Zarządzanie pracownikami</p>
            </button>
        </div>
    </div>
    
    <div class="modal active" id="modal">
        <div class="modal-header">
            <div class="title">Dodaj zlecenie</div>
            <button data-close-button class="close-button">&times;</button>
        </div>
        <div class="modal-body">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut numquam eligendi rem vel sint quidem iste, nihil iusto pariatur architecto similique quam in dolore iure incidunt earum reiciendis fugit suscipit consequuntur, delectus unde reprehenderit qui dolorem inventore? Beatae qui quasi commodi provident cum nam debitis iste nihil ducimus, laborum cupiditate, nemo ab quia minima. Architecto quo quasi esse rem! Numquam nisi reprehenderit ut adipisci soluta molestias iste asperiores, minus facere aliquam tenetur eligendi fugiat quo aspernatur vitae delectus mollitia illo.
        </div>
    </div>

    <div class="modal active" id="modal2">
        <div class="modal-header">
            <div class="title">Modal2</div>
            <button data-close-button class="close-button">&times;</button>
        </div>
        <div class="modal-body">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolor amet optio ipsum! Consequuntur animi quod, sed voluptatibus aut commodi dolore aliquam mollitia quisquam tempora quae doloribus. Harum eveniet perspiciatis obcaecati saepe placeat fuga mollitia assumenda modi dolorem, aut corporis dignissimos consequatur ullam, fugit doloribus aperiam a error recusandae optio iusto excepturi. Tenetur deserunt necessitatibus aliquid voluptatum ea tempora itaque id?
        </div>
    </div>

    <div class="modal active" id="modal3">
        <div class="modal-header">
            <div class="title">Modal3</div>
            <button data-close-button class="close-button">&times;</button>
        </div>
        <div class="modal-body">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolor amet optio ipsum! Consequuntur animi quod, sed voluptatibus aut commodi dolore aliquam mollitia quisquam tempora quae doloribus. Harum eveniet perspiciatis obcaecati saepe placeat fuga mollitia assumenda modi dolorem, aut corporis dignissimos consequatur ullam, fugit doloribus aperiam a error recusandae optio iusto excepturi. Tenetur deserunt necessitatibus aliquid voluptatum ea tempora itaque id?
        </div>
    </div>

    <div class="modal active" id="modal4">
        <div class="modal-header">
            <div class="title">Zarządzanie pracownikami</div>
            <button data-close-button class="close-button">&times;</button>
        </div>
        <div class="modal-body">

            <?php
                require_once "db_connect.php";
                $connection = @new mysqli($host, $db_user, $db_password, $db_name);
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
            ?>

        </div>
    </div>

    <div class="active" id="overlay"></div>

    <!-- <footer>PMS &copy Jakub Żbikowski</footer> -->
</body>

</html>