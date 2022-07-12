<div class="description">
    <h2>Modelos:   <label> Cadastre, edite ou exclua modelos cadastrados. </label></h2> 
</div>

<div class="table">
    <table id="myTable">
        <tr class="table_titles">
            <th>CodTicket</th>
            <th>Cliente</th>
            <th>Passageiro</th>
            <th>CodVoo</th>
        </tr>
        <?php
            $i = 1;
            $conexao = mysqli_connect("localhost","root","","cia_aerea");
            $sql = "SELECT c.nome as comprador, p.nome as passageiro, t.codticket, t.codvoo FROM ticket t join cliente c on (t.comprador = c.cpf) join passageiro p on(t.passageiro = p.cpf) group by t.comprador";
            $buscar = mysqli_query($conexao, $sql);
            while($dados=mysqli_fetch_array($buscar)){
                
        ?>
        <tr class="table_body">
            <td id="<?php echo $dados['codticket'];?>" class="id"><?php echo $dados['codticket']; ?></td>
            <td><?php echo $dados['comprador']; ?></td>
            <td><?php echo $dados['passageiro']; ?></td>
            <td><?php echo $dados['codvoo']; ?></td>
        </tr>
        <?php
            }
        ?>
    </table>
</div>