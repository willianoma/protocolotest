<meta name="viewport" content="width=320" charset="utf-8">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">


<html>
<head>
    <link rel="stylesheet" type="text/css" href="theme.css">
    <meta charset="UTF-8">
    <title></title>
</head>
<body style="text-align: center">
    <form action="cadastrar.php" method="POST">

     <div style="background-color: ">
        <label style="font-size: 20px">Protocolo Embrater BETA</label>
    </div>
    <hr size="50">

    <div>

        <label>Nome</label>
    </div>
    <div>

        <?php
        $id_arquivo = fopen('funcionarios.txt', 'r');
        echo '<select class="form-control" name="funcionario">';
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

    </div>

    <div>
        <label>Posto</label>
    </div>

    <div>
        <select class="form-control"  name="posto" id="posto">
           <option>ESCRITORIO</option>
           <option>HDT</option>
           <option>UNCISAL</option>
           <option>ETSAL</option>
           <option>Portugal Ramalho</option>
           <option>Santa Monica</option>
       </select>
   </div>
   <div>
       <label>Motivo: </label>
   </div>

   <div>

       <select name="motivo" class="form-control"  id="motivo">
        <option>ATESTADO MEDICO</option>
        <option>ATESTADO ODONTOLOGICO</option>
        <option>TRANSPORTE</option>
        <option>ESCRITÓRIO MATRIZ</option>
        <option>OUTROS</option>
    </select>      
</div>

<div>

    <label>Observações</label>
</div>

<div>
    <input type="text" placeholder="Obs." class="form-control"  name="outrosMotivos"/>
</div>

<div style="margin-bottom: -5px !important;">
    <label>Periodo</label>
</div>

<div >
    <div style="margin-left: 5px; margin-right: 5px; margin-top: 0px !important;">
        <spam>Inicio</spam>
        <input type="date" placeholder="data" class="form-control" name="periodoInicio" required=""  style=" height: 40"/>
        <spam>Fim</spam>

        <input type="date" class="form-control" name="periodoFim"  required="" style=" height: 40"/>
        <br>
        <input type="hidden" name="opcao" value="cadastrar" />
    </div>
</div>
<br>
<div>
    <input type="submit" class="form-control" value="Cadastrar"/>
</div>

</form>
<div>

    <form action="cadastrar.php" method="POST">
        <input type="submit" name="opcao" class="form-control" value="Listar"/>

    </form>
</div>



</body>
</html>

