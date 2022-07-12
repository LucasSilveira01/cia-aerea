<div class="description">
    <h2>Left Join:   <label> Aviões que não possuem voo relacionado </label></h2> 
</div>

<div class="table">
    <table id="myTable">
        <tr class="table_titles">
            <th>CodAviao</th>
            <th>QtLuagres</th>
            <th>Tipo</th>
        </tr>
        <?php
            $i = 1;
            $conexao = mysqli_connect("localhost","root","","cia_aerea");
            $sql = "select * from aviao left join voo on(aviao.CodAviao = voo.CodAviao) having voo.codvoo is null;";
            $buscar = mysqli_query($conexao, $sql);
            while($dados=mysqli_fetch_array($buscar)){
        ?>
        <tr class="table_body">
            <td id="<?php echo $dados[0];?>" class="id"><?php echo $dados[0]; ?></td>
            <td><?php echo $dados['QtLugares']; ?></td>
            <td><?php echo $dados['Tipo']; ?></td>
        </tr>
        <?php
            }
            
        ?>
    </table>

</div>  