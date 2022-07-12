<link rel="stylesheet" href="../assets/css/all.css">
<link rel="shortcut icon" href="../assets/imagens/icon.png"/>
<?php 
    $conn = mysqli_connect("localhost","root","","cia_aerea");

    if(isset($_GET['id'])){

        $id = $_GET['id'];
    } else {

        $id = $_GET['id'];
    }
    $query = mysqli_query($conn,"select * from `aeroporto` where codaeroporto='$id'");
    $row = mysqli_fetch_array($query);

?>
<!--<div class="content_viagens">
    <div class="edit_model">
        <form id="regForm-2" method="post" action="update_aeroporto.php?id=<?php echo $id; ?>">
            <div class="input">
                <label for="fname">Nome</label>    
                <input  name="nome" value="<?php echo $row['Nome']; ?>">
            </div>
            <br>
            <div class="input">
                <label for="fname">Cidade</label>    
                <input  name="cidade" value="<?php echo $row['Cidade']; ?>">
            </div>
            <div class="input">
                <label for="fname">Estado</label>    
                <input  name="estado" value="<?php echo $row['Estado']; ?>">
            </div>
        </form>
    </div>
</div>!-->
<div class="main-cad">
    <div class="content-form">
        <section class="get-in-touch" style="width:80%;margin:0px auto;">
            <h2>Cadastrar Aeroporto</h2>
           <form class="contact-form" method="post" action="update_aeroporto.php">
           <div class="row">
              <div class="form-group col-sm">
                <label class="label" for="cod">CodAeroporto</label>
                <input id="cod" class="input-text js-input" type="text" required placeholder="Digite o código do aeroporto" name="codaero" value="<?php echo $row['CodAeroporto']?>">
             </div>
             <div class="form-group col-sm">
                <label class="label" for="nome">Nome</label>
                <input id="nome" class="input-text js-input" type="text" required placeholder="Digite o nome do aeroporto" name="nomeaero"value="<?php echo $row['Nome']?>">
             </div>
             <div class="form-group col-sm">
                <label class="label" for="cidade">Cidade</label>
                <input id="cidade" class="input-text js-input" type="text" required placeholder="Digite a cidade " name="cityaero"value="<?php echo $row['Cidade']?>">
             </div>
             <div class="form-group col-sm">
                <label class="label" for="estado">Estado</label>
                <input id="estado" class="input-text js-input" type="text" required placeholder="Digite o Estado" name="stateaero"value="<?php echo $row['Estado']?>">
             </div>
           </div>   
           <div class="row justify-content-end">
              <div class="form-group">
                 <input class="submit-btn" type="submit" value="Alterar" name="cad_aero">
              </div>
           </div>
           </form>
        </section>
    </div>

</div>