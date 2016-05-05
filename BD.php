<?php
$banco = "embraterbeta2";
$usuario = "root";
$senha = "";
$hostname = "localhost";
$conn = mysql_connect($hostname, $usuario, $senha);

mysql_query("SET NAMES 'utf8'");
mysql_query('SET character_set_connection=utf8');
mysql_query('SET character_set_client=utf8');
mysql_query('SET character_set_results=utf8');
mysql_select_db($banco) ;
if (!$conn) {
    echo "Não foi possível conectar ao banco MySQL.
";
    exit;
} else {
//    echo "Parabéns!! A conexão ao banco de dados ocorreu normalmente!.";
}
?>

<?php

//$banco = "megavisita";
//$usuario = "root";
//$senha = "";
//$hostname = "localhost";
//$conn = mysql_connect($hostname, $usuario, $senha);
//mysql_select_db($banco) ;
//if (!$conn) {
//    echo "Não foi possível conectar ao banco MySQL.
//";
//    exit;
//} else {
////    echo "Parabéns!! A conexão ao banco de dados ocorreu normalmente!.";
//}
?>
