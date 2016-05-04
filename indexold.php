<meta  http-equiv="Content-Type" content="text/html; charset=utf-8" />
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body style="text-align: center">
        <form action="cadastrar.php" method="POST">
           
            <h2>Sistema de cadastro de protocolo Embrater BETA</h2>
            <br>
            <label>Nome: </label>
            <?php
            $id_arquivo = fopen('funcionarios.txt', 'r');
            echo '<select name="funcionario">';
            while (!feof($id_arquivo)) {
                // lê uma linha do arquivo
                $linha = fgets($id_arquivo, 4096);

                echo '<option>';
                print $linha;
                echo '</option>';
            }
            echo '</select>';
            fclose($id_arquivo);
            ?>
            

            <label>Posto: </label>
            <select name="posto" id="posto">
         <option>ESCRITORIO</option>
        <option>HDT</option>
                <option>UNCISAL</option>
                <option>ETSAL</option>
                <option>Portugal Ramalho</option>
                <option>Santa Monica</option>
            </select>
<br>
<br>
            <label>Motivo: </label>
            <select name="motivo" id="motivo">
                <option>ATESTADO MEDICO</option>
                <option>ATESTADO ODONTOLOGICO</option>
                <option>TRANSPORTE</option>
                <option>OUTROS</option>
            </select>      
            <label>Obs.:</label>
            <input type="text" name="outrosMotivos"/>
            <br>
            <br>
            <label>Periodo: </label>
            <input type="date" name="periodoInicio" required=""  style=" height: 40"/>
            <input type="date" name="periodoFim"  required="" style=" height: 40"/>
            <input type="hidden" name="opcao" value="cadastrar" />
            <br>
            <br>
            <input type="submit" value="Cadastrar"/>
        </form>
        <br>
        <form action="cadastrar.php" method="POST">
            <input type="submit" name="opcao" value="Listar"/>

        </form>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <form action="cadastrar.php" method="POST">
            <input type="password" name="senha"/>
            <input type="submit" name="opcao" value="ConfigurarBanco"/>

        </form>
    </body>
</html>

