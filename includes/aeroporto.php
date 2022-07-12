<div class="description">
    <h2>Modelos:   <label> Cadastre, edite ou exclua modelos cadastrados. </label></h2> 
</div>

<div class="table">
    <div class="table-header">
        <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Digite o campo de pesquisa">
        <a href="?pagina=cad_aero">Cadastro</a>
    </div>
    <table id="myTable">
        <tr class="table_titles">
            <th>CodAeroporto</th>
            <th>Nome</th>
            <th>Cidade</th>
            <th>Estado</th>

        </tr>
        <?php
            $i = 1;
            $conexao = mysqli_connect("localhost","root","","cia_aerea");
            $sql = "SELECT * from aeroporto;";
            $buscar = mysqli_query($conexao, $sql);
            while($dados=mysqli_fetch_array($buscar)){
                
        ?>
        <tr class="table_body">
            <td id="<?php echo $dados['CodAeroporto'];?>" class="id"><?php echo $dados['CodAeroporto']; ?></td>
            <td><?php echo $dados['Nome']; ?></td>
            <td><?php echo $dados['Cidade']; ?></td>
            <td><?php echo $dados['Estado']; ?></td>


            <td>
                <a href="functions/edit_aeroporto.php?id=<?php echo $dados['CodAeroporto']; ?>"><i class='bx bxs-edit-alt'></i></a>
                <a href="functions/delete_aeroporto.php?id=<?php echo $dados['CodAeroporto']; ?>"><i class='bx bxs-tag-x' ></i></a>
            </td>
        </tr>
        <?php
            }
        ?>
    </table>
</div>