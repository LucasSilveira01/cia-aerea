<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<style>
    .div-passagens{
        display: grid;
        grid-template-columns: 1fr 1fr 1fr 1fr;
        background-color: rgb(220, 220, 220);
        height: fit-content;
        width: 100%;
        justify-items: stretch;
        align-items: center;
        border-radius: 12px;

    }
    .left-ticket{
        margin-top: 20px;
        grid-column: 0:1;
    }
    .right-ticket{
        grid-column: 1:2;
    }
    .third-ticket{
        grid-column: 2:3;
    }
    .fourth-ticket{
        grid-column: 3:4;
    }
    .fourth-ticket a{
        margin-left: 80px;
        border-radius: 12px;
        height: 40px;
        width: 140px;
    }
    .ticket_p{
        color: #000 !important;
    }
</style>
<div class="container">
    <div class="page">
        <div class="container container-login">
            <div class="div-passagens">
                
                <?php
                    if(isset($_POST['btn_submit'])){
                        $conn = mysqli_connect("localhost","root", "", "cia_aerea");
                        $id_partida = $_POST['partida'];
                        $id_chegada = $_POST['destino'];
                        $data = $_POST['trip-start'];
                        //get name of origin airport
                        $sql = "select nome from aeroporto where codaeroporto = $id_partida";
                        $query = mysqli_fetch_array(mysqli_query($conn, $sql));
                        $nome_origem=$query['nome'];
                        //get name of destination airport
                        $sql = "select nome from aeroporto where codaeroporto = $id_chegada";
                        $query = mysqli_fetch_array(mysqli_query($conn, $sql));
                        $nome_chegada=$query['nome'];
                        $sql = "select * from voo v join aviao a on(v.codaviao = a.codaviao) where aeroportopartida = $id_partida and aeroportochegada = $id_chegada and datapartida = '$data'";                        
                        $query = mysqli_query($conn, $sql);
                        //echo $sql;

                        while($dados = mysqli_fetch_array($query)){
                            $hora_chegada = substr($dados['HoraChegada'],0,5);
                            $hora_partida = substr($dados['HoraPartida'],0,5);
                            $tipo = $dados['Tipo'];
                            $voo = $dados['CodVoo'];
                            echo "<div class='left-ticket'>
                                    <p class='ticket_p'> Hora partida: $hora_partida </p> <br>
                                    <p class='ticket_p'> Aeroporto de origem:<br> $nome_origem </p> <br>
                                  </div>
                                  <div class='rigth-ticket'>
                                    <p class='ticket_p'> Hora chegada: $hora_chegada </p> <br>
                                    <p class='ticket_p'> Aeroporto de chegada:<br> $nome_chegada </p> 
                                  </div>
                                  <div class='third-ticket'>
                                    <p class='ticket_p'> Tipo aeronave: $tipo </p>
                                  </div>
                                  <div class='fourth-ticket'>
                                    <a class='btn btn-primary' href='?pagina=compra&voo=$voo'>Comprar</a>
                                  </div>
                                  
                            ";
                            
                        }
                    }
                ?>
            </div>
        </div>
    </div>
</div>

