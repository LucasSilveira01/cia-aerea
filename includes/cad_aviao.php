<div class="content-form">
    <section class="get-in-touch" style="width:80%;margin:0px auto;">
        <h2>Cadastrar Aeroporto</h2>
       <form class="contact-form" method="post" action="functions/process_airplane.php">
       <div class="row">
          <div class="form-group col-sm">
            <label class="label" for="cod">CodAviao</label>
            <input id="cod" class="input-text js-input" type="text" required placeholder="Digite o código do aviao" name="codaviao">
         </div>
         <div class="form-group col-sm">
            <label class="label" for="qt">Quantidade de lugares</label>
            <input id="qt" class="input-text js-input" type="text" required placeholder="Digite a quantidade de lugares" name="qtlugares">
         </div>
         <div class="form-group col-sm">
            <label class="label" for="Tipo">Tipo</label>
            <input id="tipo" class="input-text js-input" type="text" required placeholder="Digite o tipo " name="type">
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