<?php
session_start();
include_once 'spojenie.php';
include_once 'funkcie.php';
?>

<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css"> 

    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
	<script src="css/custom.js"></script>
    <script src="css/mesiac.js"></script>



    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500&display=swap" rel="stylesheet">

    
    <link rel="stylesheet" href="calendar/fonts/icomoon/style.css">
  
    <link href='calendar/fullcalendar/packages/core/main.css' rel='stylesheet' />
    <link href='calendar/fullcalendar/packages/daygrid/main.css' rel='stylesheet' />
    
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="calendar/css/bootstrap.min.css">
    
    <!-- Style -->
    <link rel="stylesheet" href="calendar/css/style.css">

    <link rel="stylesheet" href="css/style.css">
</head>

<?php
if(isset($_POST['tlacidlo']))  
{  
    $user_name = isset($_POST['login']) ? checkDBInput($_POST['login']) : false;
    $user_pass = isset($_POST['heslo']) ? md5($_POST['heslo']) : false;
  
    $check_user = "SELECT Role 
                    FROM login 
                    WHERE Username = '$user_name' AND Heslo = '$user_pass'";  
  
    $run = mysqli_query($conn,$check_user);  

    if(mysqli_num_rows($run) > 0) {
        $row = mysqli_fetch_assoc($run);
        $_SESSION['role'] = $row['Role'];//here session is used and value of $user_email store in $_SESSION.  
    }
    else
        echo "<script>alert('Email or password is incorrect!')</script>";  

}?>

<body>
    <div class="navbar">
        <nav>
            <ul>
                        <li><a href="index.php">Hotel</a></li>
                        <li><a href="rezervacia.php">Rezervácia izby</a></li>
                        <li><a href="z_izby.php">Zoznam izieb</a></li>  
            <?php   if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin')  { ?>
                        <li><a href="registracia.php">Registrácia izby</a></li>
                        <li><a href="informacie.php">Informácie</a></li>
                   <?php } 
                    if (isset($_SESSION['role'])) {
                        echo '<li><a href="logout.php">Odhlásenie</a></li>'; 
                    } 
                    else 
                        echo '<li><a href="login.php">Prihlásenie</a></li>';
           ?> </ul>
        </nav>
    </div>