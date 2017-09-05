<!doctype html>

<!--
Autores: (Vai inserindo teu nome/nick...)

-->
<html lang="pt-br">

<head>
    <title>Selfie com Cirão</title>
    <link rel="shortcut icon" href="https://cadastro.todoscomciro.com/assets/img/logo.png" type="image/png" sizes="128x128">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="">

    <meta name="keywords" content="foto, ciro gomes, rio de janeiro, brasil, brazil, ceara, fortaleza" />"
    <meta name="ROBOTS" content="INDEX, FOLLOW" />
    <meta name="REVISIT-AFTER" content="2 DAYS" />
    <meta name="robots" content="index,follow,noodp" />
    <meta name="robots" content="noydir" />
    <meta name="slurp" content="noydir" />
    <meta name="RATING" content="GENERAL" />


    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <script>
        function mascara(t, mask) {
            var i = t.value.length;
            var saida = mask.substring(1, 0);
            var texto = mask.substring(i)
            if (texto.substring(0, 1) != saida) {
                t.value += texto.substring(0, 1);
            }
        }


        function verificar() {
            var fup = document.getElementById('arquivo');
            var fileName = fup.value;
            var ext = fileName.substring(fileName.lastIndexOf('.') + 1);

            if (ext == "jpeg" || ext == "png") {
                return true;
            } else {
                return false;
            }
        }
    </script>
    <style>
        body {
            background-image: url('https://cadastro.todoscomciro.com/assets/img/background.jpg');
            background-attachment: local;
            background-size: cover;
            background-repeat: no-repeat;
        }
        
        .vert-offset {
            margin-top: 0.5em;
        }



	/* Esconde o input */
		input[type='file'] {
		  display: none
		}

		/* Aparência que terá o seletor de arquivo */

		.upload {
		  background-color: #3498db;
		  border-radius: 5px;
		  color: #fff;
		  cursor: pointer;
		  margin: 10px;
		  padding: 6px 20px
		}


    </style>
	<script   src="https://code.jquery.com/jquery-3.1.0.js"   integrity="sha256-slogkvB1K3VOkzAI8QITxV3VzpOnkeNVsKvtkYLMjfk="   crossorigin="anonymous"></script> 

	<script src="cad.js"  language="javascript" type="text/javascript"></script>
</head>

<body oncontextmenu='return false' onselectstart='return false' ondragstart='return false'>
    <div class="container">
        <div class="row vert-offset">

            <div class="col-md-4 col-sm-4 col-md-offset-8 col-sm-offset-8">
                <div class="panel panel-default">

                    <div class="panel-heading">
                        <span class="glyphicon glyphicon-picture"></span> Envie uma selfie com Ciro Gomes!
                    </div>

                    <div class="panel-body">

                        <form onSubmit="verificar(this)" class="form-horizontal" name="api.php" role="form" action="" method="post">
                            <!-- form dos 'obrigatórios' -->
                            <div class="form-group">
                                <label for="nome" class="col-sm-3 control-label">Nome:</label>
                                <div class="col-sm-9"><input type="text" class="form-control input-lg" id="nome" placeholder="Seu nome completo..." name="nome" required></div>
                            </div>

                            <div class="form-group">
                                <label for="cep" class="col-sm-3 col-xs-3 control-label">Cep:</label>
                                <div class="col-md-9 col-xs-9"><input type=text name="cep" id="cep" class="form-control input-lg" pattern=".{9,}" placeholder="CEP" maxlength="9" required onkeypress="mascara(this, '#####-###')" /></div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-4 col-sm-4 col-xs-4">
                                    <input id="ddd" class="form-control input-lg" type="text" name="ddd" size="3" maxlength="2" required title="DDD Telefone" placeholder="DDD">
                                </div>
                                <div class="col-md-7 col-sm-7 col-xs-7">
                                    <input id="telefone" class="form-control input-lg col-xs-6 col-md-6" type="text" name="telefone" required maxlength="10" title="Telefone" placeholder="Telefone" onkeypress="mascara(this, '#####-####')" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="email" class="col-sm-3 col-xs-3 control-label">Email:</label>
                                <div class="col-md-9 col-xs-9">
                                    <input id="email" type="email" required placeholder="XXXXX@XXXX.XXX" name="email" class="form-control input-lg col-sm-6" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" />
                                </div>
                            </div>

                            <div class="form-group">
				<label for="arquivo" class="upload">Inserir selfie com Ciro</label>
                                <input type="file" id="arquivo" name="arquivo" class="btn" accept="image/png, image/jpeg" multiple />
				
                            </div>

                            <div class="form-group">
                                <div class="col-md-3 col-xs-3 col-sm-3"><input type=checkbox checked id="concordo" value="concordo" class="form-control input-lg"></div>
                                <label for="concordo" class="col-xs-9 control-label">Concordo com o termos de serviço:</label>

                            </div>

                            		<div class="g-recaptcha" data-sitekey="6Lc71y4UAAAAAHwvUe53F2KUxNT79_ElGyiC9W65" data-size="invisible" data-callback="onSubmit">
					

                            <div class="form-group last">
                                <div class="col-sm-offset-1 col-sm-10">
                                    <button onclick="insere()" name="submit" id="recaptcha-submit" type="button" value="Enviar" class="btn btn-primary btn-lg">Enviar </button>&nbsp&nbsp
                                    <input type="reset" value="Reset" class="btn btn-danger btn-lg">
                                </div>
                            </div>

                        </form>




                    </div>


                    <div class="panel-footer">
                        
                    </div>




                </div>

            </div>
        </div>
</body>
<!--
Back-End▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔1.Valida as dimensões da imagem para ver se estão de acordo com o mínimoconfigurado.2.Gera uma UUID v4 aleatório, este será o nome da imagem.3.Realiza uma requisição do tipo POST para um serviço REST do #TCC, com osdados do apoiador, o UUID gerado, a informação do recaptcha recebida dofront-end e a chave de acesso do serviço REST (vide Observações).4.Adiciona uma marca d’água configurável na imagem enviada pelo apoiador.5.Envia a imagem com o nome igual ao UUID gerado para o cloud storageBackblaze B2.
    -->

</html>
