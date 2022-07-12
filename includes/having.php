<div class="description">
    <h2>Having:   <label> Quantidade de tickets por voo </label></h2> 
</div>

<div class="table">
    <table id="myTable">
        <tr class="table_titles">
            <th>CodVoo</th>
            <th>Tickets</th>
        </tr>
        <?php
            $i = 1;
            $conexao = mysqli_connect("localhost","root","","cia_aerea");
            $sql = "Select codvoo from voo;";
            $buscar = mysqli_query($conexao, $sql);
            while($dados=mysqli_fetch_array($buscar)){
                $codvoo = $dados['codvoo'];
                $sql2 = "SELECT count(*) as qt FROM voo join ticket on(ticket.CodVoo = voo.CodVoo) group by ticket.CodVoo having CodVoo = $codvoo;";
                $query = mysqli_query($conexao, $sql2);
                while($dados2 = mysqli_fetch_array($query)){

        ?>
        <tr class="table_body">
            <td id="<?php echo $dados['codvoo'];?>" class="id"><?php echo $dados['codvoo']; ?></td>
            <td><?php echo $dados2['qt']; ?></td>
        </tr>
        <?php
                }
            }
        ?>
    </table>
</div>  