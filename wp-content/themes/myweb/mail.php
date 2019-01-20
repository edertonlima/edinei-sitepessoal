<?php
	
	$nome = $_GET['nome'];
	$email = $_GET['email'];
	$mensagem = $_GET['mensagem'];

	$confirmacao = $_GET['confirmacao'];

	$envio = true;
	if(($nome == '') || ($email == '')){
		$envio = false;
	}

	$nome_site = $_GET['nome_site'];
	$para = $_GET['para'];

	$email_remetente = 'eu@ederton.xyz';


	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
	$headers .= "From: $nome_site <$email_remetente>\n";
	$headers .= "Return-Path: $nome_site <$email_remetente>\n";
	$headers .= "Reply-To: $nome <$email>\n";

	$conteudo = '
	<h2>Uma nova mensagem foi enviada através do site.</h2>
	<p>Todos os dados foram preenchidos no formulário da área "Contato", na pagina Home:</p>';

	$conteudo .= '<p>';
	$conteudo .= '<strong>Nome:</strong> '.$nome;
	$conteudo .= '<br><strong>E-mail:</strong> '.$email;
	$conteudo .= '<br><br>.$mensagem';
	$conteudo .= '</p>';
	if((mail($para, "Contato, Fale Conosco", $conteudo, $headers, "-f$email_remetente")) && ($envio)) {
		mail('edertton@gmail.com', "Contato, Fale Conosco", $conteudo, $headers, "-f$email_remetente");
		//mail('pablo@di20.com.br', "Contato, Fale Conosco", $conteudo, $headers, "-f$email_remetente");
		echo(json_encode('ok'));
	}else{
		echo(json_encode("Desculpe, não foi possível enviar seu formulário. <br>Por favor, tente novamente mais tarde."));
	}
?>