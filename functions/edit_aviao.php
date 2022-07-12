<link rel="stylesheet" href="../assets/css/all.css">
<link rel="shortcut icon" href="../assets/imagens/icon.png"/>
<?php 
    $conn = mysqli_connect("localhost","root","","cia_aerea");

    if(isset($_GET['id'])){

        $id = $_GET['id'];
    } else {

        $id = $_GET['id'];
    }
    $query = mysqli_query($conn,"select * from `aviao` where codaviao='$id'");
    $row = mysqli_fetch_array($query);

?>
<!--
<div class="content_viagens">
    <div class="edit_model">
        <form id="regForm-2" method="post" action="update_aviao.php?id=<?php echo $id; ?>">
            <div class="input">
                <label for="fname">Quantidade de Lugares</label>    
                <input  name="qtlugares" value="<?php echo $row['QtLugares']; ?>">
            </div>
            <br>
            <div class="input">
                <label for="fname">Tipo</label>    
                <input  name="tipo" value="<?php echo $row['Tipo']; ?>">
            </div>
        </form>
    </div>
</div>!-->
<div class="main-cad">
<div class="content-form">
    <section class="get-in-touch" style="width:80%;margin:0px auto;">
        <h2>Cadastrar Aeroporto</h2>
       <form class="contact-form" method="post" action="update_aviao.php">
       <div class="row">
          <div class="form-group col-sm">
            <label class="label" for="cod">CodAviao</label>
            <input id="cod" class="input-text js-input" type="text" required placeholder="Digite o código do aviao" name="codaviao" value="<?php echo $row['CodAviao']?>">
         </div>
         <div class="form-group col-sm">
            <label class="label" for="qt">Quantidade de lugares</label>
            <input id="qt" class="input-text js-input" type="text" required placeholder="Digite a quantidade de lugares" name="qtlugares" value="<?php echo $row['QtLugares']?>">
         </div>
         <div class="form-group col-sm">
            <label class="label" for="Tipo">Tipo</label>
            <input id="tipo" class="input-text js-input" type="text" required placeholder="Digite o tipo " name="type" value="<?php echo $row['Tipo']?>">
         </div>
       </div>   
       <div class="row justify-content-end">
          <div class="form-group">
             <input class="submit-btn" type="submit" value="Cadastrar" name="cad_airplane">
          </div>
       </div>
       </form>
    </section>
</div>
</div>