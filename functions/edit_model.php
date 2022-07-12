<link rel="stylesheet" href="../assets/css/all.css">
<link rel="shortcut icon" href="../assets/imagens/icon.png"/>
<?php 
    $conn = mysqli_connect("localhost","root","","cia_aerea");

    if(isset($_GET['id'])){

        $id = $_GET['id'];
    } else {

        $id = $_GET['id'];
    }
    $query = mysqli_query($conn,"select * from `voo` where codvoo='$id'");
    $row = mysqli_fetch_array($query);

?>
<!--
<div class="content_viagens">
    <div class="edit_model">
        <form id="regForm-2" method="post" action="update_model.php?id=<?php echo $id; ?>">
            <div class="input">
                <label for="fname">Data Partida</label>    
                <input  name="startdate" value="<?php echo $row['DataPartida']; ?>">
            </div>
            <br>
            <div class="input">
                <label for="fname">Hora Partida</label>    
                <input  name="starthour" value="<?php echo $row['HoraPartida']; ?>">
            </div>
            <br>
            <div class="input">
                <label for="fname">Data Chegada</label>    
                <input  name="enddate" value="<?php echo $row['DataChegada']; ?>">
            </div>
            <div class="input">
                <label for="fname">Hora Chegada</label>    
                <input  name="endhour" value="<?php echo $row['HoraChegada']; ?>">
            </div>
            <br>
        </form>
    </div>
</div>!-->
<div class="main-cad">
<div class="content-form">
    <section class="get-in-touch" style="width:80%;margin:0px auto;">
        <h2>Cadastrar Aeroporto</h2>
       <form class="contact-form" method="post" action="update_model.php">
       <div class="row">
          <div class="form-group col-sm">
            <label class="label" for="cod">CodVoo</label>
            <input id="cod" class="input-text js-input" type="text" required placeholder="Digite o código do voo" name="codvoo" value="<?php echo $row['CodVoo']; ?>">
         </div>
         <div class="form-group col-sm">
            <label class="label" for="partida">Aeroporto de partida</label>
            <select name="partida" id="partida">
                <?php
                    $conn = mysqli_connect("localhost", "root", "", "cia_aerea");
                    $sql = "select * from aeroporto";
                    $query = mysqli_query($conn, $sql);
                    while($buscar = mysqli_fetch_array($query)){
                        $cod = $buscar['CodAeroporto'];
                        if($cod == $row['AeroportoPartida']){
                            echo '<option value="'.$cod.'" selected="selected"> '.$buscar['Nome'].'</option>';

                        }else{
                            echo '<option value="'.$cod.'" > '.$buscar['Nome'].'</option>';

                        }
                    }
                ?>
            </select>

        </div>
        <div class="form-group col-sm">
            <label class="label" for="startdate">Data Partida</label>
            <input id="startdate" class="input-text js-input" type="date" required name="startdate" value="<?php echo $row['DataPartida']; ?>">
         </div>
         <div class="form-group col-sm">
            <label class="label" for="starthour">Hora Partida</label>
            <input id="starthour" class="input-text js-input" type="text" required placeholder="Digite a hora " name="hourstart" value="<?php echo $row['HoraPartida']; ?>">
         </div>
        </div>  
        <div class="row">
        <div class="form-group col-sm">
            <label class="label" for="chegada">Aeroporto de Chegada</label>
            <select name="chegada" id="chegada">
                <?php
                    $sql = "select * from aeroporto";
                    $query = mysqli_query($conn, $sql);
                    while($buscar = mysqli_fetch_array($query)){
                        $cod = $buscar['CodAeroporto'];
                        if($cod == $row['AeroportoChegada']){
                            echo '<option value="'.$cod.'" selected="selected"> '.$buscar['Nome'].'</option>';

                        }else{
                            echo '<option value="'.$cod.'" > '.$buscar['Nome'].'</option>';
                            
                        }
                    }
                ?>
            </select>

        </div>
        <div class="form-group col-sm">
            <label class="label" for="enddate">Data Chegada</label>
            <input id="enddate" class="input-text js-input" type="date" required name="enddate" value="<?php echo $row['DataChegada']; ?>">
         </div>
         <div class="form-group col-sm">
            <label class="label" for="endhour">Hora Chegada</label>
            <input id="endhour" class="input-text js-input" type="text" required placeholder="Digite a hora " name="endhour" value="<?php echo $row['HoraChegada']; ?>">
         </div>

        </div> 
        <div class="row">
            <label class="label"for="aviao">Selecione o Avião</label>
            <select name="aviao" id="aviao">
                <?php
                    $sql = "select * from aviao";
                    $query = mysqli_query($conn, $sql);
                    while($buscar = mysqli_fetch_array($query)){
                        $cod = $buscar['CodAviao'];
                        if($cod == $row['CodAviao']){
                            echo '<option value="'.$cod.'" selected = "selected"> '.$buscar['Tipo'].'</option>';

                        }else{
                            echo '<option value="'.$cod.'" > '.$buscar['Tipo'].'</option>';
                            
                        }
                    }
                ?>
            </select>
        </div>
       <div class="row justify-content-end">
          <div class="form-group">
             <input class="submit-btn" type="submit" value="Cadastrar" name="cad_voo">
          </div>
       </div>
       </form>
    </section>
</div>

</div>