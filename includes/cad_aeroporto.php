<div class="content-form">
    <section class="get-in-touch" style="width:80%;margin:0px auto;">
        <h2>Cadastrar Aeroporto</h2>
       <form class="contact-form" method="post" action="functions/process_aero.php">
       <div class="row">
          <div class="form-group col-sm">
            <label class="label" for="cod">CodAeroporto</label>
            <input id="cod" class="input-text js-input" type="text" required placeholder="Digite o código do aeroporto" name="codaero">
         </div>
         <div class="form-group col-sm">
            <label class="label" for="nome">Nome</label>
            <input id="nome" class="input-text js-input" type="text" required placeholder="Digite o nome do aeroporto" name="nomeaero">
         </div>
         <div class="form-group col-sm">
            <label class="label" for="cidade">Cidade</label>
            <input id="cidade" class="input-text js-input" type="text" required placeholder="Digite a cidade " name="cityaero">
         </div>
         <div class="form-group col-sm">
            <label class="label" for="estado">Estado</label>
            <input id="estado" class="input-text js-input" type="text" required placeholder="Digite o Estado" name="stateaero">
         </div>
       </div>   
       <div class="row justify-content-end">
          <div class="form-group">
             <input class="submit-btn" type="submit" value="Cadastrar" name="cad_aero">
          </div>
       </div>
       </form>
    </section>
</div>