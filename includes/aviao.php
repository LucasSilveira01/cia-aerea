<div class="description">
    <h2>Modelos:   <label> Cadastre, edite ou exclua modelos cadastrados. </label></h2> 
</div>

<div class="table">
    <div class="table-header">
        <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Digite o campo de pesquisa">
        <a href="?pagina=cad_airplane">Cadastro</a>
    </div>
    <table id="myTable">
        <tr class="table_titles">
            <th>CodAviao</th>
            <th>QtdLugares</th>
            <th>Tipo</th>
        </tr>
        <?php
            $i = 1;
            $conexao = mysqli_connect("localhost","root","","cia_aerea");
            $sql = "SELECT * from aviao";
            $buscar = mysqli_query($conexao, $sql);
            while($dados=mysqli_fetch_array($buscar)){
                
        ?>
        <tr class="table_body">
            <td id="<?php echo $dados['CodAviao'];?>" class="id"><?php echo $dados['CodAviao']; ?></td>
            <td><?php echo $dados['QtLugares']; ?></td>
            <td><?php echo $dados['Tipo']; ?></td>

            <td>
                <a href="functions/edit_aviao.php?id=<?php echo $dados['CodAviao']; ?>"><i class='bx bxs-edit-alt'></i></a>
                <a href="functions/delete_aviao.php?id=<?php echo $dados['CodAviao']; ?>"><i class='bx bxs-tag-x' ></i></a>
            </td>
        </tr>
        <?php
            }
        ?>
    </table>
</div>