function insere() {
    // Captura os dados do formulário
    var formulario = document.getElementById('formulario');

    // Instância o FormData passando como parâmetro o formulário
    var formData = new FormData(formulario);



    //dados a enviar, vai buscar os valores dos campos que queremos enviar p/ o backend
    /* var dados = {
        'nome' : $("#nome").val(),
        'cep' : $("#cep").val(),
        'ddd' : $("#ddd").val(),
	'telefone' : $("#telefone").val(),
	'email' : $("#email").val(),
	'arquivo' : $("#arquivo").val()


    };*/


    pageurl = 'backend.php';
    //help para o ajax
    //http://api.jquery.com/jQuery.ajax/
    $.ajax({

        //url da pagina
        url: pageurl,
        //parametros a passar
        data: formData,
        dataType: 'json',
        processData: false,
        contentType: false,
        //tipo: POST ou GET
        type: 'POST',
        //cache
        cache: false,
        //se ocorrer um erro na chamada ajax, retorna este alerta
        //possiveis erros: pagina nao existe, erro de codigo na pagina, falha de comunicacao/internet, etc etc etc



        error: function() {
            alert('Erro: Não é possível conectar (pode ser falha na sua rede)');
        },
        //retorna o resultado da pagina para onde enviamos os dados
        success: function(result) {
            //se foi inserido com sucesso
            if ($.trim(result) == '1') {
                alert(" sucesso!");
            }
            //se foi um erro
            else {
                alert("Falha ao inserir, verifique se todos os campos do formulário foram preenchidos");
            }

        }
    });
}