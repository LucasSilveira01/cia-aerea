<div class="content-form">
    <section class="get-in-touch" style="width:80%;margin:0px auto;">
        <h2>Cadastrar Aeroporto</h2>
       <form class="contact-form" method="post" action="functions/process_voo.php">
       <div class="row">
          <div class="form-group col-sm">
            <label class="label" for="cod">CodVoo</label>
            <input id="cod" class="input-text js-input" type="text" required placeholder="Digite o código do voo" name="codvoo">
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
                        echo '<option value="'.$cod.'" > '.$buscar['Nome'].'</option>';
                    }
                ?>
            </select>

        </div>
        <div class="form-group col-sm">
            <label class="label" for="startdate">Data Partida</label>
            <input id="startdate" class="input-text js-input" type="date" required name="startdate">
         </div>
         <div class="form-group col-sm">
            <label class="label" for="starthour">Hora Partida</label>
            <input id="starthour" class="input-text js-input" type="text" required placeholder="Digite a hora " name="hourstart">
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
                        echo '<option value="'.$cod.'" > '.$buscar['Nome'].'</option>';
                    }
                ?>
            </select>

        </div>
        <div class="form-group col-sm">
            <label class="label" for="enddate">Data Chegada</label>
            <input id="enddate" class="input-text js-input" type="date" required name="enddate">
         </div>
         <div class="form-group col-sm">
            <label class="label" for="endhour">Hora Chegada</label>
            <input id="endhour" class="input-text js-input" type="text" required placeholder="Digite a hora " name="endhour">
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
                        echo '<option value="'.$cod.'" > '.$buscar['Tipo'].'</option>';
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