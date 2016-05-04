<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Embrater</title>

    <!-- CSS -->
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/form-elements.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
            <![endif]-->

            <!-- Favicon and touch icons -->
            <link rel="shortcut icon" href="assets/ico/favicon.png">
            <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
            <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
            <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
            <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">

        </head>

        <body>

            <!-- Top content -->
            <div class="top-content">

                <div class="inner-bg">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-8 col-sm-offset-2 text">
                                <h1><strong>EMBRATER</strong> <br> Sistema de protocolo</h1>
                                <div class="description">


                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 col-sm-offset-3 form-box">
                               <div class="form-top">
                                  <div class="form-top-left">
                                     <h3>Cadatro de faltas</h3>
                                     <p>Preencha todos os campos</p>
                                 </div>
                                 <div class="form-top-right">
                                   <i class="fa fa-lock"></i>
                               </div>
                           </div>
                           <div class="form-bottom">
                               <form role="form" action="cadastrar.php" method="post" class="login-form">  

                                <div class="form-group">
                                    <label class="" for="form-username">Funcionário</label>
                                    <?php
                                    $id_arquivo = fopen('funcionarios.txt', 'r');
                                    echo '<select class="form-control" name="funcionario">';
                                    while (!feof($id_arquivo)) {
                                // lê uma linha do arquivo
                                        $linha = fgets($id_arquivo, 4096);

                                        echo '<option name="form-funionario" placeholder="funionario" class="form-control" id="form-funionario">';
                                        print $linha;
                                        echo '</option>';
                                    }
                                    echo '</select>';
                                    fclose($id_arquivo);
                                    ?>

                                </div>

                                <div class="form-group">
                                    <label class="" for="form-posto">Posto</label>


                                    <select type="text" name="posto" placeholder="posto..." class="form-control" id="posto">
                                       <option>HDT</option>
                                       <option>UNCISAL</option>
                                       <option>ETSAL</option>
                                       <option>PORTUGAL RAMALHO</option>
                                       <option>SANTA MONICA</option>
									   <option>ESCRITORIO</option>
                                   </select>

                               </div>

                               <div class="form-group">
                                <label class="" for="form-username">Motivo</label>
                                <select type="text" name="motivo" placeholder="Motivo..." class="form-control" id="motivo">
                                    <option>ATESTADO MEDICO</option>
                                    <option>ATESTADO ODONTOLOGICO</option>
                                    <option>TRANSPORTE</option>
                                    <option>ESCRITÓRIO MATRIZ</option>
                                    <option>OUTROS</option>
                                </select>    

                            </div>

                            <div class="form-group">
                                <label class="sr-only" for="form-obs">obs</label>
                                <input type="text-area" name="outrosMotivos" placeholder="obs..." class="form-control" id="form-obs">
                            </div>


                            <div class="form-group">
                                <label class="" for="form-inicio">Inicio</label>
                                <input type="date" placeholder="data" class="form-control" name="periodoInicio"  />
                            </div>

                            <div class="form-group">
                                <label class="" for="form-fim">Fim</label>
                                <input type="date" class="form-control" name="periodoFim"   />
                            </div>

                            <input type="hidden" name="opcao" value="cadastrar" />

<!--
                    <div class="form-group">
                        <label class="sr-only" for="form-username">Username</label>
                        <input type="text" name="form-username" placeholder="Username..." class="form-username form-control" id="form-username">
                    </div>
                -->

                <div >
                    <button type="submit" class="btn">Cadastrar</button>

                </div>
                <br>
               
                <div>
                    <button type="submit" name="opcao" class="btn" value="Listar">Listar</button>
                </div>

                
            </div>
        </form>
    </div>
</div>
</div>

<!--
<div class="row">
    <div class="col-sm-6 col-sm-offset-3 social-login">
       <h3>...or login with:</h3>
       <div class="social-login-buttons">
          <a class="btn btn-link-2" href="#">
             <i class="fa fa-facebook"></i> Facebook
         </a>
         <a class="btn btn-link-2" href="#">
             <i class="fa fa-twitter"></i> Twitter
         </a>
         <a class="btn btn-link-2" href="#">
             <i class="fa fa-google-plus"></i> Google Plus
         </a>
     </div>
 </div>
</div>
-->

</div>
</div>

</div>


<!-- Javascript -->

<script src="assets/js/jquery-1.11.1.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/js/jquery.backstretch.min.js"></script>
<script src="assets/js/scripts.js"></script>

        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
            <![endif]-->

        </body>

        </html>