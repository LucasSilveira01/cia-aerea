<?php
	include('includes/acesso.php');
    if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
        // last request was more than 30 minutes ago
        session_unset();     // unset $_SESSION variable for the run-time 
        session_destroy();   // destroy session data in storage
    }
    $_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/all.css">
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src="https://kit.fontawesome.com/8cf4f7d7cf.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.min.js" integrity="sha512-EKWWs1ZcA2ZY9lbLISPz8aGR2+L7JVYqBAYTq5AXgBkSjRSuQEGqWx8R1zAX16KdXPaCjOCaKE8MCpU0wcHlHA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css'>
    <link rel="stylesheet" href="node_modules/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css">
    <title>CIA-Aerea</title>

</head>
<body>
    <?php
        include('includes/navbar.php');
        include('includes/sidebar.php');
        
        switch($_GET['pagina']){
            case 'main':
                echo '<div class="main-cad">';
                    include('includes/main.php');
                echo '</div>';
                break;
            case 'search':
                echo '<div class="main-cad">';
                    include('includes/search.php');
                echo '</div>';
                break;
            case 'compra':
                echo '<div class="main-cad">';
                    include('includes/buy.php');
                echo '</div>';
                break;
            case 'confcompra':
                echo '<div class="main-cad">';
                    include('includes/confcompra.php');
                echo '</div>';
                break;
            case 'ti_cli':
                echo '<div class="content_viagens">';
                    include('includes/ticketscliente.php');
                echo '</div>';
                break;
            case 'compras':
                echo '<div class="content_viagens">';
                    include('includes/compras.php');
                echo '</div>';
                break;
            case 'voo':
                echo '<div class="content_viagens">';
                    include('includes/voo.php');
                echo '</div>';
                break;
            case 'aviao':
                echo '<div class="content_viagens">';
                    include('includes/aviao.php');
                echo '</div>';
                break;
            case 'aeroporto':
                echo '<div class="content_viagens">';
                    include('includes/aeroporto.php');
                echo '</div>';
                break;
            case 'cad_aero':
                echo '<div class="main-cad">';
                    include('includes/cad_aeroporto.php');
                echo '</div>';
                break;
            case 'cad_airplane':
                echo '<div class="main-cad">';
                    include('includes/cad_aviao.php');
                echo '</div>';
                break;  
            case 'cad_voo':
                echo '<div class="main-cad">';
                    include('includes/cad_voo.php');
                echo '</div>';
                break;
            case 'having':
                echo '<div class="content_viagens">';
                    include('includes/having.php');
                echo '</div>';
                break;
            case 'join':
                echo '<div class="content_viagens">';
                    include('includes/join.php');
                echo '</div>';
                break;
        }

    ?>

<script src="assets/js/scripts.js"></script>
<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>