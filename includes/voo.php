<div class="description">
    <h2>Modelos:   <label> Cadastre, edite ou exclua modelos cadastrados. </label></h2> 
</div>

<div class="table">
    <div class="table-header">
        <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Digite o campo de pesquisa">
        <a href="?pagina=cad_voo">Cadastro</a>
    </div>
    <table id="myTable">
        <tr class="table_titles">
            <th>CodVoo</th>
            <th>AeroportoPartida</th>
            <th>DataPartida</th>
            <th>HoraPartida</th>
            <th>AeroportoChegada</th>
            <th>DataChegada</th>
            <th>HoraChegada</th>
            <th>CodAviao</th>
            <th>Ação</th>
        </tr>
        <?php
            $i = 1;
            $conexao = mysqli_connect("localhost","root","","cia_aerea");
            $sql = "SELECT * from voo";
            $buscar = mysqli_query($conexao, $sql);
            while($dados=mysqli_fetch_array($buscar)){
                
        ?>
        <tr class="table_body">
            <td id="<?php echo $dados['CodVoo'];?>" class="id"><?php echo $dados['CodVoo']; ?></td>
            <td><?php echo $dados['AeroportoPartida']; ?></td>
            <td><?php echo $dados['DataPartida']; ?></td>
            <td><?php echo $dados['HoraPartida']; ?></td>
            <td><?php echo $dados['AeroportoChegada']; ?></td>
            <td><?php echo $dados['DataChegada']; ?></td>
            <td><?php echo $dados['HoraChegada']; ?></td>
            <td><?php echo $dados['CodAviao']; ?></td>

            <td>
                <a href="functions/edit_model.php?id=<?php echo $dados['CodVoo']; ?>"><i class='bx bxs-edit-alt'></i></a>
                <a href="functions/delete_model.php?id=<?php echo $dados['CodVoo']; ?>"><i class='bx bxs-tag-x' ></i></a>
            </td>
        </tr>
        <?php
            }
        ?>
    </table>
</div>