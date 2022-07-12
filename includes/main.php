<style>
    .centered {
        position: absolute;
        top: 25%;
        left: 50%;
        transform: translate(-50%, -50%);
    }
    ::-webkit-calendar-picker-indicator {
    filter: invert(1);
    }
    input[type=submit] {
      background-color: #00ffdb !important;
      border-radius: 12px;
      color: #e9e9e9;
      font-weight: bold;
      width: 150px !important;
      height: 50px !important;
      margin-top: 50px;
    }

</style>
<div class="container">
    <div class="page">
  <div class="container container-login">
    <div class="left">
      <div class="login" style="text-align: center; background-image: url('assets/imagens/travels.jpg')">
            <h2 class="centered">Selecione a sua melhor passagem!</h2>
      </div>
      <div class="eula"></div>
    </div>
    <div class="right">
      <form method="post" class="contact-form" action="?pagina=search">
          <div class="form">
            <label for="partida_id">Selecione a cidade de partida</label>
            <select name="partida" id="partida_id">
            <?php
                $conn = mysqli_connect("localhost", "root", "","cia_aerea");
                $sql = "select DISTINCT a.cidade, a.nome,v.aeroportopartida from voo v join aeroporto a on(v.aeroportopartida = a.codaeroporto);";
                $query = mysqli_query($conn, $sql);
                while($dados = mysqli_fetch_array($query)){
                    $aero_id = $dados['aeroportopartida'];
                    $partida = $dados['cidade'];
                    $aero_nome = $dados['nome'];
                    echo "<option id='$aero_id' value='$aero_id'> $partida - $aero_nome </option>";
                }
            ?>
            </select>

            <label for="destino_id">Selecione a cidade de destino</label>
            <select name="destino" id="destino_id">
                <option value="">Selecione o Destino</option>
            <?php
                /*$conn = mysqli_connect("localhost", "root", "","cia_aerea");
                $sql = "select DISTINCT a.cidade, a.nome from voo v join aeroporto a on(v.aeroportochegada = a.codaeroporto);";
                $query = mysqli_query($conn, $sql);
                while($dados = mysqli_fetch_array($query)){
                    $partida = $dados['cidade'];
                    $aero_nome = $dados['nome'];
                    echo "<option id='$aero_nome'> $partida - $aero_nome </option>";
                }
                
                */
            ?>
            </select>
            <?php
                /*$sql = "(SELECT DataPartida FROM voo group by datapartida ORDER BY DataPartida DESC LIMIT 1) UNION (SELECT DataPartida FROM voo group by datapartida ORDER BY DataPartida ASC LIMIT 1);";
                $query = mysqli_query($conn, $sql);
                $datas = array();
                while($row=mysqli_fetch_array($query)){
                    array_push($datas, $row['DataPartida']);
                }
                $max = $datas[0];
                $min = $datas[1];
                $min = new DateTime($min);
                $max = new DateTime($max);*/
            ?>
            <label for="start">Data de partida:</label>
            <input type="date" id="start" name="trip-start"></input>
            <div class="row justify-content-end">
               <div class="form-group">
                  <input class="login-btn" type="submit" value="Procurar" name="btn_submit">
               </div>
            </div>  
          </div>
      </form>
    </div>
  </div>
</div>
</div>
<script>
    $("#partida_id").change(function(){
        var status = $(this).val();
        $('#destino_id').empty();

        $.ajax({
            data: {origin: status},
            url: 'functions/process_city.php',
            type: 'post',
        success: function(response){
            var data = JSON.parse(response);    //Response should be array like option1 , option2, option3
            var option = "<option value=''>Selecione o destino</option>";

            for (var i=0;i<data.length;i++){
                option += '<option value="'+ data[i].val + '">' + data[i].cidade +" - "+data[i].nome + '</option>';
            }
            //Now populate the second dropdown i.e "Sub Category"
            $('#destino_id').append(option);
            //console.log(data[0].nome);
        },
        error: function(){
            alert('failure');
        }
        });
    });
    $("#destino_id").change(function(){
        var status = $(this).val();
        var partida = $("#partida_id").val();
        $.ajax({
            data: {destino: status, origin: partida},
            url: 'functions/process_date.php',
            type: 'POST',
        success: function(response){
            var data = JSON.parse(response);    //Response should be array like option1 , option2, option3
            var input = document.getElementById("start");
            input.setAttribute("min", data[0].min);
            input.setAttribute("max", data[0].max);
        },
        error: function(){
            alert('failure');
        }
        });
    })
</script>