<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<div class="content-form">
    <?php
        $voo = $_GET['voo'];
        $conn = mysqli_connect("localhost","root", "", "cia_aerea");
        $sql = "select qtlugares from aviao natural join voo";
        $query = mysqli_query($conn, $sql);
        $dado = mysqli_fetch_array($query);
        $qtlugares = $dado['qtlugares'];
        $lugares = array();
        for($i=1; $i<=$qtlugares+1; $i++){
            array_push($lugares, $i);
        }

    ?>
        <section class="get-in-touch" style="width:80%;margin:0px auto;">
            <h2>Dados do cliente</h2>
            <form class="contact-form" method="POST" action="?pagina=confcompra&voo=<?php echo $voo;?>">
                <div class="row">
                    <div class="col-sm form-group">
                        <label class="label" for="nome">Nome</label>
                        <input id="nome" class="input-text js-input" type="text"  placeholder="Digite o nome completo" name="nome">
                    </div>
                    <div class="form-group col-sm">
                        <label class="label" for="cpf">CPF</label>
                        <input id="cpf" class="input-text js-input" type="text"  placeholder="Digite o CPF" name="cpf">
                    </div>
                </div>
                <div class="form-group col-sm">
                        <label for="choices">A passagem é para outra pessoa?</label>
                        <div id="choices">
                            <label>
                                <input type="radio" name="choice-radio" id="yes_radio" class="radio_choices" value="Sim">
                                Sim
                            </label>
                            <label>
                                <input type="radio" name="choice-radio" id="no_radio" class="radio_choices" value="Não" checked>
                                Não
                            </label>
                        </div>
                </div>
                <div class="person_data" style="display: none">
                    <div class="col-sm form-group">
                        <label class="label" for="nome">Nome</label>
                        <input id="nome" class="input-text js-input" type="text"  placeholder="Digite o nome completo" name="nome_person">
                    </div>
                    <div class="form-group col-sm">
                        <label class="label" for="cpf">CPF</label>
                        <input id="cpf" class="input-text js-input" type="text"  placeholder="Digite o CPF" name="cpf_person">
                    </div>
                </div>
                <label for="select_poltrona">Selecione a poltrona</label>
                <select name="poltrona" id="selec_poltrona">
                    <?php
                            $sql = "select * from ticket where codvoo = $voo order by poltrona asc";
                            $query = mysqli_query($conn, $sql);
                            while($dados = mysqli_fetch_array($query)){
                                for($i = 0; $i < count($lugares); $i++){
                                    if($lugares[$i] == $dados['poltrona']){
                                        unset($lugares[$i]);
                                    }
                                }
                                
                            }
                            foreach($lugares as $option){
                                echo '<option value="'.$option.'">'.$option.'</option>';
                            }
                    ?>
                </select>
                <div class="row justify-content-end">
                <div class="form-group">
                    <input class="submit-btn" type="submit" class="btn btn-primary" value="Concluir" name="submit-btn">
                </div>
            </div>
            </form>
        </section>
</div>
<script>
    $(document).ready(function(){
        $('.radio_choices').click(function() {
            if($('#yes_radio').is(':checked')) { 
                $(".person_data").css("display","flex");
            }else{
                $(".person_data").css("display","none");
            }
        });
    });
</script>