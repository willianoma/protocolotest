<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="script.js"></script>   
<meta  http-equiv="Content-Type" content="text/html; charset=utf-8" />

<!--echo '<meta http-equiv="refresh" content="2; url=http://mempreendimentos.com.br/megavisita">';-->

<?php

$nomeFuncionarioG = $_POST['funcionario'];
$postoG = $_POST['posto'];
$motivoG = $_POST['motivo'];


include 'BD.php';
if (!isset($_POST['opcao'])) {
  $opcao = "Listar";
} else
$opcao = $_POST['opcao'];
//var_dump($opcao);
//die();

if ($opcao == "cadastrar") {
  cadastrar($nomeFuncionarioG,$postoG,$motivoG);
}
if ($opcao == "Listar") {
  listar();
}
if ($opcao == "excluir") {
  excluir();
}
if ($opcao == "ConfigurarBanco") {
  $senha = $_POST['senha'];
  if ($senha == "12310") {
    criarTabela();
  } else
  echo "Senha Errada";
}

function tratarData($data) {
  $tratarData = explode("-", $data);
  $ano = $tratarData[0];
  $mes = $tratarData[1];
  $dia = $tratarData[2];
  $dataTratada = $dia . "-" . $mes . "-" . $ano;
  return $dataTratada;
}

function cadastrar($nomeFuncionarioG,$postoG,$motivoG) {
  $nomeFuncionario = $nomeFuncionarioG;
  $posto = $postoG;
  $motivo = $motivoG;

  $outrosMotivo = $_POST['outrosMotivos'];
  if ($outrosMotivo != NULL) {
    $motivo.= ": " . $outrosMotivo;
//          $outrosMotivo.=': ';
  }
  $periodoInicio = tratarData($_POST['periodoInicio']);
  $periodoFim = tratarData($_POST['periodoFim']);

  $sql = mysql_query("INSERT INTO protocolo(nomeFuncionario, posto, motivo, periodoInicio, periodoFim) " . "VALUES('" . $nomeFuncionario . "','" . $posto . "','" . $motivo . "','" . $periodoInicio . "','" . $periodoFim . "')");
  if ($sql) {


    echo "
    <div style='text-align: center'>
     Cadastrado com sucesso!!
     <form action='comprovante.php' method='POST'>
      <input type='text' readonly='' name='nomeFuncionario' value='$nomeFuncionario'/>
      <input type='text' readonly='' name='posto' value='$posto'/>
      <input type='text' readonly='' name='motivo' value='$motivo'/>
      <input type='text' readonly='' name='periodoInicio' value='$periodoInicio'/>
      <input type='text' readonly='' name='periodoFim' value='$periodoFim'/>

      <input type='submit' value='Emitir Comprovante'>
    </form>

   <!-- <a href='/'>Voltar</a> --> 
  </div>            



  ";
} else {
  echo "Falha ao cadastrar." . mysql_error();
}
mysql_close();
}

function excluir() {


  $idFuncionario = $_POST['idFuncionario'];

  $sql = mysql_query("DELETE FROM protocolo WHERE id='$idFuncionario'");


  if ($sql) {
    echo'Deletado com sucesso! Aguarde.';
    echo '<meta http-equiv="refresh" content="1; url=cadastrar.php">';
  } else {
    echo "Falha ao cadastrar." . mysql_error();
  }
  mysql_close();
}

function gerarComprovante() {



//    $nomeFuncionario = $_SESSION['nomeFuncionario'];
//    $posto = $_SESSION['posto']; 
//    $motivo = $_SESSION['motivo'];
//    $periodoInicio = $_SESSION['periodoInicio'];
//    $periodoFim = $_SESSION['periodoFim'];
}

function listar() {

  echo '<script>
  $(function () {
    $("#tabela input").keyup(function () {
      var index = $(this).parent().index();
      var nth = "#tabela td:nth-child(" + (index + 1).toString() + ")";
      var valor = $(this).val().toUpperCase();
      $("#tabela tbody tr").show();
      $(nth).each(function () {
        if ($(this).text().toUpperCase().indexOf(valor) < 0) {
          $(this).parent().hide();
        }
      });
    });

    $("#tabela input").blur(function () {
     $(this).val("");
   });
 });
</script>
';

$sql = "select * from protocolo";
$result = mysql_query($sql) or die(mysql_error());
$lista = array();
echo '<table border="1" id="tabela" >';

echo' <tr style="text-align: center">
<td style="font-weight: bold;">Id</td>
<td style="font-weight: bold;">Nome Funcionario</td>
<td style="font-weight: bold;">Posto</td>
<td style="font-weight: bold;">Motivo</td>
<td style="font-weight: bold;">Periodo Inicio</td>
<td style="font-weight: bold;">Periodo fim</td>
<td style="font-weight: bold;" colspan="2">Comprovante</td>
</tr>



<th><input type="text" id="txtColuna1" style="width: 100%;"  /></th>
<th><input type="text" id="txtColuna2" style="width: 100%;" /></th>
<th><input type="text" id="txtColuna3" style="width: 100%;" /></th>
<th><input type="text" id="txtColuna4" style="width: 100%;" /></th>
<th><input type="text" id="txtColuna5" style="width: 100%;" /></th>
<th><input type="text" id="txtColuna6" style="width: 100%;" /></th>




</tr>
<a href="\protocolo">Voltar</a>        ';


while ($dados = mysql_fetch_array($result)) {
  $idFuncionario = $dados['id'];
  $nomeFuncionario = $dados['nomeFuncionario'];
  $posto = $dados['posto'];
  $motivo = $dados['motivo'];
  $periodoInicio = $dados['periodoInicio'];
  $periodofim = $dados['periodoFim'];

  echo "

  <tr style='text-align: center'>
    <td>$idFuncionario</td>
    <td>$nomeFuncionario</td>
    <td>$posto</td>
    <td>$motivo</td>
    <td>$periodoInicio</td>
    <td>$periodofim</td>
    <td>
      <form action='comprovante.php' method='POST'>
       <input type='text' readonly='' hidden='' name='nomeFuncionario' value='$nomeFuncionario'/>
       <input type='text' readonly='' hidden='' name='posto' value='$posto'/>
       <input type='text' readonly='' hidden='' name='motivo' value='$motivo'/>
       <input type='text' readonly='' hidden='' name='periodoInicio' value='$periodoInicio'/>
       <input type='text' readonly='' hidden='' name='periodoFim' value='$periodofim'/>
       <input type='submit' value='Comprovante'>             
     </form>


   </td>
   <td>
    <form action='cadastrar.php' method='POST'>
      <input type='hidden' name='idFuncionario' value='$idFuncionario'/>
      <input type='hidden' name='opcao' value='excluir' />
      <input type='submit' value='Deletar'>
    </form>

  </td>
</tr>

";
}
echo '</table>';
}

function criarTabela() {
/*
    $sql = mysql_query("CREATE TABLE IF NOT EXISTS `protocolo` (
    `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `nomeFuncionario` varchar(255) NOT NULL,
    `posto` varchar(255) NOT NULL,
    `motivo` varchar(255) NOT NULL,
    `periodoInicio` varchar(255) NOT NULL,
    `periodoFim` varchar(255) NOT NULL,
    UNIQUE KEY `id` (`id`)
    ) ENGINE = InnoDB DEFAULT CHARSET = latin1 AUTO_INCREMENT = 1;");

    if ($sql) {
        echo "Criado com sucesso!!";
    } else {
        echo "Falha ao cadastrar." . mysql_error();
    }
    mysql_close();
	
	*/
  }

//var_dump($nomeFuncionario, $posto, $motivo, tratarData($periodoFim), tratarData($periodoInicio));

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */