<div class="description">
    <h2>Modelos:   <label> Cadastre, edite ou exclua modelos cadastrados. </label></h2> 
</div>

<div class="table">
    <table id="myTable">
        <tr class="table_titles">
            <th>Id_Compra</th>
            <th>Nome Cliente</th>
            <th>CPF</th>
            <th>CodTicket</th>
        </tr>
        <?php
            $i = 1;
            $conexao = mysqli_connect("localhost","root","","cia_aerea");
            $sql = "SELECT cli.nome as nome, c.cpf as cpf, c.codticket as codticket, c.id as id from compras c join cliente cli on(c.cpf = cli.cpf) group by cpf";
            $buscar = mysqli_query($conexao, $sql);
            while($dados=mysqli_fetch_array($buscar)){
                
        ?>
        <tr class="table_body">
            <td id="<?php echo $dados['id'];?>" class="id"><?php echo $dados['id']; ?></td>
            <td><?php echo $dados['nome']; ?></td>
            <td><?php echo $dados['cpf']; ?></td>
            <td><?php echo $dados['codticket']; ?></td>
        </tr>
        <?php
            }
        ?>
    </table>
</div>  