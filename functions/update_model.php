<?php
    $conn = mysqli_connect("localhost","root","","cia_aerea");
    $cod = $_POST['codvoo'];
	$startdate = $_POST['startdate'];
    $enddate = $_POST['enddate'];
    $starthour = $_POST['hourstart'];
    $endhour = $_POST['endhour'];
    $sql = "UPDATE voo set datapartida='$startdate', datachegada='$enddate', horapartida = '$starthour', horachegada = '$endhour' where codvoo = $cod;";
    mysqli_query($conn, $sql);
	header("Location:../index.php?pagina=voo");
?>